<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//paso 1# traemos el modelo.
use App\Http\Models\Category;
//slug
use Illuminate\Support\Str;
class CategoriesController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');//este middleware ve si el usuario esta logueado sino lo manda a login
        $this->middleware('isadmin');//este middleware ve si el usuario tiene el rol de admin .
    }

    public function getHome($module){
        $cats = Category::where('module',$module)->orderBy('name','Asc')->get();
        $data =['cats'=>$cats];
        return view('admin.categories.home',$data);
    }

    public function postCategoryAdd(Request $request){
        //numero #2 reglas antes de ingresarlo a la bd
        $rules = [
            'name'=>'required',
            'icon'=>'required'
        ];
        $messages = [
            'name.required'=>'Se requiere un nombre para la categoria',
            'icon.required'=>'Se requiere un icono para la categoria'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $c = new Category;
            $c->module= $request->input('module');
            //la funcion e nos ayuda a que el codigo no sea escapado.
            $c->name=e($request->input('name'));
            $c->slug=Str::slug($request->input('name'));
            $c->icono=e($request->input('icon'));
            if($c->save()): 
                return back()->with('message','Se ha guardado correctamente la categoria.')->with('typealert','success');
            endif;
        endif;

    }

    //ir a editr
    public function getCategoryEdit($id){
        $cat=Category::find($id);
        $data=['cat'=>$cat];
        return view('admin.categories.edit',$data);
    }

    //guardar datos editados

    public function postCategoryEdit(Request $request,$id){
        //numero #2 reglas antes de ingresarlo a la bd
        $rules = [
            'name'=>'required',
            'icon'=>'required'
        ];
        $messages = [
            'name.required'=>'Se requiere un nombre para la categoria',
            'icon.required'=>'Se requiere un icono para la categoria'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $c =Category::find($id);
            $c->module= $request->input('module');
            //la funcion e nos ayuda a que el codigo no sea escapado.
            $c->name=e($request->input('name'));
            $c->slug=Str::slug($request->input('name'));
            $c->icono=e($request->input('icon'));
            if($c->save()): 
                return back()->with('message','Se ha editado correctamente la categoria.')->with('typealert','success');
            endif;
        endif;

    }
    public function getCategoryDelete($id){
        $c =Category::find($id);
        if($c->delete()): 
            return back()->with('message','Se ha Borrado correctamente la categoria.')->with('typealert','success');
        endif;
    }
}
