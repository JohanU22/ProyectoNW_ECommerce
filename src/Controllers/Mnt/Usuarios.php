<?php 

namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Usuarios extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["usuarios"] = \Dao\Mnt\Usuarios::getAllUsuarios();

        Renderer::render("mnt/usuarios", $viewData);
    }
}
?>