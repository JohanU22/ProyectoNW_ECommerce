<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class CarretillaAnon extends PublicController{

    private $arrModeDsc = array(
        "INS" => "Agregar nuevo articulo",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );

    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "anoncod" => "",
        "codprd" => 0,
        "crrctd" => 0,
        "crrprc" => 0,
        "crrfching" => "2022-07-02 17:35:00",
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
        Renderer::render("mnt/carretillaanon", $this->viewData);
    }

    private function onForm_loaded()
    {   
        $idSession = strval(session_id());
        $this->viewData["anoncod"] = $idSession;
        if(!isset($_GET["mode"])){
            $this->errorHandler();
        }
        $this->viewData["mode"] = $_GET["mode"];
        if(!isset($this->arrModeDsc[$this->viewData["mode"]])){
            $this->errorHandler();
        }
        if($this->viewData["mode"]!=="INS"){
            $dbAnon = \Dao\Cart\CarretillaAnon::getById($idSession);
            \Utilities\ArrUtils::mergeFullArrayTo($dbAnon, $this->viewData);
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
        //$this->viewData["anoncod"] = $_POST["anoncod"];
        //$this->viewData["codprd"] = $_POST["codprd"];
        //$this->viewData["crrctd"] = $_POST["crrctd"];
        //$this->viewData["crrprc"] = $_POST["crrprc"];
        //$this->viewData["crrfching"] = $_POST["crrfching"];
        // Validar las Entradas de Datos
        return true;
    }

    
    private function on_update_clicked(){
        $this->viewData["codprd"] = $_POST["codprd"];
        $this->viewData["crrctd"] = $_POST["crrctd"];
        $this->viewData["crrprc"] = $_POST["crrprc"];
        $updateResult = \Dao\Cart\CarretillaAnon::ActualizarCarrito(
            $this->viewData["codprd"],
            $this->viewData["crrctd"],
            $this->viewData["crrprc"]
        );
        if($updateResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Carretillaanons",
                "¡Registro Actualizado Exitosamente!"
            );
        }
    }

    private function on_delete_clicked(){
        $this->viewData["codprd"] = $_POST["codprd"];
        $deleteResult = \Dao\Cart\CarretillaAnon::QuitarProductodelCarrito(
            $this->viewData["codprd"]
        );
        if($deleteResult){
             \Utilities\Site::redirectToWithMsg(
                $_SERVER['HTTP_REFERER'],
                "¡Registro Eliminado Exitosamente!"
            );
        }
    }
    private function on_insert_clicked(){
        $this->viewData["codprd"] = $_POST["codprd"];
        $this->viewData["crrctd"] = $_POST["crrctd"];
        $this->viewData["crrprc"] = $_POST["crrprc"];
        $insertResult = \Dao\Cart\CarretillaAnon::AgregarProductosalCarrito(
            $this->viewData["codprd"],
            $this->viewData["crrctd"],
            $this->viewData["crrprc"]
        );
        if($insertResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=home",
                "¡Registro Guardado Exitsamente!"
            );
        }
    }

    private function pre_render(){
        if($this->viewData["mode"]!=='INS') {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["anoncod"],
                $this->viewData["codprd"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readonly"] = ($this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP" );
        $this->viewData["showSaveBtn"] = ($this->viewData["mode"] != "DSP");
    }

    private function errorHandler(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Carretillaanons",
                "¡Algo Inesperado sucedió!"
            );
    }
}
?>