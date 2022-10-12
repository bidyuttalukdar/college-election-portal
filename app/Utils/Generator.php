<?php

namespace App\Utils;

use App\Models\Booking;

class Generator
{

    public static function getRandomStringWithSpecialChar(int $length)
    {
        $digits = '0123456789';
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $specialChar = '@$%&_-.';
        $characters = $digits . $alpha . $specialChar;
        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString . time();
    }

    public static function getRandomString(int $length, bool $digits = true, bool $lowercase = true, bool $uppercase = true)
    {

        $num = '0123456789';
        $alphaU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphaL = 'abcdefghijklmnopqrstuvwxyz';

        $new = "";
        $new .= $digits ? $num : "";
        $new .= $lowercase ? $alphaL : "";
        $new .= $uppercase ? $alphaU : "";

        $new = $new == "" ? $num . $alphaL . $alphaU : $new;

        $charactersLength = strlen($new);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $new[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function getUniqueRandomString(int $length, bool $digits = true, bool $lowercase = false, bool $uppercase = true)
    {

        $num = range(0, 9);
        $alphaL = range('a', 'z');
        $alphaU = range('A', 'Z');

        shuffle($num);
        shuffle($alphaL);
        shuffle($alphaU);

        $new = [];

        if (!$digits && $lowercase && $uppercase) {
            $new = array_merge($alphaL, $alphaU);
        } elseif ($digits && !$lowercase && $uppercase) {
            $new = array_merge($num, $alphaU);
        } elseif ($digits && $lowercase && !$uppercase) {
            $new = array_merge($num, $alphaL);
        } elseif (!$digits && !$lowercase && $uppercase) {
            $new = $alphaU;
        } elseif ($digits && !$lowercase && !$uppercase) {
            $new = $num;
        } elseif (!$digits && $lowercase && !$uppercase) {
            $new = $alphaL;
        }

        shuffle($new);

        $final = "";
        for ($i = 0; $i < $length; $i++) {
            $final .= $new[$i];
        }

        return $final;
    }

    public static function getWarehouseCode()
    {
        return Generator::getRandomString(1, false, false) . Generator::getUniqueRandomString(5);
    }
	
	public static function generateBookingCode($cur_year){
		
		$bookingData = Booking::getBookingByYear($cur_year);
		
		if($bookingData){
			$count = substr($bookingData->booking_no,10);
			$count = (int)$count;
		}
		else{
			$count =0;
		}
		
		$count = $count+1;
		
		$count_text=str_pad($count,7,"0",STR_PAD_LEFT);
		
		$generatedCode = "AS".$cur_year.Generator::getUniqueRandomString(4).$count_text;
		
		
		return $generatedCode;
	}
	
	public static function generateScheduleCode($sch_id){
		
		$generateCode = "AS".Generator::getUniqueRandomString(4).$sch_id;
		
		return $generateCode;
	}
}
