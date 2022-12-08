<?php 

namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class CarretillaAnons extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["carretillaanons"] = \Dao\Cart\CarretillaAnon::getAllCarretillaAnon();
        
        //$idSession = strval(session_id());
        //echo $idSession;
        Renderer::render("mnt/carretillaanons", $viewData);
    }
}



?>
