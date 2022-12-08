<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Funcion extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nueva Función",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );

    private $viewData = array(
        "mode"=>"",
        "mode_dsc"=>"",

        "fncod"=> "",
        "fndsc"=>"",
        "fnest"=>"ACT",
        "fnEstACT_selected" => true,
        "fnEstCTR_selected" => false,

        "fntyp"=>"ACT",
        "fnTypACT_selected" => true,
        "fnTypCTR_selected" => false,        

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
        Renderer::render("mnt/funcion", $this->viewData);
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
            if(!isset($_GET["fncod"])){
                $this->errorHandler();
            }
            $fncod = $_GET["fncod"];
            $dbFuncion = \Dao\Mnt\Funciones::getById($fncod);
            \Utilities\ArrUtils::mergeFullArrayTo($dbFuncion, $this->viewData);
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
        /*

        "fncod"=> "",
        "fndsc"=>"",
        "fnest"=>"ACT",
        "fnEstACT_selected" => true,
        "fnEstCTR_selected" => false,

        "fntyp"=>"ACT",
        "fnTypACT_selected" => true,
        "fnTypCTR_selected" => false,  

        $this->viewData["fndsc"] = $_POST["fndsc"];
        $this->viewData["fnest"] = $_POST["fnest"];
        $this->viewData["fncod"] = $_POST["fncod"];
        $this->viewData["fntyp"] = $_POST["fntyp"];
        // Validar las Entradas de Datos
        */
        return true;
    }

    private function on_update_clicked(){
        $this->viewData["fndsc"] = $_POST["fndsc"];
        $this->viewData["fnest"] = $_POST["fnest"];
        $this->viewData["fncod"] = $_POST["fncod"];
        $this->viewData["fntyp"] = $_POST["fntyp"];
        $updateResult = \Dao\Mnt\Funciones::updateFunciones(
            $this->viewData["fndsc"],
            $this->viewData["fnest"],
            $this->viewData["fncod"],
            $this->viewData["fntyp"]            
        );
        if($updateResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Funciones",
                "¡Registro Actualizado Exitosamente!"
            );
        }
    }

    private function on_delete_clicked(){
        $deleteResult = \Dao\Mnt\Funciones::deleteFunciones(
            $this->viewData["fncod"]
        );
        if($deleteResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Funciones",
                "¡Registro Eliminado Exitosamente!"
            );
            
        }
    }
    

    private function on_insert_clicked(){
        $this->viewData["fndsc"] = $_POST["fndsc"];
        $this->viewData["fnest"] = $_POST["fnest"];
        $this->viewData["fncod"] = $_POST["fncod"];
        $this->viewData["fntyp"] = $_POST["fntyp"];
        $insertResult = \Dao\Mnt\Funciones::AgregarFunciones(
            $this->viewData["fndsc"],
            $this->viewData["fnest"],
            $this->viewData["fncod"],
            $this->viewData["fntyp"]           
        );
        if($insertResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Funciones",
                "¡Registro Guardado Exitsamente!"
            );
        }
    }

    private function pre_render(){
        $this->viewData["fnEstACT_selected"] = $this->viewData["fnest"] === "ACT";
        $this->viewData["fnEstCTR_selected"] = $this->viewData["fnest"] === "CTR";

        $this->viewData["fnTypACT_selected"] = $this->viewData["fntyp"] === "ACT";
        $this->viewData["fnTypCTR_selected"] = $this->viewData["fntyp"] === "CTR";

        if($this->viewData["mode"]!=='INS') {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["fncod"],
                $this->viewData["fnest"]
                //$this->viewData["fndsc"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readonly"] = ($this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP" );
        $this->viewData["showSaveBtn"] = ($this->viewData["mode"] != "DSP");
    }

    private function errorHandler(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Funciones",
                "¡Algo Inesperado sucedió!"
            );
    }
}
?>