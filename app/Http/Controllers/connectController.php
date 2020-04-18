<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class connectController extends Controller
{
        //contructor middleware
        public function __construct(){
            $this->middleware('guest')->except(['getLogout']);
        }

    //login de usuario
    public function getLogin(){
        return view('connect.login');
    }
    //POST LOGIN
    public function postLogin(Request $request){
        //reglas de validación
        $rules=[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ];

        //mensajes de validacion
        $messages=[
            'email.required'=>'Su correo electrónico es requerido',
            'email.email'=>'Su formato de correo electrónico es invalido',
            'password.required'=>'Porfavor escriba una contraseña',
            'password.min'=>'La contraseña debe de tener al menos 8 caracteres'
        ];
        //validacion
        // nos dara un resultado true/false al respecto de la validación de los datos enviados
        $validator = Validator::make($request->all(),$rules,$messages);
            if($validator->fails()):
                return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
            else:
                if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')],true)):
                    return redirect('/');
                else:
                    return back()->with('message','Correo Electrónico o Contraseña Erronea.')->with('typealert','danger');
                endif;
            endif;

    }


    ////////////////FIN LOGIN//////////////////
    //registro de usuario
    public function getRegister(){
        return view('connect.register');
    }

    //registro usuario al enviar los datos por metodo POST
    public function postRegister(Request $request){
            $rules=[
                'name'=>'required',
                'lastname'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:8',
                'cpassword'=>'required|min:8|same:password'
            ];

           $messages=[
               'name.required'=>'Su Nombre es requerido',
               'lastname.required' =>'Su Apellido es requerido',
               'email.required'=>'Su correo electrónico es requerido',
               'email.email'=>'Su formato de correo electrónico es invalido',
               'email.unique'=>'Ya existe un usuario registrado con este correo electrónico',
               'password.required'=>'Porfavor escriba una contraseña',
               'password.min'=>'La contraseña debe de tener al menos 8 caracteres',
               'cpassword.required'=>'Es necesario confirmar la contraseña',
               'capassword.min'=>'La confirmación de la contraseña debe de tener al menos 8 caracteres',
               'cpassword.same'=>'Las contraseñas no coinciden'
           ];
            $validator = Validator::make($request->all(),$rules,$messages);// nos dara un resultado true/false al respecto de la validación de los datos enviados
            if($validator->fails()):
                return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
            else:
                //registra el user en BD
                $user = new User;
                $user->name= e($request->input('name'));
                $user->lastname= e($request->input('lastname'));
                $user->email= e($request->input('email'));
                $user->password= Hash::make($request->input('password'));
                if($user->save()):
                    return redirect('/login')->with('message','¡Su usuario se creo exitosamente!, Ahora puedes iniciar sesión.')->with('typealert','success');
                endif;
            endif;
    }


    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
