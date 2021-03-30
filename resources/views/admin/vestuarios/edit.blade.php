@extends('layouts.control')
@section('admin')
<div class="card col-md-12 text-center my-4">
  <div class="card-header text-center ">
    <h3>Modifique los datos</h3>
  </div>
  <div class="card-body">
    <form id="form-add" action="{{route('vestuarios.update',$lockerroom)}}" class="form-horizontal"
      enctype="multipart/form-data" method="POST">
      @csrf
      @method("PATCH")
      <div class="row">
        <div class="col-md-12">
          <div class="form-group d-flex justify-content-center">
            <div class="col-md-8">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre"
                value="{{old('nombre',$lockerroom->nombre)}}" class="form-control">
            </div>
            <div class="col-md-4">
              <label for="cantidad">Cantidad:</label>
              <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese cantidad"
                value="{{old('cantidad',$lockerroom->cantidad)}}" min="0" class="form-control">
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group d-flex justify-content-center">
            <div class="col-md-6">
              <label for="color">Color:</label>
              <input type="text" id="color" name="color" placeholder="Ingrese el color"
                value="{{old('color',$lockerroom->color)}}" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="material">Material:</label>
              <input type="text" id="material" name="material" placeholder="Ingrese la material"
                value="{{old('material',$lockerroom->material)}}" class="form-control">
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group d-flex justify-content-center">
            <div class="col-md-6">
              <label for="talla">Talla:</label>
              <input type="text" id="talla" name="talla" placeholder="Ingrese la observación"
                value="{{old('talla',$lockerroom->talla)}}" class="form-control">
            </div>

            <div class="col-md-6">
              <label for="observacion">Observación:</label>
              <input type="text" id="observacion" name="observacion" placeholder="Ingrese la observación"
                value="{{old('observacion',$lockerroom->observacion)}}" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group d-flex justify-content-center">
            <div class="col-md-6">
              <label for="">Unidad:</label>
              <select name="unit_id" id="unit_id" class="form-control">
                <option value="#" disabled selected>Selecciona la unidad</option>
                @forelse ($units as $unit)
                <option @if ($lockerroom->unit_id === $unit->id) ? selected : @endif
                  value="{{old("unit_id",$unit->id)}}">{{$unit->nombre}}</option>
                @empty
                <option value="" disabled> No hay Estados</option>
                @endforelse
              </select>
            </div>
            <div class="col-md-6">
              <label for="marca">Región:</label>
              <select name="region_id" id="region_id" class="form-control">
                <option value="#" disabled selected>Selecciona la región</option>
                @forelse ($regions as $reg)
                <option @if ($lockerroom->region_id === $reg->id) ? selected : @endif
                  value="{{old("region_id",$reg->id)}}">{{$reg->nombre}}</option>
                @empty
                <option value="" disabled> No hay Ubicación</option>
                @endforelse
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group d-flex justify-content-center">
            <div class="col-md-6">
              <label for="">Estado:</label>
              <select name="condition_id" id="condition_id" class="form-control">
                <option value="#" disabled selected>Selecciona el estado</option>
                @forelse ($conditions as $con)
                <option @if ($lockerroom->condition_id === $con->id) ? selected : @endif
                  value="{{old("condition_id",$con->id)}}">{{$con->nombre}}</option>
                @empty
                <option value="" disabled> No hay Unidades</option>
                @endforelse
              </select>
            </div>
            <div class="col-md-6">
              <label for="marca">Ubicación:</label>
              <select name="ubication_id" id="ubication_id" class="form-control">
                <option value="#" disabled selected>Selecciona la ubicación</option>
                @forelse ($ubications as $ubi)
                <option @if ($lockerroom->ubication_id === $ubi->id) ? selected : @endif
                  value="{{old("ubication_id",$ubi->id)}}">{{$ubi->nombre}}</option>
                @empty
                <option value="" disabled> No hay Región</option>
                @endforelse
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">

        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
  <div class="footer"></div>
</div>
@endsection