<?php


use App\Models\Post;
use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(auth()->check()){
        $posts = Post::all();
        $agendas = Agenda::all();
        return view('login', ['posts' => $posts, 'agendas' => $agendas]);
      

    }else{
        return view('welcome');
    }
  
});
Route::get('/register', function () {
    return view('register');
});


Route::post('/', [LoginController::class,'showCorrectHomePage']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/login', [LoginController::class,'checklogin']);
Route::post('/logout', [LoginController::class,'logoutUser']);




Route::post('/register', [UserController::class,'store']);
Route::post('/create-post', [PostController::class,'store']);
Route::post('/agenda', [PostController::class,'storeAgenda']);
Route::get('/agenda', [PostController::class, 'indexAgenda']);





Route::get('/admin', [AdminController::class,'checkAdmin']);



