<?php 
namespace Dao\Mnt;

use Dao\Table;

class Usuarios extends Table{
    public static function AgregarUsuario(
        $useremail,$username,$userpswd,$userfching,$userpswdest,
        $userpswdexp, $userest, $useractcod,$userpswdchg,$usertipo){
        $insertSQL = "INSERT INTO usuario (useremail,username,userpswd,userfching,userpswdest,
        userpswdexp,userest,useractcod,userpswdchg,usertipo) values (:useremail, :username, :userpswd, :userfching, :userpswdest,
        :userpswdexp, :userest, :useractcod, :userpswdchg, :usertipo);"; //?, ?, ?
        $params = array(
            "useremail"=>$useremail,
            "username"=>$username,
            "userpswd"=>$userpswd,
            "userfching"=>$userfching,
            "userpswdest"=>$userpswdest,
            "userpswdexp"=>$userpswdexp,
            "userest"=>$userest,
            "useractcod"=>$useractcod,
            "userpswdchg"=>$userpswdchg,
            "usertipo"=>$usertipo
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function getAllUsuarios () {
        $selectSql = "SELECT * from usuario;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function getById($usercod){
        $selectStr = "SELECT * FROM usuario where usercod=:usercod;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("usercod"=>$usercod)
        );
    }

    public static function updateUsuarios(
        $useremail,$username,$userpswd,$userfching,$userpswdest,
        $userpswdexp, $userest, $useractcod,$userpswdchg,$usertipo,$usercod) {
        $updateSql = "UPDATE usuario SET useremail=:useremail, username=:username, 
        userpswd=:userpswd, userfching=:userfching, userpswdest=:userpswdest,
        userpswdexp=:userpswdexp, userest=:userest, useractcod=:useractcod, userpswdchg=:userpswdchg, 
        usertipo=:usertipo where usercod = :usercod;"; //?, ?, ?
        $params = array(
            "useremail"=>$useremail,
            "username"=>$username,
            "userpswd"=>$userpswd,
            "userfching"=>$userfching,
            "userpswdest"=>$userpswdest,
            "userpswdexp"=>$userpswdexp,
            "userest"=>$userest,
            "useractcod"=>$useractcod,
            "userpswdchg"=>$userpswdchg,
            "usertipo"=>$usertipo,
            "usercod"=>$usercod
        );
        return self::executeNonQuery($updateSql, $params);
    }

    public static function deleteUsuarios($usercod) {
        $deleteStr = "DELETE FROM usuario WHERE usercod=:usercod;";
        return self::executeNonQuery($deleteStr, array("usercod"=>$usercod));
    }
}
?>