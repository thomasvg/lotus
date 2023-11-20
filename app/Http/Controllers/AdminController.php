<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function checkAdmin(){

        if(auth()->check()){
            return view('admin');
    
    
        }else{
    
            return view('welcome');
    
        }
    
    }
}
