<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Rol&mode={{mode}}&rolescod={{rolescod}}" method="post" class="row col-6 offset-3" autocomplete="off">

    <section class="row my-2 align-center">
      <label for="rolescod" class="col-4">Código de rol</label>
      <input type="text" class="col-8" name="rolescod" id="rolescod" 
      placeholder="Ingrese el código de rol" {{if readonly}}disabled {{endif readonly}} value="{{rolescod}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="rolesdsc" class="col-4">Descripción</label>
      <input type="text" class="col-8" name="rolesdsc" id="rolesdsc"
      placeholder="Ingrese la descripción del rol" {{if readonly}}disabled {{endif readonly}} value="{{rolesdsc}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="rolesest" class="col-4">Estado</label>
      <select name="rolesest" class="col-8" id="rolesest" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if rolACT_selected}}selected{{endif rolACT_selected}}>Activo</option>
        <option value="CTR" {{if rolCTR_selected}}selected{{endif rolCTR_selected}}>Inactivo</option>
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
        window.location.href = "index.php?page=Mnt-Roles";
      });
    </script>
</form>