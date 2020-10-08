<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $product = Product::all();
        //return response()->json($product);
        return view('admin.product.list', compact('product'));
    }
    public function create()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        return view('admin.product.add', compact(['category', 'brand']));
    }
    public function get_subcategory($category_id)
    {
        $cat = DB::table('sub_categories')->where('category_id', $category_id)->get();
        //return json_encode($cat);
        //dd($cat);
        return response()->json($cat);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_details' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',

        ]);
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;

        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;

        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->product_details = $request->product_details;

        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;

        $product->status = $request->status  == true ? 1: 0;

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(300,300)->save('upload/product/'.$image_one_name);
        $image_one_url = $image_one_name;

        $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(300,300)->save('upload/product/'.$image_two_name);
        $image_two_url = $image_two_name;

        $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(300,300)->save('upload/product/'.$image_three_name);
        $image_three_url = $image_three_name;

        $product->image_one = $image_one_url;
        $product->image_two = $image_two_url;
        $product->image_three = $image_three_url;

        //return response()->json($product);
        $product->save();
        $messege = [
            'messege' => 'Successfully Add Product',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.index')->with($messege);
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $subcategory = DB::table('sub_categories')->get();
        return view('admin.product.edit', compact('product','category','brand','subcategory'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_details' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',

        ]);

        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;

        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;

        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->product_details = $request->product_details;

        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;


        $product->status = $request->status  == true ? 1: 0;
       // return response()->json($product);
        $update = $product->save();
        if($update){
        $messege=[
            'messege'=>'Successfully Update Product',
            'alert-type'=>'success'
        ];
        return  redirect()->route('product.index')->with($messege);

        }
        else{
            $messege=array(
                'messege'=>'Nothing TO Update',
                'alert-type'=>'success'
                 );
        return  redirect()->route('product.index')->with($messege);

        }
    }

    public function updateImage(Request $request, $id)
    {
       // $product = Product::find($id);
        $path = 'upload/product/';
        $old_image_one = $request->old_image_one;
        $old_image_two = $request->old_image_two;
        $old_image_three = $request->old_image_three;
        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');
        if($image_one){
            unlink($path.$old_image_one);
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save('upload/product/'.$image_one_name);
            $image_one_url = $image_one_name;
            $data['image_one'] = $image_one_url;
            $product_img = DB::table('products')->where('id',$id)->update($data);

        }
        if($image_two){
            $product->image_two = $image_two_url;
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,300)->save('upload/product/'.$image_two_name);
            $image_two_url = $image_two_name;
            $data['image_two'] = $image_two_url;
            $product_img = DB::table('products')->where('id',$id)->update($data);

        }
        if($image_three){
            $product->image_three = $image_three_url;
            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,300)->save('upload/product/'.$image_three_name);
            $image_three_url = $image_three_name;
            $data['image_three'] = $image_three_url;
            $product_img = DB::table('products')->where('id',$id)->update($data);
        }
        $messege=[
            'messege'=>'Successfully Update Product',
            'alert-type'=>'success'
        ];
        return  redirect()->route('product.index')->with($messege);

    }
    public function destroy($id)
    {
        $product = Product::find($id);
        // $path = 'upload/product/';
        // $logo = $product->image_one;
        //unlink($path.$logo);
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        $product->delete();
        $messege=[
            'messege'=>'Successfully Delete Product',
            'alert-type'=>'success'
        ];
        return  redirect()->route('product.index')->with($messege);


    }
    public function changeStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();

        return response()->json([
            'messege'=>'Successfully Update Status Product',
            'alert-type'=>'success'
        ]);
    }
}
