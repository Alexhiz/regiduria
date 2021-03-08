@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-2">
        <div class="card-header text-center ">
            <div class="row d-flex justify-content-center align-items-center"><h5>Detalles en ludoteca</h5><a href="{{route('ludotecas.index')}}" class="btn btn-primary mx-3">Regresar</a></div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sttriped table-bordered"">
            <thead>
              <tr>
                <th>Concepto</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nombre:</td>
                <td>{{$ludoteca->nombre}}</td>
              </tr>
              <tr>
                <td>Cantidad:</td>
                <td>{{$ludoteca->cantidad}}</td>
              </tr>
              <tr>
                <td>Caracteristicas:</td>
                <td>{{$ludoteca->caracteristica}}</td>
              </tr>
              <tr>
                <td>Color:</td>
                <td>{{$ludoteca->color}}</td>
              </tr>
              <tr>
                <td>Tamaño:</td>
                <td>{{$ludoteca->tamano}}</td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>{{$ludoteca->marca}}</td>
              </tr>
              <tr>
                <td>Observación:</td>
                <td>{{$ludoteca->observacion}}</td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td>{{$ludoteca->condition->nombre}}</td>
              </tr>
              <tr>
                <td>Ubicación:</td>
                <td>{{$ludoteca->ubication->nombre}}</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="footer"></div>
    </div>
@endsection