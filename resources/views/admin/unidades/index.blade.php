@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Unidades</h3>
            <a href="{{route('unidades.create')}}" class="btn btn-primary">Agregar Unidad</a>
            <a href="{{route('export.unidades')}}" class="btn btn-success">Exportar a Excel</a>  
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
              @foreach ($units as $u)
                  <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->nombre}}</td>
                    <td>
                     <div class="row"> <a href="{{route('unidades.edit',$u)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <form action="{{ route('unidades.destroy', $u) }}" method="POST">
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