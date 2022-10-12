@extends('layouts.admin.layout_admin')
@section('title','Admin | Add Candidate')
@section('admin_content')
<section>
    <div class="pagetitle">
        <h1>Add Candidate</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Candidate Details</li>
                <li class="breadcrumb-item active">Add Candidate</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-3 pt-2">
                            <form action="{{url('/admin/candidate-details/add-candidate/add')}}" id="searchCandidate" method="POST">
                                @csrf
                                <div class="row pt-3">
                                    <div class="col-md-11">
                                        <input type="text" name="registration_id" placeholder="Enter Registration Number" class="form-control">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="submit" class="btn btn-sm btn-outline-success btn-sc" value="Search">
                                    </div>
                                </div>    
                            </form>                            
                        </div>
                    </div>

                    @if(isset($candidateDetails))
                        <form action="#" method="POST" id="submitCandidateDetails">
                            @csrf
                            <div class="row pt-2">
                                <h6 class="card-title">Candidate Details</h6>
                                <div class="col-12 form-control">
                                    <div class="row mt-2">
                                        <div class="row">
                                        </div>
                                        <div class="row mt-1"> 
                                            <div class="col-12 mb-1 web-text">
                                                Administration Details
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <label for="name">Registration No</label>
                                                <input type="text" class="form-control" id="rgdNo" name='rgdNo' value="{{$candidateDetails->registration_no}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Roll No</label>
                                                <input type="text" class="form-control" id="rollNo" name='rollNo' value="{{$candidateDetails->clg_roll_no}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Degree</label>
                                                <input type="text" class="form-control" id="degree" name='degree' value="{{$candidateDetails->degree}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Department</label>
                                                <input type="text" class="form-control" id="dept" name='dept' value="{{$candidateDetails->department}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="row">
                                            <div class="col-12 mb-1 web-text">
                                                Personal Details
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name='name' value="{{$candidateDetails->name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input type="text" class="form-control" id="email" name='email' value="{{$candidateDetails->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Mobile</label>
                                                <input type="text" class="form-control" id="mobile" name='mobile' value="{{$candidateDetails->mobile}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">DOB</label>
                                                <input type="text" class="form-control" id="dob" name='dob' value="{{$candidateDetails->dob}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="row">
                                            <div class="col-12 mb-1 web-text">
                                                Election Details <br>

                                               <span style="color: red;"> Note: </span>  Fileds with asterisk sign (<span style="color:red;">*</span>) are mandatory.

                                            </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label for="name">Party Name(if any)</label>
                                                <input type="text" class="form-control" id="partyName" name='partyName' >
        
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Electorial Post<span style="color:red;">*</span></label>
                                                <select name="position" id="position" class="form-control">
                                                    <option value="">--Select--</option>
                                                    @foreach($positions as $li)
                                                        <option value="{{$li->id}}">{{$li->name}} ({{$li->abbr}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Remarks</label>
                                                <textarea type="text" class="form-control" id="remark" name='remark'></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Profile Image<span style="color:red;">*(jpg,jpeg)(Max Size:1MB)</span></label>
                                                <input name="docfile" class="form-control" type="file" id="docfile">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center mt-2">
                                        <input type="hidden" name="student_id" value="{{$candidateDetails->id}}">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <button type="submit" class="btn btn-md btn-success w-100 btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
@section('js_content')
<script type="text/javascript">
    toastr.options.positionClass = "toast-top-right";
    toastr.options.progressBar = true;
    $(document).ready(function() {
        $('#rgdNo').empty();
        $('#rollNo').empty();
        $('#degree').empty();
        $('#dept').empty();
        $('#name').empty();
        $('#email').empty();
        $('#mobile').empty();
        $('#dob').empty();
        $('#partyName').empty();
        $('#remark').empty();
    });
    $('#submitCandidateDetails').on('submit', function(e) {
        e.preventDefault();
        $('.loader-wrapper').fadeIn();
        $('.form_errors').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '{{ url('admin/candidate-details/create-candidate') }}',
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
                            window.location.href='{{ url('/admin/candidate-details/details') }}';

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
    });
    $('#updatePosition').on('submit', function(e) {
        e.preventDefault();
        $('.loader-wrapper').fadeIn();
        $('.form_errors').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '{{url('/admin/electorial-post-details/update')}}',
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function() {
            //     $('.submit-btn').attr('disabled', true).text("Please Wait...");
            // },
            success: function(data) {
                if (data.msgType == true) {
                    toastr.success("Success", data.msg, {
                        timeOut: 1000,
                        preventDuplicates: true,
                        // Redirect 
                        onHidden: function() {
                            location.reload();
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
                    
                    // $('.submit-btn').attr('disabled', false).text("Create");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                callAjaxErrorFunction(jqXHR, textStatus, errorThrown);
            },
            complete: function(data) {
                $('.loader-wrapper').fadeOut();
            }
        });
    });
</script>
@endsection