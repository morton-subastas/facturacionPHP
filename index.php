<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Desarrollo Interno MortonSubastas</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts test-->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });


        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.css">
        <link rel="stylesheet" href="vista/css/style.css">
     </head>
    <?php

    //echo "comienza<br>";
    /*
    $files = "files";
    deleteDirectory($files);

    function deleteDirectory($dir) {
      if(!$dh = @opendir($dir)) return;
      while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            //echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
            if (!@unlink($dir.'/'.$current))
                deleteDirectory($dir.'/'.$current);
        }
      }
      closedir($dh);
      echo 'Se ha borrado el directorio '.$dir.'<br/>';
      @rmdir($dir);
    }
*/

    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------
    error_reporting(1);
    if (($_POST['email'] != '') && ($_POST['password'] != '')) {
        $em = $_POST['email'] ;
        $pas = $_POST['password'] ;
        //echo "<br>enviar:<br>".$em."-".$pas;
        require_once ("Controlador/controladorLogueado.php");
        //echo "<br>VISTA: envia controlador";
        list($res_L, $status) = ControladorLogueado::searchUser($em, $pas);
        //echo "<br>recibes-".$res_L."-".$status;

        if (($res_L == 1) && ($status == 'ACTIVO') ){
          //header ('Location: http://desarrollomorton.com/admin/facturacion/vista/facturacion');
          ?>
          <!--
          <script type="text/javascript">
              window.location.href= "Vista/facturacion.php";
          </script>
          -->
          <?php
        }else{
          //echo "status".$status;

          ?>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <?php
          if ($status == 'INACTIVO'){
            ?>
            <script>

                Swal.fire({
                    icon: 'error',
                    title: '¡El usario esta dado de baja!'
                });
                </script>
            <?php
          }else{
            echo "."; //error email y contraseña";
          ?>
          <script>

              Swal.fire({
                  icon: 'error',
                  title: '¡Email y/o Contraseña incorrecto!'
              });
              </script>
          <?php
          }
        }
        //echo "res".$res_L;
    }else{
        $boton = $_POST['btnPromt'];
        //echo "rechaza-".$boton."-";
    }
     ?>

    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-4 col-md-4 my-auto no-padding"></div>
                <div class="col-xl-4 col-lg-4 col-md-4 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">
                      <h1><strong style="color:#004D43">MortonSubastas</strong> <strong style="color:#333">Desarrollo</strong></h1><br><br>
                        <div class="logo-centered">
                            <a href="">
                                <img src="assets/img/logo.png" alt="logo">
                            </a>
                        </div>
                        <!-- <h3>Iniciar sesión</h3> -->
                        <form action='' method='POST'>
                        <!--<form action="php/log_check.php" method="POST">-->

                            <div class="group material-input">
							    						<input type="email" name="email" id= "email" placeholder="" required>
							    						<span class="highlight"></span>
							    						<span class="bar"></span>
							    						<label>Email</label>
                            </div>
                            <div class="group material-input">
							    						<input type="password" name="password" id="password" required>
							    						<span class="highlight"></span>
							    						<span class="bar"></span>
							    						<label>Password</label>
                            </div>
														<div class="sign-btn text-center">
		                            <button type="submit" class="btn btn-lg btn-1" id="btnPromt" id="btnPromt" value="1">Iniciar Sesión</button>
                                    <!--<button onclick="dos();"  class="btn btn-success btn-lg">Ingresar</button>-->

                                    <br>
                                    <br>
                                    <br>
                                    <br>
		                        </div>
                        </form>

                  <p style="text-align:center"> &copy Morton Subastas 2021</p>
                </div>
                    <!-- End Form -->
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->

        </div>
        <!-- End Container -->
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
