<div class="container-md cart">
    <h3 class="is-size-2">Carrito de Compra</h3>
   
    <table class="table ">
        <thead class="thead-light">
            <tr>
                <th>Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        {{foreach productosCarretillaAnon}}
        <tr>
            <td>
                <img src="{{imagen}}" alt="" width="50px">
            </td>
            <td>
                <p>{{nombreProducto}}</p>
            </td>
            <td>
                <span>L. {{crrprc}}</span>
            </td>
            <td>
                <span>{{crrctd}}</span>
            </td>
            <td>
                <form class="book-button-container" action="index.php?page=Mnt-Carretillaanon&mode=DEL&codprd={{codprd}}" method="post">
                    <input type="hidden" name="codprd" value="{{codprd}}">
                    <button class="button btn-outline-danger fa fa-trash-o btn-lg btn-lg" type="submit">
                    </button>
                </form>
            </td>
        </tr>
        {{endfor productosCarretillaAnon}}


    </table>

    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <table class="table table-borderless float-left">
                    {{foreach totales}}
                    <tr>
                        <td><b>Subtotal</b></td>
                        <td>L.{{subtotal}}</td>
                    </tr>
                    <tr>
                        <td><b>Impuesto</b></td>
                        <td>L. {{impuesto}}</td>
                    </tr>

                    <tr class="table-secondary">

                        <td><b>Total</b> </td>
                        <td>L.{{total}}</td>


                    </tr>
                    {{endfor totales}}
                </table>
                <br>
                <button type="submit" class="btn btn-success" name="btnPagar" id="btnPagar">Proceder a Pagar</button>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('btnPagar').addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = 'index.php?page=carrito&mode=DSP';
        });
    });
</script>
<!--</form>-->