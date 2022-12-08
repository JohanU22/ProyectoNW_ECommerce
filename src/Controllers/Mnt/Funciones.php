<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Funciones extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["funciones"] = \Dao\Mnt\Funciones::getAllFunciones();

        Renderer::render("mnt/funciones", $viewData);
    }
}
?>