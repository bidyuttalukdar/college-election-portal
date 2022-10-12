@extends('layouts.admin.layout_admin')
@section('title','Admin | Student Details')
@section('admin_content')
<section>
    <div class="pagetitle">
        <h1>Candidate Entry Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Candidate Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        {{-- <div class="row justify-content-center mb-3">
            <div class="card col-3 box_border m-1 p-3" style="background-color:green;"><a
                    href="#" class="color_white">Registered:
                    {{ $countOfRegisteredStudent }}</a>
            </div>
            <div class="card col-3 box_border m-1 p-3" style="background-color:#e63c38;"><a
                    href="#" class="color_white">Pending:
                    {{ $countOfNotRegisteredStudent }}</a></div>
        </div> --}}
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Candidate Entry List
                        <span style="float: right"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><i
                                class="bi bi-pencil-square"></i> Add New</button></span>
                    </h5>
                    <!-- Table with stripped rows -->
                    
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Sl. No.</th>
                                <th scope="col">Reg. No.</th>
                                <th scope="col">Roll No</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Department</th>
                                <th scope="col">Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Gender</th>
                                {{-- <th scope="col">Registered</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentDetails as $li)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $li->registration_no }}</td>
                                    <td>{{ $li->clg_roll_no }}</td>
                                    <td>{{ $li->degree }}</td>
                                    <td>{{ $li->department }}</td>
                                    <td>{{ $li->name }}</td>
                                    <td>{{ $li->dob }}</td>
                                    <td>
                                        @if( $li->gender == 0 )
                                            Male 
                                        @else
                                            Female
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="largeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <span id="modal_title">Add Candidate Information</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#" id="newElectorialPosition">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-3">

                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Registration Number<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="registration_no" id="registration_no" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Roll Number<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="clg_roll_no" id="clg_roll_no" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Degree<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="degree" id="degree" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Department<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="department" id="department" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Email <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Mobile <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mobile" id="mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        DOB<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dob" id="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Gender<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="gender" id="" class="form-select">
                                            <option>--select--</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-btn">Create</button>
                    </div>
                <form>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js_content')
<script type="text/javascript">
$('#newElectorialPosition').on('submit', function(e) {
    e.preventDefault();
    $('.loader-wrapper').fadeIn();
    $('.form_errors').remove();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '{{ url('admin/candidate-details/add-candidate/details') }}',
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
</script>
@endsection