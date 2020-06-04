@extends('admin.master')
@section('title','Categorias')

{{-- BREADCRUMB --}}
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{url('/admin/products')}}"><i class="far fa-folder-open"></i>Categorias</a>
        </li>
    @endsection
{{--FIN BREADCRUMB --}}



<!-- Contenido -->
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title"><i class="fas fa-plus"></i>Agregar Categoria</h2>
                        </div>
                        <div class="inside">
                            {!!Form::open(['url'=>'/admin/category/add'])!!}
                        {{-- CATEGORIA --}}
                            <label for="name">Nombre de la Categoria:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                    </div>
                            <!--                nombre,valorpordefecto,propiedades -->
                                {!! Form::text('name',null,['class'=>'form-control'])!!}
                            </div>
                        {{-- FIN CATEGORIA --}}

                        {{-- MODULO --}}
                        <label for="module" class="mtop16">Módulo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                            </div>
                    <!--                nombre,valorpordefecto,propiedades -->
                    {!!Form::select('module',getModulesArray(),0,['class'=>'custom-select'])!!}
                       </div>
                        {{-- FIN MODULO --}}

                         {{-- CATEGORIA --}}
                         <label for="icon" class="mtop16">Ícono:</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                             </div>
                     <!--                nombre,valorpordefecto,propiedades -->
                         {!! Form::text('icon',null,['class'=>'form-control'])!!}
                     </div>
                 {{-- FIN CATEGORIA --}}
                 {{-- BOTON --}}
                     {!!Form::submit('Guardar',['class'=>'btn btn-success mtop16'])!!}
                 {{-- FIN BOTON --}}
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title"><i class="far fa-folder-open"></i>Categorias</h2>
                        </div>
                        <div class="inside">
                            <div class="nav nav-pills nav-fills">
                                @foreach(getModulesArray() as $m=>$k)
                                <a href="{{url('/admin/categories/'.$m)}}" class="nav-link"><i class="fas fa-list"></i> {{$k}}</a>
                                @endforeach
                            </div>
                            <table class="table mtop16">
                                <thead>
                                    <tr>
                                        <td width="32"></td>
                                        <td>Nombre</td>
                                        <td width="140"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cats as $cat)
                                        <tr>
                                            {{-- con esta funcion php podemos convertir el codigo html que viene de la bd --}}
                                            <td>{!!htmlspecialchars_decode($cat->icono)!!}</td>
                                            <td>{{$cat->name}}</td>
                                            <td>
                                                <div class="ops">
                                                    <a href="{{url('/admin/category/'.$cat->id.'/edit')}}"  data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                    <a href="{{url('/admin/category/'.$cat->id.'/delete')}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
<!-- FIN Contenido -->