@extends('layouts.control')

@section('admin')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Editar Perfil') }}</div>

        <div class="card-body">
          <form method="POST" action="{{route('admin.updateperfil',$user->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

              <div class="col-md-6">
                <input id="ap_paterno" type="text" class="form-control @error('ap_paterno') is-invalid @enderror"
                  name="ap_paterno" value="{{ old('ap_paterno',$user->ap_paterno) }}" required autocomplete="ap_paterno"
                  autofocus>

                @error('ap_paterno')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

              <div class="col-md-6">
                <input id="ap_materno" type="text" class="form-control @error('ap_materno') is-invalid @enderror"
                  name="ap_materno" value="{{ old('ap_materno',$user->ap_materno) }}" autocomplete="ap_materno"
                  autofocus>

                @error('ap_materno')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>


            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email',$user->email) }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                  autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Guardar Cambios') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection