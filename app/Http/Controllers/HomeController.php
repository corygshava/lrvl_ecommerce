<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($value=''){
        return view('user.home');
    }
    public function send_to_dash() {
        $usertype = auth()->user()->usertype;

        // echo "<h1>$usertype</h1>";

        if($usertype == '1'){
            // echo 'welcome admin';

            return view('admin.home');
        } else {
            // echo "welcome customer";

            return view('user.home');
        }
    }
}
