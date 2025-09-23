<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function product() {
        return view('admin.product');
    }

    public function add_product(Request $req) {
        $indata = $req->validate([
            'prod_title' => ['required'],
            'prod_price' => ['required'],
            'prod_desc' => ['required'],
            'prod_amt' => ['required','min:1']
        ]);

        $san_prod_title = strip_tags($indata['prod_title']);
        $san_prod_price = strip_tags($indata['prod_price']);
        $san_prod_desc = strip_tags($indata['prod_desc']);
        $san_prod_amt = strip_tags($indata['prod_amt']);

        $img = $req->file('prod_img');

        if($img == null){
            return redirect()->back()->withErrors(['prod_img' => 'attach a valid image first']);
        }

        $imgname = time().'_'.$img->getClientOriginalName();
        $img->move(public_path('uploads/products/'),$imgname);
        // return $imgname;

        $outdata = [
        	'title' => $san_prod_title,
            'price' => $san_prod_price,
            'description' => $san_prod_desc,
            'quantity' => $san_prod_amt,
            'prod_img' => $imgname,
        ];

        Product::create($outdata);

        return redirect()->back()->with('message','Product added successfully');
    }
}
