<?php 
namespace Dao\Cart;

use Dao\Dao;
use Dao\Cart;
use Dao\Table;

class CarretillaAnon extends Table{
    public static function getAllProducts() {
        $selectSql = "SELECT * from productos;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function AgregarProductosalCarrito($codprd, $crrctd, $crrprc){
        $idSession = session_id();
        $insertSQL = "INSERT INTO carretillaanon (anoncod, codprd, crrctd, crrprc, crrfching)
        values(:idSession , :codprd, :crrctd, :crrprc, :now());"; //?, ?, ?
        $params = array(
            "anoncod"=>$idSession,
            "codprd"=>$codprd,
            "crrctd"=>$crrctd,
            "crrprc"=>$crrprc
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function ObtenerIdsProductosEnCarrito(){
        //Iniciar la sesión si no está iniciada

        $idSession = session_id();
        $selectSql = "SELECT codprd FROM `carretillaanon` WHERE `anoncod`=:$idSession";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function ProductoYaEstaEnCarrito($codprd){
        $IdsEnCarrito = self::ObtenerIdsProductosEnCarrito();

        foreach($IdsEnCarrito as $ids){
            if ($ids = $codprd) return true;
        }

        return false;
    }

    public static function QuitarProductodelCarrito($codprd) {
        $idSession = session_id();
        $deleteStr = "DELETE FROM carretillaanon WHERE anoncod=:idSession AND codprd=:codprd;";
        return self::executeNonQuery($deleteStr, array("anoncod" => $idSession, "codprd" => $codprd));
    }


    public static function getById($codprd){
        $selectStr = "SELECT * FROM productos where codprd=:codprd;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("codprd"=>$codprd)
        );
    }

    public static function ObtenerProductosEnCarrito(){
        $idSession = session_id();
        $insertSQL = "SELECT `productos`.`nombreProducto`, `productos`.`descripcionProducto`, `productos`.`precio`
        FROM `productos` 
        INNER JOIN productos.codprd = carretillaanon.codprd
        WHERE `carretillaanon`.`anoncod`=:idSession;"; //?, ?, ?
        $params = array("anoncod"=>$idSession,);
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function updateProduct($nombreProducto, $descripcionProducto, $tipoProducto, $precio, $stockProducto, $estadoProducto, $imagen, $codprd) {
        $updateSql = "UPDATE productos SET nombreProducto=:nombreProducto, descripcionProducto=:descripcionProducto,
            tipoProducto=:tipoProducto, precio=:precio, stockProducto=:stockProducto, estadoProducto=:estadoProducto, imagen=:imagen where codprd=:codprd;"; //?, ?, ?
        $params = array(
            "nombreProducto"=>$nombreProducto,
            "descripcionProducto"=>$descripcionProducto,
            "tipoProducto"=>$tipoProducto,
            "precio"=>$precio,
            "stockProducto"=>$stockProducto,
            "estadoProducto"=>$estadoProducto,
            "imagen"=>$imagen,
            "codprd"=>$codprd
        );
        return self::executeNonQuery($updateSql, $params);
    }

}




?>