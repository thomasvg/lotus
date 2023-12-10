<?php


use App\Models\Post;
use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeegController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinesController;
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


Route::get('/register', function () {
    return view('register');
});


Route::get('/', [LoginController::class,'showCorrectHomePage'])->name('login');

Route::post('/login', [LoginController::class,'login']);
Route::get('/login', [LoginController::class,'checklogin']);
Route::post('/logout', [LoginController::class,'logoutUser']);
Route::get('/logout', [LoginController::class,'logoutUser']);




Route::post('/register', [UserController::class,'store']);
Route::post('/create-post', [PostController::class,'store']);
Route::post('/agenda', [PostController::class,'storeAgenda']);
Route::get('/agenda', [PostController::class, 'indexAgenda']);

//deegkamer deeg registratie
Route::get('/deegkamer', [DeegController::class,'deegkamer']);
Route::post('/deegkamer', [DeegController::class,'deegregistreer']);

Route::get('/deeginsteek', [DeegController::class,'deeginsteek']);

Route::get('/{place}:place/{placenumber}:placenumber',[ DeegController::class,'getDeegData']);



//admin controller
Route::get('/admin', [DeegController::class,'deegkamer']);
Route::post('/admin', [DeegController::class,'deegregistreer']);
Route::put('/activateLine', [LinesController::class,'activationLine']);
Route::put('/deactivateLine', [LinesController::class,'deactivationLine']);


//deeginsteek

Route::put('/linkLine', [LinesController::class,'linkLine']);
Route::get('/findBakken', [LinesController::class,'findBakken']);


//boeken

Route::post('/book', [DeegController::class,'book']);






Route::get('/admin', [AdminController::class,'checkAdmin']);



