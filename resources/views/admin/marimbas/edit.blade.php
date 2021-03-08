@extends('layouts.control')
@section('admin')
    <div class="card col-md-12 text-center my-4">
        <div class="card-header text-center ">
            <h3>Modifique los datos</h3>
        </div>
        <div class="card-body">
          <form id="form-add" action="{{route('marimbas.update',$marimba)}}" class="form-horizontal" enctype="multipart/form-data" method="POST" >
            @csrf
            @method("PATCH")
            <div class="row">
                <div class="col-md-12">
                <div class="form-group d-flex justify-content-center">
                  <div class="col-md-4">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{old('nombre',$marimba->nombre)}}" class="form-control">       
                  </div>
                  <div class="col-md-2">
                  <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese cantidad" value="{{old('cantidad',$marimba->cantidad)}}" min="0" class="form-control">       
                  </div>
                  <div class="col-md-6">
                    <label for="caracteristica">Caracteristica:</label>
                  <input type="text" id="caracteristica" name="caracteristica" placeholder="Ingrese la caracteristicas" value="{{old('caracteristica',$marimba->caracteristica)}}" class="form-control">       
                  </div>     
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group d-flex justify-content-center">
                  <div class="col-md-4">
                    <label for="color">Color:</label>
                    <input type="text" id="color" name="color" placeholder="Ingrese el color" value="{{old('color',$marimba->color)}}" class="form-control">       
                  </div>
                  <div class="col-md-4">
                  <label for="tamano">Tamaño:</label>
                    <input type="text" id="tamano" name="tamano" placeholder="Ingrese el tamano" value="{{old('tamano',$marimba->tamano)}}" class="form-control">       
                  </div>
                  <div class="col-md-4">
                    <label for="marca">Marca:</label>
                  <input type="text" id="marca" name="marca" placeholder="Ingrese la marca" value="{{old('marca',$marimba->marca)}}" class="form-control">       
                  </div>     
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group d-flex justify-content-center">
                  <div class="col-md-6">
                    <label for="observacion">Observación:</label>
                    <input type="text" id="observacion" name="observacion" placeholder="Ingrese la observación" value="{{old('observacion',$marimba->observacion)}}" class="form-control">       
                  </div>
                  <div class="col-md-6">
                    <label for="num_serie">Número de seríe:</label>
                    <input type="text" id="num_serie" name="num_serie" placeholder="Ingrese la observación" value="{{old('num_serie',$marimba->num_serie)}}" class="form-control">       
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group d-flex justify-content-center">    
                  <div class="col-md-6">
                  <label for="tamano">Estado:</label>
                    <select name="condition_id" id="condition_id" class="form-control">
                      <option value="#" disabled selected>Selecciona el estado</option>
                      @forelse ($conditions as $con)
                          <option @if ($marimba->condition_id === $con->id) ? selected : @endif value="{{old("condition_id",$con->id)}}">{{$con->nombre}}</option>
                      @empty
                         <option value="" disabled> No hay Estados</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="marca">Ubicación:</label>
                    <select name="ubication_id" id="ubication_id" class="form-control">
                      <option value="#" disabled selected>Selecciona la ubicación</option>
                      @forelse ($ubications as $ubi)
                          <option @if ($marimba->ubication_id === $ubi->id) ? selected : @endif value="{{old("ubication_id",$ubi->id)}}">{{$ubi->nombre}}</option>
                      @empty
                         <option value="" disabled> No hay Ubicación</option>
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