@extends('layouts.principal')

@section('content')

 <br>
 {!! Form::open(array('route' => 'users.index', 'method' => 'GET', 'class' => 'form', 'role'=>'search')) !!}
  <div class="col-lg-6">
   <div class="input-group">
     {{ Form::text('search_rut', old('search_rut') , array('class' => 'form-control', 'placeholder' => 'Buscar por rut') ) }}
     <span class="input-group-btn">
      {{Form::submit('Buscar', array('class'=> 'btn btn-primary btn-block'))}}
     </span>
     <span class="input-group-btn">
      {{Form::submit('Todo', array('class'=> 'btn btn-default btn-block'))}}
     </span>
   </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
 {!! Form::close() !!}
 <br>

  <div class="panel-heading"></div>
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
    Listado de Dueños
    {{ link_to(route('users.create'),"Agregar",array('class'=>'btn btn-default pull-right')) }}
    @if(\Request::get('search_rut') != "")
        {{ link_to('users/'.\Request::get('search_rut').'/pdf',"Exportar a PDF", array('class'=>'btn btn-default pull-right', 'target' => '_blank')) }}
    @else
      {{ link_to('users/0/pdf',"Exportar a PDF", array('class'=>'btn btn-default pull-right', 'target' => '_blank')) }}
    @endif

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
