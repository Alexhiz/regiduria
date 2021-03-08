@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-4">
        <div class="card-header text-center ">
            <h3>Modifique los datos</h3>
        </div>
        <div class="card-body">
          <form id="form-add" action="{{route('unidades.update',$unit)}}" class="form-horizontal" enctype="multipart/form-data" method="POST" >
            @csrf
            @method("PATCH")

            <div class="form-group">
              <label for="nombre">Nombre de la ubicación:</label>
              <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{old('nombre',$unit->nombre)}}" class="form-control">       
            </div>
            <div class="form-group">
              
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
        <div class="footer"></div>
    </div>
@endsection