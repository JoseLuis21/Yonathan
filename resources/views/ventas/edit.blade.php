@extends('layouts.principal')
@include('ventas/template/detalle')
@section('content')


    <div class="panel panel-primary">
        <div class="panel-heading">
            Editar Venta
        </div>
        <div class="panel-body">
{!! Form::open(array('route' => array('ventas.update', $ventas->id) , 'method' => 'put', 'class'=>'ui form')) !!}

  <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
    {{ Form::label('fecha', 'Fecha:', array('class' => 'col-md-4 control-label')) }}
    <div class="col-md-6">
      {{ Form::date('fecha', $ventas->fecha , array('class' => 'form-control') ) }}
      @if ($errors->has('fecha'))
          <span class="help-block">
              <strong>{{ $errors->first('fecha') }}</strong>
          </span>
      @else
        <span class="help-block">
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    {{ Form::label('user_id', 'Cliente:', array('class' => 'col-md-4 control-label')) }}
    <div class="col-md-6">
      {{ Form::select('user_id', $usersSelect, $ventas->user_id,['class' => 'form-control']) }}
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


    <div class="form-group">
      <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                Detalle
                <button type="button" id="add-detalle" class="btn btn-primary glyphicon glyphicon-plus pull-right"></button>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-condensed tbl-details" >
                  <thead>
                    <th>Dueño</th>
                    <th>Cantidad Crias</th>
                    <th>Detalle</th>
                    <th>Precio</th>
                    <th>Total</th>
                  </thead>
                  <tbody>

                    @foreach($ventas->detalles_ventas as $key=>$detalle)
                      <tr id="tr-{{$key}}">
                        <td>
                          <select class="form-control" name="detalle[{{$key}}][user_id]">
                							@foreach($users as $user)
          									       @if($users->isEmpty())
                											<option value="{{$user->id}}"   {{($detalle->user_id == $user->id ? 'selected' : '')}}>{{$user->nombre}}</option>
                										@else
                                      <option value="{{$user->id}}"   {{($detalle->user_id == $user->id ? 'selected' : '')}}>{{$user->nombre}}</option>
                										@endif
                							@endforeach
                          </select>
                        </td>
                        <td>
                          <input class="form-control cantidad" type="text" value="{{$detalle->cantidad}}" name="detalle[{{$key}}][cantidad]"/>
                        </td>
                        <td>
                          <input class="form-control detalle" type="text" value="{{$detalle->detalle}}" name="detalle[{{$key}}][detalle]"/>
                        </td>
                        <td>
                          <input class="form-control precio" type="text" value="{{$detalle->precio}}" name="detalle[{{$key}}][precio]"/>
                        </td>
                        <td>
                          <input class="form-control total" type="text" value="{{$detalle->subtotal}}" name="detalle[{{$key}}][total]" readonly="true"/>
                        </td>
                        <td>
                          <button type="button" class="btn btn-info delete">Eliminar</button>
                          <input type="hidden" name="detalle[{{$key}}][detalle_id]" value="{{$detalle->id}}">
                        </td>
                      <tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total:</td>
                      <td>
                          {{ Form::text('total', $ventas->total , array('class' => 'form-control total-venta', 'readonly' => 'readonly') ) }}
                      </td>
                    </tr>
                  </tfoot>
                </table>
            </div>
          </div>
      </div>


  <div class="form-group">
    <div class="col-md-1 pull-right">
    </div>
    <div class="col-md-1 pull-right">
      {{ link_to(route('ventas.index'),"Cancelar",array('class'=>'btn btn-danger btn-block')) }}
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-1 pull-right">
    </div>
    <div class="col-md-1 pull-right">
      {{Form::submit('Guardar', array('class'=> 'btn btn-primary btn-block'))}}
      <span class="help-block">
      </span>
    </div>
  </div>


{!! Form::close() !!}



@endsection


@section('script')
  <script type="text/javascript">
    $(function(){




      count = 1;
      $("#add-detalle").on('click', function(){
        var source   = $("#entry-template").html();
        var template = Handlebars.compile(source);

        if($("#tr-"+count++).length > 0)
        {
          count++;
        }else {
          count--;
        }

        context = {
            indice: count++
        };
        $.ajax({
          method: "get",
          url: "/ventas/users"
        })
          .done(function(result) {
            context.users = result;
            var html    = template(context);
            $(".tbl-details > tbody").append(html);
            general.eliminar_item();
            general.onlyNumber(".cantidad");
            general.onlyNumber(".precio");
        });


      });


      general = (function () {
          calcular = function(){
            $('table.tbl-details').delegate('input,select', 'change', function () {
                var totalSuma = 0;
                var self = $(this);
                var tr = self.closest('tr');

                //valores
                var cantidad = tr.find('.cantidad').val();
                var precio = tr.find('.precio').val();
                var total = tr.find('.total').val();
                var totalVenta = $(".total-venta").val();

                //setear Valores
                tr.find('.total').val(cantidad * precio);
                // $(".total-venta").val(totalSuma);

                importe_total = 0;
                $(".total").each(
                  function(index, value) {
                    importe_total = importe_total + eval($(this).val());
                  }
                );
                $(".total-venta").val(importe_total);




            });
          };




        onlyNumber = function(selector){
              $(selector).keydown(function (e) {
                  // Allow: backspace, delete, tab, escape, enter and .
                  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                       // Allow: Ctrl+A
                      (e.keyCode == 65 && e.ctrlKey === true) ||
                       // Allow: Ctrl+C
                      (e.keyCode == 67 && e.ctrlKey === true) ||
                       // Allow: Ctrl+X
                      (e.keyCode == 88 && e.ctrlKey === true) ||
                       // Allow: home, end, left, right
                      (e.keyCode >= 35 && e.keyCode <= 39)) {
                           // let it happen, don't do anything
                           return;
                  }
                  // Ensure that it is a number and stop the keypress
                  if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                      e.preventDefault();
                  }
              });
            };

            eliminar_item = function(){
              $(".delete").on('click', function(){
                $(this).parent().parent().remove();
                if($(".cantidad").length > 0)
                {
                  $(".cantidad").trigger('change');
                }else {
                  $(".total-venta").val('0');
                }

              });
            };




          return {
            calcular: calcular,
            eliminar_item: eliminar_item,
            onlyNumber : onlyNumber
          };

      })();



      general.calcular();
      general.eliminar_item();
      general.onlyNumber(".cantidad");
      general.onlyNumber(".precio");
      //Luego de cargar todo



    });
  </script>
@endsection
