<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Usuario&mode={{mode}}&usercod={{usercod}}" method="post" class="row col-6 offset-3" autocomplete="off">

    <section class="row my-2 align-center">
      <label for="useremail" class="col-4">Email</label>
      <input type="email" class="col-8" name="useremail" id="useremail" 
      placeholder="Ingrese su correo" {{if readonly}}disabled {{endif readonly}} value="{{useremail}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="username" class="col-4">Nombre de usuario</label>
      <input type="text" class="col-8" name="username" id="username" 
      placeholder="Ingrese su nombre de usuario" {{if readonly}}disabled {{endif readonly}} value="{{username}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="userpswd" class="col-4">Contraseña</label>
      <input type="text" class="col-8" name="userpswd" id="userpswd"
      placeholder="Ingrese su contraseña" {{if readonly}}disabled {{endif readonly}} value="{{userpswd}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="userpswdest" class="col-4">Estado de contraseña</label>
      <select name="userpswdest" class="col-8" id="userpswdest" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if usPswACT_selected}}selected{{endif usPswACT_selected}}>Activo</option>
        <option value="CTR" {{if usPswCTR_selected}}selected{{endif usPswCTR_selected}}>Inactivo</option>
      </select>
    </section>

    <section class="row my-2 align-center">
      <label for="userest" class="col-4">Estado del usuario</label>
      <select name="userest" class="col-8" id="userest" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if usACT_selected}}selected{{endif usACT_selected}}>Activo</option>
        <option value="CTR" {{if usCTR_selected}}selected{{endif usCTR_selected}}>Inactivo</option>
      </select>
    </section>

    <section class="row my-2 align-center">
      <label for="useractcod" class="col-4">useractcod</label>
      <input type="text" class="col-8" name="useractcod" id="useractcod" 
      placeholder="Ingrese su useractcod" {{if readonly}}disabled {{endif readonly}} value="{{useractcod}}" required>
    </section>

    <section class="row my-2 align-center">
      <label for="usertipo" class="col-4">Tipo de usuario</label>
      <select name="usertipo" class="col-8" id="usertipo" {{if readonly}}disabled {{endif readonly}}>
        <option value="ACT" {{if usTipoACT_selected}}selected{{endif usTipoACT_selected}}>Activo</option>
        <option value="CTR" {{if usTipoCTR_selected}}selected{{endif usTipoCTR_selected}}>Inactivo</option>
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
        window.location.href = "index.php?page=Mnt-Usuarios";
      });
    </script>
</form>