<h1>Orden Aceptada</h1>
<hr/>
<pre>
{{orderjson}}
</pre>
<button type="submit" class="btn btn-success" name="btnPagar" id="btnPagar">Listo</button>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('btnPagar').addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = 'index.php?page=index&mode=DSP';
        });
    });
</script>