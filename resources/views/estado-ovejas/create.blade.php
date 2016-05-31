@extends('layouts.principal')

@section('content')

  <div class="panel-heading"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Crear Estado Oveja
        </div>
        <div class="panel-body">
          {!! Form::open(array('url' => 'estado-ovejas', 'class' => 'ui form')) !!}
            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              {{ Form::label('estado', 'Estado:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('estado', old('estado') , array('class' => 'form-control') ) }}
                @if ($errors->has('estado'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estado') }}</strong>
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
                {{ link_to(route('users.index'),"Cancelar",array('class'=>'btn btn-danger btn-block')) }}
              </div>
            </div>

          {!! Form::close() !!}
        </div>
    </div>


@endsection
