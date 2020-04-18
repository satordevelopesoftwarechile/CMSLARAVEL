<?php 
Route::prefix('/admin')->group(function(){
 Route::get('/','Admin\DashboardController@getDashboard');
 Route::get('/users','Admin\UserController@getUsers');

 //module products
 Route::get('/products','Admin\ProductController@getHome');
 //AÑADIR PRODUCTO
 Route::get('/product/add','Admin\ProductController@getProductAdd');
//CATEGORIES
Route::get('/categories','Admin\CategoriesController@getHome');
});