@extends('layouts.control')
@section('admin')
    <div class="card col-md-6 offset-md-3 text-center my-2">
        <div class="card-header text-center ">
            <div class="row d-flex justify-content-center align-items-center"><h5>Detalles en vestuarios</h5><a href="{{route('vestuarios.index')}}" class="btn btn-primary mx-3">Regresar</a></div>
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
                <td>{{$lockerroom->nombre}}</td>
              </tr>
              <tr>
                <td>Cantidad:</td>
                <td>{{$lockerroom->cantidad}}</td>
              </tr>
              <tr>
                <td>Color:</td>
                <td>{{$lockerroom->color}}</td>
              </tr>
               <tr>
                <td>Material:</td>
                <td>{{$lockerroom->material}}</td>
              </tr>
              <tr>
                <td>color:</td>
                <td>{{$lockerroom->color}}</td>
              </tr>
              <tr>
                <td>Observación:</td>
                <td>{{$lockerroom->observacion}}</td>
              </tr>
              <tr>
                <td>Unidad:</td>
                <td>{{$lockerroom->unit->nombre}}</td>
              </tr>
              <tr>
                <td>Región:</td>
                <td>{{$lockerroom->region->nombre}}</td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td>{{$lockerroom->condition->nombre}}</td>
              </tr>
              <tr>
                <td>Ubicación:</td>
                <td>{{$lockerroom->ubication->nombre}}</td>
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="footer"></div>
    </div>
@endsection