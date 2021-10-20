<?php

require_once "conexion.php";
class loginsModelo{


    public static function mdlCargarTabla($correo,$contraseña){

        $objConsulta=conexion::conectar()->prepare("SELECT * from secretaria WHERE correo='$correo' and contraseña='$contraseña'");
        $objConsulta->execute();
        $lista=$objConsulta->fetchAll();
        $objConsulta=null;
        return $lista;
        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['clave'] = $contraseña;
    }


    
}