<?php 
Route::prefix('/admin')->group(function(){
 Route::get('/','Admin\DashboardController@getDashboard');
 Route::get('/users','Admin\UserController@getUsers');

 //module products
 Route::get('/products','Admin\Productcontroller@getHome');
 //AÑADIR PRODUCTO
 Route::get('/product/add','Admin\Productcontroller@getProductAdd');
});