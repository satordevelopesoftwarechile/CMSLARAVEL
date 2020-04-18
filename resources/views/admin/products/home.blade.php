@extends('admin.master')
@section('title','Productos')

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
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-boxes">Productos</i></h2>
        </div>
        <div class="inside">
            <div class="btns">
                <a href="{{url('/admin/product/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Agregar Producto</a>
            </div>
            <table class="table">

            </table>
        </div>
    </div>
</div>
@endsection