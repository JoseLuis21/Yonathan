@extends('layouts.principal')

@section('content')

  <div class="panel-heading"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Crear Dueño
        </div>
        <div class="panel-body">
          {!! Form::open(array('url' => 'users', 'class' => 'ui form')) !!}
            <div class="form-group{{ $errors->has('rut_dueno') ? ' has-error' : '' }}">
              {{ Form::label('rut_dueno', 'Rut:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('rut_dueno', old('rut_dueno') , array('class' => 'form-control') ) }}
                @if ($errors->has('rut_dueno'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rut_dueno') }}</strong>
                    </span>
                @else
                  <span class="help-block">
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              {{ Form::label('nombre', 'Nombre:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('nombre', old('nombre') , array('class' => 'form-control') ) }}
                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
              {{ Form::label('telefono', 'Telefono:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('telefono', old('telefono') , array('class' => 'form-control') ) }}
                @if ($errors->has('telefono'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
              {{ Form::label('direccion', 'Dirección:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('direccion', old('direccion') , array('class' => 'form-control') ) }}
                @if ($errors->has('direccion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {{ Form::label('email', 'Email:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::email('email', old('email') , array('class' => 'form-control') ) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {{ Form::label('password', 'Contraseña:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{Form::password('password', array('class' => 'form-control')) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {{ Form::label('password_confirmation', 'Confirmar Contraseña:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{Form::password('password_confirmation', array('class' => 'form-control')) }}
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @else
                    <span class="help-block">
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('color_dueno') ? ' has-error' : '' }}">
              {{ Form::label('color_dueno', 'Color del dueño:', array('class' => ' col-md-4 control-label')) }}
              <div class="col-md-6">
                {{Form::text('color_dueno', null, array('class' => 'form-control')) }}
                @if ($errors->has('color_dueno'))
                    <span class="help-block">
                        <strong>{{ $errors->first('color_dueno') }}</strong>
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
