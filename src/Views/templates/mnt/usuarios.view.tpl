<h1>Gestión de Usuarios </h1>
<body >
<section class="WWList  ">
  <table class="table table-lg">
    <thead  class="thead-dark thead-light">
      <tr >
        <th scope="col">Codigo Usuario</th>
        <th scope="col">Correo Electronico</th>
        <th scope="col">Nombre de Usuario</th>   
        <th scope="col">Fecha Creacion</th>
        <th scope="col">userpswdest</th>
        <th scope="col">Fecha de Expiracion</th>
        <th scope="col">Estado del Usuario</th>
        <th scope="col">userpswdchg</th>
        <th scope="col">Tipo de Usuario</th>
        <th scope="col">
          {{if new_enabled}}
          <button id="btnAdd" class="btn btn-primary btn-sm btn-block">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>
    <tbody >
      {{foreach items}}
      <tr >
        <td scope="row">{{usercod}}</td>
        <td><a href="index.php?page=mnt_usuario&mode=DSP&usercod={{usercod}}">{{useremail}}</a></td>
        <td>{{username}}</td>
        
        <td >{{userfching}}</td>
        <td >{{userpswdest}}</td>
        <td >{{userpswdexp}}</td>
        <td >{{userest}}</td>
        
        <td >{{userpswdchg}}</td>
        <td >{{usertipo}}</td>
        <td >
          {{if ~edit_enabled}}
          <form action="index.php" method="get">
            <div class="crud ">
              <input type="hidden" name="page" value="mnt_usuario"/>
              <input type="hidden" name="mode" value="UPD" />
              
              <input type="hidden" name="usercod" value={{usercod}} />
              <button type="submit" class="btn btn-dark btn-sm btn-block">Editar</button>
            </div>
            <p>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
            <div class="crud">
                <input type="hidden" name="page" value="mnt_usuario"/>
                <input type="hidden" name="mode" value="DEL" />
                <input type="hidden" name="usercod" value={{usercod}} />
                <button type="submit" class="btn btn-danger btn-sm btn-block" >Eliminar</button>
            </div>
             
          </form>
          {{endif ~delete_enabled}}
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
</div>
</body>

<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_usuario&mode=INS&usercod=0");
      });
    });
</script>
