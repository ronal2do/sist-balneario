<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tabela', function () {
    return view('maps.tabela');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    // Route::get('/sentaopau', 'HomeController@sentaopau');


    Route::get('/mapa',  ['as' => 'maps.home', 'uses' => 'HomeController@mapa']);

    Route::get('/cadastrar', 'HomeController@mais');
    Route::post('/cadastrar', 'HomeController@store');

    Route::get('/importar', 'HomeController@importar');
    Route::post('/importar', 'HomeController@importarSalvar');

    Route::get('importExport', 'HomeController@importExport');
    Route::get('downloadExcel/{type}', 'HomeController@downloadExcel');
    Route::post('importExcel', 'HomeController@importExcel');

    Route::get('/cadastro/{id}', ['as' => 'maps.cadastro', 'uses' => 'HomeController@show']);
    Route::get('/cadastro/{id}/editar', ['as' => 'maps.editar', 'uses' => 'HomeController@edit']);
    Route::put('/cadastro/{id}/update', ['as' => 'maps.update', 'uses' => 'HomeController@update']);
    Route::get('/cadastro/{id}/destroy', ['as' => 'maps.destruir', 'uses' => 'HomeController@destroy']);

});

Route::get('api/users', ['middleware' => 'cors', function()
{
    return \Response::json(\App\User::get(), 200);
}]);

Route::get('api/cadastros', ['middleware' => 'cors', function()
{
    return \Response::json(\App\Cadastro::get(), 200);
}]);
Route::get('api/cadastros/{nome}', ['middleware' => 'cors', function()
{
    return Response::json(\App\Cadastro::where('nome', '=', '{nome}')
                                        ->get(),
        200);
}]);

