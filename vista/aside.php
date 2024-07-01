<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <div id="wrapper">
        <!--<div class="overlay">aa</div>-->
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
          <!--<br><br><br><br><br><br><br><br><br><br><img src="imagenes/logotipo.png" alt="Morton Subastas"><br><br>-->
            <ul class="nav sidebar-nav nav-aside">
                <?php
                error_reporting(1);
                session_start();
                $email = $_SESSION['email'];
                require_once ("../Controlador/controladorUsuarios.php");
                require_once ("../Modelo/modeloUsuarios.php");
                $c_Usuarios =  controladorUsuarios::SearchUser($email);
            
               
                $rol = $c_Usuarios["usu_rol"];

                echo '<li><a href="Perfil">Perfil</a></li>';
                if (($rol == "SUPERADMIN") || ($rol == "EMAIL")|| ($rol == "DEVOLVER") ){
                    //echo "<li><a href='prueba'>Machotes</a></li>";
                }
                
                if (($rol == "SUPERADMIN")  ||($rol == "FINANZAS")){
                    echo "<li><a href='reporte_finanzasAPI'>Finanzas</a></li>";
                }

                if($email == 'bsanchez@mortonsubastas.com'){
                    echo "<li><a href='auctions'>Confirmación Oferta</a></li>";
                }

                if (($rol == "SUPERADMIN")  || ($rol == "ADMIN")){
                    echo "<li><a href='before_facturacion'>Nueva Factura</a></li>";
                    echo "<li><a href='capital_humano'>Capital Humano</a></li>";
                    echo "<li><a href='cat-morton'>Catálogos Morton</a></li>";
                    echo "<li><a href='cat_sat'>Catálogos S.A.T.</a></li>";
                    echo "<li><a href='historial'>Historial Facturas</a></li>";
                    //echo "<li><a href='https://www.desarrollomorton.com/usuarioFacturacion/'>Mí Morton</a></li>";
                    echo "<li><a href='busqueda_1'>Busqueda RFC</a></li>";
                    echo "<li><a href='payments'>Pago a Consignantes</a></li>";
                    echo "<li><a href='auctions'>Confirmación Oferta</a></li>";
                    echo "<li><a href='devoluciones'>Devoluciones</a></li>";
                    echo "<li><a href='ItemsMissing'>Recontratación</a></li>";

                    //echo "<li><a href='ayuda'>Ayuda</a></li>";
                }
                if (($rol == "SUPERADMIN")  ||($rol == "EMAIL") || ($rol == "DEVOLVER")){
                    //echo "<li><a href='AdminEmails'>Administrador</a></li>";
                    if (($email == 'mjimenez@mortonsubastas.com') || ($email == 'mramirez@mortonsubastas.com') || ($email == 'jjuarez@mortonsubastas.com')){
                        echo "<li><a href='ItemsMissing'>Recontratación</a></li>";
                        echo "<li><a href='devoluciones'>Devoluciones</a></li>";
                    }
                    //echo "<li><a href='SendEmail'>Enviados</a></li>";
                    if($rol != "DEVOLVER"  && $email != 'sgomez@mortonsubastas.com'){
                      echo "<li><a href='ResultAuction?acc=not'>Notificaciones</a></li>";
                      echo "<li><a href='ResultAuction?acc=res'>Resultados Subasta</a></li>";
                    }
                }

                if($rol == "EMAIL_PLD" || $rol == "SUPERADMIN"){
                    echo "<li><a href='pld'>PLD</a></li>";
                }

                if($email == 'sgomez@mortonsubastas.com'){
                    echo "<li><a href='excel'>Excel PLD</a></li>";
                }

                 ?>
            </ul>
        </nav>
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed hambur" data-toggle="offcanvas">
              <!--  hamburger-home -->
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
