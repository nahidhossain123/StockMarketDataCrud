<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonModelController;
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



Route::get('adddata',function(){
    return view('AddData');
});
Route::get('/',[JsonModelController::class,'show']);
Route::post('submit',[JsonModelController::class,'store']);
Route::get('delete/{id}',[JsonModelController::class,'destroy']);
Route::get('edit/{id}',[JsonModelController::class,'edit']);
Route::post('update/{id}',[JsonModelController::class,'update'])->name('update');