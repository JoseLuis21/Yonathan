@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Estado de Ovejas
    {{ link_to(route('estado-ovejas.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>id</th>
      <th>Estado</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($estadoOvejas as $estado)
        <tr>
          <td>{{$estado->id}}</td>
          <td>{{$estado->estado}}</td>
          <td>
            {{ link_to(route('estado-ovejas.edit', $estado->id),"Editar",array('class'=>'btn btn-success')) }}
          </td>
          <td>
            {!! Form::open(array('route' => array('estado-ovejas.destroy', $estado->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar el Estado?");')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
          	{!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
