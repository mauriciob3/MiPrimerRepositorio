<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratistaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

 /* Route::get('/contratista', function () {
    return view('contratista.index');
});
Route::get('/contratista/create',[ContratistaController::class,'create']);
*/

route::resource ('contratista',contratistaController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home',[ContratistaController::class,'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [ContratistaController::class,'index'])->name('home');
});