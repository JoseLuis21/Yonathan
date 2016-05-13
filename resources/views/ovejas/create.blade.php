@extends('layouts.principal')

@section('content')

  <div class="panel-heading"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Crear Oveja
        </div>
        <div class="panel-body">
          {!! Form::open(array('url' => 'ovejas', 'class' => 'ui form')) !!}

          <div class="form-group{{ $errors->has('numero_arete') ? ' has-error' : '' }}">
            {{ Form::label('numero_arete', 'Numero de Arete:', array('class' => 'col-md-4 control-label')) }}
            <div class="col-md-6">
              {{ Form::text('numero_arete', old('numero_arete') , array('class' => 'form-control') ) }}
              @if ($errors->has('numero_arete'))
                  <span class="help-block">
                      <strong>{{ $errors->first('numero_arete') }}</strong>
                  </span>
              @else
                <span class="help-block">
                </span>
              @endif
            </div>
          </div>

            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              {{ Form::label('user_id', 'Dueño:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
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

            <div class="form-group{{ $errors->has('estado_oveja_id') ? ' has-error' : '' }}">
              {{ Form::label('estado_oveja_id', 'Estado:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::select('estado_oveja_id', $estadoOvejas, null, ['class' => 'form-control']) }}
                @if ($errors->has('estado_oveja_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estado_oveja_id') }}</strong>
                    </span>
                @else
                  <span class="help-block">
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('crias_macho') ? ' has-error' : '' }}">
              {{ Form::label('crias_macho', 'Crias Machos:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('crias_macho', old('crias_macho') , array('class' => 'form-control') ) }}
                @if ($errors->has('crias_macho'))
                    <span class="help-block">
                        <strong>{{ $errors->first('crias_macho') }}</strong>
                    </span>
                @else
                  <span class="help-block">
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('crias_hembra') ? ' has-error' : '' }}">
              {{ Form::label('crias_hembra', 'Crias Hembras:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('crias_hembra', old('crias_hembra') , array('class' => 'form-control') ) }}
                @if ($errors->has('crias_hembra'))
                    <span class="help-block">
                        <strong>{{ $errors->first('crias_hembra') }}</strong>
                    </span>
                @else
                  <span class="help-block">
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('historico') ? ' has-error' : '' }}">
              {{ Form::label('historico', 'Historico:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::text('historico', old('historico') , array('class' => 'form-control') ) }}
                @if ($errors->has('historico'))
                    <span class="help-block">
                        <strong>{{ $errors->first('historico') }}</strong>
                    </span>
                @else
                  <span class="help-block">
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('fecha_maternidad') ? ' has-error' : '' }}">
              {{ Form::label('fecha_maternidad', 'Fecha de Maternidad:', array('class' => 'col-md-4 control-label')) }}
              <div class="col-md-6">
                {{ Form::date('fecha_maternidad', old('fecha_maternidad') , array('class' => 'form-control') ) }}
                @if ($errors->has('fecha_maternidad'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fecha_maternidad') }}</strong>
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
                {{ link_to(route('ovejas.index'),"Cancelar",array('class'=>'btn btn-danger btn-block')) }}
              </div>
            </div>

          {!! Form::close() !!}
        </div>
    </div>


@endsection
