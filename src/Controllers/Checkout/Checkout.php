<?php

namespace Controllers\Checkout;

use Controllers\PublicController;

class Checkout extends PublicController{
    public function run():void
    {
        $viewData = array(
            "productosCarretillaOfi"=>array()
        );

            $viewData["login"] = $_SESSION["login"];
        

            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "test".(time() - 10000000),
                "http://localhost/proyectoecommerce/index.php?page=checkout_error",
                "http://localhost/proyectoecommerce/index.php?page=checkout_accept"
            );

            $idFactura = \Dao\Cart\Carrito::ObtenerIdFactura($_SESSION["login"]["userId"]);
            //$totales = \Dao\Cart\CarretillaAnon::ObtenerTotales();
            $totalesfact = \Dao\Cart\Carrito::ObtenerTotalesFactura($idFactura);
            $datoscarrito = \Dao\Cart\Carrito::ObtenerProductosEnCarrito($_SESSION["login"]["userId"]);

            foreach($datoscarrito as $carr){
                $PayPalOrder->addItem($carr["nombreProducto"], $carr["descripcionProducto"], $carr["codprd"], $carr["crrprc"], 0.15, $carr["crrctd"], "DIGITAL_GOODS");
            }
            $response = $PayPalOrder->createOrder();
            $_SESSION["orderid"] = $response[1]->result->id;
            \Utilities\Site::redirectTo($response[0]->href);
            die();

    }
}
?>
