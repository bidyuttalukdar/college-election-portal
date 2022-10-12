<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use App\Models\MasterPostDetail;
use App\Utils\HttpMethodUtil;
use App\Models\CandidateDetail;
use Carbon\Carbon;
use App\Models\VoteCount;
use App\Exports\VoteCountsExport;
use Maatwebsite\Excel\Facades\Excel;
use Crypt;
use DB;
use Validator;
use PDF;
use Auth;
use App\User;


class AdminController extends Controller
{
    public function studentDetails(Request $request){

        $user=Auth::user();
        if(HttpMethodUtil::isMethodGet()){
            $studentDetails=StudentDetail::where('is_display','=','1')->get();
            $countOfRegisteredStudent=StudentDetail::countOfRegisteredStudent();
            $countOfNotRegisteredStudent=StudentDetail::countOfNotRegisteredStudent();
            return view('admin.student_details')->with([
                'studentDetails'=>$studentDetails,
                'countOfRegisteredStudent'=>$countOfRegisteredStudent,
                'countOfNotRegisteredStudent'=>$countOfNotRegisteredStudent,
            ]);
        }else if(HttpMethodUtil::isMethodPost()){
            $returnData['msgType'] = false;
		    $returnData['data'] = [];
		    $returnData['msg'] = "Failed To Process Request.";

            $messages = [
				'name.required' => 'This field is required.',
				'registration_no.required' => 'This field is required.',
				'clg_roll_no.required' => 'This field is required.',
				'degree.required' => 'This field is required.',
				'department.required' => 'This field is required.',
				'email.required' => 'This field is required.',
				'mobile.required' => 'This field is required.',
				'dob.required' => 'This field is required.',
				'gender.required' => 'This field is required.',
			];
			$validatorArray = [
				'name' => 'required',
				'registration_no' => 'required',
				'clg_roll_no' => 'required',
				'degree' => 'required',
				'department' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'dob' => 'required',
				'gender' => 'required',
			];

			$validator = Validator::make($request->all(), $validatorArray, $messages);
			if ($validator->fails()) {
				$errors = $validator->errors();
				$returnData['msg'] = "Input Error, Please Enter Valid Input";
				$returnData['errors'] = $errors;
				return response()->json($returnData);
			}
            DB::beginTransaction();
            try{
                $name=$request->get('name');
                $registration_no=$request->get('registration_no');
                $clg_roll_no=$request->get('clg_roll_no');
                $degree=$request->get('degree');
                $department=$request->get('department');
                $email=$request->get('email');
                $mobile=$request->get('mobile');
                $dob=$request->get('dob');
                $gender=$request->get('gender');

                $candidateEntryLevelData=[
                    'name'=>$name,
                    'registration_no'=>$registration_no,
                    'clg_roll_no'=>$clg_roll_no,
                    'degree'=>$degree,
                    'department'=>$department,
                    'email'=>$email,
                    'mobile'=>$mobile,
                    'dob'=>$dob,
                    'gender'=>$gender,
                ];
                $storeCandidateEntryLevelData=StudentDetail::storeCandidateEntryLevelData($candidateEntryLevelData);
                if(!$storeCandidateEntryLevelData){
                    DB::rollback();
                    $returnData['msg']="Enable to store the data";
                    return response()->json($returnData);
                }

            }catch(Exception $e){
                DB::rollback();
				$returnData['msg'] = "Failed to process request." . $e->getMessage();
				return response()->json($returnData);
            }

            DB::commit();
			$returnData['msgType'] = true;
			$returnData['msg'] = "Created Successfully";
			$returnData['data'] = [];
			return response()->json($returnData);

        }
        
    }

    public function index(){
        if(HttpMethodUtil::isMethodGet()){
            $isActive=User::where('role_id','=','2')->first();
            $totalPost=MasterPostDetail::where('is_active','=','1')->count();
            $totalCandidates=CandidateDetail::count();
            
            return view('admin.index')->with([
                'is_active'=>$isActive->is_active,
                'totalPost'=>$totalPost,
                'totalCandidates'=>$totalCandidates-$totalPost,
            ]);
        }
    }

