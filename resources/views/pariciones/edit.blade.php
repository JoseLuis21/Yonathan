@extends('layouts.principal')

@section('content')

  <div class="panel-heading"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Editar Estado Oveja
        </div>
        <div class="panel-body">
          {!! Form::open(array('route' => array('crias-totales.update', $criasTotal->id) , 'method' => 'put', 'class'=>'ui form')) !!}
          <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
            {{ Form::label('user_id', 'Dueño:', array('class' => 'col-md-4 control-label')) }}
            <div class="col-md-6">
              {{ Form::text('user_id', $criasTotal->user->nombre, ['class' => 'form-control', 'readonly'=>'true']) }}
              @if ($errors->has('user_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('user_id') }}</strong>
                  </span>
              @else
                <span class="help-block">
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
            {{ Form::label('cantidad', 'Cantidad:', array('class' => 'col-md-4 control-label')) }}
            <div class="col-md-6">
              {{ Form::text('cantidad', $criasTotal->cantidad , array('class' => 'form-control') ) }}
              @if ($errors->has('cantidad'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cantidad') }}</strong>
                  </span>
              @else
                <span class="help-block">
                </span>
              @endif
            </div>
          </div>


            <div class="form-group">
              <div class="col-md-4">
              </div>
              <div class="col-md-6">
                {{Form::submit('Guardar', array('class'=> 'btn btn-primary btn-block'))}}
                <span class="help-block">
                </span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
              </div>
              <div class="col-md-6">
                {{ link_to(route('crias-totales.index'),"Cancelar",array('class'=>'btn btn-danger btn-block')) }}
              </div>
            </div>

          {!! Form::close() !!}
        </div>
    </div>


@endsection
