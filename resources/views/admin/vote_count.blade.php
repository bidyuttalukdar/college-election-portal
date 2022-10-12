@extends('layouts.admin.layout_admin')
@section('title','Admin | Vote Count')
@section('css_content')
@endsection
@section('admin_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/admin/vote-count-report-pdf')}}">
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-file-pdf"></i> Export in PDF</button>
                </a>
                <a href="{{url('/admin/vote-count-report-excel')}}">
                    <button class="btn btn-sm btn-outline-success"><i class="ri-file-excel-2-line"></i> Export in Excel</button>
                </a>
            </div>   
        </div>
        <div class="row">
            <div class="col-12">
                @if(isset($voteCount))
                <form method="POST" action="{{url('/voting/vote')}}">
                    @csrf
                    @foreach ($voteCount as $li)
                        <div class="row card-title">
                            {{$li['candidateDetails'][0]->position_name}}
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
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
                                            <td>
                                                @foreach ($li['vote_count'] as $li2)
                                                    @if($li2->candidate_st_id == $li1->id)
                                                        {{$li2->vote_count}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            {{-- post id and student_id --}}
                                        </tr>
                                         @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </form> 
                @endif                
            </div>
        </div>
    </div>
</section>
@endsection
@section('js_content')
@endsection