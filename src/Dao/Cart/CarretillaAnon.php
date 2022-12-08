<?php 
namespace Dao\Cart;

use Dao\Dao;
use Dao\Cart;
use Dao\Table;

class CarretillaAnon extends Table{
    public static function getAllCarretillaAnon() {
        $selectSql = "SELECT * from carretillaanon;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function deleteAllCarretillaAnon() {
        $selectSql = "DELETE from carretillaanon;";
        return self::executeNonQuery($selectSql, array());
    }

    public static function AgregarProductosalCarrito($codprd, $crrctd, $crrprc){
        $idSession = strval(session_id());
        $fecha = date('y-m-d h:i:s');
        //INSERT INTO `carretillaanon` (`anoncod`, `codprd`, `crrctd`, `crrprc`, `crrfching`) VALUES ('ewfdew1', '4', '1', '1234', '2022-11-30 14:15:46');
        $insertSQL = "INSERT INTO carretillaanon (anoncod, codprd, crrctd, crrprc, crrfching) values (:anoncod, :codprd, :crrctd, :crrprc, :crrfching);"; //?, ?, ?
        $params = array(
            "anoncod"=>$idSession,
            "codprd"=>$codprd,
            "crrctd"=>$crrctd,
            "crrprc"=>$crrprc,
            "crrfching"=>$fecha
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function ObtenerIdsProductosEnCarrito(){
        //Iniciar la sesión si no está iniciada

        $idSession = strval(session_id());
        $selectSql = "SELECT codprd FROM `carretillaanon` WHERE `anoncod`=:anoncod";
        return self::obtenerUnRegistro(
            $selectSql,
            array("anoncod"=>$idSession)
        );
    }

    public static function ProductoYaEstaEnCarrito($codprd){
        $IdsEnCarrito = self::ObtenerIdsProductosEnCarrito();

        foreach($IdsEnCarrito as $ids){
            if ($ids = $codprd) return true;
        }

        return false;
    }

    public static function QuitarProductodelCarrito($codprd) {
        $idSession = strval(session_id());
        $anoncod = $idSession;
        //DELETE FROM `carretillaanon` WHERE `carretillaanon`.`codprd` = 4;
        $deleteStr = "DELETE FROM carretillaanon WHERE codprd = :codprd;";
        return self::executeNonQuery($deleteStr, array("codprd" => $codprd));
    }


    public static function getById($anoncod){
        $selectStr = "SELECT * FROM carretillaanon where anoncod=:anoncod;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("anoncod"=>$anoncod)
        );
    }

    public static function ObtenerProductosEnCarrito(){
        $idSession = strval(session_id());
        $sqlStr = "SELECT `productos`.`codprd`, `productos`.`descripcionProducto`, `productos`.`nombreProducto`, `carretillaanon`.`crrprc`, `carretillaanon`.`crrctd`, `carretillaanon`.`crrfching`, 
        `productos`.`stockProducto`, `productos`.`imagen` FROM 
        `productos` LEFT JOIN `carretillaanon` ON `carretillaanon`.`codprd` = `productos`.`codprd` 
        WHERE `carretillaanon`.`anoncod` = :anoncod;"; //?, ?, ?
        $params = array("anoncod"=>$idSession);
        return self::obtenerRegistros($sqlStr, $params);
    }

    public static function ObtenerTotales(){
        $idSession = strval(session_id());
        $sqlStr = "SELECT ROUND(SUM((`carretillaanon`.`crrctd`*`carretillaanon`.`crrprc`)*0.15))impuesto, ROUND(SUM((`carretillaanon`.`crrctd`*`carretillaanon`.`crrprc`)))subtotal,
        ROUND(SUM((`carretillaanon`.`crrctd`*`carretillaanon`.`crrprc`)+((`carretillaanon`.`crrctd`*`carretillaanon`.`crrprc`)*0.15)))total
        FROM `productos` 
        LEFT JOIN `carretillaanon` ON `carretillaanon`.`codprd` = `productos`.`codprd` 
        WHERE `carretillaanon`.`anoncod` = :anoncod;"; //?, ?, ?
        $params = array("anoncod"=>$idSession);
        return self::obtenerRegistros($sqlStr, $params);
    }

    public static function ActualizarCarrito($codprd, $crrctd, $crrprc) {
        //$idSession = strval(session_id());
        $fecha = date('y-m-d h:i:s');
        $updateSql = "UPDATE carretillaanon SET crrctd=:crrctd,
            crrprc=:crrprc, crrfching=:crrfching where codprd=:codprd;"; //?, ?, ?
        $params = array(
            "crrctd"=>$crrctd,
            "crrprc"=>$crrprc,
            "crrfching"=>$fecha,
            "codprd"=>$codprd
        );
        return self::executeNonQuery($updateSql, $params);
    }
    public static function AgregarProductosalCarritoOficial($codprd, $crrctd, $crrprc, $crrfching, $usercod){
        //INSERT INTO `carretillaanon` (`anoncod`, `codprd`, `crrctd`, `crrprc`, `crrfching`) VALUES ('ewfdew1', '4', '1', '1234', '2022-11-30 14:15:46');
        $insertSQL = "INSERT INTO carretilla (usercod, codprd, crrctd, crrprc, crrfching) values (:usercod, :codprd, :crrctd, :crrprc, :crrfching);"; //?, ?, ?
        $params = array(
            "usercod"=>$usercod,
            "codprd"=>$codprd,
            "crrctd"=>$crrctd,
            "crrprc"=>$crrprc,
            "crrfching"=>$crrfching
        );
        return self::executeNonQuery($insertSQL, $params);
    }


}




?>