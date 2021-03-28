<?php

//used to disable CORS
use UseDigital\LaravelGeoDatabase\Models\GeoCidade;
use UseDigital\LaravelGeoDatabase\Models\GeoEstado;
use UseDigital\LaravelGeoDatabase\Models\GeoPais;

/*header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');*/

/*
    Rotas do Cidades API
*/

// |||| Informações de endereço |||
Route::get('paises', function(){
    return GeoPais::all();
})->name('paises');

Route::get('paises/estados', function(){
    return GeoPais::with('estados')->get();
})->name('paises.estados');

Route::get('paises/{id}', function($id){
    return GeoPais::findOrFail($id);
})->name('paises.view');

Route::get('estados', function(){
    return GeoEstado::all();
})->name('estados');

Route::get('estados/{id}', function($id){
    return GeoEstado::findOrFail($id);
})->name('estados.view');

Route::get('cidades', function(){
    return GeoCidade::all();
})->name('cidades');

Route::get('cidades/{id}', function($id){
    return GeoCidade::findOrFail($id);
})->name('cidades.view');

// alias to estados/cidades
Route::get('cidades/estado/{id}', function($id){
    return GeoCidade::where('estado_id', $id)->get();
})->name('cidades.estado');

