<?php

namespace Controllers;

use Controllers\PublicController;
use Views\Renderer;

class Home extends PublicController
{
    public function run(): void
    {
        $viewData = array(
            "productos" => array(),
            "categorias" => array(),
            "login" =>array(),
            "userName" => "", 
            "hasProductos" => false
        );
        $viewData["productos"] = \Dao\Cart\Catalogo::getProductosDisponibles();
        //$viewData["categorias"] = \Dao\Mnt\Categorias::obtenerCategorias("alf");
        
        /*if(isset($_SESSION["login"])){
            $viewData["login"] = $_SESSION["login"];
            $viewData["userName"] = $viewData["login"]["userName"];
           
        }else {
            $_SESSION["newsession"]='no login';
            $viewData["login"] = $_SESSION["newsession"];
            $viewData["userName"] = 'Bienvenido'; 
        }*/
        //unset($_SESSION["login"]);

        

        if (sizeof($viewData["productos"]) > 0) $viewData["hasProductos"] = true;
     
        Renderer::render("home/home", $viewData);
    }

    
}
