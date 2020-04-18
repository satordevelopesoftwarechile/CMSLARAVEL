<?php 
Route::prefix('/admin')->group(function(){
 Route::get('/','Admin\Dashboardcontroller@getDashboard');
 Route::get('/users','Admin\Usercontroller@getUsers');
});