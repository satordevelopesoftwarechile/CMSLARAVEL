@extends('admin.master')
@section('title','Editar Producto')

{{-- BREADCRUMB --}}
    @section('breadcrumb')
        <li class="breadcrumb-item">
            <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i>Productos</a>
        </li>
    @endsection
{{--FIN BREADCRUMB --}}


{{-- EL CONTENIDO DE LA PAGINA ES DINAMICO --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">

      
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i>Editar Producto</h2>
                </div>
                <div class="inside">
                    {!! Form::open(['url'=> '/admin/product/'.$p->id.'/edit','files' => true]) !!}
                        <div class="row">
                        <!-- CAMPO NOMBRE PRODUCTO -->
                            <div class="col-md-6">
                                <label for="name">Nombre del Producto:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                    </div>
                                <!--                nombre,valorpordefecto,propiedades -->
                                    {!! Form::text('name',$p->name,['class'=>'form-control'])!!}
                                </div>
                            </div>
                        <!-- FIN CAMPO NOMBRE PRODUCTO -->
                        <!-- CAMPO CATEGORIA -->
                            <div class="col-md-3">
                            <label for="category">Categoría:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                </div>
                        <!--                nombre,valorpordefecto,propiedades -->
                        {!!Form::select('category',$cats,$p->category_id,['class'=>'custom-select'])!!}
                            </div>
                            </div>
                            <!--FIN CAMPO CATEGORIA  -->
                        <!-- CAMPO IMAGEN DESTACADA -->
                        <div class="col-md-3">
                            <label for="img">Imagen Destacada:</label>
                            <div class="custom-file">
                                {!! Form::file('img',['class'=>'custom-file-input','id'=>'customFile' ,'accept'=>'image/*'])!!}
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
                                {!! Form::number('price',$p->price,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
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
                                {!!Form::select('indiscount',['0'=>'No','1'=>'Si'],$p->in_discount,['class'=>'custom-select'])!!}
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
                                {!!Form::number('discount',$p->discount,['class'=>'form-control','min'=>'0.00','step'=>'any'])!!}
                                    </div>   
                            </div>
                            <!-- FIN CAMPO DESCUENTO -->

                             <!-- CAMPO EN DESCUENTO (?)-->
                             <div class="col-md-3">
                                <label for="indiscount">Estado:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>
                                        </div>
                                <!--                nombre,valorpordefecto,propiedades -->
                                {!!Form::select('status',['0'=>'Borrador','1'=>'Público'],$p->status,['class'=>'custom-select'])!!}
                                    </div>
                            </div>
                            <!-- FIN CAMPO EN DESCUENTO(?) -->
                        </div>
                    
                        <div class="row mtop16">
                            <div class="col-md-12">
                                <label for="content">Descripción</label>
                                <!--el id editor es para que pueda ocupar el editor js ckeditor. -->
                                {!! Form::textarea('content',$p->content,['class'=>'form-control','id'=>'editor'])!!}
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
        {{--end col-md-9  --}}
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-image"></i>Imagen destacada</h2>
                    <div class="inside">
                        <img src="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}" class="img-fluid" >
                    </div>
                </div>
            </div>
        </div>
    {{-- end row --}}
    </div>
</div>
@endsection