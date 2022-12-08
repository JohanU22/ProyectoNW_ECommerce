<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Rol extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Rol",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );

    private $viewData = array(
        "mode"=>"",
        "mode_dsc"=>"",
        "rolescod"=> "",
        "rolesdsc"=>"",
        "rolesest"=>"ACT",
        "rolACT_selected" => true,
        "rolCTR_selected" => false,

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
        Renderer::render("mnt/rol", $this->viewData);
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
            if(!isset($_GET["rolescod"])){
                $this->errorHandler();
            }
            $rolescod = $_GET["rolescod"];
            $dbRol = \Dao\Mnt\Roles::getById($rolescod);
            \Utilities\ArrUtils::mergeFullArrayTo($dbRol, $this->viewData);
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
        $this->viewData["rolesdsc"] = $_POST["rolesdsc"];
        $this->viewData["rolesest"] = $_POST["rolesest"];
        // Validar las Entradas de Datos
        */
        return true;
    }

    private function on_update_clicked(){
        $this->viewData["rolesdsc"] = $_POST["rolesdsc"];
        $this->viewData["rolesest"] = $_POST["rolesest"];
        $this->viewData["rolescod"] = $_POST["rolescod"];
        $updateResult = \Dao\Mnt\Roles::updateRoles(
            $this->viewData["rolesdsc"],
            $this->viewData["rolesest"],
            $this->viewData["rolescod"]
        );
        if($updateResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Roles",
                "¡Registro Actualizado Exitosamente!"
            );
        }
    }

    private function on_delete_clicked(){
        //$this->viewData["rolescod"] = $_POST["rolescod"];
        $deleteResult = \Dao\Mnt\Roles::deleteRoles(
            $this->viewData["rolescod"]
        );
        if($deleteResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Roles",
                "¡Registro Eliminado Exitosamente!"
            );
            
        }
    }
    

    private function on_insert_clicked(){
        $this->viewData["rolesdsc"] = $_POST["rolesdsc"];
        $this->viewData["rolesest"] = $_POST["rolesest"];
        $this->viewData["rolescod"] = $_POST["rolescod"];
        $insertResult = \Dao\Mnt\Roles::AgregarRol(
            $this->viewData["rolesdsc"],
            $this->viewData["rolesest"],
            $this->viewData["rolescod"]
        );
        if($insertResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Roles",
                "¡Registro Guardado Exitsamente!"
            );
        }
    }

    private function pre_render(){
        $this->viewData["rolACT_selected"] = $this->viewData["rolesest"] === "ACT";
        $this->viewData["rolCTR_selected"] = $this->viewData["rolesest"] === "CTR";

        if($this->viewData["mode"]!=='INS') {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["rolescod"],
                $this->viewData["rolesest"]
                //$this->viewData["rolesdsc"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readonly"] = ($this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP" );
        $this->viewData["showSaveBtn"] = ($this->viewData["mode"] != "DSP");
    }

    private function errorHandler(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Roles",
                "¡Algo Inesperado sucedió!"
            );
    }
}
?>
