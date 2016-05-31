@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Dueños
    {{ link_to(route('users.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>id</th>
      <th>Rut</th>
      <th>Nombres</th>
      <th>Color</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->rut_dueno}}</td>
          <td>{{$user->nombre}}</td>
          <td>{{$user->color_dueno}}</td>
          <td>
            {{ link_to(route('users.edit', $user->id),"Editar",array('class'=>'btn btn-success')) }}
          </td>
          <td>
            {!! Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar el Usuario?");')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
          	{!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
