@extends('admin.master')
@section('title','Añadir Producto')

{{-- BREADCRUMB --}}
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i>Productos</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{url('/admin/product/add')}}"><i class="fas fa-plus"></i>Agregar Producto</a>
        </li>
    @endsection
{{--FIN BREADCRUMB --}}


{{-- EL CONTENIDO DE LA PAGINA ES DINAMICO --}}
@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus"></i>Agregar Producto</h2>
        </div>
        <div class="inside">
            {!! Form::open(['url'=> '/admin/product/add']) !!}
                <div class="row">
                <!-- CAMPO NOMBRE PRODUCTO -->
                    <div class="col-md-6">
                        <label for="name">Nombre del Producto:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                            </div>
                        <!--                nombre,valorpordefecto,propiedades -->
                            {!! Form::text('name',null,['class'=>'form-control'])!!}
                        </div>
                    </div>
                 <!-- FIN CAMPO NOMBRE PRODUCTO -->
                 <!-- CAMPO CATEGORIA -->
                    <div class="col-md-3">
                    <label for="category">Categoría:</label>
                    </div>
                    <!--FIN CAMPO CATEGORIA  -->
                <!-- CAMPO IMAGEN DESTACADA -->
                <div class="col-md-3">
                    <label for="category">Imagen Destacada:</label>
                    <div class="custom-file">
                        {!! Form::file('img',['class'=>'custom-file-input','id'=>'customFile'])!!}
                        <label class="custom-file-label" for="customFile">Selecciona la Imagen</label>
                    </div>
                </div>
                    <!--FIN CAMPO IMAGEN DESTACADA  -->
                </div>
                <!-- CAMPO PRECIO -->
                <div class="row mtop16">
                    <div class="col-md-3">
                        <label for="price">Precio:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                            </div>
                        <!--                nombre,valorpordefecto,propiedades -->
                        {!! Form::number('price',null,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
                        </div>
                         <!-- FIN CAMPO PRECIO-->
                    </div>
                    <!-- CAMPO EN DESCUENTO (?)-->
                    <div class="col-md-3">
                        <label for="indiscount">¿En Descuento?:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                </div>
                         <!--                nombre,valorpordefecto,propiedades -->
                          {!!Form::select('indiscount',['0'=>'No','1'=>'Si'],0,['class'=>'custom-select'])!!}
                            </div>
                    </div>
                    <!-- FIN CAMPO EN DESCUENTO(?) -->
                    <!-- CAMPO DESCUENTO -->
                    <div class="col-md-3">
                        <label for="discount">Descuento:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                </div>
                         <!--                nombre,valorpordefecto,propiedades -->
                          {!!Form::number('indiscount',0.00,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
                            </div>   
                    </div>
                     <!-- FIN CAMPO DESCUENTO -->

                </div>
               
                <div class="row mtop16">
                    <div class="col-md-12">
                        <label for="content">Descripción</label>
                        <!--el id editor es para que pueda ocupar el editor js ckeditor. -->
                        {!! Form::textarea('content',null,['class'=>'form-control','id'=>'editor'])!!}
                    </div>
                </div>

                <!-- BTN GUARDAR -->
                <div class="row mtop16">
                    <div class="col-md-12">
                        {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                    </div>
                </div>
                <!--FIN BTN GUARDAR -->

            {!! Form::close()!!}
        </div>
    </div>
</div>
@endsection