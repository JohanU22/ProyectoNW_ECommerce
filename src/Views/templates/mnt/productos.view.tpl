<h1>Listado de Productos</h1>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Producto</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Estado</th>
        <th>Url Imagen</th>
        <th><a href="index.php?page=Mnt-Producto&mode=INS" class="btn w32 depth-1">
          <i class="fa-solid fa-cart-plus"></i>
        </a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach productos}}
      <tr>
        <td>{{codprd}}</td>
        <td><a href="index.php?page=Mnt-Producto&mode=DSP&codprd={{codprd}}" >{{nombreProducto}}</a></td>
        <td>{{descripcionProducto}}</td>
        <td>{{tipoProducto}}</td>
        <td>{{precio}}</td>
        <td>{{stockProducto}}</td>
        <td>{{estadoProducto}}</td>
        <td>{{imagen}}</td>
        <td>
          <a class="mx-2 btn" href="index.php?page=Mnt-Producto&mode=UPD&codprd={{codprd}}">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a class="mx-2 btn" href="index.php?page=Mnt-Producto&mode=DEL&codprd={{codprd}}">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>
      {{endfor productos}}
    </tbody>
  </table>
</section>
