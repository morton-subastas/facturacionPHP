<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facturacion Electronica</title>


  <script src="js/script_bajado.js"></script>
  <script type= text/javascript>
    function generatePDF(){
      const element = document.getElementById("principal");

      //alert (element);

      html2pdf()
        .from(element)
        .save();

    }


  </script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="css/bostrap.min.css">
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Personal Styles -->
<link rel="stylesheet" href="css/style.css">
<!--BOOTSTRAP-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
-->

  <!-- <link rel="stylesheet" href="https://icons.getbootstrap.com/icons/trash/"> -->


  <link rel="stylesheet" href="css/formulario.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon-16x16.png">
  <script src="js/script.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
  <style>
  .imgRedonda {
    width:50px;
    height:50px;
    border-radius:25px;
}

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

th, td {
  border-color: #96D4D4;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.alert.success {background-color: #04AA6D;}
.alert.inicio {background-color: #ffffff;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}
</style>

  <script type="text/javascript">

window.onload = function() {
  var jsVar1 = 0; //error
  document.cookie = "w1 = " + jsVar1;
  if (tecla = 18) {return false; alert("refresh");}
  if (tecla = 116) {return false; alert("f5");}


};

/*PARA GUARDAR EL VALOR DEL SELECT DESPUES DE ENVIAR EL FORM*/
$(function() {
    $('#emisor').change(function() {
        localStorage.setItem('ejemplo1', this.value);
    });
    if(localStorage.getItem('ejemplo1')){
        $('#emisor').val(localStorage.getItem('ejemplo1'));
    }
});

$(function() {
    $('#metodo').change(function() {
        localStorage.setItem('ejemplo2', this.value);
    });
    if(localStorage.getItem('ejemplo2')){
        $('#metodo').val(localStorage.getItem('ejemplo2'));
    }
});

$(function() {
    $('#formapago').change(function() {
        localStorage.setItem('ejemplo3', this.value);
    });
    if(localStorage.getItem('ejemplo3')){
        $('#formapago').val(localStorage.getItem('ejemplo3'));
    }
});

$(function() {
    $('#moneda').change(function() {
        localStorage.setItem('ejemplo4', this.value);
    });
    if(localStorage.getItem('ejemplo4')){
        $('#moneda').val(localStorage.getItem('ejemplo4'));
    }
});

$(function() {
    $('#tipo_comprobante').change(function() {
        localStorage.setItem('ejemplo5', this.value);
    });
    if(localStorage.getItem('ejemplo5')){
        $('#tipo_comprobante').val(localStorage.getItem('ejemplo5'));
    }
});

$(function() {
    $('#tipo_uso').change(function() {
        localStorage.setItem('ejemplo6', this.value);
    });
    if(localStorage.getItem('ejemplo6')){
        $('#tipo_uso').val(localStorage.getItem('ejemplo6'));
    }
});

$(function() {
    $('#lugar_expedicion').change(function() {
        localStorage.setItem('ejemplo7', this.value);
    });
    if(localStorage.getItem('ejemplo7')){
        $('#lugar_expedicion').val(localStorage.getItem('ejemplo7'));
    }
});

$(function() {
    $('#receptor').change(function() {
        localStorage.setItem('ejemplo', this.value);
    });
    if(localStorage.getItem('ejemplo')){
        $('#receptor').val(localStorage.getItem('ejemplo'));
    }
});
//location.reload(true);

/* SABEER QUE TECLA PRESIONA EL USUARIO
document.onkeydown = function(e){
  tecla = (document.all) ? e.keyCode : e.which;
  alert(tecla)
  if (tecla = 17) {return false;}
}
*/


jQuery(document).ready(function(){
	// Listen for the input event.
	jQuery("#cantidad").on('input', function (evt) {
		// Allow only numbers.
		jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
	});
});

function addConcepto(){
  //alert("Agrega Concepto");
  var cantidad = document.getElementById("cantidad").value;
  var valor = document.getElementById("valor").value;
  var concepto = document.getElementById("concepto").value;
  var unidad = document.getElementById("unidad").value;
  var descripcion = document.getElementById("descripcion").value;
  var folioC = document.getElementById("folioC").value;

  //alert(receptor);
  document.cookie = "w1 = 0";
  if(cantidad != ""){
    var request = $.ajax({
        url: '../Controlador/controladorAgregarConceptos.php',
        method: "POST",
        data:{cantidad:cantidad, valor:valor, concepto:concepto, unidad:unidad, descripcion:descripcion, folioC:folioC},
        dataType: ""
    });
    request.done(function(respuesta){
        //alert("ingresado");
        window.location.href= "facturacion.php";
        /*
      //alert("regresa" + respuesta);
      var jsVar1 = 1; //error
      document.cookie = "w1 = " + jsVar1;
      //document.cookie = "w1 = 1";
      //alert(jsVar1);
      //alertify.success('Registro ingresado con exito');
      var delay = alertify.get('notifier','delay');
        alertify.set('notifier','delay', 10000);
        alertify.success('Registro Ingresado');
        alertify.set('notifier','delay', delay);
        */
    });
    request.fail(function (jqXHR, textStatus){
      alert("hubo un error");
    });
  }
  else{
    //alert_error();
    //alert("valor");
    var jsVar1 = 2; //error
    document.cookie = "w1 = " + jsVar1;
  }

}

function manda(id){

    var request = $.ajax({
        url: '../Controlador/controladorBorraConcepto.php',
        method: "POST",
        data:{di:id},
        dataType: ""
    });
    request.done(function(respuesta){
      alert("alerta");
      Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: '¡Debe agregar un Receptor!',
          timer: 1500
      });

    });
    request.fail(function (jqXHR, textStatus){
      alert("hubo un error");
    });

    //alert("dos");

}

