<?php

namespace App\Exports;
use App\Models\VoteCount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\MasterPostDetail;
use App\Models\CandidateDetail;
use DB;

class VoteCountsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    
    public function __construct($voteCount){
        $this->voteCount=$voteCount;
    }

    public function view(): View
    {
        return view('templates.vote_count_excel')->with([
            'voteCount'=>$this->voteCount,
        ]);
    }
}
