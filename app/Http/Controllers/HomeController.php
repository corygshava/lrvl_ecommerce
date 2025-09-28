<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($value=''){
        $thapage = 'user.home';

        if(auth()->check()){
            $usertype = auth()->user()->usertype;

            if($usertype == '1'){
                $thapage = 'admin.home';
                return view($thapage);
            }
        }

        // $prod_data = Product::all();
        $prod_data = Product::paginate(4);
        $sendover = ['prods' => $prod_data];

        return view($thapage,$sendover);
    }
}
