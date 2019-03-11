<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('close', function(){
    Auth::logout();
    Session::flush();
});

Route::get('/roles-permissions', function()
{
    //Roles

    $admin = new App\Role;
    $admin->name = 'admi'; $admin->mostrar_nombre = 'User Administrator';
    $admin->descripcion = 'The user is allowed to administer the application';
    $admin->save();
    $do = new App\Role;
    $do->name = 'docent';
     $do->mostrar_nombre = 'User Docent';
    $do->descripcion = 'The user is Docent';
    $do->save();




});


Route::get('/home', 'HomeController@index');

Route::resource('access', 'LoginController');
Route::resources([
    'directors'=> 'DirectorController',
    'degree'=>'DegreeController',
    'matters'=>'MatterController',
    'docents'=>'DocentController',
    'groups'=>'GroupController',
    'periods'=>'PeriodController'
    ]);


/*
Route::get('degrees/{id}/delete', [
    'as' => 'degrees.delete',
    'uses' => 'DegreeController@destroy',
    ]);
*/


Route::get('matters/{id}/delete', [
    'as' => 'matters.delete',

    'uses' => 'MatterController@destroy',
    ]);



Route::get('docents/{id}/delete', [
    'as' => 'docents.delete',
    'uses' => 'DocentController@destroy',
    ]);




Route::get('groups/{id}/delete', [
    'as' => 'groups.delete',
    'uses' => 'GroupController@destroy',
    ]);




Route::get('periods/{id}/delete', [
    'as' => 'periods.delete',
    'uses' => 'PeriodController@destroy',
    ]);



Route::get('/profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('activate/{id}/period', [
    'as' => 'activate.period',
    'uses' => 'PeriodController@activate',
    ]);

Route::get('desactivate/{id}/period', [
    'as' => 'desactivate.period',
    'uses' => 'PeriodController@desactivate',
    ]);

Route::get('activate/{id}/student', [
    'as' => 'activate.student',
    'uses' => 'StudentController@activate',
    ]);

Route::get('desactivate/{id}/student', [
    'as' => 'desactivate.student',
    'uses' => 'StudentController@desactivate',
    ]);

Route::get('estructura/c/{id}','EstructuraController@c');

Route::resource('estructura','EstructuraController');

Route::resource('asignaciones','DocentGroupClassController');


Route::get('asignaciones/g/{id}','DocentGroupClassController@g');




//Route::get('estructura/{id}', 'EstructuraController@destroy')->name('estructura.delete');

Route::get('estructura/{id}/delete', [
    'as' => 'estructura.delete',
    'uses' => 'EstructuraController@destroy',
    ]);

Route::get('asignaciones/{id}/delete', [
    'as' => 'asignaciones.delete',
    'uses' => 'DocentGroupClassController@destroy',
    ]);
Route::resource('contra','ContraController');
Route::resource('contradocente','ContradocenteController');


Route::get('password/email','Auth\PasswordController@getemail');
Route::post('password/email','Auth\PasswordController@postemail');