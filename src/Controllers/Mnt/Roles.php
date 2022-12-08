<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Roles extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["roles"] = \Dao\Mnt\Roles::getAllRoles();

        Renderer::render("mnt/roles", $viewData);
    }
}
?>