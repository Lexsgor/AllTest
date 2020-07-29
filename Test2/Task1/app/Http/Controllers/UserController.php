<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function valid($nick, $pass){
        $key = json_decode (\File::get(storage_path('key.json')));
        $result = false; 
        for ( $indexs = 0 ; $indexs < count( $key); $indexs++){
            if (($key[$indexs]->{'nick'}==$nick) && $key[$indexs]->{'pass'}==$pass){
                $result = true;
                }
            }
        return $result;
    }

    public function out (Request $data){
        $nickInForm = trim($data->input('nick'));
        $passInForm = trim($data->input('pass')); 
        $validResult = self::valid( $nickInForm,$passInForm); 
        if ($validResult){
            $data->session()->put('passError', 0);
            $data->session()->put('time', 0);
            $data->session()->put('user', $nickInForm);
            return redirect()->route('userData');
        }else{
            $passError = $data->session()->get('passError');
            if ($passError < 2){
                $passError++;
                $data->session()->put('passError', $passError);
            } else {
                $data->session()->put('time', time());
            }
            return redirect()->back();
        }
    }

    
}
