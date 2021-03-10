@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Ubicación o Locación</h3>
            <a href="{{route('ubicaciones.create')}}" class="btn btn-primary">Agregar Ubicación</a>
            <a href="{{route('export.ubicaciones')}}" class="btn btn-success">Exportar a Excel</a>
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
              @foreach ($ubications as $u)
                  <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->nombre}}</td>
                    <td>
                     <div class="row"> <a href="{{route('ubicaciones.edit',$u)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <form action="{{ route('ubicaciones.destroy', $u) }}" method="POST">
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