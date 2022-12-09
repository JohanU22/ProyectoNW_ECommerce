<?php 

namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Productos extends PublicController{
    

    public function run(): void
    {
        $viewData = array();
        $viewData["facturas"] = \Dao\Mnt\Facturas::getAllFacturas();

        $viewData["facturaspcliente"] = array();

        Renderer::render("mnt/facturas", $viewData);
    }
}







?>
