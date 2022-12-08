<?php

namespace Controllers;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Table;


class Home extends PublicController
{

    public function run(): void
    {
        $viewData = array(
            "productos" => array(),
            "categorias" => array(),
            "login" =>array(),
            "userName" => "",
            "ProductosEnCarrito" => array(),
            "IdsDeProductos" => array(), 
            "hasProductos" => false,  
            "ProductoEstaEnCarrito" => false
        );

        

        $viewData["productos"] = \Dao\Cart\Catalogo::getProductosDisponibles();
        $viewData["ProductosEnCarrito"] = \Dao\Cart\CarretillaAnon::ObtenerProductosEnCarrito();
        $producto = $viewData["productos"];
        
        $carrAsoc = array();
        $carretilla = \Dao\Cart\CarretillaAnon::getAllCarretillaAnon();
        

        if(isset($_SESSION["login"])){
            $viewData["login"] = $_SESSION["login"];
            $viewData["userName"] = $viewData["login"]["userName"];
           
        }else {
            $_SESSION["newsession"]='no login';
            $viewData["login"] = $_SESSION["newsession"];
            $viewData["userName"] = 'Bienvenido'; 
        }
        //unset($_SESSION["login"]);

        //if (sizeof($viewData["ProductosEnCarrito"]) > 0) $viewData["hasProductosEnCarrito"] = true;

        if (sizeof($viewData["productos"]) > 0) $viewData["hasProductos"] = true;
        Renderer::render("home/home", $viewData);
    }

    
}
