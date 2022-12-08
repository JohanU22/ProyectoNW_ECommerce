<?php 
namespace Controllers;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class CarritoA extends PublicController{
    public function calcularSubtotal(){

    }

    public function run(): void
    {
        $viewData = array(
            "mode" => "",
            "anoncod" => "",
            "totales" =>array(),
            "login" =>array(),
            "productosCarretillaAnon"=>array(),
            "idcarrito"=>"",
            "ventaslib"=>array(),
            "total"=>array(),
            "hasErrors" => false,
            "Errors" => array()
        );

        //$viewData["mode"] = $_GET["mode"];
        $viewData["productosCarretillaAnon"] = \Dao\Cart\CarretillaAnon::ObtenerProductosEnCarrito();  
        $totales = \Dao\Cart\CarretillaAnon::ObtenerTotales();
        $counter = 0;
        
        //dd($totales);
        $viewData["totales"] = $totales;
        /*$viewData["totales"]["subtotal"] = intval($totales["subtotal"]);
        $viewData["totales"]["impuesto"] = $totales["impuesto"];
        $viewData["totales"]["total"] = $totales["total"];*/

        //dd($viewData["totales"]);

        /*$subtotal = ($viewData["totales"]["subtotal"]);
        $viewData["impuesto"] = floatval(0.15*($subtotal));
        $viewData["total"] = $subtotal + $viewData["impuesto"];*/
        
        

        Renderer::render("cart/carritoa", $viewData);
       
    }
}


?>