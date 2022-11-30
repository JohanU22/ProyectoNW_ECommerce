<?php 

namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Productos extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["productos"] = \Dao\Mnt\Productos::getAllProducts();

        Renderer::render("mnt/productos", $viewData);
    }
}











?>
