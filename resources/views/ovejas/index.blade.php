@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Ovejas
    {{ link_to(route('ovejas.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>Numero Arete</th>
      <th>Dueño</th>
      <th>Fecha Maternidad</th>
      <th>Crias Macho</th>
      <th>Crias Hembra</th>
      <th>Estado</th>
      <th>Editar</th>
      <th>Pariciones</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($ovejas as $ovejas)
        <tr>
          <td>{{$ovejas->numero_arete}}</td>
          <td>{{$ovejas->user->nombre}}</td>
          <td>{{$ovejas->fecha_maternidad}}</td>
          <td>{{$ovejas->crias_macho}}</td>
          <td>{{$ovejas->crias_hembra}}</td>
          <td>{{$ovejas->estado_oveja->estado}}</td>
          <td>
            {{ link_to(route('ovejas.edit', $ovejas->id),"Editar",array('class'=>'btn btn-success')) }}
          </td>
          <td>
            {{ link_to(route('pariciones.show', $ovejas->id),"Pariciones",array('class'=>'btn btn-info')) }}
          </td>
          <td>
            {!! Form::open(array('route' => array('ovejas.destroy', $ovejas->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar esta Oveja?");')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
          	{!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
