@extends('layouts.control')
@section('admin')
<div class="card">
  <div class="card-header text-center ">
    <h3>Ludoteca</h3>
    <a href="{{route('ludotecas.create')}}" class="btn btn-primary">Agregar Datos a Ludoteca</a>
    <a href="{{route('export.ludotecas')}}" class="btn btn-success">Exportar a Excel</a>
  </div>
  <div class="card-body">
    <table class="table table-hover table-sttriped table-bordered" id="myTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Color</th>
          <th>Estado</th>
          <th>Ubicación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ludotecas as $l)
        <tr>
          <td>{{$l->id}}</td>
          <td>{{$l->nombre}}</td>
          <td>{{$l->cantidad}}</td>
          <td>{{$l->color}}</td>
          <td>{{$l->condition->nombre}}</td>
          <td>{{$l->ubication->nombre}}</td>
          <td>
            <div class="row"> <a href="{{route('ludotecas.edit',$l)}}" class="btn btn-sm btn-success mx-4">Editar</a>
              <a href="{{route('ludotecas.show',$l)}}" class="btn btn-sm btn-warning mx-4">Ver</a>
              <form action="{{ route('ludotecas.delete',['id' => $l->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="" class="btn btn-sm btn-danger btn-delete">Eliminar</a>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="footer"></div>
</div>


@section('js')

@endsection
@endsection