$(document).ready(function() {

    // Funcion para logear y entrar para la secretaria
    $("#btnLoginSecretaria").click(function() {
        var correo = $("#txtCorreo").val();
        var contraseña = $("#txtcontraseña").val();

        var objData = new FormData();
        objData.append("LScorreo", correo);
        objData.append("LScontraseña", contraseña);


        $.ajax({
            url: "control/controlLoginSecretaria.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta != null) {
                    swal({
                        title: "BIENVENIDO!",
                        text: "",
                        icon: "success",
                        button: "Aceptar",
                    });
                } 

            }
        })

    })

})