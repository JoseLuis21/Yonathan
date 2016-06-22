<script id="entry-template" type="text/x-handlebars-template">
<tr id="tr-{{indice}}">
  <td>
    <select class="form-control usuario" name="detalle[{{indice}}][user_id]">
      {{#each users}}
        <option value="{{this.id}}" >{{this.nombre}}</option>
      {{/each}}
    </select>
  </td>
  <td>
    <select class="form-control criastotal" disabled name="detalle[{{indice}}][user_id]">
      {{#each criasTotales}}
        <option value="{{this.user_id}}" data-stock="{{this.cantidad}}" >{{this.cantidad}}</option>
      {{/each}}
    </select>
  </td>
  <td>
    <input class="form-control cantidad" type="text" value="0" name="detalle[{{indice}}][cantidad]"/>
  </td>
  <td>
    <input class="form-control detalle" type="text" name="detalle[{{indice}}][detalle]"/>
  </td>
  <td>
    <input class="form-control precio" type="text" value="0" name="detalle[{{indice}}][precio]"/>
  </td>
  <td>
    <input class="form-control total" type="text" value="0" name="detalle[{{indice}}][total]" readonly="true"/>
  </td>
  <td>
    <button type="button" class="btn btn-info delete">Eliminar</button>
  </td>
<tr>
</script>
