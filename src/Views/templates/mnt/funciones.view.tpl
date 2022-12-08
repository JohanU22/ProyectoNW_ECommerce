<h1>Listado de Funciones</h1>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th><a href="index.php?page=Mnt-Funcion&mode=INS" class="btn w32 depth-1">
          <i class="fa-solid fa-cart-plus"></i>
        </a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach funciones}}
      <tr>
        <td><a href="index.php?page=Mnt-Funcion&mode=DSP&fncod={{fncod}}" >{{fncod}}</a></td>
        <td>{{fndsc}}</td>
        <td>{{fnest}}</td>
        <td>{{fntyp}}</td>
        <td>
          <a class="mx-2 btn" href="index.php?page=Mnt-Funcion&mode=UPD&fncod={{fncod}}">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a class="mx-2 btn" href="index.php?page=Mnt-Funcion&mode=DEL&fncod={{fncod}}">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>
      {{endfor funciones}}
    </tbody>
  </table>
</section>
