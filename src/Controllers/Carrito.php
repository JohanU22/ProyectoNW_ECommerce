<?php 
namespace Controllers;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Carrito extends PublicController{
    private function no()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=home",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }

    private function ok()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=carrito&mode=DSP",
            "Operación ejecutada Satisfactoriamente!"
            
        );
       
    }
    private function AgregarFactura($usercod, $subtotal, $impuesto, $total){
        $insertResult = \Dao\Cart\Carrito::AgregarFactura($usercod, $subtotal, $impuesto, $total);
    }
    private function AgregarDetalleFactura($idfactura, $codprd, $nombreProducto, $crrctd, $crrprc){
        $insertResult = \Dao\Cart\Carrito::AgregarDetalleFactura($idfactura, $codprd, $nombreProducto, $crrctd, $crrprc);
    }
    public function run(): void
    {
        if(!isset($_SESSION["login"])){
            $viewData1="nologin";
        } else {
            $viewData1="login";
        }

        if($viewData1=="nologin"){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=sec_login",
                "Necesita iniciar sesion para proceder a pagar!"
            );
        } 
        else 
        {
            $viewData = array(
                "mode" => "",
                "anoncod" => "",
                "totales" =>array(),
                "totalesfact"=>array(),
                "login" =>array(),
                "productosCarretillaAnon"=>array(),
                "productosCarretillaOfi"=>array(),
                "idcarrito"=>"",
                "bandera"=>0,
                "ventaslib"=>array(),
                "total"=>array(),
                "hasErrors" => false,
                "Errors" => array()
            );
            $totales = \Dao\Cart\CarretillaAnon::ObtenerTotales();
            $viewData["totales"] = $totales;
            //dd($viewData["totales"]);
            $this->viewData["mode"] = $_GET["mode"];

            //$this->viewData["login"] = $_GET["userid"];
            //dd($_SESSION["login"]);



            //Se asignan los productos a la carretila oficial de compras y se borran los registros en la carretilla Anónima
            $viewData["productosCarretillaAnon"] = \Dao\Cart\CarretillaAnon::getAllCarretillaAnon();
            if(sizeof($viewData["productosCarretillaAnon"]) > 0){
                foreach($viewData["productosCarretillaAnon"] as $prod){
                    \Dao\Cart\CarretillaAnon::AgregarProductosalCarritoOficial($prod["codprd"], $prod["crrctd"], $prod["crrprc"], $prod["crrfching"], $_SESSION["login"]["userId"]);
                }
                \Dao\Cart\CarretillaAnon::deleteAllCarretillaAnon();
            }
            
            /*$this->AgregarFactura($_SESSION["login"]["userId"], $viewData["totales"][0]["subtotal"], $viewData["totales"][0]["impuesto"], $viewData["totales"][0]["total"]);
                    $idFactura = \Dao\Cart\Carrito::ObtenerIdFactura($_SESSION["login"]["userId"]);
                    $this->AgregarDetalleFactura($idFactura, );
                    \Dao\Cart\CarretillaAnon::deleteAllCarretillaAnon();*/

            $viewData["productosCarretillaOfi"] = \Dao\Cart\Carrito::ObtenerProductosEnCarrito($_SESSION["login"]["userId"]);
            if (sizeof($viewData["productosCarretillaOfi"]) > 0) {
                $this->AgregarFactura($_SESSION["login"]["userId"], $viewData["totales"][0]["subtotal"], $viewData["totales"][0]["impuesto"], $viewData["totales"][0]["total"]);
                $idFactura = \Dao\Cart\Carrito::ObtenerIdFactura($_SESSION["login"]["userId"]);
                foreach($viewData["productosCarretillaOfi"] as $pd){
                    $this->AgregarDetalleFactura($idFactura["idfactura"], $pd["codprd"], $pd["nombreProducto"], $pd["crrctd"], $pd["crrprc"]);
                }
                //Carrito Oficial Obtener Totales
                $idFactura = \Dao\Cart\Carrito::ObtenerIdFactura($_SESSION["login"]["userId"]);
                $totalesfact = \Dao\Cart\Carrito::ObtenerTotalesFactura($idFactura);
                $viewData["totalesfact"] = $totalesfact;
            }

    
        }

            
        Renderer::render("cart/carrito", $viewData);    
    }


    
}




?>