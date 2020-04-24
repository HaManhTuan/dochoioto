<?php
Route::get('/','HomeController@index');
Route::get('/danh-muc/{url}','HomeController@category');