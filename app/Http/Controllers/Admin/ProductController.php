<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;

class ProductController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');//este middleware ve si el usuario esta logueado sino lo manda a login
        $this->middleware('isadmin');//este middleware ve si el usuario tiene el rol de admin .
    }
    public function getHome(){

        return view('admin.products.home');

    }

    public function getProductAdd(){
        $cats = Category::where('module','0')->pluck('name','id');
        $data=['cats'=>$cats];
        return view('admin.products.add',$data);
    }
}
