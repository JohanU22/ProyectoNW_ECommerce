<?php

namespace Utilities;

class Nav {

    public static function setNavContext(){
        $tmpNAVIGATION = array();
        $userID = \Utilities\Security::getUserId();
        if (\Utilities\Security::isAuthorized($userID, "MntUsuarios")) {
            $tmpNAVIGATION[] = array(
                "nav_url1" => "index.php?page=mnt_usuarios",
                "nav_label1" => "Usuarios",
                "nav_url2" => "index.php?page=mnt_roles",
                "nav_label2" => "Roles",
                "nav_url3" => "index.php?page=mnt_funciones",
                "nav_label3" => "Funciones",
                "nav_url4" => "index.php?page=mnt_productos",
                "nav_label4" => "Productos",
            );
        }
       
        \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
    }


    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}
?>
