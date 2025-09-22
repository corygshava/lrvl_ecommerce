<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($value=''){
        if(auth()->check()){
            $usertype = auth()->user()->usertype;

            if($usertype == '1'){
                return view('admin.home');
            } else {
                return view('user.home');
            }
        } else {
            return view('user.home');
        }
    }
    public function send_to_dash() {
        $this->index();
    }
}
