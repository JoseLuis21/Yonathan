@extends('layouts.principal')

@section('content')

  <br>
  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <div class="panel-heading">
    Listado de Ventas
    {{ link_to(route('ventas.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
  </div>

  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <th>Numero</th>
      <th>Fecha</th>
      <th>Total</th>
      <th>Usuario</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </thead>
    <tbody>
      @foreach($ventas as $venta)
        <tr>
          <td>{{$venta->id}}</td>
          <td>{{$venta->fecha}}</td>
          <td>{{$venta->total}}</td>
          <td>{{$venta->user->nombre}}</td>
          @if($venta->estado == "Activo")
            <td>
              {{ link_to(route('ventas.edit', $venta->id),"Editar",array('class'=>'btn btn-success')) }}
            </td>
          @else
            <td>
              <button type="button" disabled class="btn btn-success">Editar</button>
            </td>
          @endif
          <td>
            {!! Form::open(array('route' => array('ventas.destroy', $venta->id), 'method' => 'DELETE', 'onsubmit' => 'return confirm("¿Desea borrar esta Venta?");')) !!}
                <button type="submit" {{($venta->estado != 'Activo' ? 'disabled'   : '')}} class="btn btn-danger">Eliminar</button>
            {!! Form::close() !!}
          </td>
          @if($venta->estado == "Activo")
            <td>
              <a href="/ventas/{{$venta->id}}/confirmar" onClick='return confirm("¿Desea Confirmar esta Venta?");' class="btn btn-warning">Confirmar</a>
            </td>
          @else
            <td>
              <button disabled class="btn btn-warning">Confirmar</a>
            </td>
          @endif
          <td>
            {{ link_to(route('ventas.show', $venta->id),"Ver",array('class'=>'btn btn-primary')) }}
          </td>

        </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection
