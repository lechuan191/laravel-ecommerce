<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function ProductView($id){

    	$product = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('sub_categories','products.subcategory_id','sub_categories.id')
    			->join('brands','products.brand_id','brands.id')
                ->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
                ->where('products.id',$id)
    			->first();

    	$color = $product->product_color;
    	$product_color = explode(',', $color);

    	$size = $product->product_size;
    	$product_size = explode(',', $size);

    	return view('pages.product.detail',compact('product','product_color','product_size'));

    }
}
