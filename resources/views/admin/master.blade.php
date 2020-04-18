<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-MyCms</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routeName" content="{{Route::currentRouteName()}}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/static/css/admin.css?v='.time())}}">
    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    {{-- AWESOME --}}
    <script src="https://kit.fontawesome.com/197dcb387e.js" crossorigin="anonymous"></script>
    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- JS BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    {{-- DOCUMENT .READY JSQUERY INCIA --}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    {{--END  DOCUMENT .READY JSQUERY INCIA --}}
</head>
{{-- BODY!!!!!!! --}}
<body>
    {{-- Contenedor Total Padre --}}
    <div class="wrapper">
        {{-- contenedor sidebar --}}
        <div class="col1">@include('admin.sidebar')</div>
        {{-- Contenedor Principal Contenido Pagina --}}
        <div class="col2">
            <div class="nav navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/admin')}}" class="nav-link"><i class="fas fa-home"></i>Dashboard</a>
                        </li>
                     </ul>
                </div>
            </div>

            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admi')}}"><i class="fas fa-home"></i>Dashboard</a></li>
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>
                </div>
                @if(Session::has('message'))
                 <div class="container-fluid">
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
              {{-- Aqui mostraremos todo lo de pantalla --}}
              @section('content')
              @show
            </div>
        </div>
    </div>
</body>
</html>