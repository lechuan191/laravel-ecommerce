<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class ProductController extends Controller
{
    public function productDetail($id){

    	$product = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('sub_categories','products.subcategory_id','sub_categories.id')
    			->join('brands','products.brand_id','brands.id')
                ->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
                ->where('products.id',$id)
                ->where('products.status',1)
    			->first();

    	$color = $product->product_color;
    	$product_color = explode(',', $color);

    	$size = $product->product_size;
    	$product_size = explode(',', $size);

    	return view('pages.product.detail',compact('product','product_color','product_size'));

    }
    public function addToCartDetail(Request $request, $id){
        $product = DB::table('products')->where('id',$id)->first();

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->quantity;
            $data['price'] = $product->selling_price;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            //return response()->json($data);
            $message = [
                'message' => 'Successfully Added on your Cart',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($message);
        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->quantity;
            $data['price'] = $product->discount_price;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            //return response()->json($data);
            $message = [
                'message' => 'Successfully Added on your Cart',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($message);
        }

    }
}
