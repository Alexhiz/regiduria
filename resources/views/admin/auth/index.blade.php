@extends('layouts.control')
@section('admin')
<div class="card">
  <div class="card-header text-center ">
    <h3>Administradores</h3>
  </div>
  <div class="card-body">
    <table class="table table-hover table-sttriped table-bordered" id="myTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre Completo</th>
          <th>Email</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($users as $u)
        <tr>
          <td>{{$u->id}}</td>
          <td>{{$u->name }} {{$u->ap_paterno}} {{$u->ap_materno}}</td>
          <td>{{$u->email}}</td>
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