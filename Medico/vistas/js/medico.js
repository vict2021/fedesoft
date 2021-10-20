$(document).ready(function() {
    cargarEspecialidad();
    $("#btnRegistrar").click(function() {
        //alert("holaaaa");
        var nombres = $("#txtNombres").val();
        var apellidos = $("#txtApellidos").val();
        var documento = $("#txtDocumento").val();
        var celular = $("#txtCelular").val();
        var correo = $("#txtCorreo").val();
        var contraseña = $("#txtContraseña").val();
        var firma = document.getElementById("txtFirma").files[0];
        var idEspecialidad = $("#selectEspecialidad").val();
        
        
        var objData = new FormData();
        objData.append("nombres", nombres);
        objData.append("apellidos", apellidos);
        objData.append("documento", documento);
        objData.append("celular", celular);
        objData.append("correo", correo);
        objData.append("contraseña", contraseña);
        objData.append("firma", firma);
        objData.append("idEspecialidad", idEspecialidad);
        
        
        $.ajax({
            url: "control/medicoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta == "ok") {
                    swal({
                        title: "Buen Trabajo!",
                        text: "Medico registrado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }
        })

    })


    //funcion de limpiar ventana modal de registro de medicos
    $("#btnRegistrar").click(function() {
        
        $("#txtNombres").val("");
        $("#txtApellidos").val("");
        $("#txtDocumento").val("");
        $("#txtCelular").val("");
        $("#txtCorreo").val("");
        $("#txtContraseña").val("");
        $("#txtFirma").val("");
        $("#selectEspecialidad").val("");
    })

    cargarEspecialidad();
    function cargarEspecialidad() {
        var cargarEspecialidad = "ok";
        var objcargarEspecialidad = new FormData();
        objcargarEspecialidad.append("cargarEspecialidad", cargarEspecialidad);
        $.ajax({
            url: "control/medicoControl.php",
            type: "post",
            dataType: "json",
            data: objcargarEspecialidad,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $("#selectEspecialidad").html("");
                respuesta.forEach(cargarSelectEspecialidad);

                function cargarSelectEspecialidad(item, index) {
                    $("#selectEspecialidad").append('<option value="' + item.idEspecialidad + '">' + item.tipoEspecialidad + '</option>');
                    
                }
                
            }
        })
    }
})