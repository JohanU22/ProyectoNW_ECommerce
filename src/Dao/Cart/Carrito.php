<?php
namespace Dao\Cart;

use Dao\Dao;
use Dao\Cart;
use Dao\Table;

class Carrito extends Table{
    public static function getAllCarritoOficial() {
        $selectSql = "SELECT * from carretilla;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function deleteAllCarretillaOfi() {
        $selectSql = "DELETE from carretilla;";
        return self::executeNonQuery($selectSql, array());
    }

    public static function ObtenerProductosEnCarrito($userId){
        //$idSession = strval(session_id());
        $sqlStr = "SELECT `productos`.`descripcionProducto`, `productos`.`codprd`, `productos`.`nombreProducto`, `carretilla`.`crrctd`, `carretilla`.`crrprc`, `carretilla`.`crrfching`, `productos`.`imagen`
        FROM `productos` 
            LEFT JOIN `carretilla` ON `carretilla`.`codprd` = `productos`.`codprd`
        WHERE `carretilla`.`usercod` = :userId;"; //?, ?, ?
        $params = array("userId"=>$userId);
        return self::obtenerRegistros($sqlStr, $params);
    }

    public static function AgregarFactura($usercod, $subtotal, $impuesto, $total){
        $insertSQL = "INSERT INTO factura (usercod, subtotal, impuesto, total) values (:usercod, :subtotal, :impuesto, :total);"; //?, ?, ?
        $params = array(
            "usercod"=>$usercod,
            "subtotal"=>$subtotal,
            "impuesto"=>$impuesto,
            "total"=>$total
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function AgregarDetalleFactura($idfactura, $codprd, $nombreProducto, $crrctd, $crrprc){
        $fecha = date('y-m-d h:i:s');
        $insertSQL = "INSERT INTO detallefactura (idfactura, codprd, nombreProducto, crrctd, crrprc, crrfching) values (:idfactura, :codprd, :nombreProducto, :crrctd, :crrprc, :crrfching);"; //?, ?, ?
        $params = array(
            "idfactura"=>$idfactura,
            "codprd"=>$codprd,
            "nombreProducto"=>$nombreProducto,
            "crrctd"=>$crrctd,
            "crrprc"=>$crrprc,
            "crrfching"=>$fecha
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function ObtenerIdFactura($usercod){
        $selectStr = "SELECT `idfactura` FROM `factura` WHERE `usercod` = :usercod
        ORDER BY `idfactura` DESC LIMIT 1;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("usercod"=>$usercod)
        );
    }

    public static function ObtenerTotalesFactura($idFactura){
        $idSession = strval(session_id());
        $sqlStr = "SELECT `factura`.`subtotal`, `factura`.`impuesto`, `factura`.`total`
        FROM `factura`
        WHERE `factura`.`idfactura` = :idFactura;"; //?, ?, ?
        $params = array("idFactura"=>$idFactura);
        return self::obtenerRegistros($sqlStr, $params);
    }

    /*public static function ObtenerTotales(){
        //$idSession = strval(session_id());
        $sqlStr = "SELECT ROUND(SUM((`carretilla`.`crrctd`*`carretilla`.`crrprc`)*0.15))impuesto, ROUND(SUM((`carretilla`.`crrctd`*`carretilla`.`crrprc`)))subtotal,
        ROUND(SUM((`carretilla`.`crrctd`*`carretilla`.`crrprc`)+((`carretilla`.`crrctd`*`carretilla`.`crrprc`)*0.15)))total
        FROM `productos` 
        LEFT JOIN `carretilla` ON `carretilla`.`codprd` = `productos`.`codprd` 
        WHERE `carretilla`.`anoncod` = :anoncod;"; //?, ?, ?
        $params = array("anoncod"=>$idSession);
        return self::obtenerRegistros($sqlStr, $params);
    }*/
}


?>