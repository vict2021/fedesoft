<?php

include_once "../modelo/medicoModelo.php";

class controlMedico{
    public $nombres;
    public $apellidos;
    public $documento;
    public $celular;
    public $correo;
    public $contraseña;
    public $firma;
    public $idEspecialidad;


    public function ctrRegistrarMedico(){
        $objRespuesta = modeloMedico::mdlRegistrarMedico($this->nombres,$this->apellidos,$this->documento,$this->celular,$this->correo,$this->contraseña,$this->firma,$this->idEspecialidad);
        echo json_encode($objRespuesta);
    }

    public function ctrListarEspecialidad(){
        $objRespuesta = modeloMedico::mdlListarEspecialidad();
        echo json_encode($objRespuesta);
    }

}
if (isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["documento"]) && isset($_POST["celular"]) && isset($_POST["correo"]) && isset($_POST["contraseña"]) && isset($_POST["idEspecialidad"])){
    $objUsuarios = new controlMedico();
    $objUsuarios->nombres = $_POST["nombres"];
    $objUsuarios->apellidos = $_POST["apellidos"];
    $objUsuarios->documento = $_POST["documento"];
    $objUsuarios->celular = $_POST["celular"];
    $objUsuarios->correo = $_POST["correo"];
    $objUsuarios->contraseña = $_POST["contraseña"];
    $objUsuarios->firma = $_FILES["firma"];
    $objUsuarios->idEspecialidad = $_POST["idEspecialidad"];
    $objUsuarios->ctrRegistrarMedico();
}

if (isset($_POST["cargarEspecialidad"]) == "cargarEspecialidad"){
    $objListarEspecialidad = new controlMedico();
    $objListarEspecialidad->ctrListarEspecialidad();
}
