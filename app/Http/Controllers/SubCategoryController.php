<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\SubCategory;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
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
        $sub_cate = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->get();
        return view('admin.subcategory.list',compact('sub_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();
        return view('admin.subcategory.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id1' => 'required',
            'subcategory_name' => 'required',
        ],
        [
            'required' => ':attribute Không được để trống',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id1;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('sub_categories')->insert($data);
        $messege=[
            'messege'=>'Successfully Add SubCategory',
            'alert-type'=>'success'
        ];
        return redirect()->route('subcategory.index')->with($messege);
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
        $subcateDetails = SubCategory::where('id',$id)->first();
        $cateDetails = DB::table('categories')->get();
        return view('admin.subcategory.edit', compact(['subcateDetails','cateDetails']));

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
        $data = array();
        $data['category_id'] = $request->category_id1;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('sub_categories')->where('id',$id)->update($data);
        $messege=[
            'messege'=>'Successfully Update SubCategory',
            'alert-type'=>'success'
        ];
        return  redirect()->route('subcategory.index')->with($messege);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);
        $messege=[
            'messege'=>'Successfully Delete SubCategory',
            'alert-type'=>'success'
        ];
        return  redirect()->route('subcategory.index')->with($messege);

    }
}
