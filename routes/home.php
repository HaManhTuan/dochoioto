<?php
Route::get('/','HomeController@index');
Route::get('/danh-muc/{url}','HomeController@category');
Route::post('/filter-product/{url}','HomeController@filter');