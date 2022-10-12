@extends('layouts.admin.layout_admin')
@section('title','Admin | Electorial Position Details')

@section('css_content')
    <style>
        .font-size-14px{
            font-size:14px;
        }
    </style>
@endsection
@section('admin_content')
<section>
    <div class="pagetitle">
        <h1>Candidate List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Candidate Details</li>
                <li class="breadcrumb-item active">Candidate List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Candidate List
                    </h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable font-size-14px">
                        <thead>
                            <tr>
                                <th scope="col">Sl. No.</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Registration Number</th>
                                <th scope="col">Post</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Mobile</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Approved By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidateDetails as $li)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if ($li->profile_image)
                                            <img src="{{ asset('storage') }}/{{ $li->profile_image }}" alt=""
                                            width="100px">                                    
                                        @endif
                                    </td>
                                    <td>{{ $li->name }}</td>
                                    <td>{{ $li->registration_no }}</td>
                                    <td>{{ $li->position_name }}</td>
                                    <td>{{ $li->party_name }}</td>
                                    <td>{{ $li->department }}</td>
                                    <td>{{ $li->degree }}</td>
                                    <td>{{ $li->mobile }}</td>
                                    <td>{{ $li->email }}</td>
                                    <td>{{ $li->dob }}</td>
                                    <td>{{ $li->gender_name }}</td>
                                    <td>{{ $li->approved_by }}</td>
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

                                </div>
                                <div class="row mb-3 mt-2">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="name" id="name" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Abbr <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="abbr" id="abbr" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Remarks</label>
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
</script>
@endsection