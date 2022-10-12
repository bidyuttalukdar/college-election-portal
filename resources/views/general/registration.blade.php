@extends('layouts.general.layouts_general')
@section('title','GU ELECTION | Registration')

@section('css_content')
<!-- Vendor CSS Files -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
<style>
    
    i.success {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    i.cancel {
        color: red;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
</style>
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-md-6 offset-md-3 mt-4">
        <div class="card mt-5 mb-4">
            <div class="row">
                <div class="form-group text-center bg-color p-2 color_white ">

                    <h4 class="mt-1">Registration Form</h4>
                </div>              
                @if(isset($candidateDetails))                
                    <form method="POST" action="{{ url('/register/studentVoting') }}" class="p-4" id="registerForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2 ">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="sname" name='sname' value="{{$candidateDetails->name}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>Degree</label>
                                    <input type="text" class="form-control" id="degree" name="degree" value="{{$candidateDetails->degree}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" value="{{$candidateDetails->department}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="mobile">Registration No.</label>
                                    <input type="text" class="form-control" id="registrationNo" name="registrationNo" value="{{$candidateDetails->registration_no}}" disabled>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="mobile">Roll No.</label>
                                    <input type="text" class="form-control" id="roll_no" name="roll_no" value="{{$candidateDetails->clg_roll_no}}" disabled>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" value="{{$candidateDetails->mobile}}" disabled>    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$candidateDetails->email}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value="{{$candidateDetails->id}}">
                        
                        <div class="form-group mb-2 mt-2">
                            <label for="">Date of Birth</label>
                            <input type="text" class="form-control date" id="dob" name="dob" value="{{$candidateDetails->dob}}" disabled>
        
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword2"
                                placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100 submit-btn register">Register</button>
                        
                    </form>
                @endif
                @if(isset($successfulRegistration))
                    @if($successfulRegistration==1)
                    <div class="text-center">
                        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                            <i class="checkmark success">✓</i>
                        </div>
                        <h1 class="color-green">Success</h1> 
                        <p>We have registered successfully <br/> PLease login on voting day to cast your vote!</p>
                    </div>
                    @elseif($successfulRegistration==0)
                    <div class="text-center">
                        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                            <i class="checkmark cancel">X</i>
                        </div>
                        <h1 class="color-red">Already Registered</h1> 
                        <p>You have registered already<br/> Please login on voting day to cast your vote!</p>
                    </div>
                    @elseif($successfulRegistration==2)
                    <div class="text-center">
                        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                            <i class="checkmark cancel">X</i>
                        </div>
                        <h1 class="color-red">No data found!!!</h1> 
                        
                    </div>
                    @endif                    
                @endif 
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_content')
<script type="text/javascript">
    $(document).ready(function() {

$('.date').Zebra_DatePicker({});

$('#registerForm').submit(function(e) {

    e.preventDefault();
alert("Bidyut");
    var formData = new FormData(this);

    /*var gender = $('form input[type=radio]:checked').val();
                alert(gender); return;*/
    var error = $('.error');

    // clear all error message
    error.text('');

    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.register').attr('disabled', true).text("Please Wait...");
        },
        success: function(data) {
            if (data.msgType == true) {

                toastr.success("Success", data.msg, {
                    timeOut: 2000,
                    preventDuplicates: true,
                    // Redirect 
                    onHidden: function() {
                        // location.reload();
                        

                    }

                });


            } else {
                if (data.msg == "VE") {
                    toastr.warning("Error",
                        "Validation error.Please check the form correctly!");
                    $.each(data.errors, function(index, value) {
                        $('#' + index).after(
                            '<p class="text-danger form_errors">' +
                            value + '</p>');
                    });
                } else {
                    toastr.error("Error", data.msg, {
                        "progressBar": true,
                    });
                }


                $('.register').attr('disabled', false).text("Register")
            }
        },
        complete: function() {}
    });

});
});
</script>
@endsection