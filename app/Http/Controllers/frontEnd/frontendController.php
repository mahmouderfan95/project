<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class frontendController extends Controller
{
    public function index(){
        $categories = Category::with('product')->get();
        $products = Product::latest()->paginate(6);
        return view('frontEnd.index',['categories' => $categories,'products' => $products]);
    }
    public function team(){
        $categories = Category::with('product')->get();
        return view('frontEnd.teamwork',['categories' => $categories]);
    }

}
