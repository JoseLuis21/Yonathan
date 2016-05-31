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
    <table class="table table-bordered">
      <tr>
        <td>Oveja</td>
        <td>Fecha Maternidad</td>
        <td>Cantidad Macho</td>
        <td>Cantidad Hembra</td>
        <td>Crias M</td>
        <td>Total Crias</td>
      </tr>
      <tbody>
        @foreach($pariciones as $paricion)
          <tr>
            <td>{{$paricion->oveja->numero_arete}}</td>
            <td>{{$paricion->fecha_paricion}}</td>
            <td>{{$paricion->cantidad_machos}}</td>
            <td>{{$paricion->cantidad_hembras}}</td>
            <td>{{$paricion->crias_muertas}}</td>
            <td>{{$paricion->total_paricion}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
