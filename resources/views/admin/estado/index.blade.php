@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Estado o condición</h3>
            <a href="{{route('estados.create')}}" class="btn btn-primary">Agregar Estado</a>
            <a href="{{route('export.estados')}}" class="btn btn-success">Exportar a Excel</a>
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
              @foreach ($conditions as $c)
                  <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nombre}}</td>
                    <td>
                        <div class="row "> 
                          
                          <a href="{{route('estados.edit',$c)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <form action="{{ route('estados.destroy', $c) }}"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar..?')"
                                        >
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