@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-2">
        <div class="card-header text-center ">
            <div class="row d-flex justify-content-center align-items-center"><h5>Detalles en marimbas</h5><a href="{{route('marimbas.index')}}" class="btn btn-primary mx-3">Regresar</a></div>
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
                <td>{{$marimba->nombre}}</td>
              </tr>
              <tr>
                <td>Cantidad:</td>
                <td>{{$marimba->cantidad}}</td>
              </tr>
              <tr>
                <td>Caracteristicas:</td>
                <td>{{$marimba->caracteristica}}</td>
              </tr>
              <tr>
                <td>Color:</td>
                <td>{{$marimba->color}}</td>
              </tr>
               <tr>
                <td>Numero de serie:</td>
                <td>{{$marimba->num_serie}}</td>
              </tr>
              <tr>
                <td>Tamaño:</td>
                <td>{{$marimba->tamano}}</td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>{{$marimba->marca}}</td>
              </tr>
              <tr>
                <td>Número de Serie:</td>
                <td>{{$marimba->num_serie}}</td>
              </tr>
              <tr>
                <td>Observación:</td>
                <td>{{$marimba->observacion}}</td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td>{{$marimba->condition->nombre}}</td>
              </tr>
              <tr>
                <td>Ubicación:</td>
                <td>{{$marimba->ubication->nombre}}</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="footer"></div>
    </div>
@endsection