<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Usuario extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Usuario",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );


    private $viewData = array(
        "mode"=>"",
        "mode_dsc"=>"",
        "usercod"=> -1,
        "useremail"=> "",
        "username"=>"",
        "userpswd"=> "",
        "userfching"=>"",
        "userpswdest"=>"ACT",
        "usPswACT_selected" => true,
        "usPswCTR_selected" => false,

        "userpswdexp"=>"",
        "userest"=>"ACT",
        "usACT_selected" => true,
        "usCTR_selected" => false,

        "useractcod"=>"",
        "userpswdchg"=>"",
        "usertipo"=>"ACT",
        "usTipoACT_selected" => true,
        "usTipoCTR_selected" => false,

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
        Renderer::render("mnt/usuario", $this->viewData);
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
            if(!isset($_GET["usercod"])){
                $this->errorHandler();
            }
            $usercod = intval($_GET["usercod"]);
            $dbUsuario = \Dao\Mnt\Usuarios::getById($usercod);
            \Utilities\ArrUtils::mergeFullArrayTo($dbUsuario, $this->viewData);
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
        $this->viewData["useremail"] = $_POST["useremail"];
        $this->viewData["username"] = $_POST["username"];
        $this->viewData["userpswd"] = password_hash($_POST["userpswd"], PASSWORD_DEFAULT); 
        $this->viewData["userfching"] = $_POST["userfching"];
        $this->viewData["userpswdest"] = $_POST["userpswdest"];
        $this->viewData["userpswdexp"] = $_POST["userpswdexp"];
        $this->viewData["userest"] = $_POST["userest"];
        $this->viewData["useractcod"] = $_POST["useractcod"];
        $this->viewData["userpswdchg"] = $_POST["userpswdchg"];
        $this->viewData["usertipo"] = $_POST["usertipo"];
        // Validar las Entradas de Datos
        */
        return true;
    }

    private function on_update_clicked(){
        $this->viewData["useremail"] = $_POST["useremail"];
        $this->viewData["username"] = $_POST["username"];
        $this->viewData["userpswd"] = password_hash($_POST["userpswd"], PASSWORD_DEFAULT); 
        $this->viewData["userfching"] = date('y-m-d h:i:s'); //Obtener día actual
        $this->viewData["userpswdest"] = $_POST["userpswdest"];
        $this->viewData["userpswdexp"] = date('y-m-d h:i:s');//Obtener día actual
        $this->viewData["userest"] = $_POST["userest"];
        $this->viewData["useractcod"] = $_POST["useractcod"];
        $this->viewData["userpswdchg"] = date('y-m-d h:i:s');//Obtener día actual
        $this->viewData["usertipo"] = $_POST["usertipo"];
        $updateResult = \Dao\Mnt\Usuarios::updateUsuarios(
            $this->viewData["useremail"],
            $this->viewData["username"],
            $this->viewData["userpswd"],
            $this->viewData["userfching"],
            $this->viewData["userpswdest"],
            $this->viewData["userpswdexp"],
            $this->viewData["userest"],
            $this->viewData["useractcod"],
            $this->viewData["userpswdchg"],
            $this->viewData["usertipo"],
            $this->viewData["usercod"]
        );
        if($updateResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Usuarios",
                "¡Registro Actualizado Exitosamente!"
            );
        }
    }

    private function on_delete_clicked(){
        //$this->viewData["usercod"] = $_POST["usercod"];
        $deleteResult = \Dao\Mnt\Usuarios::deleteUsuarios(
            $this->viewData["usercod"]
        );
        if($deleteResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Usuarios",
                "¡Registro Eliminado Exitosamente!"
            );
            
        }
    }
    

    private function on_insert_clicked(){
        $this->viewData["useremail"] = $_POST["useremail"];
        $this->viewData["username"] = $_POST["username"];
        $this->viewData["userpswd"] = password_hash($_POST["userpswd"], PASSWORD_DEFAULT); 
        $this->viewData["userfching"] = date('y-m-d h:i:s'); //Obtener día actual
        $this->viewData["userpswdest"] = $_POST["userpswdest"];
        $this->viewData["userpswdexp"] = date('y-m-d h:i:s');//Obtener día actual
        $this->viewData["userest"] = $_POST["userest"];
        $this->viewData["useractcod"] = $_POST["useractcod"];
        $this->viewData["userpswdchg"] = date('y-m-d h:i:s');//Obtener día actual
        $this->viewData["usertipo"] = $_POST["usertipo"];
        $insertResult = \Dao\Mnt\Usuarios::AgregarUsuario(
            $this->viewData["useremail"],
            $this->viewData["username"],
            $this->viewData["userpswd"],
            $this->viewData["userfching"],
            $this->viewData["userpswdest"],
            $this->viewData["userpswdexp"],
            $this->viewData["userest"],
            $this->viewData["useractcod"],
            $this->viewData["userpswdchg"],
            $this->viewData["usertipo"]
        );
        if($insertResult){
             \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Usuarios",
                "¡Registro Guardado Exitsamente!"
            );
        }
    }

    private function pre_render(){
        $this->viewData["usPswACT_selected"] = $this->viewData["userpswdest"] === "ACT";
        $this->viewData["usPswCTR_selected"] = $this->viewData["userpswdest"] === "CTR";
        $this->viewData["usACT_selected"] = $this->viewData["userest"] === "ACT";
        $this->viewData["usCTR_selected"] = $this->viewData["userest"] === "CTR";
        $this->viewData["usTipoACT_selected"] = $this->viewData["usertipo"] === "ACT";
        $this->viewData["usTipoCTR_selected"] = $this->viewData["usertipo"] === "CTR";

        if($this->viewData["mode"]!=='INS') {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["usercod"],
                $this->viewData["username"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readonly"] = ($this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP" );
        $this->viewData["showSaveBtn"] = ($this->viewData["mode"] != "DSP");
    }

    private function errorHandler(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Usuarios",
                "¡Algo Inesperado sucedió!"
            );
    }
}
?>
