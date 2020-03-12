<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');


Route::get('modules/coleccion/','PalacioNacionalController@index')->middleware('auth:api');
Route::get('modules/coleccion/busqueda','PalacioNacionalController@buscar');

Route::get('modules/images/{ni}/', function($Numero_de_inventario)
{
    //dd(storage_path("app/Palacio/img")."/".$Numero_de_inventario.'.jpg');
    if(is_file(storage_path("app/Palacio/img")."/".$Numero_de_inventario.'.jpg')){
        
        $img = Image::make(storage_path("app/Palacio/img")."/".$Numero_de_inventario.'.jpg')->resize(300, 200);
    }
    else{
       //dd(public_path('img/')."Imagen_no_disponible.png");
        $img = Image::make(public_path('img/')."Imagen_no_disponible.png")->resize(300, 200);
    }
   // $img = Image::make("public/palacio/".$Numero_de_inventario".jpg")->resize(300, 200);

    return $img->response('jpg');
});
Route::get('modules/images/{ni}/blur', function($Numero_de_inventario)
{

    if(is_file(public_path('img/palacio/').$Numero_de_inventario.'.jpg')){
        
        $img = Image::make(public_path('img/palacio/').$Numero_de_inventario.'.jpg')->resize(300, 200);
    }
    else{
       //dd(public_path('img/')."Imagen_no_disponible.png");
        $img = Image::make(public_path('img/')."Imagen_no_disponible.png")->resize(300, 200);
    }
   // $img = Image::make("public/palacio/".$Numero_de_inventario".jpg")->resize(300, 200);
    $img->blur(75);
    return $img->response('jpg');
});