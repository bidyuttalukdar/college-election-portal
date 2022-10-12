@extends('layouts.admin.layout_admin')
@section('title','Admin | Electorial Position Details')
@section('admin_content')
<section>
    <div class="pagetitle">
        <h1>Electorial Post List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Electorial Post List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List
                        <span style="float: right"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><i
                                class="bi bi-pencil-square"></i> Add New</button></span>
                    </h4>
                    <!-- Table with stripped rows -->
                    
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Sl. No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Abbr</th>
                                <th scope="col">Roll</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postDetails as $li)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $li->name }}</td>
                                    <td>{{ $li->abbr }}</td>
                                    <td>{{ $li->remark }}</td>
                                    <td>{{ $li->created_at }}</td>
                                    <td>
                                        @if($li->is_active ==1)
                                            <span class="p-2" style="background-color: rgb(13, 132, 13); color:white;"> Yes </span>
                                        @else
                                            <span class="p-2" style="background-color:red; color:white;"> NO </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="updatePosition">
                                            @csrf
                                            @if($li->is_active ==1)                                            
                                                    <input type="hidden" name="position_id" value="{{$li->id}}">
                                                    <input type="hidden" name="action" value="0">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"> Deactive</button>                                            
                                            @else
                                                    <input type="hidden" name="position_id" value="{{$li->id}}">
                                                    <input type="hidden" name="action" value="1">
                                                    <button type="submit"  class="btn btn-sm btn-outline-success">Active</button>
                                            @endif
                                        </form>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <span id="modal_title">Create Electorial Post</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#" id="newElectorialPosition">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <span style="color: red;"> Note: </span>  Fileds with asterisk sign (<span style="color:red;">*</span>) are mandatory.
                                    </div>
                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="name" id="name" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Abbr </label>
                                    <div class="col-sm-9">
                                        <textarea name="abbr" id="abbr" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Roll</label>
                                    <div class="col-sm-9">
                                        <textarea name="remark" id="remark" class="form-control"
                                            style="height: 100px"></textarea>
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
    toastr.options.positionClass = "toast-top-right";
    toastr.options.progressBar = true;


    $('#newElectorialPosition').on('submit', function(e) {
        e.preventDefault();
        $('.loader-wrapper').fadeIn();
        $('.form_errors').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '{{ url('admin/electorial-post-details/details') }}',
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
                    
                    $('.submit-btn').attr('disabled', false).text("Create");
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

    $('.updatePosition').on('submit', function(e) {
        e.preventDefault();
        $('.loader-wrapper').fadeIn();
        $('.form_errors').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{url('admin/electorial-post-details/update')}}",
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