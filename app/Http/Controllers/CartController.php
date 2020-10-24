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

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
    public function addToCartModal(Request $request)
    {
        $product_id = $request->product_id;
        $product = DB::table('products')->where('id',$product_id)->first();
        //return response()->json($product);
        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product_id;
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

            $data['id'] = $product_id;
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
    public function check()
    {
        $content =Cart::content();
        return response()->json($content);
    }
    public function removeCart($id)
    {
        Cart::remove($id);
        $message = [
            'message' => 'Remove Product To Cart',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($message);

    }
    public function showCart()
    {
        $cart = Cart::content();
        //return response()->json($cart);
    	return view('pages.product.cart',compact('cart'));
    }
    public function updateQuantityCart(Request $request){

    	$rowId = $request->product_id;
        $qty = $request->qty;
    	Cart::update($rowId,$qty);
    	$message = [
            'message' => 'Update Quantity to success',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($message);

    }
}
