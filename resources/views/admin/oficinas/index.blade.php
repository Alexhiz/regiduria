@extends('layouts.control')
@section('admin')
<div class="card">
  <div class="card-header text-center ">
    <h3>Oficinas</h3>
    <a href="{{route('oficinas.create')}}" class="btn btn-primary">Agregar Datos en Oficinas</a>
    <a href="{{route('export.oficinas')}}" class="btn btn-success">Exportar a Excel</a>
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
        @foreach ($offices as $o)
        <tr>
          <td>{{$o->id}}</td>
          <td>{{$o->nombre}}</td>
          <td>{{$o->cantidad}}</td>
          <td>{{$o->condition->nombre}}</td>
          <td>{{$o->ubication->nombre}}</td>
          <td>
            <div class="row">
              <div class="d-flex justify-content-center align-items-center">

                <a href="{{route('oficinas.edit',$o)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                <a href="{{route('oficinas.show',$o)}}" class="btn btn-sm btn-warning mx-4">Ver</a>
                <form action="{{ route('oficinas.delete',['id' => $o->id]) }}" method="POST">
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