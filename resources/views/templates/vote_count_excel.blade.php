@if(isset($voteCount))
    @foreach ($voteCount as $li)
        <table class="table">
            <thead>
                <tr>
                    {{$li['candidateDetails'][0]->position_name}}
                </tr>
                <tr>
                    <th>Candidate Name</th>
                    <th>Party Name</th>
                    <th>Vote</th>
                </tr>
            </thead>
            <tbody>
                @foreach($li['candidateDetails'] as $li1)
                <tr>
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
    @endforeach
@endif
