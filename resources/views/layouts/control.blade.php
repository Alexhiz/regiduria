<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>REGIDURIA | Administrador</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js">
  </script>
  <style>
    body {
      background: #839b97;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md shadow-sm navbar-dark bg-dark shadow-sm" style="background-color:#34626c">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('img/fondo.jpg')}}" width="170px" height="40px" class="img-responsive">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url("/home") }}">{{ __('Inicio') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('estados.index') }}">{{ __('Estado') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ubicaciones.index') }}">{{ __('Ubicaci??n') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('unidades.index') }}">{{ __('Unidad') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('regiones.index') }}">{{ __('Regi??n') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('vestuarios.index')}}">{{ __('Vestuario') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ludotecas.index') }}">{{ __('Ludoteca') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('marimbas.index') }}">{{ __('Marimba') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('oficinas.index')}}">{{ __('Oficina') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bandas.index')}}">{{ __('Banda') }}</a>
          </li>


          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('admin.registrar-form')}}">
                {{ __('Agregar Administradores') }}
              </a>
              <a class="dropdown-item" href="{{ route('admin.users')}}">
                {{ __('Ver usuarios') }}
              </a>
              <a class="dropdown-item" href="{{ route('admin.editarperfil',Auth::id()) }}">
                {{ __('Editar Perfil') }}
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">
                {{ __('Salir') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
    @include('include.message')
    @yield('admin')
    @yield("js")
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/delete.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
                }
            });
        });

  </script>
  <script src="js/delete.js"></script>

</body>

</html>