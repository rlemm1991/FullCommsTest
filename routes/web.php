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

//Usually these would be grouped as would the controllers into namespace groups

/** VIEWS */
Route::get('/','ViewController@loadViewIndex');
Route::get('/contact','ViewController@loadViewForm');
Route::get('/thank-you','ViewController@loadViewThanks');
Route::get('/messages','ViewController@loadViewAllMessages');
/** Contact */
Route::post('/contact/new','ContactController@processRequest');

Route::get('/mail',function (){

});

