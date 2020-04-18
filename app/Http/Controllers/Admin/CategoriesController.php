<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');//este middleware ve si el usuario esta logueado sino lo manda a login
        $this->middleware('isadmin');//este middleware ve si el usuario tiene el rol de admin .
    }

    public function getHome(){
        return view('admin.categories.home');
    }
}
