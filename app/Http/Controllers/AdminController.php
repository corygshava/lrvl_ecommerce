<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
	public static $product_img_upload_path = 'uploads/products/';

	public static function isadmin(): bool{
		$utype = auth()->user()->usertype;
		$dec = $utype == 1;

		if(!$dec){
			echo <<<HTML
				<h1>404 - Resource Not Found</h1>
				<p>The described resource doesnt exist on our servers</p>
			HTML;
		}

		return $dec;
	}

	public function product() {
		if(!self::isadmin()){
			$view = str_shuffle('getfucked');
			return view($view);
		}

		return view('admin.add_product');
	}

	public function add_product(Request $req) {
		if(!self::isadmin()){
			$view = str_shuffle('getfucked');
			return redirect($view);
		}

		$indata = $req->validate([
			'prod_title' => ['required'],
			'prod_price' => ['required'],
			'prod_desc' => ['required'],
			'prod_amt' => ['required','min:0']
		]);

		$san_prod_title = strip_tags($indata['prod_title']);
		$san_prod_price = strip_tags($indata['prod_price']);
		$san_prod_desc = strip_tags($indata['prod_desc']);
		$san_prod_amt = strip_tags($indata['prod_amt']);

		$img = $req->file('prod_img');

		if($img == null){
			return redirect()->back()->withErrors(['prod_img' => 'attach a valid image first']);
		}

		$fpath = self::$product_img_upload_path;
		$imgname = time().'_'.$img->getClientOriginalName();
		$img->move(public_path($fpath),$imgname);
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

	public function list_products() {
		if(!self::isadmin()){
			$view = str_shuffle('getfucked');
			return redirect($view);
		}

		$pageamt = 15;
		$prods = Product::paginate($pageamt);
		$passeddata = ['data' => $prods,'amts' => $pageamt];

		return view('admin.list_product', $passeddata);
	}

	public function ui_edit_product($id) {
		if(!self::isadmin()){
			$view = str_shuffle('getfucked');
			return redirect($view);
		}

		$data = Product::find($id);
		$passeddata = ['prod' => $data];

		return view('admin.edit_product',$passeddata);
	}

	public function edit_product(Request $req, $id) {
		if(!self::isadmin()){
			$view = str_shuffle('getfucked');
			return redirect($view);
		}

		$data = Product::find($id);

		$indata = $req->validate([
			'prod_title' => ['required'],
			'prod_price' => ['required'],
			'prod_desc' => ['required'],
			'prod_amt' => ['required','min:0'],
			'oldimage' => ['required']
		]);

		$san_prod_title = strip_tags($indata['prod_title']);
		$san_prod_price = strip_tags($indata['prod_price']);
		$san_prod_desc = strip_tags($indata['prod_desc']);
		$san_prod_amt = strip_tags($indata['prod_amt']);
		$san_old_image = $indata['oldimage'];

		$img = $req->file('prod_img');

		if($img !== null){
			$fpath = self::$product_img_upload_path;
			$thepath = public_path($fpath).$san_old_image;
			unlink($thepath);
			$imgname = time().'_'.$img->getClientOriginalName();
			$img->move(public_path($fpath),$imgname);
			// return $imgname;
		} else {
			$imgname = $san_old_image;
		}

		$outdata = [
			'title' => $san_prod_title,
			'price' => $san_prod_price,
			'description' => $san_prod_desc,
			'quantity' => $san_prod_amt,
			'prod_img' => $imgname,
		];

		Product::where('id', $id)->update($outdata);

		return redirect('admin_list_products')->with('message',"Product updated successfully");
	}

	public function delete_product($id) {
		if(self::isadmin()){
			$data = Product::find($id);
			// TODO: make it that this just changes its publish status to 0 instead of nukin it
			// $data->delete();

			return redirect()->back()->with('message','Item deleted successfully');
		}
	}
}
