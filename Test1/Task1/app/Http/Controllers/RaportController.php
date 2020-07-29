<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaportController extends Controller
{
    public function out (Request $data){

    $all = $data->all();    
    $out ='    
    <div> Name: '.$data->input('name').'</div>
    <div> Address: '.$data->input('address').'</div>
    <div> Phone: '.$data->input('phone').'</div>
    <div> E-mail: '.$data->input('email').'</div>
    <div> Cost: '.$data->input('cost').'</div>
    <div> Shipping options: '.$data->input('option').'</div>';
    return $out;
    }
}
