@extends('layouts.votingPortal.layouts_voting_portal')
@section('title','Welcome to GU ELection | Register Your Vote')
@section('css_content')
@endsection
@section('votingPortal')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(isset($candidateDetails))                    
                    <form method="POST" action="#" id="votePreview">
                        @csrf
                        @foreach ($candidateDetails as $li)

                            <div class="row card-title">
                                <div class="col-md-6 offset-md-3 col-sm-12">
                                    {{$li['candidateDetails'][0]->position_name}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Profile Image</th>
                                                <th>Candidate Name</th>
                                                <th>Party Name</th>
                                                <th>Vote</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($li['candidateDetails'] as $li1)
                                            <tr>
                                                <td>
                                                    @if ($li1->profile_image)
                                                        <img src="{{ asset('storage') }}/{{ $li1->profile_image }}" alt=""
                                                        width="100px">
                                                    @endif
                                                </td>
                                                <td>{{$li1->name}}</td>
                                                <td>{{$li1->party_name}}</td>
                                                <td><input type="radio" id="" name="{{$li1->post_id}}" value="{{$li1->id}}"></td>
                                                {{-- post id and student_id --}}
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-outline-danger btn-submit mt-2 w-100"><i class="bi bi-eye-fill"></i> Preview</button>
                        </div>
                    </form>   
                @endif             
            </div>
        </div>
    </div>


    <div class="modal fade " id="preview" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="card-header">
					<div class="row">
						<div class="col-11">
							Preview of Your Votes
						</div>
						<div class="col-1">
							<button type="button" class="btn-close float-right" style="font-size:10px; color:red;" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
					</div>
                </div>
				<div class="model-body card">
					<div class="card-body">
						<form method="POST" action="#" id="voted">
							@csrf
							<div class="form-group mb-3">
								<table class="mt-2 table table-responsive table-bordered">
									<tr class="font_size_13px">
										<th> Name</th>
										<th> Party Name</th>
										<th> Voted For</th>
									</tr>
									<tbody id="candidateList">

									</tbody>
								</table>
								<span class="error text-danger" id="candidateListError"></span>
							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success submit-btn">Vote</button>
                            </div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js_content')
<script type="text/javascript">
    function playAudio(){
        document.getElementById("audio").play();
    }

    $('#voted').on('submit', function(e) {
        e.preventDefault();
        // alert($("input[name='3']:checked").val());
        $('.form_errors').remove();
        if(confirm("Once you submit It can not be retake, Ok to submit")){
            $('.loader-wrapper').fadeIn();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '{{url('/voting/vote')}}',
                dataType: "json",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.submit-btn').attr('disabled', true).text("Please Wait...");
                    },
                success: function(data) {
                    if (data.msgType == true) {
                        toastr.success("Success", data.msg, {
                            timeOut: 2000,
                            preventDuplicates: true,
                            // Redirect 
                            onHidden: function() {
                                location.reload();
                                 window.location.href='{{ url('/voting/success') }}';
                            }

                        });
                        

                    } else {
                        if(data.msg=="VE"){
                            toastr.warning("Error","Validation error.Please check the form correctly!");
                                $.each(data.errors, function( index, value ) {
                                    $('#'+index).after('<p class="text-danger form_errors">'+value+'</p>');
                                });
                            }
                            else{
                                toastr.error(data.msg, "Error");
                            }
                        
                        $('.submit-btn').attr('disabled', false).text("Vote");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    callAjaxErrorFunction(jqXHR, textStatus, errorThrown);
                },
                complete: function(data) {
                    $('.loader-wrapper').fadeOut();
                }
            });
        }i
    });

    $('#votePreview').on('submit', function(e){		
		e.preventDefault();

		$('#preview').modal('show')
		$('#candidateList').empty();
		
        $('.loader-wrapper').fadeIn();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '{{url('/voting/confimation')}}',
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.msgType == true) {
                    $.each(data.data.results, function( index, value ) {
                        $("#candidateList").append("<tr><td> <input type='hidden' name='"+value[0]['post_id']+"' value='"+value[0]['id']+"' >" + value[0]['name'] + "</td><td>" + value[0]['party_name']+ "</td><td>"+value[0]['position_name']+"</td></tr>");
                    });					
                }else{
                    toastr.warning("Error",data.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                callAjaxErrorFunction(jqXHR, textStatus, errorThrown);
            },
            complete: function (data) {
                $('.loader-wrapper').fadeOut();
            }
        });
	});
</script>
@endsection