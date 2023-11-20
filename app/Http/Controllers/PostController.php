<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store(Request $request)
{
    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();

    return redirect('/login')->with('message', 'Post created successfully!');

    
}
    public function storeAgenda(Request $request)
{
    

    $post = new Agenda;
    $post->title = $request->title;
    $post->datefrom= $request->datefrom;
    $post->dateto= $request->dateto;
    $post->save();
 

    return redirect('/login')->with('message', 'Post created successfully!');
}

public function index()
{
    $posts = DB::table('posts')->select('title', 'content')->get();
    return view('login')->with('posts', $posts);
}
public function indexAgenda()
{
    $agendas = DB::table('agendas')->select('title', 'datefrom', 'dateto')->get();
    return view('login')->with('agendas', $agendas);
}




}