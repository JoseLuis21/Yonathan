<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  </head>
  <style>
  .table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
      border-top: 0;
    }
    .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
      border-bottom-width: 2px;
    }
    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
      border: 1px solid #ddd;
    }
    .table>thead>tr>th {
      vertical-align: bottom;
      border-bottom: 2px solid #ddd;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
      padding: 8px;
      line-height: 1.42857143;
      vertical-align: top;
      border-top: 1px solid #ddd;
    }
    th {
      text-align: left;
    }
    td, th {
      padding: 0;
    }
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
  </style>
  <body>
    <table style="width:100%;" class="table table-bordered table-hover">
      <tr>
        <td>Numero</td>
        <td>Fecha</td>
        <td>Total</td>
        <td>Usuario</td>
      </tr>
      <tbody>
        @foreach($ventas as $venta)
          <tr>
            <td>{{$venta->id}}</td>
            <td>{{$venta->fecha}}</td>
            <td>{{$venta->total}}</td>
            <td>{{$venta->user->nombre}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
