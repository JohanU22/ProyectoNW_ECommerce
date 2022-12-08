<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Funcion&mode={{mode}}&fncod={{fncod}}" method="post" class="row col-6 offset-3" autocomplete="off">

    <section class="row my-2 align-center">
      <label for="fncod" class="col-4">Código de función</label>
      <input type="text" class="col-8" name="fncod" id="fncod" 
      placeholder="Ingrese el código de función" {{if readonly}}disabled {{endif readonly}} value="{{fncod}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="fndsc" class="col-4">Descripción</label>
      <input type="text" class="col-8" name="fndsc" id="fndsc"
      placeholder="Ingrese la descripción de la función" {{if readonly}}disabled {{endif readonly}} value="{{fndsc}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="fnest" class="col-4">Estado</label>
      <select name="fnest" class="col-8" id="fnest" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if fnEstACT_selected}}selected{{endif fnEstACT_selected}}>Activo</option>
        <option value="CTR" {{if fnEstCTR_selected}}selected{{endif fnEstCTR_selected}}>Inactivo</option>
      </select>
    </section>

    <section class="row my-2 align-center">
      <label for="fntyp" class="col-4">Tipo</label>
      <select name="fntyp" class="col-8" id="fntyp" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if fnTypACT_selected}}selected{{endif fnTypACT_selected}}>Activo</option>
        <option value="CTR" {{if fnTypCTR_selected}}selected{{endif fnTypCTR_selected}}>Inactivo</option>
      </select>
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
        window.location.href = "index.php?page=Mnt-Funciones";
      });
    </script>
</form>