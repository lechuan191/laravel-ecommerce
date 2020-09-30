<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.list',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
//        $brand->brand_name = $request->name;
//        if($request->hasFile('logo')) // kiem tra co file tai len
//        {
//            $file = $request->file('logo');
//            $extension = $file->getClientOriginalExtension();
//            if( $extension != 'jpg' &&  $extension != 'png' &&  $extension != 'jpeg')
//            {
//                $messege=[
//                    'messege'=>'Error images format extension',
//                    'alert-type'=>'error'
//                ];
//                return redirect()->route('brand.index')->with($messege);
//            }
//            $name = $file->getClientOriginalName(); // lay ten images
//            $full_name = Str::random(5).'-'.$name;  // tao ten images khong trung voi ten cu
//            while(file_exists('upload/brand/'.$full_name))
//            {
//                $full_name = Str::random(5).'-'.$name;
//            }
//            $file->move('upload/brand/',$full_name);
//            $brand->brand_logo = $full_name;
//        }
//        else
//        {
//            $brand->brand_logo = '';
//        }
        $brand->brand_name = $request->name;
        $file = $request->file('logo');
        if($file){
            $images_name = date('Y_m_d_His');
            $extension = $file->getClientOriginalExtension();
            if( $extension != 'jpg' &&  $extension != 'png' &&  $extension != 'jpeg')
            {
                $messege=[
                    'messege'=>'Error images format extension',
                    'alert-type'=>'error'
                ];
                return redirect()->route('brand.index')->with($messege);
            }
            $name = $file->getClientOriginalName();
            $images_full_name = $images_name. '-'.$name;
                //.'.'.$extension;
            $upload_path = 'upload/brand/';
            $image_url = $upload_path.$images_full_name;
            $file->move($upload_path, $images_full_name);
           // $brand->brand_logo = $image_url;
            $brand->brand_logo = $images_full_name;
        }
        else{
            $brand->brand_logo = '';
        }

        $brand->save();
        $messege=[
            'messege'=>'Successfully Add Brand',
            'alert-type'=>'success'
        ];
        return redirect()->route('brand.index')->with($messege);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandDetails = Brand::where('id',$id)->first();
        return view('admin.brand.edit', compact('brandDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brandDetails = Brand::find($id);
        $brandDetails->brand_name = $request->name;
        $path = 'upload/brand/';
        $oldlogo = $request->old_logo;
        $file = $request->file('logo');
        if($file){
            unlink($path.$oldlogo);
            $images_name = date('Y_m_d_His');
            $extension = $file->getClientOriginalExtension();
            if( $extension != 'jpg' &&  $extension != 'png' &&  $extension != 'jpeg')
            {
                $messege=[
                    'messege'=>'Error images format extension',
                    'alert-type'=>'error'
                ];
                return redirect()->route('brand.index')->with($messege);
            }
            $name = $file->getClientOriginalName();
            $images_full_name = $images_name. '-'.$name;
            //.'.'.$extension;
            $upload_path = 'upload/brand/';
            $image_url = $upload_path.$images_full_name;
            $file->move($upload_path, $images_full_name);
            // $brand->brand_logo = $image_url;
            $brandDetails->brand_logo = $images_full_name;
        }
        elseif (!$file){
            $brandDetails->brand_logo = '';
        }
        else{
         $brandDetails->brand_logo =$oldlogo;
        }

        $brandDetails->save();
        $messege=[
            'messege'=>'Successfully Update Brand',
            'alert-type'=>'success'
        ];
        return  redirect()->route('brand.index')->with($messege);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandDetails = Brand::find($id);
        $path = 'upload/brand/';
        $logo = $brandDetails->brand_logo;
        //unlink($path.$logo);
        $brandDetails->delete();
        $messege=[
            'messege'=>'Successfully Delete Brand',
            'alert-type'=>'success'
        ];
        return  redirect()->route('brand.index')->with($messege);
    }
}
