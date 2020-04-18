<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use Response;

class apiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateogryies = Category::get();
        return response()->json(['data' => $cateogryies,'msg' => 'all Categoryies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat_data = $request->all();
        $arr = [
            'name'  => 'required',
        ];
        $vaild = Validator::make($cat_data,$arr);
        if($vaild->fails()){
            return response()->json($vaild->errors());
        }

        $cat = Category::create([
            'name'  => $request->name
        ]);

        return response()->json(['data'=>$cat,'msg'=>'Category created Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Category::findOrFail($id);
        return response()->json(['data' => $cats,'msg'=>'Category is Showed']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cat = Category::FindOrFail($id);
        $cat_data = $request->all();
        $arr = [
            'name' => 'required'
        ];
        $vaild = Validator::make($cat_data,$arr);
        if($vaild->fails()){
            return response()->json($vaild->errors());
        }

        $cat->name = $request->name;
        $cat->save();

        return response()->json(['data' => $cat,'msg' => 'Category Updated Success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::FindOrFail($id);
        $cat->delete($id);
        return response()->json(['data' => $cat,'msg' => 'Category Deleted Success']);
    }
}
