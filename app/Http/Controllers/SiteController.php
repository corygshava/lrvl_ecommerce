<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

// used to be HomeController
class SiteController extends Controller{
	public static function get_user_data(){
		$cartscount = [];

		if(auth()->check()){
			$uid = auth()->user()->id;
			$cartscount = Cart::where('userid',$uid)->get();
			// $mycarts = Cart::all();
		}

		return ['carts' => $cartscount];
	}

	public function index($value=''){
		$udata = self::get_user_data();
		$cartcount = count($udata['carts']);
		$pagecount = 4;
		$thapage = 'site.home';

		if(auth()->check()){
			$usertype = auth()->user()->usertype;

			if($usertype == '1'){
				// $thapage = 'admin.home';
				// return view($thapage);
			}
		}
		
		// $prod_data = Product::all();
		$prod_data = Product::where('publish',1)->orderBy('created_at', 'desc')->paginate($pagecount);
		$sendover = ['prods' => $prod_data, 'c_data' => $cartcount];
		
		return view($thapage,$sendover);
	}

	public function products(){
		$udata = self::get_user_data();
		$cartcount = count($udata['carts']);

		$pagecount = 8;
		$thapage = 'site.products';

		$prod_data = Product::where('publish',1)->orderBy('created_at', 'desc')->paginate($pagecount);
		$sendover = ['prods' => $prod_data,'pageamt' => $pagecount, 'c_data' => $cartcount];
		
		return view($thapage,$sendover);
	}

	public function search(Request $req){
		$udata = self::get_user_data();
		$cartcount = count($udata['carts']);

		$pagecount = 8;
		$thapage = 'site.products';
		$search = $req->q;

		$san_search = strip_tags($search);

		$search_data = Product::where('title','like','%'.$search.'%')->where('publish',1)->paginate($pagecount);
		$sendover = ['prods' => $search_data,'pageamt' => $pagecount,'searchterm' => $san_search,'c_data' => $cartcount];
		
		return view($thapage,$sendover);
	}

	public function showcart(){
		if(!auth()->check()){
			return redirect('./')->withErrors('log in to access your cart');
		}
		$udata = self::get_user_data();
		$cartcount = count($udata['carts']);
		$cartdata = $udata['carts'];

		$productsdata = [];

		foreach ($cartdata as $item) {
			array_push($productsdata,$item->myproduct);
		}

		$thapage = 'site.mycart';
		$sendover = ['cartdata' => $cartdata,'prods' => $productsdata,'c_data' => $cartcount];
		
		return view($thapage,$sendover);
	}

	public function add_to_cart(Request $req,$id){
		if(auth()->check()){
			$data = $req->validate([
				'quantity' => ['required'],
				'prod_id' => ['required']
			]);

			$san_prodid = intval($req->prod_id);
			$san_quantity = intval($req->quantity);

			$user = auth()->user();
			$product = Product::find($san_prodid);

			if($product !== null){
				$cart = new Cart;

				$cart->name = $user->name;
				$cart->userid = $user->id;
				$cart->productid = $san_prodid;
				$cart->quantity = $san_quantity;
				$cart->price = $product->price;

				$cart->save();

				return redirect('./products#products')->with('message','added to cart successfully');
			} else {
				return redirect('./products#products')->withErrors('define a valid product first');
			}
		} else {
			return redirect('./login');
		}
	}

	public function remove_from_cart(Request $req){
		if(auth()->check()){
			$data = $req->validate([
				'recid' => ['required','min:0']
			]);

			$san_prodid = intval($req->recid);

			$user = auth()->user();

			$cart = Cart::find($san_prodid);

			if($cart){
				$cart->delete();
			}

			return redirect()->back()->with('message','removed from cart successfully');
		} else {
			return redirect('./login');
		}
	}

	public function clear_cart(Request $req){
		if(auth()->check()){
			$uid = auth()->user()->id;

			$cart = Cart::where('userid',$uid)->delete();

			return redirect()->back()->with('message','cart cleared successfully');
		} else {
			return redirect('./login');
		}
	}

	public function admin(){
		if(AdminController::isadmin()){
			$thapage = 'admin.home';
			return view($thapage);
		}

		return redirect('./');
	}
}
