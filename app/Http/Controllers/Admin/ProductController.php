<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Product;
//slug
use Illuminate\Support\Str;
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

    public function postProductAdd(Request $request){
        $rules=[
            'name'=>'required',
            'img'=>'required',
            'price'=>'required',
            'content' =>'required'
        ];

        $messages=[
            'name.required'=>'El Nombre del producto es requerido.',
            'img.required'=>'Seleccione una imagen destacada para el producto.',
            'img.image'=>'El archivo no es una imagen.',
            'price.required'=>'Ingrese el precio del producto.',
            'content.required'=>'Ingrese una descripción del producto.'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
            $product = new Product;
            //0 =producto borrador, 1= producto se ve directamente en la tienda.
            $product->status=0;
            $product->name=e($request->input('name'));
            $product->slug=Str::slug($request->input('name'));
            $product->category_id=$request->input('category');
            $product->image = "image.png";
            $product->price= $request->input('price');
            $product->in_discount= $request->input('indiscount');
            $product->discount= $request->input('discount');
            $product->content=e($request->input('content'));
            if($product->save()): 
                return redirect('/admin/products')->with('message','Se ha guardado correctamente el Producto.')->with('typealert','success');
            endif;
        endif;
    }
}
