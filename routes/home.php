<?php
Route::get('/','HomeController@index');
Route::get('/dang-nhap','LoginController@dangnhap');
Route::post('/dang-nhap-post','LoginController@dangnhappost');
Route::post('/dang-ki-post','LoginController@dangkipost');
Route::get('/gia-soc','HomeController@giasoc');
Route::get('/danh-muc/{url}','HomeController@category');
Route::get('/san-pham/{url}','HomeController@product');
Route::post('/filter-product/{url}','HomeController@filter');