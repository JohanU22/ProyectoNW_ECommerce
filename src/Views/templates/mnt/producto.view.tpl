<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Producto&mode={{mode}}&codprd={{codprd}}" method="post" class="row col-6 offset-3">
    <section class="row my-2 align-center">
      <label for="nombreProducto" class="col-4">Nombre del Producto</label>
      <input type="text" class="col-8" name="nombreProducto" id="nombreProducto" {{if readonly}}disabled {{endif readonly}} value="{{nombreProducto}}">
    </section>
    <section class="row my-2 align-center">
      <label for="descripcionProducto" class="col-4">Descripción</label>
      <input type="text" class="col-8" name="descripcionProducto" id="descripcionProducto" {{if readonly}}disabled {{endif readonly}} value="{{descripcionProducto}}">
    </section>
    <section class="row my-2 align-center">
      <label for="tipoProducto" class="col-4">Tipo de Producto</label>
      <select name="tipoProducto" class="col-8" id="tipoProducto" {{if readonly}}disabled {{endif readonly}}>
        <option value="ELEC" {{if elec_selected}}selected{{endif elec_selected}}>Electrónicos</option>
        <option value="CAM" {{if cam_selected}}selected{{endif cam_selected}}>Camisetas</option>
      </select>
    </section>
    <section class="row my-2 align-center">
      <label for="precio" class="col-4">Precio</label>
      <input type="number" class="col-8" name="precio" id="precio" {{if readonly}}disabled {{endif readonly}} value="{{precio}}">
    </section>
    <section class="row my-2 align-center">
      <label for="stockProducto" class="col-4">Stock</label>
      <input type="number" class="col-8" name="stockProducto" id="stockProducto" {{if readonly}}disabled {{endif readonly}} value="{{stockProducto}}">
    </section>
    <section class="row my-2 align-center">
      <label for="estadoProducto" class="col-4">Estado</label>
      <select name="estadoProducto" class="col-8" id="estadoProducto" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if act_selected}}selected{{endif act_selected}}>Disponible</option>
        <option value="INA" {{if ina_selected}}selected{{endif ina_selected}}>No Disponible</option>
      </select>
    </section>
    <section class="row my-2 align-center">
      <label for="imagen" class="col-4">Imagen</label>
      <input type="text" class="col-8" name="imagen" id="imagen" {{if readonly}}disabled {{endif readonly}} value="{{imagen}}">
    </section>
    <br/><br/>
    <section class="row flex-end my-2">
      {{if showSaveBtn}}
      <button class="mx-2 primary"  type="submit" name="btnGuardar">Guardar</button>
      {{endif showSaveBtn}}
      <button id="btnCancelar">Cancelar</button>
    </section>
    <script>
      document.getElementById("btnCancelar").addEventListener("click", function(event){
        event.preventDefault();
        window.location.href = "index.php?page=Mnt-Productos";
      });
    </script>
</form>