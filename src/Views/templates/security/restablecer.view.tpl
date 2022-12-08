<section class="fullCenter">
  
  <form class="grid" method="post" action="index.php?page=sec_restablecer">
    <input type="hidden" name="mode" value="{{mode}}" />
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
      <h1 class="col-12">Cambiar de Contrasena</h1>
    </section>
    <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
         <div class="row">
        <label class="col-12 col-m-4 flex align-center" for="txtEmail">Correo Electrónico</label>
        <div class="col-12 col-m-8">
          <input class="width-full" type="email" id="txtEmail" name="txtEmail" value="{{txtEmail}}" />
        </div>
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>

      </div>
         <div class="row">
        <label class="col-12 col-m-4 flex align-center" for="txtPswd">Contraseña</label>
        <div class="col-12 col-m-8">
          <input class="width-full" type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" />
        </div>
        {{if errorPswd}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
        {{endif errorPswd}}
      </div>
      <div class="row right flex-end px-4">
        <button class="primary" id="btnEnviar" type="submit">Enviar</button>
         &nbsp;
         <button class="primary" id="btnCancelar" type="submit">Cancelar</button>
      </div>
    </section>
  </form>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('btnCancelar').addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      window.location.href = 'index.php?page=sec_login';
    });
  });
</script>

