@extends('connect.master')
@section('title','Login')

@section('content')
<div class="box box_login shadow">
    <div class="header">
        <a href="{{url('/')}}">
        <img src="{{url('/static/images/logo1.png')}}">
        </a>
        </div>
    <div class="inside">
{!! Form::open(['url'=>'/login']) !!}
{{-- EMAIL --}}
<label for="email">Correo Electrónico:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
{!! Form::email('email',null,['class'=>'form-control'])!!}
</div>
{{-- FIN EMAIL --}}

{{-- PASSWORD --}}
<label for="password" class="mt-3">Password:</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
{!! Form::password('password',['class'=>'form-control'])!!}
</div>
{{-- FIN PASSWORD --}}
{{-- BOTON --}}
{!! Form::submit('Ingresar',['class'=>'btn btn-danger  btn-block mt-3'])!!}
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
<a href="{{url('/register')}}">¿No tienes una cuenta?, Registrate</a>
<a href="{{url('/recover')}}" class="ml-5">¿Olvidaste tu contraseña?</a>
</div>
</div>
</div>
@stop
