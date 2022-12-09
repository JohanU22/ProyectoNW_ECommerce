<?php 
namespace Dao\Mnt;

use Dao\Table;

class Facturas extends Table{

    public static function getAllFacturas() {
        $selectSql = "SELECT * from factura;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function getById($usercod){
        $selectStr = "SELECT * FROM factura where usercod=:usercod;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("usercod"=>$usercod)
        );
    }

}




?>