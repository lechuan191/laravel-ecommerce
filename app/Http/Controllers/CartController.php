<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class CartController extends Controller
{
    public function viewProduct($id){
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

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
    public function AddCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json([
                'messege'=>'Successfully Added on your Cart',
                'alert-type'=>'success'
            ]);
        }
        else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json([
                'messege'=>'Successfully Added on your Cart',
                'alert-type'=>'success'
            ]);
        }
    }
    public function check()
    {
        $content =Cart::content();
        return response()->json($content);
    }
}
