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
                    <form method="POST" action="#" id="voted">
                        @csrf
                        @foreach ($candidateDetails as $li)
                            <div class="row card-title">
                                {{$li['candidateDetails'][0]->position_name}}
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
                                                <td><input type="radio" name="{{$li1->post_id}}" value="{{$li1->id}}"></td>
                                                {{-- post id and student_id --}}
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-outline-success btn-submit mt-2 w-100">Submit</button>
                        </div>
                    </form>   
                @endif             
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
                    $('.btn-submit').attr('disabled', true).text("Please Wait...");
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
                        
                        $('.btn-submit').attr('disabled', false).text("Submit");
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
</script>
@endsection