<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::post('etudiant/add','EtudiantController@add')->name('addEtudiant');
Route::get('etudiant/show/{id}','EtudiantController@show')->name('showEtudiant');
Route::get('etudiant/edit/{id}','EtudiantController@edit')->name('editEtudiant');
Route::put('etudiant/update/{id}','EtudiantController@update')->name('updateEtudiant');
Route::delete('etudiant/delete/{id}','EtudiantController@destroy')->name('deleteEtudiant');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
