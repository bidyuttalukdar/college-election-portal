<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPostDetail extends Model
{
    public static function getPostDetails(){
        return MasterPostDetail::get();
    }

    public static function storeElectorialPositionData(array $data){
        return MasterPostDetail::insertGetId($data);
    }
    
}
