@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-2">
        <div class="card-header text-center ">
            <div class="row d-flex justify-content-center align-items-center"><h5>Detalles en oficina</h5><a href="{{route('oficinas.index')}}" class="btn btn-primary mx-3">Regresar</a></div>
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
                <td>{{$office->nombre}}</td>
              </tr>
              <tr>
                <td>Cantidad:</td>
                <td>{{$office->cantidad}}</td>
              </tr>
              <tr>
                <td>Caracteristicas:</td>
                <td>{{$office->caracteristica}}</td>
              </tr>
              <tr>
                <td>Color:</td>
                <td>{{$office->color}}</td>
              </tr>
               <tr>
                <td>Numero de serie:</td>
                <td>{{$office->num_serie}}</td>
              </tr>
              <tr>
                <td>Modelo:</td>
                <td>{{$office->modelo}}</td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>{{$office->marca}}</td>
              </tr>
              <tr>
                <td>Número de Serie:</td>
                <td>{{$office->num_serie}}</td>
              </tr>
              <tr>
                <td>Observación:</td>
                <td>{{$office->observacion}}</td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td>{{$office->condition->nombre}}</td>
              </tr>
              <tr>
                <td>Ubicación:</td>
                <td>{{$office->ubication->nombre}}</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="footer"></div>
    </div>
@endsection