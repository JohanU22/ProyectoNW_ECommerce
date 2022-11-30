<?php 
namespace Dao\Mnt;

use Dao\Table;

class Productos extends Table{
    public static function AgregarProducto($nombreProducto, $descripcionProducto, $tipoProducto, $precio, $stockProducto, $estadoProducto, $imagen){
        $insertSQL = "INSERT INTO productos (nombreProducto, descripcionProducto,
            tipoProducto, precio, stockProducto, estadoProducto, imagen)
        values(:nombreProducto, :descripcionProducto, :tipoProducto, :precio, :stockProducto, :estadoProducto, :imagen);"; //?, ?, ?
        $params = array(
            "nombreProducto"=>$nombreProducto,
            "descripcionProducto"=>$descripcionProducto,
            "tipoProducto"=>$tipoProducto,
            "precio"=>$precio,
            "stockProducto"=>$stockProducto,
            "estadoProducto"=>$estadoProducto,
            "imagen"=>$imagen
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function getAllProducts () {
        $selectSql = "SELECT * from productos;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function getById($codprd){
        $selectStr = "SELECT * FROM productos where codprd=:codprd;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("codprd"=>$codprd)
        );
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

    public static function deleteProducct($codprd) {
        $deleteStr = "DELETE FROM productos WHERE codprd=:codprd;";
        return self::executeNonQuery($deleteStr, array("codprd" => $codprd));
    }
}




?>