<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Iniciar sesión</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });

          function dos(){
            //alert("valor");
            var email_r = document.getElementById("email").value;
            var password_r = document.getElementById("password").value;

            //alert(email_r);
            //alert(password_r);
            
            var request = $.ajax({
                url: '../Controlador/controladorLogueado.php',
                method: "POST",
                data:{usu:email_r, pas:password_r},
                dataType: "" 
            });
            /** */
            request.done(function(respuesta){
                alert(respuesta);
                //alert("¡Registro eliminado con exito!");
                document.location.href = 'formulario.php';

            });
            request.fail(function (jqXHR, textStatus){
            alert("hubo un error");
            });
            
          }
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-white">
   
