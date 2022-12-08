<h1>{{mode_dsc}}</h1>
<form action="index.php?page=Mnt-Carretillaanon&mode={{mode}}&codprd={{codprd}}" method="post" class="row col-6 offset-3">
    <section class="row my-2 align-center">
      <label for="codprd" class="col-4">Código</label>
      <input type="number" class="col-8" name="codprd" id="codprd" {{if readonly}}disabled {{endif readonly}} value="{{codprd}}">
    </section>
    <section class="row my-2 align-center">
      <label for="crrctd" class="col-4">Cantidad</label>
      <input type="number" class="col-8" name="crrctd" id="crrctd" {{if readonly}}disabled {{endif readonly}} value="{{crrctd}}">
    </section>
    <section class="row my-2 align-center">
      <label for="crrprc" class="col-4">Precio</label>
      <input type="number" class="col-8" name="crrprc" id="crrprc" {{if readonly}}disabled {{endif readonly}} value="{{crrprc}}">
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
        window.location.href = "index.php?page=Mnt-Carretillaanon";
      });
    </script>
</form>