@extends('admin.master')
@section('title','Usuarios')

{{-- BREADCRUMB --}}
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{url('/admin/users')}}"><i class="fas fa-user-friends"></i>Usuarios</a>
        </li>
    @endsection
{{--FIN BREADCRUMB --}}
{{-- EL CONTENIDO DE LA PAGINA ES DINAMICO --}}
@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-user-friends">Usuarios</i></h2>
        </div>
        <div class="inside">
            <table class="table">
                <thead>
                        <tr>
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>APELLIDO</td>
                            <td>EMAIL</td>
                            <td></td>
                        </tr>
                </thead>
                <tbody>
                    {{-- LLENAMOS LA TABLA DE DATOS --}}
                    
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="ops">
                            <a href="{{url('/admin/user/'.$user->id.'/edit')}}"  data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{url('/admin/user/'.$user->id.'/delete')}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{--FIN LLENAMOS LA TABLA DE DATOS --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection