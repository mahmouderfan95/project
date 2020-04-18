<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Requests\Dashbord\Products\Store;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Image;
use Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Categories = Category::get();
        $products = Product::when($request->search,function($q)use($request){
            return $q->where('name','like','%' . $request->search . '%');

        })->when($request->category_id,function($q) use($request){
            return $q->where('category_id',$request->category_id);
        })->latest()->paginate(5);
        return view('dashbord.products.index',compact('Categories','products'));
    }
    /* end of index */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::get();
        return view('dashbord.products.create',compact('Categories'));
    }
    /* end of create */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $request_data = $request->all();
        // $request_data = $request->except(['image']);
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        $product = Product::create($request_data);
        session()->flash('success','product created success');
        return redirect()->route('dashbord.products.index');
    }
    /* end of store */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $Categories = Category::get();
        return view('dashbord.products.edit',compact('product','Categories'));
    }
    /* end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, $id)
    {
        // dd($request->all());
        $product = Product::findOrFail($id);
        $request_data = $request->all();
        if($request->image){
            if($product->image != 'product.png'){
                Storage::disk('public_uploads')->delete('products/' . $product->image);
            }
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        $product->update($request_data);
        return redirect()->route('dashbord.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if($product->image != 'product.png'){
            Storage::disk('public_uploads')->delete('products/' . $product->image);
        }
        $product->delete($id);
        return redirect()->route('dashbord.products.index');
    }
}
