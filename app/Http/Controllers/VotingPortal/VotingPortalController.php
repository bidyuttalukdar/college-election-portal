<?php

namespace App\Http\Controllers\VotingPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use App\Models\MasterPostDetail;
use App\Utils\HttpMethodUtil;
use App\Models\CandidateDetail;
use App\Models\VoteCount;
use Carbon\Carbon;
use Crypt;
use DB;
use Validator;
use PDF;
use App\User;
use Auth;

class VotingPortalController extends Controller
{
    public function index(){
        if(HttpMethodUtil::isMethodGet()){
            $candidateDetails=CandidateDetail::getCandidateDetails();
            //dd($candidateDetails);
            return view('votingPortal.dashboard')->with([
                'candidateDetails'=>$candidateDetails,
            ]);
        }
    }

    public function confirmationPageView(CandidateDetail $candidateDetails){
        echo json_encode($candidateDetails); die();
        return view('votingPortal.confirm-page')->with([
            ['candidateDetails'=>$candidateDetails],
        ]);
    }
    
    public function confirmationPageDetails(Request $request){
        $user=Auth::user();
        if(HttpMethodUtil::isMethodPost()){
            $returnData['msgType'] = false;
            $returnData['data'] = [];
            $returnData['msg'] = "Failed To Process Request.";

            $masterPositionData=MasterPostDetail::where('is_active','=','1')->get(); //incase their is post active but no candidate alloted it will show error
            DB::beginTransaction();
            try{
                $finalArray=[];
                foreach($masterPositionData as $position_id){

                    $candidate_id=$request->get($position_id->id)??"1";
                    //echo $candidate_id;
                    $arrayData=[
                        ['candidate_details.post_id','=',$position_id->id],
                        ['candidate_details.student_id','=',$candidate_id]
                    ];
                    $finalArray[$position_id->id]=CandidateDetail::getCandidateDetailsByPostIdAndCandidateId($arrayData);
                }
            }catch(Exception $e){
                DB::rollback();
                $returnData['msg'] = "Failed to process request." . $e->getMessage();
                return response()->json($returnData);
            }
            //echo json_encode($finalArray); die(); 
            DB::commit();
            $returnData['msgType'] = true;
            $returnData['msg'] = "Voted Successfully";
            $returnData['data'] = ['results'=>$finalArray];
            return response()->json($returnData);
        }
    }

    public function registerVote(Request $request){
        $user=Auth::user();
        if(HttpMethodUtil::isMethodPost()){
            $returnData['msgType'] = false;
            $returnData['data'] = [];
            $returnData['msg'] = "Failed To Process Request.";

            

            $masterPositionData=MasterPostDetail::where('is_active','=','1')->get(); //incase their is post active but no candidate alloted it will show error
            DB::beginTransaction();
            try{
                foreach($masterPositionData as $position_id){
                    

                    $candidate_id=$request->get($position_id->id);
                    $votingData=[
                        'post_id'=>$position_id->id,
                        'candidate_st_id'=>$candidate_id,
                        'voter_user_id'=>$user->id,
                    ];
                    $storeVotingData=VoteCount::storeVotingData($votingData);
                    // if($storeVotingData){
                    //     $updateStudentData = User::where('id',$user->id)->update([
                    //             'is_voted'=>1,
                    //         ]);
                    // }
                    if(!$storeVotingData){
                        DB::rollback();
                        $returnData['msg'] = "Enable to update !! Something went wrong please try again";
                        return response()->json($returnData);
                    }
                }
            }catch(Exception $e){
                DB::rollback();
                $returnData['msg'] = "Failed to process request." . $e->getMessage();
                return response()->json($returnData);
            }
    
            DB::commit();
            $returnData['msgType'] = true;
            $returnData['msg'] = "Voted Successfully";
            $returnData['data'] = [];
            return response()->json($returnData);
        }
    }

    public function successfullyVoted(Request $request){
        if(HttpMethodUtil::isMethodGet()){
            return view('votingPortal.success');
        }
    }
}


