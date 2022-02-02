<?php

use App\Http\Controllers\StoreController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

//--------------------------Gestión ADM----------------------------------
//Ruta con redirección a login
Route::get('adm-storeproject', [StoreController::class, 'login']);

//Ruta proceso login, recordar que debe ser método post
Route::post('login', [StoreController::class, 'loginProc']);

//Ruta vista administración de recursos
Route::get('adm-home', [StoreController::class, 'indexAdm']);

//Ruta al proceso de destrucción de sesión
Route::get('logout', [StoreController::class, 'logout']);

//-----------------------------Cliente-----------------------------------
//Ruta con redirección al home de la página
Route::get('/', [StoreController::class, 'index']);

//Ruta detalle compra, nos redirecciona a los detalles del producto, recogiendo el Id del mismo
Route::get('detalle-compra/{id}', function($id){
    return "Compra del producto ".$id;
});