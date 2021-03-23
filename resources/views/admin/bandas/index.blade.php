@extends('layouts.control')
@section('admin')
<div class="card">
  <div class="card-header text-center ">
    <h3>Bandas</h3>
    <a href="{{route('bandas.create')}}" class="btn btn-primary">Agregar Datos en bandas</a>
    <a href="{{route('export.bandas')}}" class="btn btn-success">Exportar a Excel</a>
  </div>
  <div class="card-body">
    <table class="table table-hover table-sttriped table-bordered" id="myTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Estado</th>
          <th>Ubicación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bands as $b)
        <tr>
          <td>{{$b->id}}</td>
          <td>{{$b->nombre}}</td>
          <td>{{$b->cantidad}}</td>
          <td>{{$b->condition->nombre}}</td>
          <td>{{$b->ubication->nombre}}</td>
          <td>
            <div class="row">
              <div class="d-flex justify-content-center align-items-center">

                <a href="{{route('bandas.edit',$b)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                <a href="{{route('bandas.show',$b)}}" class="btn btn-sm btn-warning mx-4">Ver</a>
                <form action="{{ route('bandas.delete',['id' => $b->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="" class="btn btn-sm btn-danger btn-delete">Eliminar</a>
                </form>
              </div>
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