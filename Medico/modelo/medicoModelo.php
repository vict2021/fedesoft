<?php
include_once "conexion.php";

class modeloMedico
{

    public static function mdlRegistrarMedico($nombres, $apellidos, $documento, $celular, $correo, $contrasena, $firma, $idEspecialidad)
    {
        $mesaje = "";
        
        $nombreArchivo = $firma['name'];
        $rutaArchivo = "../vistas/imagenes/".$nombreArchivo;
        $extension = substr($nombreArchivo, -4);
        $url = "vistas/imagenes/".$nombreArchivo;

        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == ".jpng" || $extension == ".JPNG")){
            if (move_uploaded_file($firma['tmp_name'],$rutaArchivo)){

                try {
            
                    $objRegistrarMedico = Conexion::conectar()->prepare("INSERT INTO  medico(nombres, apellidos, documento, celular, correo, contrasena, firma, idEspecialidad)VALUES(:nombres, :apellidos, :documento, :celular, :correo, :contrasena, :firmas, :idEspecialidad)");
                    $objRegistrarMedico->bindParam(":nombres", $nombres, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":documento", $documento, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":celular", $celular, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":correo", $correo, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":firmas", $url, PDO::PARAM_STR);
                    $objRegistrarMedico->bindParam(":idEspecialidad", $idEspecialidad, PDO::PARAM_INT);
                    
        
                    if ($objRegistrarMedico->execute()){
                        $mesaje = "ok";
                    }else{
                        $mesaje = "error";
                    }
                    $objRegistrarMedico = null;
        
                } catch (Exception $e) {
                    $mesaje = $e;
                }

            }else{
                $mesaje = "NO fue posible subir la firma";
            }

        }else{
            $mesaje = "El tipo de archivo a subir NO es compatible, solo es posible subir imagenes con extensión jpg,png y jpng";
        }

        return $mesaje;
    }

    public static function mdlListarEspecialidad(){

        $objRespuesta = conexion::conectar()->prepare("SELECT * FROM especialidad");
        $objRespuesta->execute();
        $listarEspecialidad = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarEspecialidad;
    
    }
}