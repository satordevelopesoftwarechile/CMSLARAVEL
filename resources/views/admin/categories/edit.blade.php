@extends('admin.master')
@section('title','Categorias')

{{-- BREADCRUMB --}}
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{url('/admin/categories/0')}}"><i class="far fa-folder-open"></i>Categorias</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{url('/admin/category/'.$cat->id.'/edit')}}"><i class="fas fa-edit"></i>Editar Categorias</a>
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
                            <h2 class="title"><i class="fas fa-edit"></i>Editar Categoria</h2>
                        </div>
                        <div class="inside">
                            {!!Form::open(['url'=>'/admin/category/'.$cat->id.'/edit'])!!}
                        {{-- CATEGORIA --}}
                            <label for="name">Nombre de la Categoria:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                    </div>
                            <!--                nombre,valorpordefecto,propiedades -->
                                {!! Form::text('name',$cat->name,['class'=>'form-control'])!!}
                            </div>
                        {{-- FIN CATEGORIA --}}

                        {{-- MODULO --}}
                        <label for="module" class="mtop16">Módulo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                            </div>
                    <!--                nombre,valorpordefecto,propiedades -->
                    {!!Form::select('module',getModulesArray(),$cat->module,['class'=>'custom-select'])!!}
                       </div>
                        {{-- FIN MODULO --}}

                         {{-- CATEGORIA --}}
                         <label for="icon" class="mtop16">Ícono:</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                             </div>
                     <!--                nombre,valorpordefecto,propiedades -->
                         {!! Form::text('icon',$cat->icono,['class'=>'form-control'])!!}
                     </div>
                 {{-- FIN CATEGORIA --}}
                 {{-- BOTON --}}
                     {!!Form::submit('Guardar',['class'=>'btn btn-success mtop16'])!!}
                 {{-- FIN BOTON --}}
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
<!-- FIN Contenido -->