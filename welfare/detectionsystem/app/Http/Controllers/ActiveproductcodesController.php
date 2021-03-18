<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\Category;
use App\Code;
use DB;
class ActiveproductcodesController extends Controller
{
    //
 
public function index()
{  


	// $products= Product::all();
	// $codes= Code::all();

    $products= DB::table('products')->join('codes', 'products.id', '=', 'codes.product_id')
    ->select('products.*','code','status')
    ->where('status', 'active')
    ->orderBy('id', 'asc')
    ->get();
    // dd($products);

    
 $page = Code::orderBy('created_at','desc')->paginate(6);
   return view('reports.active',compact('products','page'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
  
}

}
