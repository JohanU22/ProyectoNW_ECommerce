<?php 
namespace Dao\Mnt;

use Dao\Table;

class Funciones extends Table{
    public static function AgregarFunciones($fndsc, $fnest, $fncod, $fntyp){
        $insertSQL = "INSERT INTO funciones (fncod, fndsc, fnest, fntyp)
        values(:fncod, :fndsc, :fnest, :fntyp);"; //?, ?, ?
        $params = array(
            "fncod"=>$fncod,            
            "fndsc"=>$fndsc,
            "fnest"=>$fnest,
            "fntyp"=>$fntyp
        );
        return self::executeNonQuery($insertSQL, $params);
    }

    public static function getAllFunciones () {
        $selectSql = "SELECT * from funciones;";
        return self::obtenerRegistros($selectSql, array());
    }

    public static function getById($fncod){
        $selectStr = "SELECT * FROM funciones where fncod =:fncod;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("fncod"=>$fncod)
        );
    }

    public static function updateFunciones($fndsc, $fnest, $fncod, $fntyp) {
        $updateSql = "UPDATE funciones SET fndsc = :fndsc, fnest = :fnest, fntyp = :fntyp where fncod = :fncod;"; //?, ?, ?
        $params = array(
            "fndsc"=>$fndsc,
            "fnest"=>$fnest,
            "fncod"=>$fncod,
            "fntyp"=>$fntyp
        );
        return self::executeNonQuery($updateSql, $params);
    }

    public static function deleteFunciones($fncod) {
        $deleteStr = "DELETE FROM funciones WHERE fncod=:fncod;";
        return self::executeNonQuery($deleteStr, array("fncod" => $fncod));
    }
}
?>