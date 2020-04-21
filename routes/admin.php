<?php 
Route::prefix('/admin')->group(function(){
 Route::get('/','Admin\DashboardController@getDashboard');
 Route::get('/users','Admin\UserController@getUsers');

 //module products
 Route::get('/products','Admin\ProductController@getHome');
 //AÑADIR PRODUCTO
 Route::get('/product/add','Admin\ProductController@getProductAdd');
//CATEGORIES
//HOME
Route::get('/categories/{module}','Admin\CategoriesController@getHome');
//AÑADIR(CREATE)
Route::post('/category/add','Admin\CategoriesController@postCategoryAdd');
//EDITAR(EDIT)
Route::get('/category/{id}/edit','Admin\CategoriesController@getCategoryEdit');
//EDITAR(EDIT):POST(GUARDAR DATOS)
Route::post('/category/{id}/edit','Admin\CategoriesController@postCategoryEdit');
//ELIMINAR(DELETE)
Route::get('/category/{id}/delete','Admin\CategoriesController@getCategoryDelete');
});