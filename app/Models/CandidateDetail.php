<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPostDetail;
use DB;

class CandidateDetail extends Model
{
    
    public static function storeCandidateData(array $data){
        return CandidateDetail::insertGetId($data);
    }

    public static function getAllCandidateDetails(){
        return CandidateDetail::join('student_details','student_details.id','=','candidate_details.student_id')
                            ->join('master_post_details','master_post_details.id','=','candidate_details.post_id')
                            ->join('master_genders','master_genders.id','=','student_details.gender')
                            ->join('users','users.id','=','candidate_details.created_by')
                            ->select('student_details.*','candidate_details.party_name','candidate_details.remarks','candidate_details.profile_image','users.name as approved_by','master_post_details.name as position_name','master_post_details.abbr','master_genders.gender_name')
                            ->where('master_post_details.is_active','=',1)
                            ->where('candidate_details.is_rejected','=',0)
                            ->where('student_details.is_display','=',1)
                            ->orderBy('candidate_details.id','DESC')
                            ->get();
    }

    //public
    public static function getCandidateDetails(){
        $masterPositionData=MasterPostDetail::where('is_active','=','1')->get();
        $finalArray=[];
        foreach($masterPositionData as $li){
            $candidateDetails=CandidateDetail::join('student_details','student_details.id','=','candidate_details.student_id')
                    ->join('master_post_details','master_post_details.id','=','candidate_details.post_id')
                    ->join('master_genders','master_genders.id','=','student_details.gender')
                    ->join('users','users.id','=','candidate_details.created_by')
                    ->select('student_details.*','candidate_details.party_name','candidate_details.remarks','candidate_details.profile_image','users.name as approved_by','master_post_details.name as position_name','master_post_details.abbr','master_genders.gender_name','master_post_details.id as post_id')
                    ->where('master_post_details.is_active','=',1)
                    ->where('candidate_details.is_rejected','=',0)
                    ->where('master_post_details.id','=',$li->id)
                    ->orderBY('candidate_details.id','DESC')
                    ->get();
            $finalArray[$li->id]=[
                'candidateDetails' => $candidateDetails,
            ];
        }
        return $finalArray;        
    }
    public static function getCandidateDetailsByPostIdAndCandidateId(array $arrayData){
        return  $candidateDetails=CandidateDetail::join('student_details','student_details.id','=','candidate_details.student_id')
                    ->join('master_post_details','master_post_details.id','=','candidate_details.post_id')
                    ->join('master_genders','master_genders.id','=','student_details.gender')
                    ->join('users','users.id','=','candidate_details.created_by')
                    ->select('student_details.*','candidate_details.party_name','candidate_details.remarks','candidate_details.profile_image','users.name as approved_by','master_post_details.name as position_name','master_post_details.abbr','master_genders.gender_name','master_post_details.id as post_id')
                    ->where('master_post_details.is_active','=',1)
                    ->where('candidate_details.is_rejected','=',0)
                    ->where($arrayData)
                    ->orderBY('candidate_details.id','DESC')
                    ->get();
    } 
}