    public function electorialDetails(Request $request){
        if(HttpMethodUtil::isMethodGet()){
            $postDetails=MasterPostDetail::getPostDetails();
            return view('admin.electorial_post_list')->with([
                'postDetails'=>$postDetails,
            ]);
        }else if(HttpMethodUtil::isMethodPost()){
            $returnData['msgType'] = false;
		    $returnData['data'] = [];
		    $returnData['msg'] = "Failed To Process Request.";

            $messages = [
				'name.required' => 'This field is required.',
			];
			$validatorArray = [
				'name' => 'required',
			];

			$validator = Validator::make($request->all(), $validatorArray, $messages);
			if ($validator->fails()) {
				$errors = $validator->errors();
				$returnData['msg'] = "Input Error, Please Enter Valid Input";
				$returnData['errors'] = $errors;
				return response()->json($returnData);
			}

            DB::beginTransaction();
            try{
                $name=$request->get('name');
                $abbr=$request->get('abbr')??" ";
                $remark=$request->get('remark')??" ";

                $electorialPositionData=[
                    'name'=>$name,
                    'abbr'=>$abbr,
                    'remark'=>$remark,
                ];
                $storeElectorialPositionData=MasterPostDetail::storeElectorialPositionData($electorialPositionData);
                if(!$storeElectorialPositionData){
                    DB::rollback();
                    $returnData['msg']="Enable to store the data";
                    return response()->json($returnData);
                }

            }catch(Exception $e){
                DB::rollback();
				$returnData['msg'] = "Failed to process request." . $e->getMessage();
				return response()->json($returnData);
            }

            DB::commit();
			$returnData['msgType'] = true;
			$returnData['msg'] = "Created Successfully";
			$returnData['data'] = [];
			return response()->json($returnData);
        }
        
    }

