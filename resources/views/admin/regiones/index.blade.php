@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Regiones</h3>
            <a href="{{route('regiones.create')}}" class="btn btn-primary">Agregar Región</a>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sttriped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr></thead>
            <tbody>
              @foreach ($regions as $r)
                  <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->nombre}}</td>
                    <td>
                     <div class="row"> <a href="{{route('regiones.edit',$r)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <form action="{{ route('regiones.destroy', $r) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar..?')"
                                        >
                                    </form></div>
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