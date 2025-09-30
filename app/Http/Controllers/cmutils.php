<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cmutils extends Controller
{
    public static function mekrandomstring($digits = 8){
        $dict = "abcdefghijklmnopqrstuvwxyz1234567890_";
        $scramble = str_shuffle($dict.$dict);
        self::clamp($digits,0,count_chars($dict) * 2);
        $res = substr($scramble,0,$digits);

        return $res;
    }

    public static function clamp(&$num,$min=0,$max=1){
        $wak = $num;

        if($wak < $min){$wak = $min;}
        if($wak > $max){$wak = $max;}
        $num = $wak;

        return $num;
    }
}
