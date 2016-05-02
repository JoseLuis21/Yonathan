@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Usuarios
    <button class="btn btn-default pull-right">Agregar</button>
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>id</th>
      <th>Rut</th>
      <th>Nombres</th>
      <th>Color</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>18427496-5</td>
        <td>Nombres</td>
        <td>Color</td>
        <td>
          <button type="button" name="button" class="btn btn-primary">Editar</button>
          <button type="button" name="button" class="btn btn-info">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
  </div>

@endsection
