<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashbordController extends Controller
{
    public function index(){
        return view('dashbord.index');
    }
}
