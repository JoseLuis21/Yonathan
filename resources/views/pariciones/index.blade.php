@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Pariciones
    {{ link_to(route('crias-totales.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
    {{ link_to(route('crias-totales.pdf'), "Exportar a PDF",array('class'=>'btn btn-default pull-right')) }}
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>id</th>
      <th>Dueño</th>
      <th>Cantidad</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($criasTotal as $crias)
        <tr>
          <td>{{$crias->id}}</td>
          <td>{{$crias->user->nombre}}</td>
          <td>{{$crias->cantidad}}</td>
          <td>
            {{ link_to(route('crias-totales.edit', $crias->id),"Editar",array('class'=>'btn btn-success')) }}
          </td>
          <td>
            {!! Form::open(array('route' => array('crias-totales.destroy', $crias->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar el Total de Crias?");')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
          	{!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
