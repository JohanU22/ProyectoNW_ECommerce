<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Producto extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Producto",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );

    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "codprd" => -1,
        "nombreProducto" => "",
        "descripcionProducto" => "",
        "tipoProducto" => "ELC",
        "elec_selected" => true,
        "cam_selected" => false,
        "precio" => 0,
        "stockProducto" => 0,
        "imagen" => "",
        "estadoProducto" => "ACT",
        "act_selected" => true,
        "ina_selected" => false,
        "readOnly" => false,
        "showSaveBtn" => true
    );
    public function run():void
    {
        $this->onForm_loaded();
        if($this->isPostBack()){ // isset($_POST["btnGuardar"])
           $this->process_postback();
        }
        $this->pre_render();
        Renderer::render("mnt/producto", $this->viewData);
    }

    private function onForm_loaded()
    {
        if(!isset($_GET["mode"])){
            $this->errorHandler();
        }
        $this->viewData["mode"] = $_GET["mode"];
        if(!isset($this->arrModeDsc[$this->viewData["mode"]])){
            $this->errorHandler();
        }
        if($this->viewData["mode"]!=="INS"){
            if(!isset($_GET["codprd"])){
                $this->errorHandler();
            }
            $codprd = intval($_GET["codprd"]);
            $dbProducto = \Dao\Mnt\Productos::getById($codprd);
            \Utilities\ArrUtils::mergeFullArrayTo($dbProducto, $this->viewData);
        }
    }

    private function process_postback(){
        if ($this->validate_inputs()){
            switch($this->viewData["mode"]){
                case "INS":
                    $this->on_insert_clicked();
                    break;
                case "UPD":
                    $this->on_update_clicked();
                    break;
                case "DEL":
                    $this->on_delete_clicked();
                    break;
            }
        }
    }

    private function validate_inputs(){
        $this->viewData["nombreProducto"] = $_POST["nombreProducto"];
        $this->viewData["descripcionProducto"] = $_POST["descripcionProducto"];
        $this->viewData["tipoProducto"] = $_POST["tipoProducto"];
        $this->viewData["precio"] = $_POST["precio"];
        $this->viewData["stockProducto"] = $_POST["stockProducto"];
        $this->viewData["estadoProducto"] = $_POST["estadoProducto"];
        $this->viewData["imagen"] = $_POST["imagen"];
        // Validar las Entradas de Datos
        return true;
    }

    private function on_update_clicked(){
        $updateResult = \Dao\Mnt\Productos::updateProduct(
            $this->viewData["nombreProducto"],
            $this->viewData["descripcionProducto"],
            $this->viewData["tipoProducto"],
            $this->viewData["precio"],
            $this->viewData["stockProducto"],
            $this->viewData["estadoProducto"],
            $this->viewData["imagen"],
            $this->viewData["codprd"]
        );
        if($updateResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Productos",
                "¡Registro Actualizado Exitosamente!"
            );
        }
    }
    private function on_delete_clicked(){
        $deleteResult = \Dao\Mnt\Productos::deleteProducct(
            $this->viewData["codprd"]
        );
        if($deleteResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Productos",
                "¡Registro Eliminado Exitosamente!"
            );
        }
    }
    private function on_insert_clicked(){
        $insertResult = \Dao\Mnt\Productos::AgregarProducto(
            $this->viewData["nombreProducto"],
            $this->viewData["descripcionProducto"],
            $this->viewData["tipoProducto"],
            $this->viewData["precio"],
            $this->viewData["stockProducto"],
            $this->viewData["estadoProducto"],
            $this->viewData["imagen"]
        );
        if($insertResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Productos",
                "¡Registro Guardado Exitsamente!"
            );
        }
    }

    private function pre_render(){
        $this->viewData["act_selected"] = $this->viewData["estadoProducto"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["estadoProducto"] === "INA";
        $this->viewData["elec_selected"] = $this->viewData["estadoProducto"] === "ELC";
        $this->viewData["cam_selected"] = $this->viewData["estadoProducto"] === "CAM";
        if($this->viewData["mode"]!=='INS') {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["codprd"],
                $this->viewData["nombreProducto"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readonly"] = ($this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP" );
        $this->viewData["showSaveBtn"] = ($this->viewData["mode"] != "DSP");
    }

    private function errorHandler(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Productos",
                "¡Algo Inesperado sucedió!"
            );
    }
}
?>