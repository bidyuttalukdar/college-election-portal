<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    public function allStudentDetails(){
        return StudentDetail::get();
    }

    public static function countOfRegisteredStudent(){
        return StudentDetail::where('is_registered','=',1)->count();
    }

    public static function countOfNotRegisteredStudent(){
        return StudentDetail::where('is_registered','=',0)->count();
    }

    public static function storeCandidateEntryLevelData(array $data){
        return StudentDetail::insertGetId($data);
    }
}
