@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-2">
        <div class="card-header text-center ">
            <div class="row d-flex justify-content-center align-items-center"><h5>Detalles en banda</h5><a href="{{route('bandas.index')}}" class="btn btn-primary mx-3">Regresar</a></div>
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
                <td>{{$band->nombre}}</td>
              </tr>
              <tr>
                <td>Cantidad:</td>
                <td>{{$band->cantidad}}</td>
              </tr>
              <tr>
                <td>Color:</td>
                <td>{{$band->color}}</td>
              </tr>
               <tr>
                <td>Color:</td>
                <td>{{$band->num_serie}}</td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>{{$band->marca}}</td>
              </tr>
              <tr>
                <td>Número de Serie:</td>
                <td>{{$band->num_serie}}</td>
              </tr>
              <tr>
                <td>Observación:</td>
                <td>{{$band->observacion}}</td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td>{{$band->condition->nombre}}</td>
              </tr>
              <tr>
                <td>Ubicación:</td>
                <td>{{$band->ubication->nombre}}</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="footer"></div>
    </div>
@endsection