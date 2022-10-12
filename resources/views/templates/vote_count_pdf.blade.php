<!DOCTYPE html>
<html>
<head>
    <title>Voting Report</title>
	<style type="text/css">
		.pdf-font-style {
            font-size: 10px;
        }

        .td {
            width: 25%;
        }


        .text-center {
            justify-content: center;
            align-content: center;
            align-items: center;
            justify-items: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #403737d4;
            color: white;
        }
	</style>
</head>
<body>
    <div class="row">
        <div class="col-12">
            @if(isset($voteCount))
                <div class="row text-center">
                    <div class=" text-center">
                        <h3> <b class="bg-color-astc text-center" style="padding-left:36%; font-size:16px;">Election Voting Report</b></h3>
                    </div>
                    <table style="width: 100%; margin-top:4px;">
                        <tr>
                            <td>
                                <span>Date: {{Carbon\Carbon::parse($current_date)->toFormattedDateString()}}</span>
                            </td>
                            <td></td>
                            <td>
                                User: {{Auth::user()->name}}
                            </td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Signature</td>
                        </tr>
                    </table>
                </div>
                @foreach ($voteCount as $li)
                    <div class="row card-title" style="margin-top: 14px;">
                        {{$li['candidateDetails'][0]->position_name}}
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3 col-sm-12 col-xs-12">
                            <table class="table" style="width: 100%; margin-top:4px;" id="customers">
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
            @else
            No data found
            @endif
                          
        </div>
    </div>
</body>
</html>
