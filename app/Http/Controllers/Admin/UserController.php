<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');//este middleware ve si el usuario esta logueado sino lo manda a login
        $this->middleware('isadmin');//este middleware ve si el usuario tiene el rol de admin .
    }
    public function getUsers(){
        $users= User::orderBy('id','Desc')->get();
        //pasamos a la variable $data los datos de $users
        $data = ['users'=>$users];
        return view('admin.users.home',$data);
    }
}
