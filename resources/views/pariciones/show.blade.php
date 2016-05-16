@extends('layouts.principal')

@section('content')

  {{-- <button type="button" name="button" class="btn btn-success pull-right">Agregar</button> --}}
  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    {{ link_to(route('ovejas.index'),"Volver",array('class'=>'btn btn-info')) }}
    
    Listado de Pariciones

    {{ link_to(route('pariciones.create', ['id_oveja'=>$id_oveja]),"Agregar",array('class'=>'btn btn-default pull-right')) }}
  </div>


  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>Oveja</th>
      <th>Fecha Maternidad</th>
      <th>Cantidad Macho</th>
      <th>Cantidad Hembra</th>
      <th>Crias M</th>
      <th>Total Crias</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($pariciones as $paricion)
        <tr>
          <td>{{$paricion->oveja->numero_arete}}</td>
          <td>{{$paricion->fecha_paricion}}</td>
          <td>{{$paricion->cantidad_machos}}</td>
          <td>{{$paricion->cantidad_hembras}}</td>

          <td>{{$paricion->crias_muertas}}</td>

          <td>{{$paricion->total_paricion}}</td>
          <td>
            {{ link_to(route('pariciones.edit', $paricion->id),"Editar",array('class'=>'btn btn-success')) }}
          </td>
          <td>
            {!! Form::open(array('route' => array('pariciones.destroy', $paricion->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar esta Paricion?");')) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
          	{!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection
