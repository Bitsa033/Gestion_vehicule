<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoitureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('index_vehicule',[VoitureController::class,'index'])->name("index_vehicule");
Route::get('create_vehicule',[VoitureController::class,'create'])->name("create_vehicule");
Route::get('edit_vehicule/{id}',[VoitureController::class,'edit'])->name("edit_vehicule");
Route::get('delete_vehicule/{id}',[VoitureController::class,'destroy'])->name("delete_vehicule");
Route::post('update_vehicule/{id}',[VoitureController::class,'update'])->name("update_vehicule");
Route::post('store_vehicule',[VoitureController::class,'store'])->name("store_vehicule");

Route::get('index_client',[ClientController::class,'index'])->name("index_client");
Route::get('create_client',[ClientController::class,'create'])->name("create_client");
Route::get('edit_client/{id}',[ClientController::class,'edit'])->name("edit_client");
Route::get('delete_client/{id}',[ClientController::class,'destroy'])->name("delete_client");
Route::post('update_client/{id}',[ClientController::class,'update'])->name("update_client");
Route::post('store_client',[ClientController::class,'store'])->name("store_client");

Route::post('data', function (Request $request) {
    $data=$request->input('data');
    $sd=$request->session()->put('dt',$data);
    $dg=$request->session()->get('dt');
    var_dump($dg);
});

Route::get('layout',function() {
    return view('layouts.base');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
