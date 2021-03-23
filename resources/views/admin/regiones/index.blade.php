@extends('layouts.control')
@section('admin')
<div class="card">
  <div class="card-header text-center ">
    <h3>Regiones</h3>
    <a href="{{route('regiones.create')}}" class="btn btn-primary">Agregar Región</a>
    <a href="{{route('export.regiones')}}" class="btn btn-success">Exportar a Excel</a>
  </div>
  <div class="card-body">
    <table class="table table-hover table-sttriped table-bordered" id="myTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($regions as $r)
        <tr>
          <td>{{$r->id}}</td>
          <td>{{$r->nombre}}</td>
          <td>
            <div class="row"> <a href="{{route('regiones.edit',$r)}}" class="btn btn-sm btn-success mx-4">Editar</a>
              <form action="{{ route('regiones.delete',['id' => $r->id]) }}" method="POST">
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