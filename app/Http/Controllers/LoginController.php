<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function logoutUser (Request $request) {
        Auth::logout();
        return view ('welcome');
    }
public function checklogin(){

    if(auth()->check()){
        
        $agendas= Agenda::all();
        $posts = Post::all();
    return view('login', ['posts' => $posts,'agendas' => $agendas]);
    }else{

        return view('welcome');

    }

}

public function showCorrectHomePage(){

    if(auth()->check()){
        $agendas= Agenda::all();
        $posts = Post::all();
    return view('login', ['posts' => $posts,'agendas' => $agendas]);
       


    }else{

        return view('welcome');

    }
}





    public function login(Request $request)
{
 

    $incomingFields = $request;




    if (auth()->attempt(['username' => $incomingFields['username'], 'password' => $incomingFields['password']])) {
        $request->session()->regenerate();
        $agendas= Agenda::all();
        $posts = Post::all();
    return view('login', ['posts' => $posts,'agendas' => $agendas]);
    } else {
        return view('welcome');
    }
 }
}