    //active or Deactive
    public function updateElectorialDetails(Request $request){
        $user=Auth::user();

        $returnData['msgType'] = false;
        $returnData['data'] = [];
        $returnData['msg'] = "Failed To Process Request.";

        $messages = [
            'position_id.required' => 'This field is required.',
            'action.required' => 'This field is required.',
        ];
        $validatorArray = [
            'position_id' => 'required',
            'action' => 'required',
        ];

        $validator = Validator::make($request->all(), $validatorArray, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $returnData['msg'] = "Input Error, Please Enter Valid Input";
            $returnData['errors'] = $errors;
            return response()->json($returnData);
        }


        
        DB::beginTransaction();
        try{
            $positionId=$request->get('position_id');
            $action=$request->get('action');
            $updateData = MasterPostDetail::where('id',$positionId)
                ->update([
                'is_active'=>$action,
            ]);
            
            if(!$updateData){
                DB::rollback();
                $returnData['msg'] = "Enable to update !! Something went wrong please try again";
                return response()->json($returnData);
			}

            if($action==1){
                $candidateData=[
                    'student_id'=>1,
                    'post_id'=>$positionId,
                    'party_name'=>" ",
                    'remarks'=>" ",
                    'created_by'=>$user->id,
                ];
                
                $storeCandidateData=CandidateDetail::storeCandidateData($candidateData);
                if(!$storeCandidateData){
                    DB::rollback();
                    $returnData['msg']="Enable to create NOTA";
                    return response()->json($returnData);
                }
            }else{
                $deleted=CandidateDetail::where([
                    ['student_id','=','1'],
                    ['post_id','=',$positionId]
                ])->delete();
            }
            

        }catch(Exception $e){
            DB::rollback();
            $returnData['msg'] = "Failed to process request." . $e->getMessage();
            return response()->json($returnData);
        }

        DB::commit();
        $returnData['msgType'] = true;
        $returnData['msg'] = "Updated Successfully";
        $returnData['data'] = [];
        return response()->json($returnData);
    }
    //for add candidate
    public function addCandidate(Request $request){
        $positions=MasterPostDetail::where('is_active','=',1)->get();

        if(HttpMethodUtil::isMethodGet()){
            return view('admin.add_candidate')->with([
                'positions'=>$positions,
            ]);
        }else if(HttpMethodUtil::isMethodPost()){
            $registration_id=$request->get('registration_id');
            $candidateDetails=StudentDetail::where('registration_no','=',$registration_id)->first();
            // dd($candidateDetails->registration_no);
            return view('admin.add_candidate')->with([
                'positions'=>$positions,
                'candidateDetails'=>$candidateDetails,
            ]);
        }
    }
    //storing candidate data
    public function createCandidate(Request $request){
        $user=Auth::user();
        $dt = Carbon::now();
        $currentYear = $dt->format('Y');

        if(HttpMethodUtil::isMethodPost()){
            $returnData['msgType'] = false;
            $returnData['data'] = [];
            $returnData['msg'] = "Failed To Process Request.";

            $messages = [
                'student_id.required' => 'This field is required.',
                'position.required' => 'This field is required.',
                'docfile.required' => 'This field is required.',
            ];
            $validatorArray = [
                'student_id' => 'required',
                'position' => 'required',
                'docfile' => 'mimes:jpg,jpeg,pdf|max:12000',

            ];

            $validator = Validator::make($request->all(), $validatorArray, $messages);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $returnData['msg'] = "Input Error, Please Enter Valid Input";
                $returnData['errors'] = $errors;
                return response()->json($returnData);
            }
            
            DB::beginTransaction();
            try{
                $student_id=$request->input('student_id');
                $position_id=$request->input('position');
                $partyName=$request->input('partyName')??" ";
                $remark=$request->input('remark')??" ";
                $docfile = $request->file('docfile');

                
                $alreadyAdded=CandidateDetail::where([
                    ['student_id','=',$student_id],
                    ['is_rejected','=','0'],
                ])->first();

                if($alreadyAdded){
                    DB::rollback();
                    $returnData['msg'] = "ALready Added";
                    return response()->json($returnData);
                }
                
                if ($docfile) {
                    $file_path = $docfile->store($currentYear.'/candidate_profile/', 'public');
                }

                $candidateData=[
                    'student_id'=>$student_id,
                    'post_id'=>$position_id,
                    'party_name'=>$partyName,
                    'remarks'=>$remark,
                    'profile_image'=>$file_path,
                    'created_by'=>$user->id,
                ];
                $storeCandidateData=CandidateDetail::storeCandidateData($candidateData);

                if(!$storeCandidateData){
                    DB::rollback();
                    $returnData['msg']="Enable to store the Candidate data";
                    return response()->json($returnData);
                }

            }catch(Exception $e){
                DB::rollback();
                $returnData['msg'] = "Failed to process request." . $e->getMessage();
                return response()->json($returnData);
            }

            DB::commit();
            $returnData['msgType'] = true;
            $returnData['msg'] = "Candidate is Added! Please Check Candidate list";
            $returnData['data'] = [];
            return response()->json($returnData);

        }
    }

    public function candidateDetails(Request $request){
        if(HttpMethodUtil::isMethodGet()){
            $candidateDetails=CandidateDetail::getAllCandidateDetails();
            //echo json_encode($candidateDetails); die();
            return view('admin.candidate_list')->with([
                'candidateDetails'=>$candidateDetails,
            ]);
        }
    }
    
    public function voteCount(Request $request){
        if(HttpMethodUtil::isMethodGet()){
            $voteCount=VoteCount::getCandidateVotingDetails();
            //dd($voteCount);
            return view('admin.vote_count')->with([
                'voteCount'=>$voteCount,
            ]);
        }
    }
    


    public function getVoteCountPdf(Request $request){
        $user=Auth::user();
        $current_date=Carbon::now();
        
        if (HttpMethodUtil::isMethodGet()) {			
            $voteCount=VoteCount::getCandidateVotingDetails();
            //echo json_encode($voteCount); die();
            $data=[
                'voteCount'=>$voteCount,
                'current_date'=>$current_date,
            ];
            // echo json_encode($data); die();
			$pdf = PDF::loadView('templates.vote_count_pdf', $data)->setPaper('A4', 'portrait');

			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			//================================DOC NAME===============================================
			$docName = "Voting Count Report For ".$user->name;
			//========================================================================================
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

			return $pdf->download($docName . '.pdf');
		}
    }

    public function getVoteCountExcel(){
        $voteCount=VoteCount::getCandidateVotingDetails();

        return Excel::download(new VoteCountsExport($voteCount), 'users.xlsx');
    }


    public function deactivateVoting(){
        $user=Auth::user();
        DB::beginTransaction();
        try{
            $updateData = User::where('role_id','=','2')
                ->update([
                'is_active'=>0,
            ]);
            
            if(!$updateData){
                DB::rollback();
                $returnData['msg'] = "Enable to update !! Something went wrong please try again";
                return response()->json($returnData);
			}
        }catch(Exception $e){
            DB::rollback();
            $returnData['msg'] = "Failed to process request." . $e->getMessage();
            return response()->json($returnData);
        }

        DB::commit();
        $returnData['msgType'] = true;
        $returnData['msg'] = "Deactivated Successfully";
        $returnData['data'] = [];
        return response()->json($returnData);
    }

    public function activateVoting(){
        $user=Auth::user();
        DB::beginTransaction();
        try{
            $updateData = User::where('role_id','=','2')
                ->update([
                'is_active'=>1,
            ]);
            
            if(!$updateData){
                DB::rollback();
                $returnData['msg'] = "Enable to update !! Something went wrong please try again";
                return response()->json($returnData);
			}
        }catch(Exception $e){
            DB::rollback();
            $returnData['msg'] = "Failed to process request." . $e->getMessage();
            return response()->json($returnData);
        }

        DB::commit();
        $returnData['msgType'] = true;
        $returnData['msg'] = "activated Successfully";
        $returnData['data'] = [];
        return response()->json($returnData);
    }
}
