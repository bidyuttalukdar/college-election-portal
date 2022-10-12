<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use App\Models\MasterPostDetail;
use App\Utils\HttpMethodUtil;
use App\Models\CandidateDetail;
use Carbon\Carbon;
use Crypt;
use DB;
use Validator;
use PDF;
use App\User;

class GeneralController extends Controller
{
    public function getStudentDetail(Request $request){
        if(HttpMethodUtil::isMethodPost()){
            $registration_id=$request->get('registration_id');
            $candidateDetails=StudentDetail::where([
                ['registration_no','=',$registration_id],
            ])->first();
            
            if(isset($candidateDetails) && $candidateDetails->is_registered==1){
                $successfulRegistration=0;
                $candidateDetails=null;
            }else if(isset($candidateDetails)) {
                $successfulRegistration=3;
            }else{
                $successfulRegistration=2;
            }     

            
            return view('general.registration')->with([
                'candidateDetails'=>$candidateDetails,
                'successfulRegistration'=>$successfulRegistration,
            ]);
        }
    } 

    public function registrationForVoting(Request $request){
        $name=$request->get('sname');
        $degree=$request->get('degree');
        $department=$request->get('department');
        $registrationNo=$request->get('registrationNo');
        $roll_no=$request->get('roll_no');
        $email=$request->get('email');
        $dob=$request->get('dob');
        $password=$request->get('password');
        $confirm_password=$request->get('confirm_password');
        $studentID=$request->get('student_id');

        $isAlreadyExist=User::where('student_id','=',$studentID)->first();

        if(isset($isAlreadyExist)){
            $successfulRegistration=0;
        }else{
            $v_password = password_hash($password, PASSWORD_DEFAULT);

            $studentData=[
                'role_id'=>2,
                'student_id'=>$studentID,
                'name'=>$name,
                'email'=>$email,
                'password'=>$v_password,
            ];

            $storeStudentData=User::storeStudentData($studentData);
            $successfulRegistration=1;

            $updateStudentData = StudentDetail::where('id',$studentID)
                ->update([
                'is_registered'=>1,
            ]);
        }
        
		
        return view('general.registration')->with([
            'successfulRegistration'=>$successfulRegistration,
        ]);
    }
       
}