function dos(){
  var receptor = document.getElementById("receptor").value;
  var folio = document.getElementById("folio").value;
  var fecha = document.getElementById("fecha").value;
  var hora = document.getElementById("hora").value;
  var moneda = document.getElementById("moneda").value;
  var metodo = document.getElementById("metodo").value;
  var tipo_comprobante = document.getElementById("tipo_comprobante").value;
  var tipo_uso = document.getElementById("tipo_uso").value;
  var formapago = document.getElementById("formapago").value;
  var lugar_expedicion = document.getElementById("lugar_expedicion").value;
  var subtotal = document.getElementById("subtotal").value;
  var iva = document.getElementById("iva").value;
  var total = document.getElementById("total").value;
  alert(receptor);

  if(receptor != ""){
      var request = $.ajax({
          url: '../Controlador/controladorGenerarFactura.php',
          method: "POST",
          data:{receptor:receptor, folio:folio, fecha:fecha, hora:hora, moneda:moneda, metodo:metodo, tipo_comprobante:tipo_comprobante, tipo_uso:tipo_uso, formapago:formapago, lugar_expedicion:lugar_expedicion, subtotal:subtotal, iva:iva, total:total},
          dataType: ""
        });
        //alert(request);
        request.done(function(respuesta){
            alert("Generando FACTURA");
            //document.location.href = 'archivos.php';
            //location.href = "archivos.php";
            //location.replace("archivos.php");
            window.location.href= "archivos.php";
          });
        request.fail(function (jqXHR, textStatus){
            alert("hubo un error");
        });
  }
  else{
      //alert_error();
      //alert("valor");
      var jsVar1 = 2; //error
      document.cookie = "w1 = " + jsVar1;
  }
}

function redireccionar(){
  window.locationf="http://www.cristalab.com";
}

function limpiar(){
  var folio = document.getElementById("folio").value;
  var subtotal = document.getElementById("subtotal").value;


  if(subtotal > 0){
    //alert(folio);
    var request = $.ajax({
        url: '../Controlador/controladorLimpiarFormulario.php',
        method: "POST",
        data:{folio:folio},
        dataType: ""
    });
    request.done(function(respuesta){
      //alert(respuesta);
    });
    request.fail(function (jqXHR, textStatus){
      alert("hubo un error");
    });
  }else{
    alert("No tiene ningun concepto agregado");
  }
}


</script>
</head>
<body>

<nav class="navbar1 navbar2-inverse3">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="title-head">
        <?php
        //session_start();
        $fac = $_SESSION['email'];

        require_once ("../Controlador/controladorUsuarios.php");
        require_once ("../Modelo/modeloUsuarios.php");
        //echo "<br>VISTA: envia controlador";
        $all_AnUser = ControladorUsuarios::SearchUser($fac);
        //var_dump($all_AnUser['usu_rol']);
        $rol_bd = $all_AnUser['usu_rol'];

        //echo "usu-".$fac."-<br>";
        switch ($rol_bd) {
          case 'EMAIL':
          case 'DEVOLVER':
                echo "<h1><strong style='color:#004D43 !important'>SISTEMA DE</strong> <strong>DE CORREOS</strong></h1>";
            break;
         case 'MULTIPAGOS':
                  echo "<h1><strong style='color:#004D43 !important'>INFORMACIÓN DE</strong> <strong>MULTIPAGOS</strong></h1>";
              break;
          default:
              if ($fac == 'iespinosa@mortonsubastas.com'){
                    echo "<h1><strong style='color:#004D43 !important'>INFORMACIÓN DE</strong> <strong>MULTIPAGOS</strong></h1>";
              }else{
                echo "<h1><strong style='color:#004D43 !important'>SISTEMA DE</strong> <strong>FACTURACIÓN</strong></h1>";
              }
          break;
        }
        /*
        if(($rol_bd == 'EMAIL')||($rol_bd == 'DEVOLVER')){
          //header('Location: ItemsMissing');
          echo "<h1><strong style='color:#004D43 !important'>SISTEMA DE</strong> <strong>DE CORREOS</strong></h1>";
        }else{

        }
        */
        ?>

      </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle hambur" data-toggle="collapse" data-target="#myNavbart">
            <span class="icon-bar">e</span>
            <span class="icon-bar">w</span>
            <span class="icon-bar">z</span>
        </button>
        <!-- <p class="text-warning" style='margin-left:15px'><h2 class="menu-home">MENU</h2></p> -->
        <?PHP
        //echo "<p style='position:absolute;top:15%'>Sesión <b>".$all_AnUser['usu_nombre']."</b></p>";
        ?>
        <!-- <p><h1><strong style="color:#004D43 !important">Generando|</strong> <strong>Factura</strong></h1></p> -->
      <!-- <p class="text-warning" style='margin-left:15px'><h2 class="menu-home">&nbsp;  Morton Subastas &nbsp;</h2></p> -->

      <!-- <i class="fas fa-home"></i> -->
      </div>
<!-- </ul> -->
          <ul class="nav navbar-nav navbar-right">

              <a href="close.php" onclick="" class="btn-lg ov-btn-slide-close">Salir</a>
              <div class="pull-right">
              </div>
          </ul>

    </div>
  </div>
</nav>
