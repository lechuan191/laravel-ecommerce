<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
        $cate = Category::all();
        return view('admin.category.list',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Category;
        $cate->category_name = $request->name;
        $cate->save();
        $messege=[
            'messege'=>'Successfully Add Category',
            'alert-type'=>'success'
        ];
        return redirect()->route('category.index')->with($messege);
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
        $cateDetails = Category::where('id',$id)->first();
        return view('admin.category.edit', compact('cateDetails'));

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
        $cateDetails = Category::find($id);
        $cateDetails->category_name = $request->name;
        $cateDetails->save();
        $messege=[
            'messege'=>'Successfully Update Category',
            'alert-type'=>'success'
        ];
        return  redirect()->route('category.index')->with($messege);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        $messege=[
            'messege'=>'Successfully Delete Category',
            'alert-type'=>'success'
        ];
        return  redirect()->route('category.index')->with($messege);

    }
}
