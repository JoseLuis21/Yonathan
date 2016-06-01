@extends('layouts.principal')

@section('content')

  <br>
  {!! Form::open(array('route' => 'ventas.index', 'method' => 'GET', 'class' => 'form-inline', 'role'=>'search')) !!}
      <div class="form-group">
      Desde: {{ Form::date('search_date1', old('search_date1') , array('class' => 'form-control', 'placeholder' => 'Buscar por fecha desde', 'required' => 'true') ) }}
      </div>
      <div class="form-group">
      Hasta: {{ Form::date('search_date2', old('search_date2') , array('class' => 'form-control', 'placeholder' => 'Buscar por fecha hasta', 'required' => 'true') ) }}
      </div>
      {{Form::submit('Buscar', array('class'=> 'btn btn-primary '))}}
      {{Form::submit('Todo', array('class'=> 'btn btn-default '))}}
  {!! Form::close() !!}

  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <div class="panel-heading">
    Listado de Ventas
    {{ link_to(route('ventas.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
    @if(\Request::get('search_date1') != "")
        {{ link_to('ventas/'.\Request::get('search_date1').'/pdf/'.\Request::get('search_date2').'',"Exportar a PDF", array('class'=>'btn btn-default pull-right', 'target' => '_blank')) }}
    @else
      {{ link_to('ventas/0/pdf',"Exportar a PDF", array('class'=>'btn btn-default pull-right', 'target' => '_blank')) }}
    @endif
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
