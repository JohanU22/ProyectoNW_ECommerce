<h1>Listado de Roles</h1>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th><a href="index.php?page=Mnt-Rol&mode=INS" class="btn w32 depth-1">
          <i class="fa-solid fa-cart-plus"></i>
        </a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach roles}}
      <tr>
        <td><a href="index.php?page=Mnt-Rol&mode=DSP&rolescod={{rolescod}}" >{{rolescod}}</a></td>
        <td>{{rolesdsc}}</td>
        <td>{{rolesest}}</td>
        <td>
          <a class="mx-2 btn" href="index.php?page=Mnt-Rol&mode=UPD&rolescod={{rolescod}}">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a class="mx-2 btn" href="index.php?page=Mnt-Rol&mode=DEL&rolescod={{rolescod}}">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>
      {{endfor roles}}
    </tbody>
  </table>
</section>
