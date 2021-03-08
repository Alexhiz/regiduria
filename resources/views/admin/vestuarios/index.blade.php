@extends('layouts.control')
@section('admin')
    <div class="card">
        <div class="card-header text-center ">
            <h3>Vestuarios</h3>
            <a href="{{route('vestuarios.create')}}" class="btn btn-primary">Agregar Datos en vestuarios</a>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sttriped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Región</th>
                <th>Estado</th>
                <th>Ubicación</th>
                <th>Acciones</th>
              </tr></thead>
            <tbody>
              @foreach ($lockerrooms as $l)
                  <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->nombre}}</td>
                    <td>{{$l->cantidad}}</td>
                    <td>{{$l->unit->nombre}}</td>
                    <td>{{$l->region->nombre}}</td>
                    <td>{{$l->condition->nombre}}</td>
                    <td>{{$l->ubication->nombre}}</td>
                    <td>
                     <div class="row">
                      <div class="d-flex justify-content-center align-items-center">
                        
                      <a href="{{route('vestuarios.edit',$l)}}" class="btn btn-sm btn-success mx-4">Editar</a>
                      <a href="{{route('vestuarios.show',$l)}}" class="btn btn-sm btn-warning mx-4">Ver</a>
                      <form action="{{ route('vestuarios.destroy', $l) }}" method="POST">
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