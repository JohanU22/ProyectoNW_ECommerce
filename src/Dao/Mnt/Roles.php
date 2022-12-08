<?php 
namespace Dao\Mnt;

use Dao\Table;

class Roles extends Table{
    public static function AgregarRol($rolesdsc, $rolesest, $rolescod){
        $insertSQL = "INSERT INTO roles (rolescod, rolesdsc, rolesest)
        values(:rolescod, :rolesdsc, :rolesest );"; //?, ?, ?
        $params = array(
            "rolescod"=>$rolescod,            
            "rolesdsc"=>$rolesdsc,
            "rolesest"=>$rolesest
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function getAllRoles () {
        $selectSql = "SELECT * from roles;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function getById($rolescod){
        $selectStr = "SELECT * FROM roles where rolescod =:rolescod;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("rolescod"=>$rolescod)
        );
    }

    public static function updateRoles($rolesdsc, $rolesest, $rolescod) {
        $updateSql = "UPDATE roles SET rolesdsc = :rolesdsc, rolesest = :rolesest where rolescod = :rolescod;"; //?, ?, ?
        $params = array(
            "rolesdsc"=>$rolesdsc,
            "rolesest"=>$rolesest,
            "rolescod"=>$rolescod
        );
        return self::executeNonQuery($updateSql, $params);
    }

    public static function deleteRoles($rolescod) {
        $deleteStr = "DELETE FROM roles WHERE rolescod=:rolescod;";
        return self::executeNonQuery($deleteStr, array("rolescod" => $rolescod));
    }
}
?>