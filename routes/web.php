<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('estudiantes/validar/{nombre}/{pass}', function($identificacion, $pass){
    return DB::table('estudiantes')
    ->where('numero_identificacion', '=', $identificacion)
    ->where('password', '=', $pass)
    ->get();
})->name('estudiantes.validar');

Route::get('cambiar/{id}/{pass}', function($id, $pass){
    DB::table('estudiantes')
    ->where('id', $id)
    ->update([
     'password' => $pass
    ]);
    return 'ok';
})->name('cambiar');


