<?php

include_once "../modelo/loginSecretariaModelo.php";

class loginSControl{
 
    public $correo;
    public $contraseña;
 
    
    public function crtLoginSecretaria(){
        $objRespuesta= loginsModelo::mdlCargarTabla($this->correo,$this->contraseña);
        echo json_encode($objRespuesta);

    }


}




if(isset($_POST["LScorreo"]) && isset($_POST["LScontraseña"])){
 $objLoginS = new loginSControl();
 $objLoginS->correo=$_POST["LScorreo"];
 $objLoginS->contraseña=$_POST["LScontraseña"];
 $objLoginS->crtLoginSecretaria();

}


