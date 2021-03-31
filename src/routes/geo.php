<?php

//used to disable CORS
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

Route::post('paises/select2', function(Request $request){

    $itens = GeoPais::orderBy("nome");

    if($request->search){
        $itens = $itens->whereLike(['nome', 'nome_en', 'sigla', 'bacen'], $request->search)->limit(50);
    }else{
        $itens = $itens->limit(10);
    }

    $itens = $itens->get();

    $itens->transform(fn(GeoPais $item, $key) => [
        'id' => $item->nome,
        'text' => $item->nome,
        'selected' => $item->id == $request->selected_value || empty($key),
    ]);

    return response()->json($itens);
})->name('paises.select2');

Route::get('paises/estados', function(){
    return GeoPais::with('estados')->get();
})->name('paises.estados');

Route::get('paises/{id}', function($id){
    return GeoPais::findOrFail($id);
})->name('paises.view');

Route::get('estados', function(){
    return GeoEstado::all();
})->name('estados');

Route::post('estados/select2/{pais_id?}', function(Request $request, $pais_id = null){

    $itens = GeoEstado::orderBy("nome");

    if($pais_id){
        $itens = $itens->where('pais_id', $pais_id);
    }

    if($request->search){
        $itens = $itens->whereLike(['nome', 'uf', 'ibge', 'ddd'], $request->search)->limit(50);
    }else{
        $itens = $itens->limit(10);
    }

    $itens = $itens->get();


    $itens->transform(fn(GeoEstado $item, $key) => [
        'id' => $item->nome,
        'text' => $item->nome,
        'selected' => ($item->id == $request->selected_value) || ($request->search && Str::lower($item->uf) === Str::lower($request->search)),
    ]);

    return response()->json($itens);
})->name('estados.select2');

Route::get('estados/{id}', function($id){
    return GeoEstado::findOrFail($id);
})->name('estados.view');

Route::get('estados/pais/{id}', function($id){
    return GeoEstado::where('pais_id', $id)->get();
})->name('estados.pais');

Route::get('cidades', function(){
    return GeoCidade::all();
})->name('cidades');

Route::post('cidades/select2/{estado_id?}', function(Request $request, $estado_id = null){

    $itens = GeoCidade::orderBy("nome");

    if($estado_id){
        $itens = $itens->where('estado_id', $estado_id);
    }

    if($request->search){
        $itens = $itens->whereLike(['nome', 'ibge'], $request->search)->limit(50);
    }else{
        $itens = $itens->limit(10);
    }

    $itens = $itens->get();

    $itens->transform(fn(GeoCidade $item, $key) => [
        'id' => $item->nome,
        'text' => $item->nome,
        'selected' => $item->id == $request->selected_value || ($request->search && Str::lower($item->nome) === Str::lower($request->search)),
    ]);

    return response()->json($itens);
})->name('cidades.select2');

Route::get('cidades/{id}', function($id){
    return GeoCidade::findOrFail($id);
})->name('cidades.view');

// alias to estados/cidades
Route::get('cidades/estado/{id}', function($id){
    return GeoCidade::where('estado_id', $id)->get();
})->name('cidades.estado');

