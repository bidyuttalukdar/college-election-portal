@extends('layouts.admin.layout_admin')
@section('title','Admin | Index')
@section('admin_content')
<section>
    <div class="conatiner">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Deactivate/Activate Voting</div>
                        @if($is_active==1)
                            <button class="btn btn-danger btn-sm deactivated">Deactive</button>
                        @else
                            <button class="btn btn-primary btn-sm activated">Active</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Total Assigned Candidate</div>
                        {{$totalCandidates}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Total Number Post</div>
                        {{$totalPost}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js_content')
<script type="text/javascript">
$('.deactivated').on('click', function(e){		
    e.preventDefault();

    $('.loader-wrapper').fadeIn();
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: '{{url('admin/voting-user-deactivated')}}',
        dataType: "json",
        success: function (data) {
            if (data.msgType == true) {
                toastr.success("Success", data.msg, {
                    timeOut: 2000,
                    preventDuplicates: true,
                    // Redirect 
                    onHidden: function() {
                        location.reload();
                    }

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

$('.activated').on('click', function(e){		
    e.preventDefault();

    $('.loader-wrapper').fadeIn();
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: '{{url('admin/voting-user-activated')}}',
        dataType: "json",
        success: function (data) {
            if (data.msgType == true) {
                toastr.success("Success", data.msg, {
                    timeOut: 2000,
                    preventDuplicates: true,
                    // Redirect 
                    onHidden: function() {
                        location.reload();
                    }

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