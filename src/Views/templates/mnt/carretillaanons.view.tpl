<h1>Listado de Productos en Carretilla Anónima</h1>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th><a href="index.php?page=Mnt-Carretillaanon&mode=INS" class="btn w32 depth-1">
          <i class="fa-solid fa-cart-plus"></i>
        </a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach carretillaanons}}
      <tr>
        <td>{{anoncod}}</td> 
        <td><a href="index.php?page=Mnt-Carretillaanon&mode=DSP&codprd={{codprd}}" >{{codprd}}</a></td>
        <td>{{crrctd}}</td>
        <td>{{crrprc}}</td>
        <td>{{crrfching}}</td>
        <td>
          <a class="mx-2 btn" href="index.php?page=Mnt-Carretillaanon&mode=UPD&anoncod={{anoncod}}">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a class="mx-2 btn" href="index.php?page=Mnt-Carretillaanon&mode=DEL&codprd={{codprd}}">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>
      {{endfor carretillaanons}}
    </tbody>
  </table>
</section>
