@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Marimba</h3>
            <a href="{{route('marimbas.create')}}" class="btn btn-primary">Agregar Datos en Marimbas</a>
            <a href="{{route('export.marimbas')}}" class="btn btn-success">Exportar a Excel</a>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sttriped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Color</th>
                <th>Numero de serie</th>
                <th>Estado</th>
                <th>Ubicación</th>
                <th>Acciones</th>
              </tr></thead>
            <tbody>
              @foreach ($marimbas as $m)
                  <tr>
                    <td>{{$m->id}}</td>
                    <td>{{$m->nombre}}</td>
                    <td>{{$m->cantidad}}</td>
                    <td>{{$m->color}}</td>
                    <td>{{$m->num_serie}}</td>
                    <td>{{$m->condition->nombre}}</td>
                    <td>{{$m->ubication->nombre}}</td>
                    <td>
                     <div class="row">
                      <div class="d-flex justify-content-center align-items-center">
                        
                      <a href="{{route('marimbas.edit',$m)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <a href="{{route('marimbas.show',$m)}}" class="btn btn-sm btn-warning mx-4">Ver</a>
                      <form action="{{ route('marimbas.destroy', $m) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger mx-4"
                                            onclick="return confirm('¿Desea eliminar..?')"
                                        >
                                    </form></div>
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