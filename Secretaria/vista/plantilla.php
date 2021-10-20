<?php

include_once "vista/modulos/cabecera.php";

if (isset($_GET["ruta"])){

    if ($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "FormuProdu" ||
        $_GET["ruta"] == "ejercicio3" ||
        $_GET["ruta"] == "Inventario" ||
        $_GET["ruta"] == "index" ||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "salir"){

            include_once "vista/modulos/".$_GET["ruta"].".php";

    }else{

    }
}




include_once "vista/modulos/pie.php";