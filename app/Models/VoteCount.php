<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class VoteCount extends Model
{
    public static function storeVotingData(array $data){
        return VoteCount::insertGetId($data);
    }
    //vote count by candidate
    public static function getCandidateVotingDetails(){
        $finalArray=[];
        $masterPositionData=MasterPostDetail::where('is_active','=','1')->get();
       
        foreach($masterPositionData as $li){
            $candidateDetails=CandidateDetail::join('student_details','student_details.id','=','candidate_details.student_id')
                    ->join('master_post_details','master_post_details.id','=','candidate_details.post_id')
                    ->join('master_genders','master_genders.id','=','student_details.gender')
                    ->join('users','users.id','=','candidate_details.created_by')
                    ->select('student_details.*','candidate_details.party_name','candidate_details.profile_image','candidate_details.remarks','users.name as approved_by','master_post_details.name as position_name','master_post_details.abbr','master_genders.gender_name','master_post_details.id as post_id')
                    ->where('master_post_details.is_active','=',1)
                    ->where('candidate_details.is_rejected','=',0)
                    ->where('master_post_details.id','=',$li->id)
                    ->orderBY('candidate_details.id','DESC')
                    ->get();
            
            $vote_count=VoteCount::where('post_id','=',$li->id)->select('candidate_st_id',DB::raw('count(*) AS vote_count'))->groupBy('candidate_st_id')->get();

            $finalArray[$li->id]=[
                'candidateDetails' => $candidateDetails,
                'vote_count'=>$vote_count,
            ];
        }
        //$finalArray['voteCountByPostIdAndCandidateId']=$voteCountByPostIdAndCandidateId;
        return $finalArray;        
    }
}
