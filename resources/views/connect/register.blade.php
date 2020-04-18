@extends('connect.master')
@section('title','Registrarse')

@section('content')
<div class="box box_register shadow">
    <div class="header">
        <a href="{{url('/')}}">
        <img src="{{url('/static/images/logo1.png')}}">
        </a>
        </div>
    <div class="inside">
{!! Form::open(['url'=>'/register']) !!}
{{-- NOMBRE --}}
<label for="name">Nombre:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user"></i></div>
    </div>
{!! Form::text('name',null,['class'=>'form-control','required'])!!}
</div>
{{-- FIN NOMBRE --}}
{{-- APELLIDO --}}
<label for="lastname"  class="mt-3">Apellido:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
    </div>
{!! Form::text('lastname',null,['class'=>'form-control','required'])!!}
</div>
{{-- FIN APELLIDO --}}
{{-- EMAIL --}}
<label for="email" class="mt-3">Correo Electrónico:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
{!! Form::email('email',null,['class'=>'form-control','required'])!!}
</div>
{{-- FIN EMAIL --}}

{{-- PASSWORD --}}
<label for="password" class="mt-3">Password:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
{!! Form::password('password',['class'=>'form-control','required'])!!}
</div>
{{-- FIN PASSWORD --}}
{{-- CONFIRMAR PASSWORD --}}
<label for="cpassword" class="mt-3">Confirmar Password:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
{!! Form::password('cpassword',['class'=>'form-control','required'])!!}
</div>
{{-- FIN CONFIRMAR PASSWORD --}}
{{-- BOTON --}}
{!! Form::submit('Registrarse',['class'=>'btn btn-info  btn-block mt-3'])!!}
{{-- FIN BOTON --}}
{!! Form::close()!!}



@if(Session::has('message'))
    <div class="container">
        <div class="mt16 alert alert-{{ Session::get('typealert')}}" style="display:none;">
           {{Session::get('message')}}
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(function(){$('.alert').slideUp();},10000);
            </script>
        </div>
    </div>
    @endif


<div class="mtop16 footer mt-3">
<a href="{{url('/login')}}">Ya tengo cuenta, Ingresar</a>
</div>
</div>
</div>
@stop
