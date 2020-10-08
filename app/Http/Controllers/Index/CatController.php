<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    
    public function addCat(Request $request){
    		echo 123;
    	dd($request->all());
    }
}
