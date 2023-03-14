<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
    include "head.php";
    include "aside.php";

    date_default_timezone_set("America/Mexico_City");

    $hoy = date("d/m/Y");
    $hora = date("H:i:s");
?>

    <div class="container">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header"><h1><strong style="color:#004D43 !important">Capital</strong> <strong>Humano</strong></h1><br><br></legend>
                <!--<form  class="col-lg-12"  action="layout_txt" method="post" >-->
                <form  class="col-lg-12"  action="SearchHistoric" method="post" >
                  <div class="form-group">
                    <div class="row datos">
                      <div class="col-md-6  prim-form">
                        <p>Año Evaluar:</p>
                        <select name="ano">
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                        </select>
                      </div>
                      <div class="col-md-3  prim-form">
                        <p>Inicio Catorcena :</p>
                        <div class="caja">
                          <select name="catorcenainicio">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3 prim-form">
                        <p>Fin Catorcena:</p>
                        <div class="caja">
                          <select name="catorcenafin">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                    <div class="col-md-3  text-center"></div>
                    <div class="col-md-6  text-center">
                      <button type="submit" id="btnPromt" id="btnPromt" name="btnPromt" class="btn btn-success btn-lg agregar" value="1">Generar</button>
                    </div>
                    <div class="col-md-3  text-center"></div>

                  </div>
                </form>
          </fieldset>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

<!-- Busador SELECT -->
<script type="text/javascript">
$(document).ready(function() {
	$('.js-example-basic-single').select2();
});

$('#miboton').click(function(){
        // $('#page-loader').fadeOut("slow");
    $('#page-loader').fadeOut(4000);

});
</script>


<?php
}else{
    include "header.php";
    include "error404.php";
    echo "capital";
    ?>
    <script>
    setTimeout(function () {
    window.location.href = 'https://www.desarrollomorton.com/admin/facturacion';
},2000); // 5 seconds
    </script>
<?php
}

?>
