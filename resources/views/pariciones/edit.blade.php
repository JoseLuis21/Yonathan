@extends('layouts.principal')

@section('content')

  <div class="panel-heading"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Editar Paricion
        </div>
        <div class="panel-body">
          {!! Form::open(array('route' => array('pariciones.update', $paricion->id) , 'method' => 'put', 'class'=>'ui form')) !!}

                    <div class="form-group{{ $errors->has('oveja_id') ? ' has-error' : '' }}">
                      {{ Form::label('oveja_id', 'Oveja:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::select('oveja_id', $ovejas, $paricion->oveja_id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                        @if ($errors->has('oveja_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('oveja_id') }}</strong>
                            </span>
                        @else
                          <span class="help-block">
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('fecha_paricion') ? ' has-error' : '' }}">
                      {{ Form::label('fecha_paricion', 'Fecha de Parición:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::date('fecha_paricion', $paricion->fecha_paricion , array('class' => 'form-control') ) }}
                        @if ($errors->has('fecha_paricion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_paricion') }}</strong>
                            </span>
                        @else
                          <span class="help-block">
                          </span>
                        @endif
                      </div>
                    </div>


                    <div class="form-group{{ $errors->has('cantidad_machos') ? ' has-error' : '' }}">
                      {{ Form::label('cantidad_machos', 'Cantidad Machos:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::text('cantidad_machos', $paricion->cantidad_machos , array('class' => 'form-control') ) }}
                        @if ($errors->has('cantidad_machos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cantidad_machos') }}</strong>
                            </span>
                        @else
                          <span class="help-block">
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('cantidad_hembras') ? ' has-error' : '' }}">
                      {{ Form::label('cantidad_hembras', 'Cantidad Hembras:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::text('cantidad_hembras', $paricion->cantidad_hembras , array('class' => 'form-control') ) }}
                        @if ($errors->has('cantidad_hembras'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cantidad_hembras') }}</strong>
                            </span>
                        @else
                          <span class="help-block">
                          </span>
                        @endif
                      </div>
                    </div>


                    <div class="form-group{{ $errors->has('crias_muertas') ? ' has-error' : '' }}">
                      {{ Form::label('crias_muertas', 'Crias Muertas:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::text('crias_muertas', $paricion->crias_muertas , array('class' => 'form-control') ) }}
                        @if ($errors->has('crias_muertas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('crias_muertas') }}</strong>
                            </span>
                        @else
                          <span class="help-block">
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('total_paricion') ? ' has-error' : '' }}">
                      {{ Form::label('total_paricion', 'Total Parición:', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-6">
                        {{ Form::text('total_paricion', $paricion->total_paricion , array('class' => 'form-control') ) }}
                        @if ($errors->has('total_paricion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_paricion') }}</strong>
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
