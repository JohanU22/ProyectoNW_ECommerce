<?php

/**
 * PHP Version 7.2
 *
 * @category Private
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers\Admin;

/**
 * Página Principal de Administradores
 *
 * @category Public
 * @package  Controllers/Admin
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Admin extends \Controllers\PrivateController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // $userInRole = \Utilities\Security::isInRol(
        //     \Utilities\Security::getUserId(),
        //     "ADMIN"
        // );
        parent::__construct();
    }
    /** 
     * Ejecuta el controlador
     */
    public function run() :void
    {
        $viewData = array(
            "productos" => array(),
            "login" =>array(),
            "userName" => "", 
            "hasProductos" => false
        );
        $viewData["productos"] = \Dao\Cart\Catalogo::getProductosDisponibles();

        if(isset($_SESSION["login"])){
            $viewData["login"] = $_SESSION["login"];
            $viewData["userName"] = $viewData["login"]["userName"];
        }else {
            $_SESSION["newsession"]='Hola';
            $viewData["login"] = $_SESSION["newsession"];
            $viewData["userName"] = 'Libreria';
        }


        if (sizeof($viewData["productos"]) > 0) $viewData["hasProductos"] = true;
        \Views\Renderer::render("home/home", $viewData);
    }
}
?>
