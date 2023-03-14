<?php
error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
    include "head.php";
    include "aside.php";

ini_set('max_execution_time', 1500);
//ini_set('max_execution_time', 800);       //1324 5178-295
//ini_set('max_execution_time', 400);     //6:40 2828-161

//TIEMPO DE PROCESAMIENTO APROX:4min
//------------------max_execution_time = 500

/*error_reporting(1);
session_start();
$fac = $_SESSION['email'];

if(($fac != '')){
*/
//include "head.php";
//include "aside.php";
?>
<div class="container">
  <div class="col-md-12">
    <div class="well well-sm">
      <fieldset>
        <?php
echo "modificado 43<br>";
//$Base = " NOMINA PERIODO ".$periodo." CATORCENAL DEL 17/07/2021 AL 30/07/2021";
$ar = fopen("layout.txt", "w") or die ("¡wError!, A genera archivo");

error_reporting(0);
$primero = 0;
  $tabla = 1;   //0-ACTIVO  //RESUKLTADO          1-INACTIVO  IMAGEN
  $empleado = 0;             //0-ACTIVO 1-INACTIVO
      $empleado_tabla = 1;  //html 0-ACTIVO 1-INACTIVO
      $empleado_txt = 1;    //imprimir en pantalla 0-ACTIVO 1-INACTIVO
      $employe_txt = "";    //txt
  $departamento = 0;        //0-ACTIVO 1-INACTIVO*
      $departamento_tabla = 1;  //html 0-ACTIVO 1-INACTIVO
      $departamento_txt = 1;    //imprimir
      $departamento_txt_imprimir = 0; //imprimir 0-ACTIVO 1-INACTIVO*
      $depaL_txt = "";          //txt
  $GLOBAL = 0;          //0-ACTIVO 1-INACTIVO*
      $globla_tabla = 1;      //html 0-ACTIVO 1-INACTIVO
      $global_txt = 0;        //imprimir
      $globalL_txt = "";      //txt
      $global_txt_imprimir = 1; //imprimir en pantalla 0-ACTIVO 1-INACTIVO
  $GLOBAL_caja_ahorro  = "0";
  $GLOBAL_prestamoc_ahorro  = "0";
  $GLOBAL_ISR  = "0";
  $GLOBAL_IMSS  = "0";
  $GLOBAL_Ic_ahorro  = "0";
  $GLOBAL_prosperus   = "0";
  $GLOBAL_Neto   = "0";
  /*GLOBALES*/
  $D_antiguedades = 0; $D_autosycamiones = 0; $D_admyfinanzas = 0; $D_direccion = 0; $D_herenciaycolecciones = 0; $D_logisticayalmancen = 0; $D_marketing = 0;  $D_presidencia = 0;
  $D_joyeria = 0; $D_oportunidades = 0; $D_capitalhumano =0; $D_empeños =0; $D_monterrey = 0;$D_tecinfo = 0; $D_artemoderno =0; $D_libros = 0; $D_web = 0; $D_obragrafica = 0;
  $D_vinos = 0; $D_guadalajara =0; $D_legal =0; $D_servicios =0;

  /*DEPARTAMENTO */
      /*ADM Y FINANZAS*/
          $D_admyfinanzas_aguinaldopro = 0;         $D_admyfinanzas_aguinaldopro_I = 0;
          $D_admyfinanzas_ajusteredondeo = 0;       $D_admyfinanzas_ajusteredondeo_I = 0;
          $D_admyfinanzas_apoyosubasta = 0;         $D_admyfinanzas_apoyosubasta_I = 0;
          $D_admyfinanzas_compensacion = 0;         $D_admyfinanzas_compensacion_I = 0;
          $D_admyfinanzas_primadominical = 0;       $D_admyfinanzas_primadominical_I = 0;
          $D_admyfinanzas_primavacacional = 0;      $D_admyfinanzas_primavacacional_I = 0;
          $D_admyfinanzas_primavacacionalprop = 0;  $D_admyfinanzas_primavacacionalprop_I = 0;
          $D_admyfinanzas_subsidioempleo = 0;       $D_admyfinanzas_subsidioempleo_I = 0;
          $D_admyfinanzas_sueldos = 0;              $D_admyfinanzas_sueldos_I = 0;
          $D_admyfinanzas_faltasinj = 0;            $D_admyfinanzas_faltasinj_I = 0;
          $D_admyfinanzas_descuni = 0;              $D_admyfinanzas_descuni_I = 0;
          $D_admyfinanzas_gasmedmay = 0;            $D_admyfinanzas_gasmedmay_I = 0;
      /*ANTIGUEDADES*/
          $D_antiguedades_aguinaldo = 0;            $D_antiguedades_aguinaldo_I = 0;
          $D_antiguedades_ajusteredondeo = 0;       $D_antiguedades_ajusteredondeo_I = 0;
          $D_antiguedades_apoyosubasta = 0;         $D_antiguedades_apoyosubasta_I = 0;
          $D_antiguedades_compensacion = 0;         $D_antiguedades_compensacion_I = 0;
          $D_antiguedades_primadom = 0;             $D_antiguedades_primadom_I = 0;
          $D_antiguedades_primavac = 0;             $D_antiguedades_primavac_I = 0;
          $D_antiguedades_primavacprop = 0;         $D_antiguedades_primavacprop_I = 0;
          $D_antiguedades_subempleo = 0;            $D_antiguedades_subempleo_I = 0;
          $D_antiguedades_sueldos = 0;              $D_antiguedades_sueldos_I = 0;
          $D_antiguedades_faltainj = 0;             $D_antiguedades_faltainj_I = 0;
          $D_antiguedades_descunif = 0;             $D_antiguedades_descunif_I = 0;
          $D_antiguedades_segmedmay = 0;            $D_antiguedades_segmedmay_I = 0;
      /*ARTE MODERNO*/
          $D_artemoderno_aguinaldoprop =  0;        $D_artemoderno_aguinaldoprop_I = 0;
          $D_artemoderno_ajusteredondeo =  0;       $D_artemoderno_ajusteredondeo_I = 0;
          $D_artemoderno_apoyosubasta = 0;          $D_artemoderno_apoyosubasta_I = 0;
          $D_artemoderno_compensacion = 0;          $D_artemoderno_compensacion_I = 0;
          $D_artemoderno_primdom = 0;               $D_artemoderno_primdom_I = 0;
          $D_artemoderno_primvac = 0;               $D_artemoderno_primvac_I = 0;
          $D_artemoderno_primvacpro = 0;            $D_artemoderno_primvacpro_I = 0;
          $D_artemoderno_subsidio = 0;              $D_artemoderno_subsidio_I = 0;
          $D_artemoderno_sueldos = 0;               $D_artemoderno_sueldos_I = 0;
          $D_artemoderno_injustificadas = 0;        $D_artemoderno_injustificadas_I = 0;
          $D_artemoderno_descuniformes = 0;         $D_artemoderno_descuniformes_I = 0;
          $D_artemoderno_segmedmay = 0;             $D_artemoderno_segmedmay_I = 0;
      /*AUTOS Y CAMIONES*/
          $D_autoscamion_aguinaldo =  0;            $D_autoscamion_aguinaldo_I = 0;
          $D_autoscamion_ajusteredondeo =  0;       $D_autoscamion_ajusteredondeo_I = 0;
          $D_autoscamion_apoyosubasta =  0;         $D_autoscamion_apoyosubasta_I = 0;
          $D_autoscamion_compensacion =  0;         $D_autoscamion_compensacion_I = 0;
          $D_autoscamion_primdom =  0;              $D_autoscamion_primdom_I = 0;
          $D_autoscamion_primvac =  0;              $D_autoscamion_primvac_I = 0;
          $D_autoscamion_primvacpro =  0;           $D_autoscamion_primvacpro_I = 0;
          $D_autoscamion_subsidioe = 0;             $D_autoscamion_subsidioe_I = 0;
          $D_autoscamion_sueldos = 0;               $D_autoscamion_sueldos_I = 0;
          $D_autoscamion_faltasin = 0;              $D_autoscamion_faltasin_I = 0;
          $D_autoscamion_descun = 0;                $D_autoscamion_descun_I = 0;
          $D_autoscamion_segmedmay = 0;             $D_autoscamion_segmedmay_I = 0;
      /*CAPITAL HUMANO*/
          $D_capitalhum_aguinaldopro =  0;          $D_capitalhum_aguinaldopro_I = 0;
          $D_capitalhum_ajusteredondeo =  0;        $D_capitalhum_ajusteredondeo_I = 0;
          $D_capitalhum_apoyosubasta = 0;           $D_capitalhum_apoyosubasta_I = 0;
          $D_capitalhum_compensacion = 0;           $D_capitalhum_compensacion_I = 0;
          $D_capitalhum_primadominical = 0;         $D_capitalhum_primadominical_I = 0;
          $D_capitalhum_primavac = 0;               $D_capitalhum_primavac_I = 0;
          $D_capitalhum_primavacpro = 0;            $D_capitalhum_primavacpro_I = 0;
          $D_capitalhum_subsidio = 0;               $D_capitalhum_subsidio_I = 0;
          $D_capitalhum_sueldos = 0;                $D_capitalhum_sueldos_I = 0;
          $D_capitalhum_faltasinj = 0;              $D_capitalhum_faltasinj_I = 0;
          $D_capitalhum_descuniform = 0;            $D_capitalhum_descuniform_I = 0;
          $D_capitalhum_segmedmay = 0;              $D_capitalhum_segmedmay_I = 0;
      /*EMPEÑOS*/
          $D_enpenos_aguinaldo =  0;                $D_enpenos_aguinaldo_I = 0;
          $D_enpenos_ajusteredondeo = 0;            $D_enpenos_ajusteredondeo_I = 0;
          $D_enpenos_apoyos =  0;                   $D_enpenos_apoyos_I = 0;
          $D_enpenos_compensacion =  0;             $D_enpenos_compensacion_I = 0;
          $D_enpenos_primadom =  0;                 $D_enpenos_primadom_I = 0;
          $D_enpenos_primavac =  0;                 $D_enpenos_primavac_I = 0;
          $D_enpenos_primavacpro =  0;              $D_enpenos_primavacpro_I = 0;
          $D_enpenos_subsidioem =  0;               $D_enpenos_subsidioem_I = 0;
          $D_empenos_sueldos = 0;                   $D_empenos_sueldos_I = 0;
          $D_empenos_faltaasinj = 0;                $D_empenos_faltaasinj_I = 0;
          $D_empenos_descuni = 0;                   $D_empenos_descuni_I = 0;
          $D_empenos_segmasmedmay = 0;              $D_empenos_segmasmedmay_I = 0;
      /*DIRECCION*/
        $D_direccion_aguinaldo =  0;                $D_direccion_aguinaldo_I = 0;
        $D_direccion_ajusteredondeo =  0;           $D_direccion_ajusteredondeo_I = 0;
        $D_direccion_apoyo =  0;                    $D_direccion_apoyo_I = 0;
        $D_direccion_compensacion =  0;             $D_direccion_compensacion_I = 0;
        $D_direccion_primadom =  0;                 $D_direccion_primadom_I = 0;
        $D_direccion_primavac =  0;                 $D_direccion_primavac_I = 0;
        $D_direccion_primavacpro =  0;              $D_direccion_primavacpro_I = 0;
        $D_direccion_subempleo =  0;                $D_direccion_subempleo_I = 0;
        $D_direccion_sueldos = 0;                   $D_direccion_sueldos_I = 0;
        $D_direccion_faltinj = 0;                   $D_direccion_faltinj_I = 0;
        $D_direccion_descuni = 0;                   $D_direccion_descuni_I = 0;
        $D_direccion_medmay = 0;                    $D_direccion_medmay_I = 0;
      /*GUADALAJARA*/
        $D_guadalajara_aguinaldo =  0;              $D_guadalajara_aguinaldo_I = 0;
        $D_guadalajara_ajusteredondeo = 0;          $D_guadalajara_ajusteredondeo_I = 0;
        $D_guadalajara_apooyos = 0;                 $D_guadalajara_apooyos_I = 0;
        $D_guadalajara_compensacion = 0;            $D_guadalajara_compensacion_I = 0;
        $D_guadalajara_primado =  0;                $D_guadalajara_primado_I = 0;
        $D_guadalajara_primavac =  0;               $D_guadalajara_primavac_I = 0;
        $D_guadalajara_primvacpro =  0;             $D_guadalajara_primvacpro_I = 0;
        $D_guadalajara_subsidio =  0;               $D_guadalajara_subsidio_I = 0;
        $D_guadalajara_sueldos = 0;                 $D_guadalajara_sueldos_I = 0;
        $D_guadalajara_faltasinj = 0;               $D_guadalajara_faltasinj_I = 0;
        $D_guadalajara_descuni = 0;                 $D_guadalajara_descuni_I = 0;
        $D_guadalajara_seggasmedmay = 0;            $D_guadalajara_seggasmedmay_I = 0;
    /*HERENCIA Y COLECCCIONES*/
        $D_herenciacolec_aguinaldo =  0;            $D_herenciacolec_aguinaldo_I = 0;
        $D_herenciacolec_ajusteredondeo =  0;       $D_herenciacolec_ajusteredondeo_I = 0;
        $D_herenciacolec_apoyos =  0;               $D_herenciacolec_apoyos_I = 0;
        $D_herenciacolec_compensacion = 0;          $D_herenciacolec_compensacion_I = 0;
        $D_herenciacolec_primad = 0;                $D_herenciacolec_primad_I = 0;
        $D_herenciacolec_primavac=  0;              $D_herenciacolec_primavac_I = 0;
        $D_herenciacolec_primavacpro = 0;           $D_herenciacolec_primavacpro_I = 0;
        $D_herenciacolec_subsidio = 0;              $D_herenciacolec_subsidio_I = 0;
        $D_herenciacolec_sueldos = 0;               $D_herenciacolec_sueldos_I = 0;
        $D_herenciacolec_faltasinj = 0;             $D_herenciacolec_faltasinj_I = 0;
        $D_herenciacolec_descuni =  0;              $D_herenciacolec_descuni_I = 0;
        $D_herenciacolec_medimay =  0;              $D_herenciacolec_medimay_I = 0;
    /*JOYERIA*/
        $D_joyeria_aguinaldo = 0;                   $D_joyeria_aguinaldo_I = 0;
        $D_joyeria_ajusteredondeo = 0;              $D_joyeria_ajusteredondeo_I = 0;
        $D_joyeria_apoyosu = 0;                     $D_joyeria_apoyosu_I = 0;
        $D_joyeria_compensacion = 0;                $D_joyeria_compensacion_I = 0;
        $D_joyeria_primadom = 0;                    $D_joyeria_primadom_I = 0;
        $D_joyeria_primavac = 0;                    $D_joyeria_primavac_I = 0;
        $D_joyeria_primavacpro = 0;                 $D_joyeria_primavacpro_I = 0;
        $D_joyeria_subsidio = 0;                    $D_joyeria_subsidio_I = 0;
        $D_joyeria_sueldos = 0;                     $D_joyeria_sueldos_I = 0;
        $D_joyeria_faltasinj = 0;                   $D_joyeria_faltasinj_I = 0;
        $D_joyeria_descuni = 0;                     $D_joyeria_descuni_I = 0;
        $D_joyeria_seggasmedmay = 0;                $D_joyeria_seggasmedmay_I = 0;
      /*LEGAL*/
        $D_legal_aguinaldo =  0;                    $D_legal_aguinaldo_I = 0;
        $D_legal_ajusteredondeo =  0;               $D_legal_ajusteredondeo_I = 0;
        $D_legal_apoyosub =  0;                     $D_legal_apoyosub_I = 0;
        $D_legal_compensacion = 0;                  $D_legal_compensacion_I = 0;
        $D_legal_primadomi = 0;                     $D_legal_primadomi_I = 0;
        $D_legal_primavac = 0;                      $D_legal_primavac_I = 0;
        $D_legal_primavacpro = 0;                   $D_legal_primavacpro_I = 0;
        $D_legal_subsidio =  0;                     $D_legal_subsidio_I = 0;
        $D_legal_sueldos = 0;                       $D_legal_sueldos_I = 0;
        $D_legal_faltasinj = 0;                     $D_legal_faltasinj_I = 0;
        $D_legal_descuni = 0;                       $D_legal_descuni_I = 0;
        $D_legal_seggasmedmay = 0;                  $D_legal_seggasmedmay_I = 0;
      /*LIBROS*/
        $D_libros_aguinaldo =  0;                   $D_libros_aguinaldo_I = 0;
        $D_libros_ajusteredondeo =  0;              $D_libros_ajusteredondeo_I = 0;
        $D_libros_apoyosub =  0;                    $D_libros_apoyosub_I = 0;
        $D_libros_compensacion =  0;                $D_libros_compensacion_I = 0;
        $D_libros_primadom =  0;                    $D_libros_primadom_I = 0;
        $D_libros_primavac =  0;                    $D_libros_primavac_I = 0;
        $D_libros_primavacpro =  0;                 $D_libros_primavacpro_I = 0;
        $D_libros_subsidio =  0;                    $D_libros_subsidio_I = 0;
        $D_libros_sueldos = 0;                      $D_libros_sueldos_I = 0;
        $D_libros_faltasinj = 0;                    $D_libros_faltasinj_I = 0;
        $D_libros_descuni = 0;                      $D_libros_descuni_I = 0;
        $D_libros_seggasmedmay = 0;                 $D_libros_seggasmedmay_I = 0;
      /*LOGISTICA Y ALMACEN*/
        $D_logalm_aguinaldo =  0;                   $D_logalm_aguinaldo_I = 0;
        $D_logalm_ajusteredondeo = 0;               $D_logalm_ajusteredondeo_I = 0;
        $D_logalm_apoyosub = 0;                     $D_logalm_apoyosub_I = 0;
        $D_logalm_primadom = 0;                     $D_logalm_primadom_I = 0;
        $D_logalm_primvac = 0;                      $D_logalm_primvac_I = 0;
        $D_logalm_primvacpro = 0;                   $D_logalm_primvacpro_I = 0;
        $D_logalm_subsidio = 0;                     $D_logalm_subsidio_I = 0;
        $D_logalm_sueldos = 0;                      $D_logalm_sueldos_I = 0;
        $D_logalm_faltasinju = 0;                   $D_logalm_faltasinju_I = 0;
        $D_logalm_descunif = 0;                     $D_logalm_descunif_I = 0;
        $D_logalm_seggasmedmay = 0;                 $D_logalm_seggasmedmay_I = 0;
    /*MONTERREY*/
        $D_monterrey_aguinaldo =  0;                $D_monterrey_aguinaldo_I = 0;
        $D_monterrey_ajusteredondeo = 0;            $D_monterrey_ajusteredondeo_I = 0;
        $D_monterrey_apoyos = 0;                    $D_monterrey_apoyos_I = 0;
        $D_monterrey_compensacion = 0;              $D_monterrey_compensacion_I = 0;
        $D_monterrey_primadom = 0;                  $D_monterrey_primadom_I = 0;
        $D_monterrey_primavac =  0;                 $D_monterrey_primavac_I = 0;
        $D_monterrey_primavacpro = 0;               $D_monterrey_primavacpro_I = 0;
        $D_monterrey_subsidio = 0;                  $D_monterrey_subsidio_I = 0;
        $D_monterrey_sueldos = 0;                   $D_monterrey_sueldos_I = 0;
        $D_monterrey_faltasinj = 0;                 $D_monterrey_faltasinj_I = 0;
        $D_monterrey_descuni = 0;                   $D_monterrey_descuni_I = 0;
        $D_monterrey_seggasmedmay = 0;              $D_monterrey_seggasmedmay_I = 0;
      /*MARKETING*/
        $D_marketing_aguinaldo =  0;                $D_marketing_aguinaldo_I = 0;
        $D_marketing_ajusteredondeo = 0;            $D_marketing_ajusteredondeo_I = 0;
        $D_marketing_apoyosub =  0;                 $D_marketing_apoyosub_I = 0;
        $D_marketing_compensacion =  0;             $D_marketing_compensacion_I = 0;
        $D_marketing_primvac = 0;                   $D_marketing_primvac_I = 0;
        $D_marketing_primvacpro = 0;                $D_marketing_primvacpro_I = 0;
        $D_marketing_primdom = 0;                   $D_marketing_primdom_I = 0;
        $D_marketing_subsidio = 0;                  $D_marketing_subsidio_I = 0;
        $D_marketing_sueldos = 0;                   $D_marketing_sueldos_I = 0;
        $D_marketing_faltasinj = 0;                 $D_marketing_faltasinj_I = 0;
        $D_marketing_desuni = 0;                    $D_marketing_desuni_I = 0;
        $D_marketing_medmay = 0;                    $D_marketing_medmay_I = 0;
      /*TECNOLOGIAS DE LA INFORMACION*/
        $D_tecinf_aguinaldo = 0;                    $D_tecinf_aguinaldo_I = 0;
        $D_tecinf_ajusteredondeo = 0;               $D_tecinf_ajusteredondeo_I = 0;
        $D_tecinf_apoyosubasta = 0;                 $D_tecinf_apoyosubasta_I = 0;
        $D_tecinf_compensacion = 0;                 $D_tecinf_compensacion_I = 0;
        $D_tecinf_primadom = 0;                     $D_tecinf_primadom_I = 0;
        $D_tecinf_primvac = 0;                      $D_tecinf_primvac_I = 0;
        $D_tecinf_promavacpro = 0;                  $D_tecinf_promavacpro_I = 0;
        $D_tecinf_subsidio = 0;                     $D_tecinf_subsidio_I = 0;
        $D_tecinf_sueldos = 0;                      $D_tecinf_sueldos_I = 0;
        $D_tecinf_faltasinj = 0;                    $D_tecinf_faltasinj_I = 0;
        $D_tecinf_descuni = 0;                      $D_tecinf_descuni_I = 0;
        $D_tecinf_medmay = 0;                       $D_tecinf_medmay_I = 0;

      /*OBRA GRAFICA*/
        $D_obragraf_aguinaldopro =  0;              $D_obragraf_aguinaldopro_I = 0;
        $D_obragraf_ajusteredondeo = 0;             $D_obragraf_ajusteredondeo_I = 0;
        $D_obragraf_apoyosub = 0;                   $D_obragraf_apoyosub_I = 0;
        $D_obragraf_compensacion = 0;               $D_obragraf_compensacion_I = 0;
        $D_obragraf_primadom = 0;                   $D_obragraf_primadom_I = 0;
        $D_obragraf_primvac = 0;                    $D_obragraf_primvac_I = 0;
        $D_obragraf_primavacpro = 0;                $D_obragraf_primavacpro_I = 0;
        $D_obragraf_subsidio = 0;                   $D_obragraf_subsidio_I = 0;
        $D_obragraf_sueldos = 0;                    $D_obragraf_sueldos_I = 0;
        $D_obragraf_faltasinj = 0;                  $D_obragraf_faltasinj_I = 0;
        $D_obragraf_descunif = 0;                   $D_obragraf_descunif_I = 0;
        $D_obragraf_seggasmedmay = 0;               $D_obragraf_seggasmedmay_I = 0;
      /*OPORTUNIDADES*/
        $D_oportunidades_aguinaldo = 0;             $D_oportunidades_aguinaldo_I = 0;
        $D_oportunidades_ajusteredondeo = 0;        $D_oportunidades_ajusteredondeo_I = 0;
        $D_oportunidades_apoyosub = 0;              $D_oportunidades_apoyosub_I = 0;
        $D_oportunidades_compensacion = 0;          $D_oportunidades_compensacion_I = 0;
        $D_oportunidades_primadom = 0;              $D_oportunidades_primadom_I = 0;
        $D_oportunidades_primavac = 0;              $D_oportunidades_primavac_I = 0;
        $D_oportunidades_primavacpro = 0;           $D_oportunidades_primavacpro_I = 0;
        $D_oportunidades_subsidio = 0;              $D_oportunidades_subsidio_I = 0;
        $D_oportunidades_sueldos = 0;               $D_oportunidades_sueldos_I = 0;
        $D_oportunidades_faltasinj = 0;             $D_oportunidades_faltasinj_I = 0;
        $D_oportunidades_descuni = 0;               $D_oportunidades_descuni_I = 0;
        $D_oportunidades_medmay = 0;                $D_oportunidades_medmay_I = 0;
      /*PRESIDENCIA*/
        $D_presidencia_aguinaldo = 0;               $D_presidencia_aguinaldo_I = 0;
        $D_presidencia_ajusteredondeo = 0;          $D_presidencia_ajusteredondeo_I = 0;
        $D_presidencia_apoyo = 0;                   $D_presidencia_apoyo_I = 0;
        $D_presidencia_compensacion = 0;            $D_presidencia_compensacion_I = 0;
        $D_presidencia_primadom = 0;                $D_presidencia_primadom_I = 0;
        $D_presidencia_primavac = 0;                $D_presidencia_primavac_I = 0;
        $D_presidencia_primavacpro = 0;             $D_presidencia_primavacpro_I = 0;
        $D_presidencia_subempleo = 0;               $D_presidencia_subempleo_I = 0;
        $D_presidencia_sueldos = 0;                 $D_presidencia_sueldos_I = 0;
        $D_presidencia_faltasinj = 0;               $D_presidencia_faltasinj_I = 0;
        $D_presidencia_descuento = 0;               $D_presidencia_descuento_I = 0;
        $D_presidencia_seggasmedmay = 0;            $D_presidencia_seggasmedmay_I = 0;
      /*SERVICIOS*/
        $D_servicios_aguinaldo = 0;                 $D_servicios_aguinaldo_I = 0;
        $D_servicios_ajusteredondeo = 0;            $D_servicios_ajusteredondeo_I = 0;
        $D_servicios_apoyo = 0;                     $D_servicios_apoyo_I = 0;
        $D_servicios_compensa = 0;                  $D_servicios_compensa_I = 0;
        $D_servicios_primadom = 0;                  $D_servicios_primadom_I = 0;
        $D_servicios_primavac = 0;                  $D_servicios_primavac_I = 0;
        $D_servicios_primavacpro = 0;               $D_servicios_primavacpro_I = 0;
        $D_servicios_subempleo = 0;                 $D_servicios_subempleo_I = 0;
        $D_servicios_sueldos = 0;                   $D_servicios_sueldos_I = 0;
        $D_servicios_faltasinj = 0;                 $D_servicios_faltasinj_I = 0;
        $D_servicios_descuento = 0;                 $D_servicios_descuento_I = 0;
        $D_servicios_seggasmedmay = 0;              $D_servicios_seggasmedmay_I = 0;
      /*VINOS*/
        $D_vinos_aguinaldo = 0;                     $D_vinos_aguinaldo_I = 0;
        $D_vinos_ajusteredondeo = 0;                $D_vinos_ajusteredondeo_I = 0;
        $D_vinos_apoyo = 0;                         $D_vinos_apoyo_I = 0;
        $D_vinos_compensacion = 0;                  $D_vinos_compensacion_I = 0;
        $D_vinos_primadominical = 0;                $D_vinos_primadominical_I = 0;
        $D_vinos_primavac = 0;                      $D_vinos_primavac_I = 0;
        $D_vinos_primavacpro = 0;                   $D_vinos_primavacpro_I = 0;
        $D_vinos_subsidio = 0;                      $D_vinos_subsidio_I = 0;
        $D_vinos_sueldos = 0;                       $D_vinos_sueldos_I = 0;
        $D_vinos_faltasinj = 0;                     $D_vinos_faltasinj_I = 0;
        $D_vinos_descuento = 0;                     $D_vinos_descuento_I = 0;
        $D_vinos_medmay = 0;                        $D_vinos_medmay_I = 0;
      /*WEB*/
        $D_web_aguinaldoprop = 0;                   $D_web_aguinaldoprop_I = 0;
        $D_web_ajusteredondeo = 0;                  $D_web_ajusteredondeo_I = 0;
        $D_web_apoyosubasta = 0;                    $D_web_apoyosubasta_I = 0;
        $D_web_compensacion = 0;                    $D_web_compensacion_I = 0;
        $D_web_primadominical = 0;                  $D_web_primadominical_I = 0;
        $D_web_primavac = 0;                        $D_web_primavac_I = $D_web_primavac_I + 0;
        $D_web_primavacionalpro = 0;                $D_web_primavacionalpro_I = 0;
        $D_web_subsidio = 0;                        $D_web_subsidio_I = 0;
        $D_web_sueldos = 0;                         $D_web_sueldos_I = 0;
        $D_web_faltasinj = 0;                       $D_web_faltasinj_I = 0;
        $D_web_descuento = 0;                       $D_web_descuento_I = 0;
        $D_web_medmay = 0;                          $D_web_medmay_I = 0;
        $totalPerDed = "0";
        $ImpPer = 0;
        $ImpDed = 0;
        $contador = 0;
        $SumaTotalPercepciones = 0; $SumaTotalDeducciones = 0;
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.workbeat.com/oauth/token');

$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'content-Type' => 'application/x-www-form-urlencoded',
  'content-Type' => 'application/x-www-form-urlencoded'
));
$request->addPostParameter(array(
  'grant_type' => 'client_credentials',
  'client_id' => '950C0B26-BA90-4EAE-83C6-9AA049865233',
  'client_secret' => '1F375BD6-E0AF-483A-893B-CC87619B143E'
));

//OBTENER MOVIMIENTOS DEL EMPLEADO
function getAdministrations($access_token, $ano_proceso, $numero) {
    //echo "entra";
    $headers = array(
      'Content-Type: application/json',
      sprintf('Authorization: Bearer %s', $access_token)
    );
    //$curl = curl_init("https://api.workbeat.com/v3/adm/empleados/");
    //$curl = curl_init("https://api.workbeat.com/v2/nom/ObtenerDatosNomina/GLC870731IY5/2021/21?idTipoNominaProc=CAT&numeroPatronal=B1015280105&idTipoPoliza=PMO");

    //$curl = curl_init("https://api.workbeat.com/v2/nom/DatosNomina/RazonSocial/GLC870731IY5/IdTipoNominaProc/CAT/Periodo/21/Anio/2021");


   //$curl = curl_init("https://api.workbeat.com/v3/nom/movimientos?anio=2021&periodo=22&tipoNomina=CAT&rfcRazonSocial=GLC870731IY5");
   $curl = curl_init("https://api.workbeat.com/v3/nom/movimientos?anio=".$ano_proceso."&periodo=".$numero."&tipoNomina=CAT&rfcRazonSocial=GLC870731IY5");

    //11 a 24 sep
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //echo ".................<br><br>";
    $result = json_decode(curl_exec($curl));

    //var_dump($result);
    //echo $result."<br>";
    return $result;
  }

  //OBTENER EMPLEADOS
  function getAdministrations_depa($access_token, $clave) {
      //echo "entra";
      $headers = array(
        'Content-Type: application/json',
        sprintf('Authorization: Bearer %s', $access_token)
      );

      $curl = curl_init("https://api.workbeat.com/v3/adm/empleados/".$clave."");
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $result = json_decode(curl_exec($curl));
      //echo $result[0];
      return $result;
      echo "<br><br><br><br><br>";
  }

  function get_CC_DB_personale($depa, $cpto){
      //echo "llega:".$clave."-".$cpto."<br>";
      require_once ("../Controlador/ctrl_CC.php");
      $resultado_genera =CuentaContable_Search::CC_Departamento($depa, $cpto);
      //echo "regresa".$resultado_genera;
      //$resultado_genera = "";
      return $resultado_genera;
  }
  function get_36($nombre){
    require_once ("../Controlador/ctrl_CC.php");
    $resultado_genera =CuentaContable_Search::Get36($nombre);
    return $resultado_genera;
  }
  function get_CC_DB_Specific($clave){
      //echo "llega:".$clave."<br>";
      require_once ("../Controlador/ctrl_CC.php");
      $resultado_genera = CuentaContable_Search::AllConceptos($clave, '');

      //$resultado_genera = "";
      //echo "<br>".$resultado_genera."<br>";
      return $resultado_genera;
  }

  function get_CC_DB_employ($nom_empleado_E, $concepto_E){
      //echo "VISTA Employ-".$nom_empleado_E."-";
      require_once ("../Controlador/ctrl_CC.php");
      $resultado_genera = CuentaContable_Search::SpecificEmploy($nom_empleado_E, $concepto_E);
      //echo "<br>".$resultado_genera."<br>";
      //$resultado_genera = "";
      return $resultado_genera;
      //return "A";
  }

  function getAdministrations_CuentaContable($access_token, $clave, $ano_p, $cat_i){
      $headers = array(
        'Content-Type: application/json',
        sprintf('Authorization: Bearer %s', $access_token)
      );

      $curl = curl_init("https://api.workbeat.com/v2/nom/ObtenerDatosNomina/GLC870731IY5/".$ano_p."/".$cat_i."?idTipoNominaProc=CAT&numeroPatronal=&idTipoPoliza=PMO");
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $result = json_decode(curl_exec($curl));
      $total = count($result);
      $resultaCC = "";
      for ($val=0; $val < $total; $val++){
        if($result[$val]->IdEmpleado == $clave){
          //echo "-".$result[$val]->IdEmpleado."-<br>";
          //echo "-".$result[$val]->NombreEmpleado."-<br>";
          //echo "-".$result[$val]->CuentaContable."-<br>";
          $resultaCC = $result[$val]->CuentaContable;
          //echo "val:".$val."total:".$total;
          //echo "res:".$resultaCC."<br>";
          $val = $total;
        }
      }
      return $resultaCC;
  }

  function getadministrations_depa_INACTIVOS($access_token, $clave){
      //echo "entra";
      $headers = array(
        'Content-Type: application/json',
        sprintf('Authorization: Bearer %s', $access_token)
      );

      //API INACTIVOS
      $curl = curl_init("https://api.workbeat.com/v3/dyn/consulta/6D2DE972-0FA6-4441-8BF4-28CC2C703A20");

      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      //API INACTIVOS
      $body = '{ "idPersona": '.$clave.'}';
      curl_setopt($curl, CURLOPT_POSTFIELDS,$body);

      $result = json_decode(curl_exec($curl));
      //echo "VA REGRESAR DE".$clave;
      //var_dump ($result[0]->Atributos[0]->Valor);
      //echo "<br>";
      $va_return = $result[0]->Atributos[0]->Valor;
      return $va_return;
  }
try{
    $bandera = "true";
    $response= $request->send();
    if($response->getStatus() == 200){
        //echo "valor<br>".$response->getBody();
        //echo "<br><br><br>";

        $objeto = json_decode($response->getBody());
        $token_mane = $objeto->{'access_token'};
        //echo "<h1>access_token:</h1>".$objeto->{'access_token'};
        //echo "<br><h1>token:</h1>".$token_mane."<br><br>";
        //NumeroEmpleado
        $periodo = $_POST['catorcena'];
        $periodo = rellena_dos($periodo);
        //echo "agregar periodo-".$periodo."-<br>";
        $catorcenainicio = $_POST['catorcena'];
        $ano_procesar = $_POST['ano'];
        //echo "catorcena:".$catorcenainicio."-año:".$ano_procesar."<br>";

        $administrations = getAdministrations($token_mane,$ano_procesar,  $catorcenainicio);
        //var_dump($administrations);
        //5558
        $total = count($administrations);
        //var_dump($administrations[0]->IdEmpleado);
        //var_dump($administrations[0]->IdPersona);
        $agrupar = '';
        if ($tabla == 0){
          echo "<table border=1>";
          echo "<tr><th>#</th><th>Persona</th><th>EMPLEADO</th><th>NOMBRE COMPLETO</th><th  >IMPORTE</th><th>AGRUPAR</th><th>ES</th><th>DEPARTAMENTO</th></tr>";
        }
          //->[Atributos][Valor]
          //$total = 100;    //FILTROS
          //$comienza = 4578;   $total = 4616;      //ROSA MARIA ALLANDE RECIO
          //$comienza = 957; $total = 989;  //EDGAR ISMAEL BONILLA
          $comienza = 0; $total = $total;
          //$comienza=35; $total=67;
          //echo "total".$total."<br>";


          for ($comienza; $comienza < $total; $comienza++){
              //var_dump($administrations[$comienza]);
            //echo "<br>*********************************************<br>";
            //DEPARTAMENTOS
            //($administrations[$comienza]->NombreConcpeto == "Sueldos") OR
            //($administrations[$comienza]->NombreConcpeto == "Prima dominical") OR
            //($administrations[$comienza]->NombreConcpeto == "Apoyo en subasta") OR

            if (($administrations[$comienza]->NombreConcpeto == "Sueldos") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima vacacional") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima vacacional proporcional") OR
                ($administrations[$comienza]->NombreConcpeto == "Aguinaldo proporcional") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima dominical") OR
                ($administrations[$comienza]->NombreConcpeto == "Compensación") OR
                ($administrations[$comienza]->NombreConcpeto == "Apoyo en subasta")){
                    $SumaTotalPercepciones = $SumaTotalPercepciones + $administrations[$comienza]->Importe;
            }

            if (($administrations[$comienza]->NombreConcpeto == "Faltas injustificadas") OR
                ($administrations[$comienza]->NombreConcpeto == "Caja de ahorro") OR
                ($administrations[$comienza]->NombreConcpeto == "Pensión alimenticia") OR
                ($administrations[$comienza]->NombreConcpeto == "Préstamo FONACOT") OR
                ($administrations[$comienza]->NombreConcpeto == "Préstamo INFONAVIT") OR
                ($administrations[$comienza]->NombreConcpeto == "Seguro de vivienda") OR
                ($administrations[$comienza]->NombreConcpeto == "Préstamo caja de ahorro") OR
                ($administrations[$comienza]->NombreConcpeto == "ISR") OR
                ($administrations[$comienza]->NombreConcpeto == "Cuota obrera IMSS") OR
                ($administrations[$comienza]->NombreConcpeto == "Seguro de gastos médicos mayores") OR
                ($administrations[$comienza]->NombreConcpeto == "Descuento intereses préstamo caja de ahorro") OR
                ($administrations[$comienza]->NombreConcpeto == "Descuento préstamo prósperus") OR
                ($administrations[$comienza]->NombreConcpeto == "DESCUENTO ESPECIAL") OR
                ($administrations[$comienza]->NombreConcpeto == "Descuento de Uniformes") ){
                    $SumaTotalDeducciones = $SumaTotalDeducciones + $administrations[$comienza]->Importe;
            }


            if (($administrations[$comienza]->NombreConcpeto == "Sueldos") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima vacacional") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima vacacional proporcional") OR
                ($administrations[$comienza]->NombreConcpeto == "Aguinaldo proporcional") OR
                ($administrations[$comienza]->NombreConcpeto == "Prima dominical") OR
                ($administrations[$comienza]->NombreConcpeto == "Ajuste por redondeo") OR
                ($administrations[$comienza]->NombreConcpeto == "Compensación") OR
                ($administrations[$comienza]->NombreConcpeto == "Apoyo en subasta") OR
                ($administrations[$comienza]->NombreConcpeto == "Subsidio al empleo") OR
                ($administrations[$comienza]->NombreConcpeto == "Faltas injustificadas") OR
                ($administrations[$comienza]->NombreConcpeto == "Seguro de gastos médicos mayores")
                ) {
                    //echo "Cpto".$administrations[$comienza]->NombreConcpeto."-".$administrations[$comienza]->Importe."<br>";
                    $agrupar = "DEPARTAMENTO";
                    //$color = "#16A085";
                    $color = "";
                    $es = "PERCEPCION";
                    //echo "0*) Cpto".$administrations[$comienza]->NombreConcpeto."-".$administrations[$comienza]->Importe."-".$agrupar."<br>";
            }
            //DEPARTAMENTOS
            if ($administrations[$comienza]->NombreConcpeto == "Total de percepciones"
            ) { //OR
                    //$agrupar = "EMPLEADO";
                    $agrupar = "GLOBAL";
                    //$totalPerDed = "1";
                    $esTotal= "P";
                    $ImpPer = $ImpPer + $administrations[$comienza]->Importe;
            }
            if ($administrations[$comienza]->NombreConcpeto == "Total de deducciones"
            ) { //OR
                    //$agrupar = "EMPLEADO";
                    $agrupar = "GLOBAL";
                    //$totalPerDed = "1";
                    $esTotal = "D";
                    $ImpDed = $ImpDed + $administrations[$comienza]->Importe;
            }
            //EMPLEADO
            if (($administrations[$comienza]->NombreConcpeto == "Pensión alimenticia") OR
                ($administrations[$comienza]->NombreConcpeto == "Préstamo FONACOT") OR
                ($administrations[$comienza]->NombreConcpeto == "Préstamo INFONAVIT") OR
                ($administrations[$comienza]->NombreConcpeto == "Seguro de vivienda") OR
                ($administrations[$comienza]->NombreConcpeto == "DESCUENTO ESPECIAL") OR
                    ($administrations[$comienza]->NombreConcpeto == "Descuento de Uniformes")){
                      $agrupar = "EMPLEADO";
                      $color = "#7FB3D5";
                      $es = "DEDUCCION";
            }
            //GLOBAL
            if($GLOBAL == 0){
                //echo "0 GLOBAL<br>";
                if ($administrations[$comienza]->NombreConcpeto == "Caja de ahorro") {
                    $GLOBAL_caja_ahorro = $GLOBAL_caja_ahorro + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";}
                if ($administrations[$comienza]->NombreConcpeto == "Préstamo caja de ahorro") {
                    $GLOBAL_prestamoc_ahorro = $GLOBAL_prestamoc_ahorro + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";
                    //echo "0-Global Prestamo caja de ahorro-".$GLOBAL_prestamoc_ahorro."<br>";
                }
                if ($administrations[$comienza]->NombreConcpeto == "ISR") {
                    $GLOBAL_ISR = $GLOBAL_ISR + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";
                    //echo "0-Global-ISR-".$GLOBAL_ISR."<br>";
                }
                if ($administrations[$comienza]->NombreConcpeto == "Cuota obrera IMSS") {
                    $GLOBAL_IMSS = $GLOBAL_IMSS + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";
                    //echo "0-Global-Cuota IMSS".$GLOBAL_IMSS."<br>";
                }
                if ($administrations[$comienza]->NombreConcpeto == "Descuento intereses préstamo caja de ahorro") {
                    $GLOBAL_Ic_ahorro = $GLOBAL_Ic_ahorro + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";
                    //echo "0-Global descuento interes caja ahorro:".$GLOBAL_Ic_ahorro."<br>";
                }
                if ($administrations[$comienza]->NombreConcpeto == "Descuento préstamo prósperus") {
                    $GLOBAL_prosperus = $GLOBAL_prosperus + $administrations[$comienza]->Importe;
                    $colorr = "#A6ACAF";
                    //echo "0-global prosperus".$GLOBAL_prosperus."<br>";
                }
                if ($administrations[$comienza]->NombreConcpeto == "Neto"){ $GLOBAL_Neto = $GLOBAL_Neto + $administrations[$comienza]->Importe;
                    $agrupar = "GLOBAL";
                    $colorr = "#A6ACAF";
                    $es = "DEDUCCION";
                    //echo "0-Global Neto".$GLOBAL_Neto."<br>";
                }
            }
            if ($totalPerDed == 1 ){  //W.percepciones AP.deducciones
                $totalPerDed = 0;
                $contador = $contador + 1;
              echo "<tr  bgcolor='".$color."'>";
                echo "<td>";
                  echo $comienza."-".$contador;
                echo "</td>";
                echo "<td>";
                  echo $administrations[$comienza]->IdPersona;
                echo "</td>";
                echo "<td>";
                  echo $administrations[$comienza]->IdEmpleado;
                echo "</td>";
                echo "<td>";
                  echo $administrations[$comienza]->NombreConcpeto;
                echo "</td>";
                echo "<td>";
                  echo $administrations[$comienza]->Importe;
                echo "</td>";
                echo "<td>".$agrupar."</td>";
                echo "<td>".$es."</td>";
                echo "<td>".$administrations[$comienza]->NombreEmpleado."</td>";
                echo "<td>".$esTotal.":-".$administrations[$comienza]->Importe."-P:-".$ImpPer."-D:-".$ImpDed."-</td>";
              //echo "</tr>";
            }

            if($primero == 0){
              $finiprimero = $administrations[$comienza]->FechaInicio;
              $ffinprimero = $administrations[$comienza]->FechaFin;
              $cortar_cadena = $finiprimero;
              //echo "cortar cadena 1:".$cortar_cadena."<br>";
              $cortar_cadena1 = substr($cortar_cadena, 0, 10);
              //echo "cortar cadena 2:".$cortar_cadena1."<br>";
              $E_concept = str_replace("-","", $cortar_cadena1);
              //echo "cortar cadena 1:".$E_concept."<br>";
              $cortar_cadena2 = substr($ffinprimero, 0 ,10);
              $E_pol_0 = "P\x20";   //POLIZA
              $E_clave_1 = $E_concept;  //FECHA
              $E_referencia_2 = "\x20\x20\x203";  //TIPO POLIZA
              $espacio = " ";
              $E_nada_3 = "\x20\x20\x20\x20\x20\x20\x2025"; //FOLIO
              $E_P_o_D_4 = "1"; //CLASE
              $E_importe_5 = "0\x20\x20\x20\x20\x20\x20\x20\x20\x20"; //IDDIARIO
              $texto = "NOMINA PERIODO ".$periodo." CATORCENAL DEL ".$cortar_cadena1." AL ".$cortar_cadena2."";
              $texto1 = "NOM.PER.".$periodo." CATORCENA ".$cortar_cadena1." A ".$cortar_cadena2."";

              $E_cero_6 = rellena_ceros($texto,100,8);
              $E_cero_7 = "\x20\x203";  //SistOrig
              $E_concept_8 = "1"; //Impresa
              $E_Seg_9 = "0";  //Ajuste
              $E_UUID_10 = "F5F99012-513B-412E-9AA1-1E2E2FF8FB56";

              $employe_txt = $E_pol_0.$espacio.$E_clave_1.$espacio.$E_referencia_2.$espacio.$E_nada_3.$espacio.$E_P_o_D_4.$espacio.$E_importe_5.$espacio.$E_cero_6.$E_cero_7.$espacio.$E_concept_8.$espacio.$E_Seg_9.$espacio.$E_UUID_10.$espacio;
              fwrite($ar, $employe_txt);
              fwrite($ar, "\n");
              $primero = 1;
            }

            /*************************************
            * BEGIN_EMPLOY
            ************************************* */
            //if (($agrupar == 'EMPLEADO') OR ($agrupar == 'DEPARTAMENTO')){
            if (($agrupar == 'EMPLEADO')  and ($bandera == "true") and ($empleado == 0)){
                //echo "-LLEGA EMPLEADO-";
                //var_dump($administrations[$comienza]);
                $E_pol_0 = "M1";
                $E_referencia_2 = "NOM.PER.".$periodo."";  //NOMINA->CHANGE
                $espacio = " ";
                $E_nada_3 = "\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                $E_cero_6 = "0\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                $E_cero_7 = "0.0\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                //$E_nada_3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                //$E_cero_6 = "0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                //$E_cero_7 = "0.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


                $respuesta_36 =  get_36($administrations[$comienza]->NombreEmpleado);
                if(strlen($respuesta_36) > 0){
                  $E_UUID_10 = $respuesta_36;
                }else{
                    $E_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //echo "<br><br>RES".$respuesta_36."<br><br>";
                //TABLE EMPLOYES.............

                if (($empleado_tabla == 0) and ($administrations[$comienza]->Importe > 0)){
                    echo "<tr  bgcolor='".$color."'>";
                      echo "<td>";
                        echo $comienza;
                      echo "</td>";
                      echo "<td>";
                        echo $administrations[$comienza]->IdPersona;
                      echo "</td>";
                      echo "<td>";
                        echo $administrations[$comienza]->IdEmpleado;
                      echo "</td>";
                      echo "<td>";
                        echo $administrations[$comienza]->NombreConcpeto;
                      echo "</td>";
                      echo "<td>";
                        echo $administrations[$comienza]->Importe;
                      echo "</td>";
                      echo "<td>".$agrupar."</td>";
                      echo "<td>".$es."</td>";
                      echo "<td>".$administrations[$comienza]->NombreEmpleado."</td>";
                      echo "<td>".$comienza."</td>";
                    //echo "</tr>";
                  }
                  //echo "<br><b>*".$es."*</b><br>";
                  $administrations_depa = getAdministrations_depa($token_mane, $administrations[$comienza]->IdEmpleado);

                  //echo "<br>¿".var_dump($administrations_depa->Atributos[0]->Valor)."?<br>";
                  //echo "<br><br>.............<br>";
                  //var_dump($administrations_depa); echo "~~";
                  //echo "+".$administrations_depa->Atributos[0]->Valor."+";
                  //echo "<br><br>..............<br>";
                  if ($administrations_depa->Atributos[0]->Valor == ""){
                    //echo "ESTE.<br>";
                    //var_dump($administrations[$comienza]); echo "<br>";
                    $depa = getadministrations_depa_INACTIVOS($token_mane, $administrations[$comienza]->IdPersona);
                    $esta = "INACTIVO";
                  }else{
                    $depa = $administrations_depa->Atributos[0]->Valor;
                    $esta = "OK";
                  }
                  $cc_regreso_es = centro_costo($depa);
                  if ($cc_regreso_es == 99){
                    echo "<br><br>A:".$administrations[$comienza]->NombreEmpleado." ".$esta." de".$depa."-".$cc_regreso_es."<br><br><br>";
                  }
                  $E_P_o_D_4 = 0;
                  $E_importe = $administrations[$comienza]->Importe;
                  $E_importe_5 = rellena_ceros($E_importe, 20,6);
                  $E_concept = str_replace("é","E", $administrations[$comienza]->NombreConcpeto);
                  $E_concept = $E_concept." ".$administrations[$comienza]->NombreEmpleado;
                  $E_concept = $E_concept." ".$texto1;
                  $E_concept = strtoupper($E_concept);
                  $E_concept = str_replace("é","E", $E_concept);
                  $E_concept = str_replace("ó","O", $E_concept);
                  //$E_concept = strtoupper($E_concept.$Base);
                  $E_concept = str_replace("í","I", $E_concept);
                  //$E_concept = strtoupper($E_concept.$Base);
                  $E_concept = str_replace("á","A", $E_concept);
                  //$E_concept = strtoupper($E_concept.$Base);

                  //echo "E_pto".$E_concept."<br>";
                  $E_concept_8 = rellena_ceros($E_concept,100,6);

                  //echo "<br><br>num:".strlen($E_concept_8)."<br><br>";
                  if (($administrations[$comienza]->NombreConcpeto == "Préstamo FONACOT") OR
                  ($administrations[$comienza]->NombreConcpeto == "Préstamo INFONAVIT") OR
                  ($administrations[$comienza]->NombreConcpeto == "Seguro de vivienda") ){
                    $cc_regreso_es = "";
                  }
                  $E_Seg_9 = rellena_ceros($cc_regreso_es, 4,9);
                  //QUITAR CENTRO DE COSTOS DE FONACOT, INFONAVIT, SEGURO DE VIVIENDA


                  if(trim($E_importe) > '0'){
                    $E_nombre = str_replace("é","E", $administrations[$comienza]->NombreEmpleado);
                    $E_nombre = strtoupper($E_nombre);
                    $E_nombre = str_replace("é","E", $E_nombre);
                    $E_nombre = str_replace("ó","O", $E_nombre);
                    $E_nombre = str_replace("í","I", $E_nombre);
                    $E_nombre = str_replace("á","A", $E_nombre);

                    //echo "*name:".$E_nombre.":<br>";
                    //DESCUENTO ESPECIAL-SEGURO GASTOS MEDICOS MAYORES - SOLICITADO POR CARLOS VEGA - DESCUENTO DE UNIFORMES
                    if (($administrations[$comienza]->NombreConcpeto == "DESCUENTO ESPECIAL") OR ($administrations[$comienza]->NombreConcpeto == "Seguro de gastos médicos mayores") OR ($administrations[$comienza]->NombreConcpeto == "Descuento de Uniformes")){
                        $regresa = "8000000100000000";
                        $E_clave_1 = rellena_ceros($regresa, 30, 2);
                    }else{

                        $nom_empleado_E = strtoupper($E_nombre);
                        $regresa = get_CC_DB_employ($nom_empleado_E, $administrations[$comienza]->NombreConcpeto);
                        //echo "<br>--".$regresa."<br>";
                        if ($regresa <> ""){    //TIENE CLAVE PROPIA
                          //echo "SI TIENE<br>";
                          $E_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                          //echo "<td>SI TRAE</td>";
                        }else{    //BUSCA EN API
                          $administrations_depa_CC = getAdministrations_CuentaContable($token_mane, $administrations[$comienza]->IdEmpleado, $ano_procesar, $catorcenainicio);
                          //var_dump($administrations_depa_CC);
                          //echo "<br>*********************************************<br>";
                          $E_clave_1 = rellena_ceros ($administrations_depa_CC, 30, 2);
                          //$E_clave_1 = rellena_ceros("6000000100010000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                          //echo "<td>NO TRAE</td>";
                        }
                    }
                    //echo "<td>".$E_clave_1."</td>";
                    echo "</tr>";
                    //echo "-".trim($E_importe)."-<br>";
                    if ($empleado_txt == 0){  //LAYOUT EMPLOY
                        //echo "*";
                        echo $E_pol_0.$espacio.$E_clave_1.$espacio.$E_referencia_2.$espacio.$E_nada_3.$espacio.$E_P_o_D_4.$espacio.$E_importe_5.$espacio.$E_cero_6.$espacio.$E_cero_7.$espacio.$E_concept_8.$espacio.$E_Seg_9.$espacio.$E_UUID_10."";
                        //echo "*";
                        echo "<br>";
                    }
                    $employe_txt = $E_pol_0.$espacio.$E_clave_1.$espacio.$E_referencia_2.$espacio.$E_nada_3.$espacio.$E_P_o_D_4.$espacio.$E_importe_5.$espacio.$E_cero_6.$espacio.$E_cero_7.$espacio.$E_concept_8.$espacio.$E_Seg_9.$espacio.$E_UUID_10;
                    fwrite($ar, $employe_txt);
                    fwrite($ar, "\n");

                  }
                  $E_importe_5 = "";
                  $E_concept_8 = "";
              }
              /*************************************
              * END_EMPLOY
              ************************************* */

            /*************************************
            * BEGIN_DEPARTAMENTO
            ************************************* */
            /*echo "agrupar ".$agrupar."<br>";
            echo "bandera ".$bandera."<br>";
            echo "departamento ".$departamento."<br>";
            echo "importe ".$administrations[$comienza]->Importe."<br>";*/
            //echo "1*)A".$agrupar."-B".$bandera."-D".$departamento."-I".$administrations[$comienza]->Importe."<br>";
            if (($agrupar == 'DEPARTAMENTO') and ($bandera == "true") and ($departamento == 0) and ($administrations[$comienza]->Importe) > 0){
                //echo "2*)Cpto".$administrations[$comienza]->NombreConcpeto."-".$administrations[$comienza]->Importe."<br>";
                //echo "entra <br>";
                $D_pol_0 = "M1";
                //$D_clave_1 = rellena_ceros("6000000100010000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                $D_referencia_2 = "NOM.PER.".$periodo."";  //NOMINA->CHANGE
                $espacio = " ";
                //$D_nada_3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                //$D_cero_6 = "0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                //$D_cero_7 = "0.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                $D_nada_3 = "\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                $D_cero_6 = "0\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                $D_cero_7 = "0.0\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20";
                //$D_UUID_10 = "58AB597A-7419-45E2-A317-4C72018354B2";

                //echo "<br><br>-----------<br>";
                //var_dump($administrations[$comienza]);
                //var_dump ($administrations[$comienza]->Importe);
                //echo "<br><br>-----------<br>";
                $administrations_depa = getAdministrations_depa($token_mane, $administrations[$comienza]->IdEmpleado);

                //echo "<br>¿".var_dump($administrations_depa->Atributos[0]->Valor)."?<br>";
                //echo "<br><br>.............<br>";
                //var_dump($administrations_depa); echo "~~";
                //echo "+".$administrations_depa->Atributos[0]->Valor."+";
                //echo "<br><br>..............<br>";
                if ($administrations_depa->Atributos[0]->Valor == ""){
                  //echo "ESTE.<br>";
                  //var_dump($administrations[$comienza]); echo "<br>";
                  $depa = getadministrations_depa_INACTIVOS($token_mane, $administrations[$comienza]->IdPersona);

                }else{
                  $depa = $administrations_depa->Atributos[0]->Valor;

                }
                //echo "DEPA:".$depa."<br>";

                $conceptoDepa = $administrations[$comienza]->NombreConcpeto;
                //echo "----CP".$conceptoDepa."----<br>";
                switch(trim($depa)){
                  case "ADMINISTRACION Y FINANZAS":
                    $D_admyfinanzas = $D_admyfinanzas + 1;
                    //echo "DEPA-".$conceptoDepa."-<br>";
                    switch ($conceptoDepa){

                      case "Aguinaldo proporcional":
                        $D_admyfinanzas_aguinaldopro = $D_admyfinanzas_aguinaldopro + 1;
                        $D_admyfinanzas_aguinaldopro_I = $D_admyfinanzas_aguinaldopro_I +$administrations[$comienza]->Importe;
                      break;
                      case "Ajuste por redondeo":
                        $D_admyfinanzas_ajusteredondeo = $D_admyfinanzas_ajusteredondeo + 1;
                        $D_admyfinanzas_ajusteredondeo_I = $D_admyfinanzas_ajusteredondeo_I +$administrations[$comienza]->Importe;
                      break;
                      case "Apoyo en subasta":
                        $D_admyfinanzas_apoyosubasta = $D_admyfinanzas_apoyosubasta + 1;
                        $D_admyfinanzas_apoyosubasta_I = $D_admyfinanzas_apoyosubasta_I +$administrations[$comienza]->Importe;
                      break;
                      case "Compensación":
                        $D_admyfinanzas_compensacion = $D_admyfinanzas_compensacion + 1;
                        $D_admyfinanzas_compensacion_I = $D_admyfinanzas_compensacion_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima dominical":
                        $D_admyfinanzas_primadominical = $D_admyfinanzas_primadominical + 1;
                        $D_admyfinanzas_primadominical_I = $D_admyfinanzas_primadominical_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional":
                        $D_admyfinanzas_primavacacional = $D_admyfinanzas_primavacacional + 1;
                        $D_admyfinanzas_primavacacional_I = $D_admyfinanzas_primavacacional_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional proporcional":
                        $D_admyfinanzas_primavacacionalprop = $D_admyfinanzas_primavacacionalprop + 1;
                        $D_admyfinanzas_primavacacionalprop_I = $D_admyfinanzas_primavacacionalprop_I +$administrations[$comienza]->Importe;
                      break;
                      case "Subsidio al empleo":
                        $D_admyfinanzas_subsidioempleo = $D_admyfinanzas_subsidioempleo + 1;
                        $D_admyfinanzas_subsidioempleo_I = $D_admyfinanzas_subsidioempleo_I +$administrations[$comienza]->Importe;
                      break;
                      case "Sueldos":
                        $D_admyfinanzas_sueldos = $D_admyfinanzas_sueldos + 1;
                        $D_admyfinanzas_sueldos_I = $D_admyfinanzas_sueldos_I +$administrations[$comienza]->Importe;
                      break;

                      case "Faltas injustificadas":
                        $D_admyfinanzas_faltasinj = $D_admyfinanzas_faltasinj + 1;
                        $D_admyfinanzas_faltasinj_I = $D_admyfinanzas_faltasinj_I +$administrations[$comienza]->Importe;
                      break;
                      /*case "Descuento de Uniformes":
                        $D_admyfinanzas_descuni = $D_admyfinanzas_descuni + 1;
                        $D_admyfinanzas_descuni_I = $D_admyfinanzas_descuni_I +$administrations[$comienza]->Importe;
                      break;*/
                      case "Seguro de gastos médicos mayores":
                        $D_admyfinanzas_gasmedmay = $D_admyfinanzas_gasmedmay + 1;
                        $D_admyfinanzas_gasmedmay_I = $D_admyfinanzas_gasmedmay_I +$administrations[$comienza]->Importe;
                      break;

                    }
                    break;
                  case "ANTIGUEDADES":
                    //echo "depa".$depa."-".$administrations[$comienza]->IdEmpleado."-".$administrations[$comienza]->NombreEmpleado."<br>";
                    $D_antiguedades = $D_antiguedades + 1;
                    switch ($conceptoDepa){
                      case "Aguinaldo proporcional":
                        $D_antiguedades_aguinaldo = $D_antiguedades_aguinaldo + 1;
                        $D_antiguedades_aguinaldo_I = $D_antiguedades_aguinaldo_I +$administrations[$comienza]->Importe;
                      break;
                      case "Ajuste por redondeo":
                        $D_antiguedades_ajusteredondeo = $D_antiguedades_ajusteredondeo + 1;
                        $D_antiguedades_ajusteredondeo_I = $D_antiguedades_ajusteredondeo_I +$administrations[$comienza]->Importe;
                      break;
                      case "Apoyo en subasta":
                        $D_antiguedades_apoyosubasta = $D_antiguedades_apoyosubasta + 1;
                        $D_antiguedades_apoyosubasta_I = $D_antiguedades_apoyosubasta_I +$administrations[$comienza]->Importe;
                      break;
                      case "Compensacion":
                        $D_antiguedades_compensacion = $D_antiguedades_compensacion + 1;
                        $D_antiguedades_compensacion_I = $D_antiguedades_compensacion_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima dominical":
                        $D_antiguedades_primadom = $D_antiguedades_primadom + 1;
                        $D_antiguedades_primadom_I = $D_antiguedades_primadom_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional":
                        $D_antiguedades_primavac = $D_antiguedades_primavac + 1;
                        $D_antiguedades_primavac_I = $D_antiguedades_primavac_I +$administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional proporcional":
                        $D_antiguedades_primavacprop = $D_antiguedades_primavacprop + 1;
                        $D_antiguedades_primavacprop_I = $D_antiguedades_primavacprop_I +$administrations[$comienza]->Importe;
                      break;
                      case "Subsidio al empleo":
                        $D_antiguedades_subempleo = $D_antiguedades_subempleo + 1;
                        $D_antiguedades_subempleo_I = $D_antiguedades_subempleo_I +$administrations[$comienza]->Importe;
                      break;
                      case "Sueldos":
                        $D_antiguedades_sueldos = $D_antiguedades_sueldos + 1;
                        $D_antiguedades_sueldos_I = $D_antiguedades_sueldos_I +$administrations[$comienza]->Importe;
                      break;
                      case "Faltas injustificadas":
                        $D_antiguedades_faltainj = $D_antiguedades_faltainj + 1;
                        $D_antiguedades_faltainj_I = $D_antiguedades_faltainj_I +$administrations[$comienza]->Importe;
                      break;
                      /*case "Descuento de Uniformes":
                        $D_antiguedades_descunif = $D_antiguedades_descunif + 1;
                        $D_antiguedades_descunif_I = $D_antiguedades_descunif_I +$administrations[$comienza]->Importe;
                      break;*/
                      case "Seguro de gastos médicos mayores":
                        $D_antiguedades_segmedmay = $D_antiguedades_segmedmay + 1;
                        $D_antiguedades_segmedmay_I = $D_antiguedades_segmedmay_I +$administrations[$comienza]->Importe;
                      break;
                    }
                    break;
                  case "ARTE MODERNO":
                    $D_artemoderno = $D_artemoderno + 1;
                    switch ($conceptoDepa){
                      case "Aguinaldo proporcional":
                        $D_artemoderno_aguinaldoprop =  $D_artemoderno_aguinaldoprop + 1;
                        $D_artemoderno_aguinaldoprop_I = $D_artemoderno_aguinaldoprop_I + $administrations[$comienza]->Importe;
                      break;
                      case "Ajuste por redondeo":
                        $D_artemoderno_ajusteredondeo =  $D_artemoderno_ajusteredondeo + 1;
                        $D_artemoderno_ajusteredondeo_I = $D_artemoderno_ajusteredondeo_I + $administrations[$comienza]->Importe;
                      break;
                      case "Apoyo en subasta":
                        $D_artemoderno_apoyosubasta = $D_artemoderno_apoyosubasta + 1;
                        $D_artemoderno_apoyosubasta_I = $D_artemoderno_apoyosubasta_I + $administrations[$comienza]->Importe;
                      break;
                      case "Compensacion":
                        $D_artemoderno_compensacion = $D_artemoderno_compensacion + 1;
                        $D_artemoderno_compensacion_I = $D_artemoderno_compensacion_I + $administrations[$comienza]->Importe;
                      break;
                      case "Prima dominical":
                        $D_artemoderno_primdom = $D_artemoderno_primdom + 1;
                        $D_artemoderno_primdom_I = $D_artemoderno_primdom_I + $administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional":
                        $D_artemoderno_primvac = $D_artemoderno_primvac + 1;
                        $D_artemoderno_primvac_I = $D_artemoderno_primvac_I + $administrations[$comienza]->Importe;
                      break;
                      case "Prima vacacional proporcional":
                        $D_artemoderno_primvacpro = $D_artemoderno_primvacpro + 1;
                        $D_artemoderno_primvacpro_I = $D_artemoderno_primvacpro_I + $administrations[$comienza]->Importe;
                      break;
                      case "Subsidio al empleo":
                        $D_artemoderno_subsidio = $D_artemoderno_subsidio + 1;
                        $D_artemoderno_subsidio_I = $D_artemoderno_subsidio_I + $administrations[$comienza]->Importe;
                      break;
                      case "Sueldos":
                        $D_artemoderno_sueldos = $D_artemoderno_sueldos + 1;
                        $D_artemoderno_sueldos_I = $D_artemoderno_sueldos_I + $administrations[$comienza]->Importe;
                      break;
                      case "Faltas injustificadas":
                        $D_artemoderno_injustificadas = $D_artemoderno_injustificadas + 1;
                        $D_artemoderno_injustificadas_I = $D_artemoderno_injustificadas_I + $administrations[$comienza]->Importe;
                      break;
                      /*case "Descuento de Uniformes":
                        $D_artemoderno_descuniformes = $D_artemoderno_descuniformes + 1;
                        $D_artemoderno_descuniformes_I = $D_artemoderno_descuniformes_I + $administrations[$comienza]->Importe;
                      break;*/
                      case "Seguro de gastos médicos mayores":
                        $D_artemoderno_segmedmay = $D_artemoderno_segmedmay + 1;
                        $D_artemoderno_segmedmay_I = $D_artemoderno_segmedmay_I + $administrations[$comienza]->Importe;
                      break;

                    }
                    break;
                  case "AUTOS Y CAMIONES":
                    $D_autosycamiones = $D_autosycamiones + 1;
                    switch ($conceptoDepa){
                        case "Aguinaldo porporcional":
                          $D_autoscamion_aguinaldo =  $D_autoscamion_aguinaldo + 1;
                          $D_autoscamion_aguinaldo_I = $D_autoscamion_aguinaldo_I + $administrations[$comienza]->Importe;
                        break;
                        case "Ajuste por redondeo":
                          $D_autoscamion_ajusteredondeo =  $D_autoscamion_ajusteredondeo + 1;
                          $D_autoscamion_ajusteredondeo_I = $D_autoscamion_ajusteredondeo_I + $administrations[$comienza]->Importe;
                        break;
                        case "Apoyo en subasta":
                          $D_autoscamion_apoyosubasta =  $D_autoscamion_apoyosubasta + 1;
                          $D_autoscamion_apoyosubasta_I = $D_autoscamion_apoyosubasta_I + $administrations[$comienza]->Importe;
                        break;
                        case "Compensacion":
                          $D_autoscamion_compensacion =  $D_autoscamion_compensacion + 1;
                          $D_autoscamion_compensacion_I = $D_autoscamion_compensacion_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima dominical":
                          $D_autoscamion_primdom =  $D_autoscamion_primdom + 1;
                          $D_autoscamion_primdom_I = $D_autoscamion_primdom_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional":
                          $D_autoscamion_primvac =  $D_autoscamion_primvac + 1;
                          $D_autoscamion_primvac_I = $D_autoscamion_primvac_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional proporcional":
                          $D_autoscamion_primvacpro =  $D_autoscamion_primvacpro + 1;
                          $D_autoscamion_primvacpro_I = $D_autoscamion_primvacpro_I + $administrations[$comienza]->Importe;
                        break;
                        case "Subsidio al empleo":
                          $D_autoscamion_subsidioe = $D_autoscamion_subsidioe + 1;
                          $D_autoscamion_subsidioe_I = $D_autoscamion_subsidioe_I + $administrations[$comienza]->Importe;
                        break;
                        case "Sueldos":
                          $D_autoscamion_sueldos = $D_autoscamion_sueldos + 1;
                          $D_autoscamion_sueldos_I = $D_autoscamion_sueldos_I + $administrations[$comienza]->Importe;
                        break;
                        case "Faltas injustificadas":
                          $D_autoscamion_faltasin = $D_autoscamion_faltasin + 1;
                          $D_autoscamion_faltasin_I = $D_autoscamion_faltasin_I + $administrations[$comienza]->Importe;
                        break;
                        /*case "Descuento de uniformes":
                          $D_autoscamion_descun = $D_autoscamion_descun + 1;
                          $D_autoscamion_descun_I = $D_autoscamion_descun_I + $administrations[$comienza]->Importe;
                        break;*/
                        case "Seguro de gastos médicos mayores":
                          $D_autoscamion_segmedmay = $D_autoscamion_segmedmay + 1;
                          $D_autoscamion_segmedmay_I = $D_autoscamion_segmedmay_I + $administrations[$comienza]->Importe;
                        break;

                    }
                    break;
                  case "CAPITAL HUMANO":
                      $D_capitalhumano = $D_capitalhumano + 1;
                      switch ($conceptoDepa){
                        case "Aguinaldo proporcional":
                          $D_capitalhum_aguinaldopro =  $D_capitalhum_aguinaldopro + 1;
                          $D_capitalhum_aguinaldopro_I = $D_capitalhum_aguinaldopro_I + $administrations[$comienza]->Importe;
                        break;
                        case "Ajuste por redondeo":
                          $D_capitalhum_ajusteredondeo =  $D_capitalhum_ajusteredondeo + 1;
                          $D_capitalhum_ajusteredondeo_I = $D_capitalhum_ajusteredondeo_I + $administrations[$comienza]->Importe;
                        break;
                        case "Apoyo en subasta":
                          $D_capitalhum_apoyosubasta = $D_capitalhum_apoyosubasta + 1;
                          $D_capitalhum_apoyosubasta_I = $D_capitalhum_apoyosubasta_I + $administrations[$comienza]->Importe;
                        break;
                        case "Compensacion":
                          $D_capitalhum_compensacion = $D_capitalhum_compensacion + 1;
                          $D_capitalhum_compensacion_I = $D_capitalhum_compensacion_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima dominical":
                          $D_capitalhum_primadominical = $D_capitalhum_primadominical + 1;
                          $D_capitalhum_primadominical_I = $D_capitalhum_primadominical_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional":
                          $D_capitalhum_primavac = $D_capitalhum_primavac + 1;
                          $D_capitalhum_primavac_I = $D_capitalhum_primavac_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional proporcional":
                          $D_capitalhum_primavacpro = $D_capitalhum_primavacpro + 1;
                          $D_capitalhum_primavacpro_I = $D_capitalhum_primavacpro_I + $administrations[$comienza]->Importe;
                        break;
                        case "Subsidio al empleo":
                          $D_capitalhum_subsidio = $D_capitalhum_subsidio + 1;
                          $D_capitalhum_subsidio_I = $D_capitalhum_subsidio_I + $administrations[$comienza]->Importe;
                        break;
                        case "Sueldos":
                          $D_capitalhum_sueldos = $D_capitalhum_sueldos + 1;
                          $D_capitalhum_sueldos_I = $D_capitalhum_sueldos_I + $administrations[$comienza]->Importe;
                        break;
                        case "Faltas injustificadas":
                          $D_capitalhum_faltasinj = $D_capitalhum_faltasinj + 1;
                          $D_capitalhum_faltasinj_I = $D_capitalhum_faltasinj_I + $administrations[$comienza]->Importe;
                        break;
                        /*case "Descuento de Uniformes":
                          $D_capitalhum_descuniform = $D_capitalhum_descuniform + 1;
                          $D_capitalhum_descuniform_I = $D_capitalhum_descuniform_I + $administrations[$comienza]->Importe;
                        break;*/
                        case "Seguro de gastos medicos mayores":
                          $D_capitalhum_segmedmay = $D_capitalhum_segmedmay + 1;
                          $D_capitalhum_segmedmay_I = $v_I + $administrations[$comienza]->Importe;
                        break;
                      }
                      break;
                  /*case "EMPEÑOS":
                      $D_empeños = $D_empeños + 1;
                      //echo $conceptoDepa."<br>";
                      switch (trim($conceptoDepa)){
                        case "Aguinaldo proporcional":
                          $D_enpenos_aguinaldo =  $D_enpenos_aguinaldo + 1;
                          $D_enpenos_aguinaldo_I = $D_enpenos_aguinaldo_I + $administrations[$comienza]->Importe;
                        break;
                        case "Ajuste por redondeo":
                          $D_enpenos_ajusteredondeo =  $D_enpenos_ajusteredondeo + 1;
                          $D_enpenos_ajusteredondeo_I = $D_enpenos_ajusteredondeo_I + $administrations[$comienza]->Importe;
                        break;
                        case "Apoyo en subasta":
                          $D_enpenos_apoyos =  $D_enpenos_apoyos + 1;
                          $D_enpenos_apoyos_I = $D_enpenos_apoyos_I + $administrations[$comienza]->Importe;
                        break;
                        case "Compensacion":
                          $D_enpenos_compensacion =  $D_enpenos_compensacion + 1;
                          $D_enpenos_compensacion_I = $D_enpenos_compensacion_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima dominical":
                          $D_enpenos_primadom =  $D_enpenos_primadom + 1;
                          $D_enpenos_primadom_I = $D_enpenos_primadom_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional":
                          $D_enpenos_primavac =  $D_enpenos_primavac + 1;
                          $D_enpenos_primavac_I = $D_enpenos_primavac_I + $administrations[$comienza]->Importe;
                        break;
                        case "Prima vacacional proporcional":
                          $D_enpenos_primavacpro =  $D_enpenos_primavacpro + 1;
                          $D_enpenos_primavacpro_I = $D_enpenos_primavacpro_I + $administrations[$comienza]->Importe;
                        break;
                        case "Subsidio al empleo":
                          $D_enpenos_subsidioem =  $D_enpenos_subsidioem + 1;
                          $D_enpenos_subsidioem_I = $D_enpenos_subsidioem_I + $administrations[$comienza]->Importe;
                        break;
                        case "Sueldos":
                          $D_empenos_sueldos = $D_enpenos_sueldos + 1;
                          $D_empenos_sueldos_I = $D_empenos_sueldos_I + $administrations[$comienza]->Importe;
                        break;
                        case "Faltas injustificadas":
                          $D_empenos_faltaasinj = $D_empenos_faltaasinj + 1;
                          $D_empenos_faltaasinj_I = $D_empenos_faltaasinj_I + $administrations[$comienza]->Importe;
                        break;

                        case "Descuento de uniformes":
                          $D_empenos_descuni = $D_empenos_descuni + 1;
                          $D_empenos_descuni_I = $D_empenos_descuni_I + $administrations[$comienza]->Importe;
                        break;
                        case "Seguro de gastos medicos mayores":
                          $D_empenos_segmasmedmay = $D_empenos_segmasmedmay + 1;
                          $D_empenos_segmasmedmay_I = $D_empenos_segmasmedmay_I + $administrations[$comienza]->Importe;
                        break;

                      }
                      break;*/
                  case "DIRECCION":
                      //$D_direccion = $D_direccion + 1;
                    //echo "DEPA-".$conceptoDepa."-<br>";

                      switch (trim($conceptoDepa)){
                        case "Aguinaldo porporcional":
                          $D_direccion_aguinaldo =  $D_direccion_aguinaldo + 1;
                          $D_direccion_aguinaldo_I = $D_direccion_aguinaldo_I + $administrations[$comienza]->Importe;
                         break;
                        case "Ajuste por redondeo":
                          $D_direccion_ajusteredondeo =  $D_direccion_ajusteredondeo + 1;
                          $D_direccion_ajusteredondeo_I = $D_direccion_ajusteredondeo_I + $administrations[$comienza]->Importe;
                         break;
                        case "Apoyo en subasta":
                           $D_direccion_apoyo =  $D_direccion_apoyo + 1;
                           $D_direccion_apoyo_I = $D_direccion_apoyo_I + $administrations[$comienza]->Importe;
                           break;
                        case "Compensacion":
                           $D_direccion_compensacion =  $D_direccion_compensacion + 1;
                           $D_direccion_compensacion_I = $D_direccion_compensacion_I + $administrations[$comienza]->Importe;
                           break;
                        case "Prima dominical":
                            $D_direccion_primadom =  $D_direccion_primadom + 1;
                            $D_direccion_primadom_I = $D_direccion_primadom_I + $administrations[$comienza]->Importe;
                            break;
                        case "Prima vacacional":
                            $D_direccion_primavac =  $D_direccion_primavac + 1;
                            $D_direccion_primavac_I = $D_direccion_primavac_I + $administrations[$comienza]->Importe;
                            break;
                        case "Prima vacacional proporcional":
                            $D_direccion_primavacpro =  $D_direccion_primavacpro + 1;
                            $D_direccion_primavacpro_I = $D_direccion_primavacpro_I + $administrations[$comienza]->Importe;
                            break;
                        case "Subsidio al empleo":
                            $D_direccion_subempleo =  $D_direccion_subempleo + 1;
                            $D_direccion_subempleo_I = $D_direccion_subempleo_I + $administrations[$comienza]->Importe;
                            break;
                        case "Sueldos":
                            $D_direccion_sueldos = $D_direccion_sueldos_I + 1;
                            $D_direccion_sueldos_I = $D_direccion_sueldos_I + $administrations[$comienza]->Importe;
                            break;
                        case "Faltas injustificadas":
                            $D_direccion_faltinj = $D_direccion_faltinj + 1;
                            $D_direccion_faltinj_I = $D_direccion_faltinj_I + $administrations[$comienza]->Importe;
                            break;
                        /*case "Descuento de uniformes":
                            $D_direccion_descuni = $D_direccion_descuni + 1;
                            $D_direccion_descuni_I = $D_direccion_descuni_I + $administrations[$comienza]->Importe;
                            break;*/
                        case "Seguro de gastos médicos mayores":
                            $D_direccion_medmay = $D_direccion_medmay + 1;
                            $D_direccion_medmay_I = $D_direccion_medmay_I + $administrations[$comienza]->Importe;
                            break;
                      }
                      break;
                  case "GUADALAJARA":
                        $D_guadalajara = $D_guadalajara + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_guadalajara_aguinaldo =  $D_guadalajara_aguinaldo + 1;
                            $D_guadalajara_aguinaldo_I = $D_guadalajara_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_guadalajara_ajusteredondeo =  $D_guadalajara_ajusteredondeo + 1;
                            $D_guadalajara_ajusteredondeo_I = $D_guadalajara_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_guadalajara_apooyos =  $D_guadalajara_apooyos + 1;
                            $D_guadalajara_apooyos_I = $D_guadalajara_apooyos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Copmpensacion":
                            $D_guadalajara_compensacion =  $D_guadalajara_compensacion + 1;
                            $D_guadalajara_compensacion_I = $D_guadalajara_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_guadalajara_primado =  $D_guadalajara_primado + 1;
                            $D_guadalajara_primado_I = $D_guadalajara_primado_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_guadalajara_primavac =  $D_guadalajara_primavac + 1;
                            $D_guadalajara_primavac_I = $D_guadalajara_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_guadalajara_primvacpro =  $D_guadalajara_primvacpro + 1;
                            $D_guadalajara_primvacpro_I = $D_guadalajara_primvacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_guadalajara_subsidio =  $D_guadalajara_subsidio + 1;
                            $D_guadalajara_subsidio_I = $D_guadalajara_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_guadalajara_sueldos = $D_guadalajara_sueldos + 1;
                            $D_guadalajara_sueldos_I = $D_guadalajara_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_guadalajara_faltasinj = $D_guadalajara_faltasinj + 1;
                            $D_guadalajara_faltasinj_I = $D_guadalajara_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_guadalajara_descuni = $D_guadalajara_descuni + 1;
                            $D_guadalajara_descuni_I = $D_guadalajara_descuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos medicos mayores":
                            $D_guadalajara_seggasmedmay = $D_guadalajara_seggasmedmay + 1;
                            $D_guadalajara_seggasmedmay_I = $D_guadalajara_seggasmedmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "HERENCIAS Y COLECCIONES":
                        $D_herenciaycolecciones = $D_herenciaycolecciones + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_herenciacolec_aguinaldo =  $D_herenciacolec_aguinaldo + 1;
                            $D_herenciacolec_aguinaldo_I = $D_herenciacolec_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_herenciacolec_ajusteredondeo =  $D_herenciacolec_ajusteredondeo + 1;
                            $D_herenciacolec_ajusteredondeo_I = $D_herenciacolec_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_herenciacolec_apoyos =  $D_herenciacolec_apoyos + 1;
                            $D_herenciacolec_apoyos_I = $D_herenciacolec_apoyos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_herenciacolec_compensacion =  $D_herenciacolec_compensacion + 1;
                            $D_herenciacolec_compensacion_I = $D_herenciacolec_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominal":
                            $D_herenciacolec_primad =  $D_herenciacolec_primad + 1;
                            $D_herenciacolec_primad_I = $D_herenciacolec_primad_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_herenciacolec_primavac=  $D_herenciacolec_primavac + 1;
                            $D_herenciacolec_primavac_I = $D_herenciacolec_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_herenciacolec_primavacpro =  $D_herenciacolec_primavacpro + 1;
                            $D_herenciacolec_primavacpro_I = $D_herenciacolec_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_herenciacolec_subsidio =  $D_herenciacolec_subsidio + 1;
                            $D_herenciacolec_subsidio_I = $D_herenciacolec_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                              $D_herenciacolec_sueldos = $D_herenciacolec_sueldos + 1;
                              $D_herenciacolec_sueldos_I = $D_herenciacolec_sueldos_I + $administrations[$comienza]->Importe;
                            break;
                          case "Faltas injustificadas":
                            $D_herenciacolec_faltasinj =  $D_herenciacolec_faltasinj + 1;
                            $D_herenciacolec_faltasinj_I = $D_herenciacolec_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_herenciacolec_descuni =  $D_herenciacolec_descuni + 1;
                            $D_herenciacolec_descuni_I = $D_herenciacolec_descuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_herenciacolec_medimay =  $D_herenciacolec_medimay + 1;
                            $D_herenciacolec_medimay_I = $D_herenciacolec_medimay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "JOYERIA":
                          $D_joyeria = $D_joyeria + 1;
                          switch (trim($conceptoDepa)){
                            case "Aguinaldo proporcional":
                              $D_joyeria_aguinaldo =  $D_joyeria_aguinaldo + 1;
                              $D_joyeria_aguinaldo_I = $D_joyeria_aguinaldo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Ajuste por redondeo":
                              $D_joyeria_ajusteredondeo =  $D_joyeria_ajusteredondeo + 1;
                              $D_joyeria_ajusteredondeo_I = $D_joyeria_ajusteredondeo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Apoyo en subasta":
                              $D_joyeria_apoyosu =  $D_joyeria_apoyosu + 1;
                              $D_joyeria_apoyosu_I = $D_joyeria_apoyosu_I + $administrations[$comienza]->Importe;
                            break;
                            case "Compensacion":
                              $D_joyeria_compensacion =  $D_joyeria_compensacion + 1;
                              $D_joyeria_compensacion_I = $D_joyeria_compensacion_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima dominical":
                              $D_joyeria_primadom =  $D_joyeria_primadom + 1;
                              $D_joyeria_primadom_I = $D_joyeria_primadom_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional":
                              $D_joyeria_primavac =  $D_joyeria_primavac + 1;
                              $D_joyeria_primavac_I = $D_joyeria_primavac_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional proporcional":
                              $D_joyeria_primavacpro =  $D_joyeria_primavacpro + 1;
                              $D_joyeria_primavacpro_I = $D_joyeria_primavacpro_I + $administrations[$comienza]->Importe;
                            break;
                            case "Subsidio al empleo":
                              $D_joyeria_subsidio =  $D_joyeria_subsidio + 1;
                              $D_joyeria_subsidio_I = $D_joyeria_subsidio_I + $administrations[$comienza]->Importe;
                            break;
                            case "Sueldos":
                              $D_joyeria_sueldos = $D_joyeria_sueldos + 1;
                              $D_joyeria_sueldos_I = $D_joyeria_sueldos_I + $administrations[$comienza]->Importe;
                            break;
                            case "Faltas injustificadas":
                              $D_joyeria_faltasinj = $D_joyeria_faltasinj + 1;
                              $D_joyeria_faltasinj_I = $D_joyeria_faltasinj_I + $administrations[$comienza]->Importe;
                            break;
                            /*
                            case "Descuentos en uniformes":
                              $D_joyeria_descuni = $D_joyeria_descuni + 1;
                              $D_joyeria_descuni_I = $D_joyeria_descuni_I + $administrations[$comienza]->Importe;
                            break;*/
                            case "Seguro de gastos medicos mayores":
                              $D_joyeria_seggasmedmay = $D_joyeria_seggasmedmay + 1;
                              $D_joyeria_seggasmedmay_I = $D_joyeria_seggasmedmay_I + $administrations[$comienza]->Importe;
                            break;

                          }
                            break;
                  case "LEGAL":
                          $D_legal = $D_legal + 1;
                          switch (trim($conceptoDepa)){
                            case "Aguinaldo proporcional":
                              $D_legal_aguinaldo =  $D_legal_aguinaldo + 1;
                              $D_legal_aguinaldo_I = $D_legal_aguinaldo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Ajuste por redondeo":
                              $D_legal_ajusteredondeo =  $D_legal_ajusteredondeo + 1;
                              $D_legal_ajusteredondeo_I = $D_legal_ajusteredondeo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Apoyo en subasta":
                              $D_legal_apoyosub =  $D_legal_apoyosub + 1;
                              $D_legal_apoyosub_I = $D_legal_apoyosub_I + $administrations[$comienza]->Importe;
                            break;
                            case "Compensacion":
                              $D_legal_compensacion =  $D_legal_compensacion + 1;
                              $D_legal_compensacion_I = $D_legal_compensacion_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima dominical":
                              $D_legal_primadomi =  $D_legal_primadomi + 1;
                              $D_legal_primadomi_I = $D_legal_primadomi_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional":
                              $D_legal_primavac =  $D_legal_primavac + 1;
                              $D_legal_primavac_I = $D_legal_primavac_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional proporcional":
                              $D_legal_primavacpro =  $D_legal_primavacpro + 1;
                              $D_legal_primavacpro_I = $D_legal_primavacpro_I + $administrations[$comienza]->Importe;
                            break;
                            case "Subsidio al empleo":
                              $D_legal_subsidio =  $D_legal_subsidio + 1;
                              $D_legal_subsidio_I = $D_legal_subsidio_I + $administrations[$comienza]->Importe;
                            break;
                            case "Sueldos":
                              $D_legal_sueldos = $D_legal_sueldos + 1;
                              $D_legal_sueldos_I = $D_legal_sueldos_I + $administrations[$comienza]->Importe;
                            break;
                            case "Faltas injustificadas":
                              $D_legal_faltasinj = $D_legal_faltasinj + 1;
                              $D_legal_faltasinj_I = $D_legal_faltasinj_I + $administrations[$comienza]->Importe;
                            break;
                            /*
                            case "Descuento de uniformes":
                              $D_legal_descuni = $D_legal_descuni + 1;
                              $D_legal_descuni_I = $D_legal_descuni_I + $administrations[$comienza]->Importe;
                            break;*/
                            case "Seguro de gastos medicos mayores":
                              $D_legal_seggasmedmay = $D_legal_seggasmedmay + 1;
                              $D_legal_seggasmedmay_I = $D_legal_seggasmedmay_I + $administrations[$comienza]->Importe;
                            break;
                          }
                            break;
                  case "LIBROS":
                          $D_libros = $D_libros + 1;
                          switch (trim($conceptoDepa)){
                            case "Aguinaldo proporcional":
                              $D_libros_aguinaldo =  $D_libros_aguinaldo + 1;
                              $D_libros_aguinaldo_I = $D_libros_aguinaldo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Ajuste por redondeo":
                              $D_libros_ajusteredondeo =  $D_libros_ajusteredondeo + 1;
                              $D_libros_ajusteredondeo_I = $D_libros_ajusteredondeo_I + $administrations[$comienza]->Importe;
                            break;
                            case "Apoyo en subasta":
                              $D_libros_apoyosub =  $D_libros_apoyosub + 1;
                              $D_libros_apoyosub_I = $D_libros_apoyosub_I + $administrations[$comienza]->Importe;
                            break;
                            case "Compensacion":
                              $D_libros_compensacion =  $D_libros_compensacion + 1;
                              $D_libros_compensacion_I = $D_libros_compensacion_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima dominical":
                              $D_libros_primadom =  $D_libros_primadom + 1;
                              $D_libros_primadom_I = $D_libros_primadom_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional":
                              $D_libros_primavac =  $D_libros_primavac + 1;
                              $D_libros_primavac_I = $D_libros_primavac_I + $administrations[$comienza]->Importe;
                            break;
                            case "Prima vacacional proporcional":
                              $D_libros_primavacpro =  $D_libros_primavacpro + 1;
                              $D_libros_primavacpro_I = $D_libros_primavacpro_I + $administrations[$comienza]->Importe;
                            break;
                            case "Subsidio al empleo":
                              $D_libros_subsidio =  $D_libros_subsidio + 1;
                              $D_libros_subsidio_I = $D_libros_subsidio_I + $administrations[$comienza]->Importe;
                            break;
                            case "Sueldos":
                              $D_libros_sueldos = $D_libros_sueldos + 1;
                              $D_libros_sueldos_I = $D_libros_sueldos_I + $administrations[$comienza]->Importe;
                            break;
                            case "Faltas injustificadas":
                              $D_libros_faltasinj = $D_libros_faltasinj + 1;
                              $D_libros_faltasinj_I = $D_libros_faltasinj_I + $administrations[$comienza]->Importe;
                            break;
                            /*
                            case "Descuento de uniformes":
                              $D_libros_descuni = $D_libros_descuni + 1;
                              $D_libros_descuni_I = $D_libros_descuni_I + $administrations[$comienza]->Importe;
                            break;*/
                            case "Seguro de gastos medicos mayores":
                              $D_libros_seggasmedmay = $D_libros_seggasmedmay + 1;
                              $D_libros_seggasmedmay_I = $D_libros_seggasmedmay_I + $administrations[$comienza]->Importe;
                            break;

                          }
                          break;
                  case "LOGISTICA Y ALMACEN":
                        $D_logisticayalmancen = $D_logisticayalmancen + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_logalm_aguinaldo =  $D_logalm_aguinaldo + 1;
                            $D_logalm_aguinaldo_I = $D_logalm_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_logalm_ajusteredondeo =  $D_logalm_ajusteredondeo + 1;
                            $D_logalm_ajusteredondeo_I = $D_logalm_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_logalm_apoyosub =  $D_logalm_apoyosub + 1;
                            $D_logalm_apoyosub_I = $D_logalm_apoyosub_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_logalm_primadom =  $D_logalm_primadom + 1;
                            $D_logalm_primadom_I = $D_logalm_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_logalm_primvac =  $D_logalm_primvac + 1;
                            $D_logalm_primvac_I = $D_logalm_primvac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_logalm_primvacpro =  $D_logalm_primvacpro + 1;
                            $D_logalm_primvacpro_I = $D_logalm_primvacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_logalm_subsidio =  $D_logalm_subsidio + 1;
                            $D_logalm_subsidio_I = $D_logalm_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_logalm_sueldos = $D_logalm_sueldos + 1;
                            $D_logalm_sueldos_I = $D_logalm_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_logalm_faltasinju =  $D_logalm_faltasinju + 1;
                            $D_logalm_faltasinju_I = $D_logalm_faltasinju_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuentos de uniformes":
                            $D_logalm_descunif =  $D_logalm_descunif + 1;
                            $D_logalm_descunif_I = $D_logalm_descunif_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguros de gastos medicos mayores":
                            $D_logalm_seggasmedmay =  $D_logalm_seggasmedmay + 1;
                            $D_logalm_seggasmedmay_I = $D_logalm_seggasmedmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "MONTERREY":
                        $D_monterrey = $D_monterrey + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_monterrey_aguinaldo =  $D_monterrey_aguinaldo + 1;
                            $D_monterrey_aguinaldo_I = $D_monterrey_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_monterrey_ajusteredondeo =  $D_monterrey_ajusteredondeo + 1;
                            $D_monterrey_ajusteredondeo_I = $D_monterrey_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_monterrey_apoyos =  $D_monterrey_apoyos + 1;
                            $D_monterrey_apoyos_I = $D_monterrey_apoyos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compnesacion":
                            $D_monterrey_compensacion =  $D_monterrey_compensacion + 1;
                            $D_monterrey_compensacion_I = $D_monterrey_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_monterrey_primadom =  $D_monterrey_primadom + 1;
                            $D_monterrey_primadom_I = $D_monterrey_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_monterrey_primavac =  $D_monterrey_primavac + 1;
                            $D_monterrey_primavac_I = $D_monterrey_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_monterrey_primavacpro =  $D_monterrey_primavacpro + 1;
                            $D_monterrey_primavacpro_I = $D_monterrey_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_monterrey_subsidio =  $D_monterrey_subsidio + 1;
                            $D_monterrey_subsidio_I = $D_monterrey_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_monterrey_sueldos = $D_monterrey_sueldos + 1;
                            $D_monterrey_sueldos_I = $D_monterrey_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_monterrey_faltasinj = $D_monterrey_faltasinj + 1;
                            $D_monterrey_faltasinj_I = $D_monterrey_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_monterrey_descuni = $D_monterrey_descuni + 1;
                            $D_monterrey_descuni_I = $D_monterrey_descuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos medicos mayores":
                            $D_monterrey_seggasmedmay = $D_monterrey_seggasmedmay + 1;
                            $D_monterrey_seggasmedmay_I = $D_monterrey_seggasmedmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                          break;
                  case "MARKETING":
                        $D_marketing = $D_marketing + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_marketing_aguinaldo =  $D_marketing_aguinaldo + 1;
                            $D_marketing_aguinaldo_I = $D_marketing_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_marketing_ajusteredondeo =  $D_marketing_ajusteredondeo + 1;
                            $D_marketing_ajusteredondeo_I = $D_marketing_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_marketing_apoyosub =  $D_marketing_apoyosub + 1;
                            $D_marketing_apoyosub_I = $D_marketing_apoyosub_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_marketing_compensacion =  $D_marketing_compensacion + 1;
                            $D_marketing_compensacion_I = $D_marketing_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_marketing_primvac = $D_marketing_primvac + 1;
                            $D_marketing_primvac_I = $D_marketing_primvac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_marketing_primvacpro = $D_marketing_primvacpro + 1;
                            $D_marketing_primvacpro_I = $D_marketing_primvacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_marketing_primdom = $D_marketing_primdom + 1;
                            $D_marketing_primdom_I = $D_marketing_primdom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_marketing_subsidio = $D_marketing_subsidio + 1;
                            $D_marketing_subsidio_I = $D_marketing_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_marketing_sueldos = $D_marketing_sueldos + 1;
                            $D_marketing_sueldos_I = $D_marketing_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_marketing_faltasinj = $D_marketing_faltasinj + 1;
                            $D_marketing_faltasinj_I = $D_marketing_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_marketing_desuni = $D_marketing_desuni + 1;
                            $D_marketing_desuni_I = $D_marketing_desuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_marketing_medmay = $D_marketing_medmay + 1;
                            $D_marketing_medmay_I = $D_marketing_medmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "TECNOLOGIAS DE LA INFORMACION":
                        $D_tecinfo = $D_tecinfo + 1;
                        //echo $conceptoDepa."<br>";
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_tecinf_aguinaldo =  $D_tecinf_aguinaldo + 1;
                            $D_tecinf_aguinaldo_I = $D_tecinf_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_tecinf_ajusteredondeo =  $D_tecinf_ajusteredondeo + 1;
                            $D_tecinf_ajusteredondeo_I = $D_tecinf_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_tecinf_apoyosubasta =  $D_tecinf_apoyosubasta + 1;
                            $D_tecinf_apoyosubasta_I = $D_tecinf_apoyosubasta_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_tecinf_compensacion =  $D_tecinf_compensacion + 1;
                            $D_tecinf_compensacion_I = $D_tecinf_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_tecinf_primadom =  $D_tecinf_primadom + 1;
                            $D_tecinf_primadom_I = $D_tecinf_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_tecinf_primvac =  $D_tecinf_primvac + 1;
                            $D_tecinf_primvac_I = $D_tecinf_primvac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_tecinf_promavacpro =  $D_tecinf_promavacpro + 1;
                            $D_tecinf_promavacpro_I = $D_tecinf_promavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_tecinf_subsidio =  $D_tecinf_subsidio + 1;
                            $D_tecinf_subsidio_I = $D_tecinf_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_tecinf_sueldos = $D_tecinf_sueldos + 1;
                            $D_tecinf_sueldos_I = $D_tecinf_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_tecinf_faltasinj = $D_tecinf_faltasinj + 1;
                            $D_tecinf_faltasinj_I = $D_tecinf_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_tecinf_descuni = $D_tecinf_descuni + 1;
                            $D_tecinf_descuni_I = $D_tecinf_descuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_tecinf_medmay = $D_tecinf_medmay + 1;
                            $D_tecinf_medmay_I = $D_tecinf_medmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "OBRA GRAFICA":
                        $D_obragrafica = $D_obragrafica + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_obragraf_aguinaldopro =  $D_obragraf_aguinaldopro + 1;
                            $D_obragraf_aguinaldopro_I = $D_obragraf_aguinaldopro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_obragraf_ajusteredondeo =  $D_obragraf_ajusteredondeo + 1;
                            $D_obragraf_ajusteredondeo_I = $D_obragraf_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_obragraf_apoyosub =  $D_obragraf_apoyosub + 1;
                            $D_obragraf_apoyosub_I = $D_obragraf_apoyosub_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_obragraf_compensacion =  $D_obragraf_compensacion + 1;
                            $D_obragraf_compensacion_I = $D_obragraf_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_obragraf_primadom =  $D_obragraf_primadom + 1;
                            $D_obragraf_primadom_I = $D_obragraf_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacionl":
                            $D_obragraf_primvac =  $D_obragraf_primvac + 1;
                            $D_obragraf_primvac_I = $D_obragraf_primvac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_obragraf_primavacpro =  $D_obragraf_primavacpro + 1;
                            $D_obragraf_primavacpro_I = $D_obragraf_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_obragraf_subsidio =  $D_obragraf_subsidio + 1;
                            $D_obragraf_subsidio_I = $D_obragraf_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_obragraf_sueldos = $D_obragraf_sueldos + 1;
                            $D_obragraf_sueldos_I = $D_obragraf_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_obragraf_faltasinj =  $D_obragraf_faltasinj + 1;
                            $D_obragraf_faltasinj_I = $D_obragraf_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                            /*
                          case "Descuento de Uniformes":
                            $D_obragraf_descunif =  $D_obragraf_descunif + 1;
                            $D_obragraf_descunif_I = $D_obragraf_descunif_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos medicos mayores":
                            $D_obragraf_seggasmedmay =  $D_obragraf_seggasmedmay + 1;
                            $D_obragraf_seggasmedmay_I = $D_obragraf_seggasmedmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "OPORTUNIDADES":
                        $D_oportunidades = $D_oportunidades + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_oportunidades_aguinaldo =  $D_oportunidades_aguinaldo + 1;
                            $D_oportunidades_aguinaldo_I = $D_oportunidades_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_oportunidades_ajusteredondeo =  $D_oportunidades_ajusteredondeo + 1;
                            $D_oportunidades_ajusteredondeo_I = $D_oportunidades_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_oportunidades_apoyosub =  $D_oportunidades_apoyosub + 1;
                            $D_oportunidades_apoyosub_I = $D_oportunidades_apoyosub_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_oportunidades_compensacion =  $D_oportunidades_compensacion + 1;
                            $D_oportunidades_compensacion_I = $D_oportunidades_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_oportunidades_primadom =  $D_oportunidades_primadom + 1;
                            $D_oportunidades_primadom_I = $D_oportunidades_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_oportunidades_primavac =  $D_oportunidades_primavac + 1;
                            $D_oportunidades_primavac_I = $D_oportunidades_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_oportunidades_primavacpro =  $D_oportunidades_primavacpro + 1;
                            $D_oportunidades_primavacpro_I = $D_oportunidades_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_oportunidades_subsidio =  $D_oportunidades_subsidio + 1;
                            $D_oportunidades_subsidio_I = $D_oportunidades_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_oportunidades_sueldos = $D_oportunidades_sueldos + 1;
                            $D_oportunidades_sueldos_I = $D_oportunidades_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_oportunidades_faltasinj = $D_oportunidades_faltasinj + 1;
                            $D_oportunidades_faltasinj_I = $D_oportunidades_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_oportunidades_descuni = $D_oportunidades_descuni + 1;
                            $D_oportunidades_descuni_I = $D_oportunidades_descuni_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_oportunidades_medmay = $D_oportunidades_medmay + 1;
                            $D_oportunidades_medmay_I = $D_oportunidades_medmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "PRESIDENCIA":
                        $D_presidencia = $D_presidencia + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_presidencia_aguinaldo =  $D_presidencia_aguinaldo + 1;
                            $D_presidencia_aguinaldo_I = $D_presidencia_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_presidencia_ajusteredondeo =  $D_presidencia_ajusteredondeo + 1;
                            $D_presidencia_ajusteredondeo_I = $D_presidencia_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_presidencia_apoyo =  $D_presidencia_apoyo + 1;
                            $D_presidencia_apoyo_I = $D_presidencia_apoyo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                          case "Compensación":
                            $D_presidencia_compensacion =  $D_presidencia_compensacion + 1;
                            $D_presidencia_compensacion_I = $D_presidencia_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_presidencia_primadom = $D_presidencia_primadom + 1;
                            $D_presidencia_primadom_I = $D_presidencia_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_presidencia_primavac = $D_presidencia_primavac + 1;
                            $D_presidencia_primavac_I = $D_presidencia_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_presidencia_primavacpro = $D_presidencia_primavacpro + 1;
                            $D_presidencia_primavacpro_I = $D_presidencia_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_presidencia_subempleo = $D_presidencia_subempleo + 1;
                            $D_presidencia_subempleo_I = $D_presidencia_subempleo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_presidencia_sueldos = $D_presidencia_sueldos + 1;
                            $D_presidencia_sueldos_I = $D_presidencia_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_presidencia_faltasinj = $D_presidencia_faltasinj + 1;
                            $D_presidencia_faltasinj_I = $D_presidencia_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_presidencia_descuento = $D_presidencia_descuento + 1;
                            $D_presidencia_descuento_I = $D_presidencia_descuento_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos medicos mayores":
                            $D_presidencia_seggasmedmay = $D_presidencia_seggasmedmay + 1;
                            $D_presidencia_seggasmedmay_I = $D_presidencia_seggasmedmays_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "SERVICIOS":
                        $D_servicios = $D_servicios + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_servicios_aguinaldo =  $D_servicios_aguinaldo + 1;
                            $D_servicios_aguinaldo_I = $D_servicios_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_servicios_ajusteredondeo =  $D_servicios_ajusteredondeo + 1;
                            $D_servicios_ajusteredondeo_I = $D_servicios_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_servicios_apoyo =  $D_servicios_apoyo + 1;
                            $D_servicios_apoyo_I = $D_servicios_apoyo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_servicios_compensa =  $D_servicios_compensa + 1;
                            $D_servicios_compensa_I = $D_servicios_compensa_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_servicios_primadom =  $D_servicios_primadom + 1;
                            $D_servicios_primadom_I = $D_servicios_primadom_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_servicios_primavac =  $D_servicios_primavac + 1;
                            $D_servicios_primavac_I = $D_servicios_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_servicios_primavacpro =  $D_servicios_primavacpro + 1;
                            $D_servicios_primavacpro_I = $D_servicios_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_servicios_subempleo = $D_servicios_subempleo + 1;
                            $D_servicios_subempleo_I = $D_servicios_subempleo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_servicios_sueldos = $D_servicios_sueldos + 1;
                            $D_servicios_sueldos_I = $D_servicios_sueldos_I + $administrations[$comienza]->Importe;
                            echo "</tr>";
                          break;
                          case "Faltas injustificadas":
                            $D_servicios_faltasinj =  $D_servicios_faltasinj + 1;
                            $D_servicios_faltasinj_I = $D_servicios_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_servicios_descuento =  $D_servicios_descuento + 1;
                            $D_servicios_descuento_I = $D_servicios_descuento_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos medicos mayores":
                            $D_servicios_seggasmedmay =  $D_servicios_seggasmedmay + 1;
                            $D_servicios_seggasmedmay_I = $D_servicios_seggasmedmay_I + $administrations[$comienza]->Importe;
                          break;
                        }
                        break;
                  case "VINOS":
                        $D_vinos = $D_vinos + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_vinos_aguinaldo =  $D_vinos_aguinaldo + 1;
                            $D_vinos_aguinaldo_I = $D_vinos_aguinaldo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_vinos_ajusteredondeo =  $D_vinos_ajusteredondeo + 1;
                            $D_vinos_ajusteredondeo_I = $D_vinos_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_vinos_apoyo =  $D_vinos_apoyo + 1;
                            $D_vinos_apoyo_I = $D_vinos_apoyo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_vinos_compensacion =  $D_vinos_compensacion + 1;
                            $D_vinos_compensacion_I = $D_vinos_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_vinos_primadominical =  $D_vinos_primadominical + 1;
                            $D_vinos_primadominical_I = $D_vinos_primadominical_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_vinos_primavac =  $D_vinos_primavac + 1;
                            $D_vinos_primavac_I = $D_vinos_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_vinos_primavacpro =  $D_vinos_primavacpro + 1;
                            $D_vinos_primavacpro_I = $D_vinos_primavacpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_vinos_subsidio =  $D_vinos_subsidio + 1;
                            $D_vinos_subsidio_I = $D_vinos_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_vinos_sueldos = $D_vinos_sueldos + 1;
                            $D_vinos_sueldos_I = $D_vinos_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_vinos_faltasinj = $D_vinos_faltasinj + 1;
                            $D_vinos_faltasinj_I = $D_vinos_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_vinos_descuento = $D_vinos_descuento + 1;
                            $D_vinos_descuento_I = $D_vinos_descuento_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_vinos_medmay = $D_vinos_medmay + 1;
                            $D_vinos_medmay_I = $D_vinos_medmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                  case "WEB":
                        $D_web = $D_web + 1;
                        switch (trim($conceptoDepa)){
                          case "Aguinaldo proporcional":
                            $D_web_aguinaldoprop =  $D_web_aguinaldoprop + 1;
                            $D_web_aguinaldoprop_I = $D_web_aguinaldoprop_I + $administrations[$comienza]->Importe;
                          break;
                          case "Ajuste por redondeo":
                            $D_web_ajusteredondeo =  $D_web_ajusteredondeo + 1;
                            $D_web_ajusteredondeo_I = $D_web_ajusteredondeo_I + $administrations[$comienza]->Importe;
                          break;
                          case "Apoyo en subasta":
                            $D_web_apoyosubasta =  $D_web_apoyosubasta + 1;
                            $D_web_apoyosubasta_I = $D_web_apoyosubasta_I + $administrations[$comienza]->Importe;
                          break;
                          case "Compensacion":
                            $D_web_compensacion =  $D_web_compensacion + 1;
                            $D_web_compensacion_I = $D_web_compensacion_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima dominical":
                            $D_web_primadominical =  $D_web_primadominical + 1;
                            $D_web_primadominical_I = $D_web_primadominical_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional":
                            $D_web_primavac =  $D_web_primavac + 1;
                            $D_web_primavac_I = $D_web_primavac_I + $administrations[$comienza]->Importe;
                          break;
                          case "Prima vacacional proporcional":
                            $D_web_primavacionalpro =  $D_web_primavacionalpro + 1;
                            $D_web_primavacionalpro_I = $D_web_primavacionalpro_I + $administrations[$comienza]->Importe;
                          break;
                          case "Subsidio al empleo":
                            $D_web_subsidio =  $D_web_subsidio + 1;
                            $D_web_subsidio_I = $D_web_subsidio_I + $administrations[$comienza]->Importe;
                          break;
                          case "Sueldos":
                            $D_web_sueldos = $D_web_sueldos + 1;
                            $D_web_sueldos_I = $D_web_sueldos_I + $administrations[$comienza]->Importe;
                          break;
                          case "Faltas injustificadas":
                            $D_web_faltasinj = $D_web_faltasinj + 1;
                            $D_web_faltasinj_I = $D_web_faltasinj_I + $administrations[$comienza]->Importe;
                          break;
                          /*
                          case "Descuento de uniformes":
                            $D_web_descuento = $D_web_descuento + 1;
                            $D_web_descuento_I = $D_web_descuento_I + $administrations[$comienza]->Importe;
                          break;*/
                          case "Seguro de gastos médicos mayores":
                            $D_web_medmay = $D_web_medmay + 1;
                            $D_web_medmay_I = $D_web_medmay_I + $administrations[$comienza]->Importe;
                          break;

                        }
                        break;
                }
                //TABLE DEPARTMENT.............
                //echo "antes<br>";
                if(($departamento_tabla == 0) and ($administrations[$comienza]->Importe > 0)){
                  //echo "antes--<br>".$depa."-".$conceptoDepa."<br>";

                  $regresa = get_CC_DB_personale(trim($depa), trim($conceptoDepa));
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      //echo "NO TRAE<br>";
                      $trae ="no trae";
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      //echo "si trae<br>";
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_clave_1= $administrations[$comienza]->NombreEmpleado;

                    //$D_clave_1 = "desactivar lo de arriba";
                    //echo "antes imprimir<br>";
                    echo "<tr bgcolor='".$color."'>";
                        echo "<td>".$comienza."</td>";
                        echo "<td>".$administrations[$comienza]->IdPersona."</td>";
                        echo "<td>".$administrations[$comienza]->IdEmpleado."</td>";
                        echo "<td>".$administrations[$comienza]->NombreConcpeto."</td>";
                        echo "<td>".$administrations[$comienza]->Importe."</td>";
                        echo "<td>".$agrupar."</td>";
                        echo "<td>".$es."</td>";
                        echo "<td>".$depa."</td>";
                        echo "<td>".$conceptoDepa."</td>";
                        echo "<td>".$trae."</td>";
                        echo "<td>".$D_clave_1."</td>";
                }
                //$depa = "";
                $administrations_depa = "";
                $veces = $veces + 1;
            }

                $agrupar = "";
                $color = "";
        }
        //echo "-".$D_admyfinanzas."<br>-".$D_antiguedades."<br>-".$D_artemoderno."<br>-".$D_autosycamiones."<br>-".$D_capitalhumano."<br>-".$D_empeños."<br>-".$D_direccion."<br>";
        //echo "-".$D_guadalajara."<br>-".$D_herenciaycolecciones."<br>-".$D_joyeria."<br>-".$D_legal."<br>-".$D_libros."<br>-".$D_logisticayalmancen."<br>-".$D_monterrey."<br>";
        //echo "-".$D_marketing."<br>-".$D_tecinfo."<br>-".$D_obragrafica."<br>-".$D_oportunidades."<br>-".$D_presidencia."<br>-".$D_servicios."<br>-".$D_vinos."<br>-".$D_web."<br>";

        //echo "ya va imprimir el depa:<br>";
        if (($departamento == 0)) {

                //echo "<b>-ADM Y FINANZAS</b><BR>";
              if (($D_admyfinanzas_aguinaldopro_I >0 ) or ($D_admyfinanzas_ajusteredondeo_I> 0) or ($D_admyfinanzas_apoyosubasta_I >0)
                  or ($D_admyfinanzas_compensacion_I >0) or ($D_admyfinanzas_primadominical_I >0) or ($D_admyfinanzas_primavacacional_I >0)
                  or ($D_admyfinanzas_primavacacionalprop_I >0) or ($D_admyfinanzas_subsidioempleo_I >0) or ($D_admyfinanzas_sueldos_I >0)
                  or ($D_admyfinanzas_faltasinj_I >0) or ($D_admyfinanzas_descuni_I >0) or ($D_admyfinanzas_gasmedmay_I >0)){
                    //echo "Prima ".$D_admyfinanzas_primavacacional_I."<br>";
                    $globalADM = "ADMINISTRACION Y FINANZAS";
                    //$D_concepto_8 = rellena_ceros("ADMINISTRACION Y FINANZAS",100,8);
                    //$D_Seg_9 = rellena_ceros("4", 4,9);
                    $D_Seg_9 = centro_costo("ADMINISTRACION Y FINANZAS");
                    $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                    //echo "CC-campos".strlen($D_Seg_9)."<br>";
                    $respuesta_36 = get_36("ADMINISTRACION Y FINANZAS");
                    if(strlen($respuesta_36) > 0){
                      $D_UUID_10 = $respuesta_36;
                    }else{
                      $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                    }

                  if ($D_admyfinanzas_aguinaldopro_I >0 ){
                      $texto_evaluar = $globalADM."-Aguinaldo proporcional ".$texto1;
                      $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                      $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Aguinaldo proporcional");
                      //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                      if ($regresa == ""){
                        $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                      }else{
                        $trae = "si trae";
                        $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                      }

                    $D_P_o_D_4 = 0;
                    $D_importe_5 = $D_admyfinanzas_aguinaldopro_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }

                  }
                  if ($D_admyfinanzas_ajusteredondeo_I > 0) {
                    //echo "entra ajuste 1";
                    $texto_evaluar = $globalADM."-Ajuste redondeo ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Ajuste redondeo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    //echo "entra ajuste 2";
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = $D_admyfinanzas_ajusteredondeo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                        //echo "entra ajuste 3";
                              echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }

                    if ($departamento_txt_imprimir == 0){
                      //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      //fwrite($ar, $depaL_txt);
                      //fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_apoyosubasta_I > 0){
                    //echo "entra_dos<br>";
                    $texto_evaluar = $globalADM."-Apoyo subasta ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Apoyo en subasta");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      //$trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }

                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_apoyosubasta_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      //echo "imprime_uno<br>";
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      //echo "agrega_uno<br>";
                      fwrite($ar, $depaL_txt);
                      //echo "salto<br>";
                      fwrite($ar, "\n");
                      //echo "sal departamento_txt<br>";
                    }
                  }
                  if ($D_admyfinanzas_compensacion_I > 0){
                    $texto_evaluar = $globalADM."-Compensacion ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Compensacion");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_compensacion_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_primadominical_I > 0){
                    $texto_evaluar = $globalADM."-PrimaDominical ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Prima dominical");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_primadominical_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_primavacacional_I > 0){
                    $texto_evaluar = $globalADM."-PrimaVacacional ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Prima vacacional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_primavacacional_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_primavacacionalprop_I > 0){
                    $texto_evaluar = $globalADM."-PrimaVacPro ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Prima vacacional proporcional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_primavacacionalprop_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_linea_txt == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_subsidioempleo_I > 0){
                    $texto_evaluar = $globalADM."-SubsidioEmpleo ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Subsidio al empleo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_subsidioempleo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_sueldos_I > 0){
                    $texto_evaluar = $globalADM."-Sueldos ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Sueldos");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_sueldos_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_faltasinj_I > 0){
                    $texto_evaluar = $globalADM."-FaltasInju ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Faltas injustificadas");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_admyfinanzas_faltasinj_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_admyfinanzas_descuni_I > 0){
                    $texto_evaluar = $globalADM."-DescUniforme ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Descuento de uniformes");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                      $D_P_o_D_4 = 1;
                      $D_importe_5 = "";
                      $D_importe_5 = $D_admyfinanzas_descuni_I;
                      $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                      if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                        echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                      }
                      if ($departamento_txt_imprimir == 0){
                        $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                        fwrite($ar, $depaL_txt);
                        fwrite($ar, "\n");
                      }
                  }
                  if ($D_admyfinanzas_gasmedmay_I > 0){
                    $texto_evaluar = $globalADM."-GastoMedMay ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("ADMINISTRACION Y FINANZAS", "Seguro de gastos médicos mayores");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $trae = "si trae";
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                      $D_P_o_D_4 = 1;
                      $D_importe_5 = "";
                      $D_importe_5 = $D_admyfinanzas_gasmedmay_I;
                      $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                      if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                        echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                      }
                      if($departamento_txt_imprimir == 0){
                        $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                        fwrite($ar, $depaL_txt);
                        fwrite($ar, "\n");
                      }
                  }
              }
              //echo "<b>-ANTIGUEDADES</b> -".$D_antiguedades_ajusteredondeo."-".$D_antiguedades_segmedmay."-".$D_antiguedades_sueldos."<br>";
              if ( ($D_antiguedades_aguinaldo_I > 0) or ($D_antiguedades_ajusteredondeo_I > 0 ) or ($D_antiguedades_apoyosubasta_I > 0 ) or
                  ($D_antiguedades_compensacion_I > 0 ) or ($D_antiguedades_primadom_I > 0 ) or ($D_antiguedades_primavac_I > 0 ) or
                  ($D_antiguedades_primavacprop_I > 0 ) or ($D_antiguedades_subempleo_I > 0) or ($D_antiguedades_sueldos_I > 0 ) or
                  ($D_antiguedades_faltainj_I > 0) or ($D_antiguedades_descunif_I > 0) or ($D_antiguedades_segmedmay_I > 0)){
                  //echo "entra_antiguedades<br>";
                  $globalANT = "ANTIGUEDADES";
                  //$D_importe_5 =  $D_antiguedades_ajusteredondeo_I + $D_antiguedades_segmedmay_I + $D_antiguedades_sueldos_I;
                  //$D_concepto_8 = rellena_ceros("ANTIGUEDADES",100,8);
                  //$D_Seg_9 = rellena_ceros("4", 4,9);
                  $D_Seg_9 = centro_costo("ANTIGUEDADES");
                  $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                  $respuesta_36 = get_36("ANTIGUEDADES");
                  if(strlen($respuesta_36) > 0){
                    $D_UUID_10 = $respuesta_36;
                  }else{
                    $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                  }
                  if ($D_antiguedades_aguinaldo_I > 0){
                    $texto_evaluar = $globalANT."-Aguinaldo ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Aguinaldo proporcional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }

                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_aguinaldo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_ajusteredondeo_I > 0){
                    $texto_evaluar = $globalANT."-AjusteRedondeo ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Ajuste redondeo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_ajusteredondeo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      //fwrite($ar, $depaL_txt);
                      //fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_apoyosubasta_I > 0){
                    $texto_evaluar = $globalANT."-ApoyoSub ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Apoyo en subasta");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_apoyosubasta_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";

                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_compensacion_I > 0){
                    $texto_evaluar = $globalANT."-Compensacion ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Compensacion");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_compensacion_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_primadom_I > 0){
                    $texto_evaluar = $globalANT."-PrimaDom ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Prima dominical");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_primadom_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_primavac_I > 0){
                    $texto_evaluar = $globalANT."-PrimaVac ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Prima vacacional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_primavac_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_primavacprop_I > 0){
                    $texto_evaluar = $globalANT."-PrimaVacPro ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Prima vacacional proporcional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_primavacprop_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_subempleo_I > 0){
                    $texto_evaluar = $globalANT."-SubsidioEmp ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Subsidio al empleo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_subempleo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_sueldos_I > 0){
                    $texto_evaluar = $globalANT."-Sueldos ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                    $regresa = get_CC_DB_personale("Antigüedades", "Sueldos");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_sueldos_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_faltainj_I > 0){
                    $texto_evaluar = $globalANT."-FaltasInj ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Faltas injustificadas");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_faltainj_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_descunif_I > 0){
                    $texto_evaluar = $globalANT."-DescUni ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Descuendo de uniformes");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_descunif_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_antiguedades_segmedmay_I > 0){
                    $texto_evaluar = $globalANT."-SegGasMedMay ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Antigüedades", "Seguro de gastos médicos mayores");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_antiguedades_segmedmay_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }

              }
              //echo "<b>-ARTE MODERNO </b>-".$D_artemoderno_ajusteredondeo."-".$D_artemoderno_apoyosubasta."-".$D_artemoderno_descuniformes."-".$D_artemoderno_segmedmay."-".$D_artemoderno_sueldos."<br>";
              if (($D_artemoderno_aguinaldoprop_I > 0) OR ($D_artemoderno_ajusteredondeo_I > 0) OR ($D_artemoderno_apoyosubasta_I > 0) OR
                  ($D_artemoderno_compensacion_I > 0) OR ($D_artemoderno_primdom_I > 0) OR ($D_artemoderno_primvac_I > 0) OR
                  ($D_artemoderno_primvacpro_I > 0) OR ($D_artemoderno_subsidio_I > 0) OR ($D_artemoderno_sueldos_I > 0) OR
                  ($D_artemoderno_injustificadas_I > 0) OR ($D_artemoderno_descuniformes_I > 0) OR ($D_artemoderno_segmedmay_I > 0)
                ){
                  //$D_concepto_8 = rellena_ceros("ARTE MODERNO",100,8);
                  //$D_Seg_9 = rellena_ceros("4", 4,9);
                  $globalArTMod = "ARTE MODERNO";
                  $D_Seg_9 = centro_costo("ARTE MODERNO");
                  $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                  $respuesta_36 = get_36("ARTE MODERNO");
                  if(strlen($respuesta_36) > 0){
                    $D_UUID_10 = $respuesta_36;
                  }else{
                    $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                  }
                  //$D_importe_5 =  $D_artemoderno_ajusteredondeo_I + $D_artemoderno_apoyosubasta_I + $D_artemoderno_descuniformes_I + $D_artemoderno_segmedmay_I + $D_artemoderno_sueldos_I;
                  if ($D_artemoderno_aguinaldoprop_I > 0){
                    $texto_evaluar = $globalArTMod."-AguinaldoPro ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Aguinaldo proporcional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }

                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_artemoderno_aguinaldoprop_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_ajusteredondeo_I > 0){
                    $texto_evaluar = $globalArTMod."-AjusteRedondeo ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Ajuste redondeo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 =  $D_artemoderno_ajusteredondeo_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      //fwrite($ar, $depaL_txt);
                      //fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_apoyosubasta_I > 0){
                    $texto_evaluar = $globalArTMod."-ApoyoSubasta ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Apoyo en subasta");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_apoyosubasta_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_compensacion_I > 0){
                    $texto_evaluar = $globalArTMod."-Compensacion ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Compensacion");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_compensacion_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_primdom_I > 0){
                    $texto_evaluar = $globalArTMod."-PrimaDominical ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Prima dominical");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_primdom_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_primvac_I > 0){
                    $texto_evaluar = $globalArTMod."-PrimaVac ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Prima vacacional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_primvac_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_primvacpro_I > 0){
                    $texto_evaluar = $globalArTMod."-PrimaVacPro ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Prima vacacional proporcional");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_primvacpro_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_subsidio_I > 0){
                    $texto_evaluar = $globalArTMod."-SubsidioEmp ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Subsidio al empleo");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_subsidio_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_sueldos_I > 0){
                    $texto_evaluar = $globalArTMod."-Sueldos ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Sueldos");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 0;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_sueldos_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_injustificadas_I > 0){
                    $texto_evaluar = $globalArTMod."-FaltasInj ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Faltas injustificadas");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_injustificadas_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_descuniformes_I > 0){
                    $texto_evaluar = $globalArTMod."-DescUnif ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Descuento de uniformes");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_descuniformes_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }
                  if ($D_artemoderno_segmedmay_I > 0){
                    $texto_evaluar = $globalArTMod."-SegGasMedMay ".$texto1;
                    $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                    $regresa = get_CC_DB_personale("Arte Moderno", "Seguro de gastos médicos mayores");
                    //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                    if ($regresa == ""){
                      $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }else{
                      $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                    }
                    $D_P_o_D_4 = 1;
                    $D_importe_5 = "";
                    $D_importe_5 = $D_artemoderno_segmedmay_I;
                    $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                    if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                      echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                    }
                    if ($departamento_txt_imprimir == 0){
                      $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                      fwrite($ar, $depaL_txt);
                      fwrite($ar, "\n");
                    }
                  }

              }
              //echo "<b>-AUTOS Y CAMIONES</b>-".$D_autoscamion_ajusteredondeo."-".$D_autoscamion_segmedmay."-".$D_autoscamion_sueldos."<b>";
              if ( ($D_autoscamion_aguinaldo_I > 0) OR  ($D_autoscamion_ajusteredondeo_I > 0) OR  ($D_autoscamion_apoyosubasta_I > 0) OR
                ($D_autoscamion_compensacion_I > 0) OR  ($D_autoscamion_primdom_I > 0) OR ($D_autoscamion_primvac_I > 0) OR
                ($D_autoscamion_primvacpro_I > 0) OR  ($D_autoscamion_subsidioe_I > 0) OR ($D_autoscamion_sueldos_I > 0) OR
                ($D_autoscamion_faltasin_I > 0) OR  ($D_autoscamion_descun_I > 0) OR  ($D_autoscamion_segmedmay_I > 0)
                ){
                $globalAutCam = "AUTOS Y CAMIONES";
                //$D_concepto_8 = rellena_ceros("AUTOS Y CAMIONES",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg = centro_costo ("AUTOS Y CAMIONES");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("AUTOS Y CAMIONES");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_autoscamion_ajusteredondeo_I + $D_autoscamion_segmedmay_I + $D_autoscamion_sueldos_I;

                if ($D_autoscamion_aguinaldo_I > 0){
                  $texto_evaluar = $globalAutCam."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalAutCam."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);


                  $regresa = get_CC_DB_personale("Autos y Camiones", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_apoyosubasta_I > 0){
                  $texto_evaluar = $globalAutCam."-ApoyoSubasta ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_apoyosubasta_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_compensacion_I > 0){
                  $texto_evaluar = $globalAutCam."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_primdom_I > 0){
                  $texto_evaluar = $globalAutCam."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_primdom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_primvac_I > 0){
                  $texto_evaluar = $globalAutCam."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_primvac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_primvacpro_I > 0){
                  $texto_evaluar = $globalAutCam."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_primvacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_subsidioe_I > 0){
                  $texto_evaluar = $globalAutCam."-Subsidio ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_subsidioe_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir ==0 ){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_sueldos_I > 0){
                  $texto_evaluar = $globalAutCam."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_faltasin_I > 0){
                  $texto_evaluar = $globalAutCam."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_faltasin_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_descun_I > 0){
                  $texto_evaluar = $globalAutCam."-DescUni ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_descun_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_autoscamion_segmedmay_I > 0){
                  $texto_evaluar = $globalAutCam."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Autos y Camiones", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_autoscamion_segmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }

              }
              //echo "<b>-CAPITAL HUMANO</b>-".$D_capitalhum_ajusteredondeo."-".$D_capitalhum_apoyosubasta."-".$D_capitalhum_descuniform."-".$D_capitalhum_primadominical."-".$D_capitalhum_sueldos."<br>";
              if (($D_capitalhum_aguinaldopro_I > 0) OR ($D_capitalhum_ajusteredondeo_I > 0) OR ($D_capitalhum_apoyosubasta_I > 0) OR
                ($D_capitalhum_compensacion_I > 0) OR ($D_capitalhum_primadominical_I > 0) OR ($D_capitalhum_primavac_I > 0) OR
                ($D_capitalhum_primavacpro_I > 0) OR ($D_capitalhum_subsidio_I > 0) OR ($D_capitalhum_sueldos_I > 0) OR
                ($D_capitalhum_faltasinj_I > 0) OR ($D_capitalhum_descuniform_I > 0) OR ($D_capitalhum_segmedmay_I > 0)){
                $globalCapHum = "CAPITAL HUMANO";
                //$D_concepto_8 = rellena_ceros("CAPITAL HUMANO",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("CAPITAL HUMANO");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("CAPITAL HUMANO");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_capitalhum_ajusteredondeo_I + $D_capitalhum_apoyosubasta_I + $D_capitalhum_descuniform_I + $D_capitalhum_primadominical_I  + $D_capitalhum_sueldos_I;

                if ($D_capitalhum_aguinaldopro_I > 0){
                  $texto_evaluar = $globalCapHum."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_aguinaldopro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalCapHum."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_apoyosubasta_I > 0){
                  $texto_evaluar = $globalCapHum."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_apoyosubasta_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_compensacion_I > 0){
                  $texto_evaluar = $globalCapHum."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_primadominical_I > 0){
                  $texto_evaluar = $globalCapHum."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_primadominical_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_primavac_I > 0){
                  $texto_evaluar = $globalCapHum."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_primavacpro_I > 0){
                  $texto_evaluar = $globalCapHum."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_subsidio_I > 0){
                  $texto_evaluar = $globalCapHum."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_sueldos_I > 0){
                  $texto_evaluar = $globalCapHum."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =$D_capitalhum_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_faltasinj_I > 0){
                  $texto_evaluar = $globalCapHum."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_descuniform_I > 0){
                  $texto_evaluar = $globalCapHum."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_descuniform_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_capitalhum_segmedmay_I > 0){
                  $texto_evaluar = $globalCapHum."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Capital Humano", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_capitalhum_segmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }

              }
              //echo "<b>-EMPEÑOS</b>-".$D_enpenos_ajusteredondeo."-".$D_empenos_sueldos."<br>";
              if (($D_enpenos_aguinaldo_I > 0) OR ($D_enpenos_ajusteredondeo_I > 0) OR  ($D_enpenos_apoyos_I > 0) OR
                ($D_enpenos_compensacion_I > 0) OR  ($D_enpenos_primadom_I > 0) OR  ($D_enpenos_primavacpro_I > 0) OR
                ($D_enpenos_primavac_I > 0) OR  ($D_empenos_sueldos_I > 0) OR ($D_enpenos_subsidioem_I > 0) OR
                ($D_empenos_faltaasinj_I > 0) OR  ($D_empenos_descuni_I > 0) OR ($D_empenos_segmasmedmay_I > 0) ){
                $globalEmp = "EMPENOS";
                //$D_concepto_8 = rellena_ceros("EMPENOS",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("EMPEÑOS");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("EMPEÑOS");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_enpenos_ajusteredondeo_I +  $D_empenos_sueldos_I;

                if ($D_enpenos_aguinaldo_I > 0){
                  $texto_evaluar = $globalEmp."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalEmp."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Ayuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_apoyos_I > 0){
                  $texto_evaluar = $globalEmp."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_apoyos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_compensacion_I > 0){
                  $texto_evaluar = $globalEmp."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_primadom_I > 0){
                  $texto_evaluar = $globalEmp."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_primavacpro_I > 0){
                  $texto_evaluar = $globalEmp."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_primavac_I > 0){
                  $texto_evaluar = $globalEmp."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_empenos_sueldos_I > 0){
                  $texto_evaluar = $globalEmp."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_empenos_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_enpenos_subsidioem_I > 0){
                  $texto_evaluar = $globalEmp."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_enpenos_subsidioem_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_empenos_descuni_I > 0){
                  $texto_evaluar = $globalEmp."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_empenos_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_empenos_faltaasinj_I > 0){
                  $texto_evaluar = $globalEmp."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_empenos_faltaasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_empenos_segmasmedmay_I > 0){
                  $texto_evaluar = $globalEmp."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Empeños", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_empenos_segmasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-DIRECCION</b>-".$D_direccion_ajusteredondeo."-".$D_direccion_medmay."-".$D_direccion_sueldos."<br>";
              if (($D_direccion_aguinaldo_I > 0) OR ($D_direccion_ajusteredondeo_I > 0) OR ($D_direccion_apoyo_I > 0) OR
                ($D_direccion_compensacion_I > 0) OR ($D_direccion_primadom_I > 0) OR ($D_direccion_primavac_I > 0) OR
                ($D_direccion_primavacpro_I > 0) OR ($D_direccion_subempleo_I > 0) OR ($D_direccion_sueldos_I > 0) OR
                ($D_direccion_faltinj_I > 0) OR ($D_direccion_descuni_I > 0) OR ($D_direccion_medmay_I > 0)){
                $globalDir = "DIRECCION";
                //$D_concepto_8 = rellena_ceros("DIRECCION",100,8);
                //echo "Entra direccion:".$D_direccion_medmay_I."<br>";
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("DIRECCION");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("DIRECCION");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_direccion_ajusteredondeo_I + $D_direccion_medmay_I + $D_direccion_sueldos_I;

                if ($D_direccion_aguinaldo_I > 0){
                  $texto_evaluar = $globalDir."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalDir."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_apoyo_I > 0){
                  $texto_evaluar = $globalDir."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_apoyo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_compensacion_I > 0){
                  $texto_evaluar = $globalDir."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_primadom_I > 0){
                  $texto_evaluar = $globalDir."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_primavac_I > 0){
                  $texto_evaluar = $globalDir."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_primavacpro_I > 0){
                  $texto_evaluar = $globalDir."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_subempleo_I > 0){
                  $texto_evaluar = $globalDir."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_subempleo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_sueldos_I > 0){
                  $texto_evaluar = $globalDir."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_faltinj_I > 0){
                  $texto_evaluar = $globalDir."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_faltinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_descuni_I > 0){
                  $texto_evaluar = $globalDir."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_direccion_medmay_I > 0){
                  $texto_evaluar = $globalDir."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Dirección", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_direccion_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-GUADALAJARA</b>-".$D_guadalajara_ajusteredondeo."-".$D_guadalajara_sueldos."<br>";
              if (($D_guadalajara_aguinaldo_I > 0) OR ($D_guadalajara_ajusteredondeo_I > 0) OR ($D_guadalajara_apooyos_I > 0) OR
                ($D_guadalajara_compensacion_I > 0) OR ($D_guadalajara_primado_I > 0) OR ($D_guadalajara_primavac_I > 0) OR
                ($D_guadalajara_primvacpro_I > 0) OR ($D_guadalajara_subsidio_I > 0) OR ($D_guadalajara_sueldos_I > 0) OR
                ($D_guadalajara_faltasinj_I > 0) OR ($D_guadalajara_descuni_I > 0) OR ($D_guadalajara_seggasmedmay_I > 0)){
                $globalGdl = "GUADALAJARA";
                //$D_concepto_8 = rellena_ceros("GUADALAJARA",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("GUADALAJARA");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("GUADALAJARA");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_guadalajara_ajusteredondeo_I + $D_guadalajara_sueldos_I;

                if ($D_guadalajara_aguinaldo_I > 0){
                  $texto_evaluar = $globalGdl."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalGdl."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_apooyos_I > 0){
                  $texto_evaluar = $globalGdl."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_apooyos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_compensacion_I > 0){
                  $texto_evaluar = $globalGdl."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_primado_I > 0){
                  $texto_evaluar = $globalGdl."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_primado_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_primavac_I > 0){
                  $texto_evaluar = $globalGdl."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_primvacpro_I > 0){
                  $texto_evaluar = $globalGdl."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_primvacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_guadalajara_subsidio_I > 0){
                  $texto_evaluar = $globalGdl."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_guadalajara_sueldos_I > 0){
                  $texto_evaluar = $globalGdl."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_guadalajara_faltasinj_I > 0){
                  $texto_evaluar = $globalGdl."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_guadalajara_descuni_I > 0){
                  $texto_evaluar = $globalGdl."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_guadalajara_seggasmedmay_I > 0){
                  $texto_evaluar = $globalGdl."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Guadalajara", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_guadalajara_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-HERENCIA </b>".$D_herenciacolec_ajusteredondeo."-".$D_herenciacolec_medimay."-".$D_herenciacolec_sueldos."<br>";
              if (($D_herenciacolec_aguinaldo_I = 0) OR ($D_herenciacolec_ajusteredondeo_I = 0) OR ($D_herenciacolec_apoyos_I = 0) OR
                ($D_herenciacolec_compensacion_I = 0) OR ($D_herenciacolec_primad_I = 0) OR ($D_herenciacolec_primavac_I = 0) OR
                ($D_herenciacolec_primavacpro_I = 0) OR ($D_herenciacolec_subsidio_I = 0) OR ($D_herenciacolec_sueldos_I = 0) OR
                ($D_herenciacolec_faltasinj_I = 0) OR ($D_herenciacolec_descuni_I = 0) OR ($D_herenciacolec_medimay_I = 0)){
                $globalHer = "HERENCIAS Y COLECCIONES";
                //$D_concepto_8 = rellena_ceros("HERENCIAS Y COLECCIONES",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("HERENCIAS Y COLECCIONES");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("HERENCIAS Y COLECCIONES");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_herenciacolec_ajusteredondeo_I + $D_herenciacolec_medimay_I + $D_herenciacolec_sueldos_I;

                $D_P_o_D_4 = 0;
                if ($D_herenciacolec_aguinaldo_I > 0){
                  $texto_evaluar = $globalHer."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalHer."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_apoyos_I > 0){
                  $texto_evaluar = $globalHer."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_apoyos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_compensacion_I > 0){
                  $texto_evaluar = $globalHer."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_primad_I > 0){
                  $texto_evaluar = $globalHer."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_primad_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_primavac_I > 0){
                  $texto_evaluar = $globalHer."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_primavacpro_I > 0){
                  $texto_evaluar = $globalHer."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_subsidio_I > 0){
                  $texto_evaluar = $globalHer."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_sueldos_I > 0){
                  $texto_evaluar = $globalHer."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_herenciacolec_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_faltasinj_I > 0){
                  $texto_evaluar = $globalHer."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_descuni_I > 0){
                  $texto_evaluar = $globalHer."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_herenciacolec_medimay_I > 0){
                  $texto_evaluar = $globalHer."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Herencias y Colecciones", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_herenciacolec_medimay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-JOYERIA</b>".$D_joyeria_ajusteredondeo."-".$D_joyeria_primavac."-".$D_joyeria_sueldos."<br>";
              if (($D_joyeria_aguinaldo_I > 0) OR ($D_joyeria_ajusteredondeo_I > 0) OR ($D_joyeria_apoyosu_I > 0) OR
                ($D_joyeria_compensacion_I > 0) OR ($D_joyeria_primadom_I > 0) OR ($D_joyeria_primavac_I > 0) OR
                ($D_joyeria_primavacpro_I > 0) OR ($D_joyeria_subsidio_I > 0) OR ($D_joyeria_sueldos_I > 0) OR
                ($D_joyeria_faltasinj_I > 0) OR ($D_joyeria_descuni_I > 0) OR ($D_joyeria_seggasmedmay_I > 0) ){
                $globalJoy = "JOYERIA";
                //$D_concepto_8 = rellena_ceros("JOYERIA",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("JOYERIA");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("JOYERIA");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_joyeria_ajusteredondeo_I + $D_joyeria_primavac_I +$D_joyeria_sueldos_I;

                if ($D_joyeria_aguinaldo_I > 0){
                  $texto_evaluar = $globalJoy."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Joyería", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalJoy."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_apoyosu_I > 0){
                  $texto_evaluar = $globalJoy."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_apoyosu_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_compensacion_I > 0){
                  $texto_evaluar = $globalJoy."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_primadom_I > 0){
                  $texto_evaluar = $globalJoy."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_primavac_I > 0){
                  $texto_evaluar = $globalJoy."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_primavacpro_I > 0){
                  $texto_evaluar = $globalJoy."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_subsidio_I > 0){
                  $texto_evaluar = $globalJoy."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_sueldos_I > 0){
                  $texto_evaluar = $globalJoy."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_faltasinj_I > 0){
                  $texto_evaluar = $globalJoy."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_descuni_I > 0){
                  $texto_evaluar = $globalJoy."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_joyeria_seggasmedmay_I > 0){
                  $texto_evaluar = $globalJoy."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Joyería", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_joyeria_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-LEGAL</b>-".$D_legal_ajusteredondeo."-".$D_legal_apoyosub."-".$D_legal_sueldos."<br>";
              if (($D_legal_aguinaldo_I > 0) OR ($D_legal_ajusteredondeo_I > 0) OR ($D_legal_apoyosub_I > 0) OR
               ($D_legal_compensacion_I > 0) OR ($D_legal_primavac_I > 0) OR ($D_legal_primadomi_I > 0) OR
               ($D_legal_primavacpro_I > 0) OR ($D_legal_subsidio_I > 0) OR ($D_legal_sueldos_I > 0) OR
               ($D_legal_faltasinj_I > 0) OR ($D_legal_descuni_I > 0) OR ($D_legal_seggasmedmay_I > 0)){
                $globalLeg = "LEGAL";
                //$D_concepto_8 = rellena_ceros("LEGAL",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("LEGAL");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("LEGAL");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_legal_ajusteredondeo_I + $D_legal_apoyosub_I + $D_legal_sueldos_I;

                if ($D_legal_aguinaldo_I > 0){
                  $texto_evaluar = $globalLeg."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Legal", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalLeg."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_legal_apoyosub_I > 0){
                  $texto_evaluar = $globalLeg."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_compensacion_I > 0){
                  $texto_evaluar = $globalLeg."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_primavac_I > 0){
                  $texto_evaluar = $globalLeg."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_primadomi_I > 0){
                  $texto_evaluar = $globalLeg."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_primadomi_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_primavacpro_I > 0){
                  $texto_evaluar = $globalLeg."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_subsidio_I > 0){
                  $texto_evaluar = $globalLeg."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_legal_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_sueldos_I > 0){
                  $texto_evaluar = $globalLeg."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_faltasinj_I > 0){
                  $texto_evaluar = $globalLeg."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_descuni_I > 0){
                  $texto_evaluar = $globalLeg."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_legal_seggasmedmay_I > 0){
                  $texto_evaluar = $globalLeg."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Legal", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_legal_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-LIBROS</b>-".$D_libros_ajusteredondeo."-".$D_libros_sueldos."<br>";
              if (($D_libros_aguinaldo_I > 0) OR  ($D_libros_ajusteredondeo_I > 0) OR ($D_libros_apoyosub_I > 0) OR
                ($D_libros_compensacion_I > 0) OR ($D_libros_primadom_I > 0) OR ($D_libros_primavac_I > 0) OR
                ($D_libros_primavacpro_I > 0) OR ($D_libros_subsidio_I > 0) OR ($D_libros_sueldos_I > 0) OR
                ($D_libros_faltasinj_I > 0) OR ($D_libros_descuni_I > 0) OR ($D_libros_seggasmedmay_I > 0)){
                $globallib = "LIBROS";
                //$D_concepto_8 = rellena_ceros("LIBROS",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("LIBROS");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("LIBROS");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_libros_ajusteredondeo_I + $D_libros_sueldos_I;

                if ($D_libros_aguinaldo_I > 0){
                  $texto_evaluar = $globallib."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_ajusteredondeo_I > 0){
                  $texto_evaluar = $globallib."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_libros_apoyosub_I > 0){
                  $texto_evaluar = $globallib."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_compensacion_I > 0){
                  $texto_evaluar = $globallib."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_primadom_I > 0){
                  $texto_evaluar = $globallib."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_primavac_I > 0){
                  $texto_evaluar = $globallib."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_primavacpro_I > 0){
                  $texto_evaluar = $globallib."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_subsidio_I > 0){
                  $texto_evaluar = $globallib."-Subsidio ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");

                  }
                }
                if ($D_libros_sueldos_I > 0){
                  $texto_evaluar = $globallib."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_faltasinj_I > 0){
                  $texto_evaluar = $globallib."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_descuni_I > 0){
                  $texto_evaluar = $globallib."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_libros_seggasmedmay_I > 0){
                  $texto_evaluar = $globallib."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Libros", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_libros_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-LOGISTICA-ALMACEN</b>-".$D_logalm_ajusteredondeo."-".$D_logalm_apoyosub."-".$D_logalm_faltasinju."-".$D_logalm_primvac."-".$D_logalm_sueldos."<br>";
              if (($D_logalm_aguinaldo_I > 0) OR ($D_logalm_ajusteredondeo_I > 0) OR ($D_logalm_apoyosub_I > 0) OR
                ($D_logalm_primadom_I > 0) OR ($D_logalm_primvacpro_I > 0) OR ($D_logalm_primvac_I > 0) OR
                ($D_logalm_primvacpro_I > 0) OR ($D_logalm_subsidio_I > 0) OR ($D_logalm_sueldos_I > 0) OR
                ($D_logalm_faltasinju_I > 0) OR ($D_logalm_descunif_I > 0) OR ($D_logalm_seggasmedmay_I > 0) ){

                //$D_concepto_8 = rellena_ceros("LOGISTICA Y ALMACEN",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $globalLyA = "LOGISTICA Y ALMACEN";
                $D_Seg_9 = centro_costo("LOGISTICA Y ALMACEN");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("LOGISTICA Y ALMACEN");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_logalm_ajusteredondeo_I +  $D_logalm_apoyosub_I + $D_logalm_faltasinju_I + $D_logalm_primvac_I +  $D_logalm_sueldos_I;
                if ($D_logalm_aguinaldo_I > 0){
                  $D_concepto_8 = rellena_ceros("LOGISTICA Y ALMACEN-Aguinaldo proporcional",100,8);
                  $texto_evaluar = $globalLyA."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_ajusteredondeo_I > 0){
                  $D_concepto_8 = rellena_ceros("LOGISTICA Y ALMACEN-Ajuste redondeo",100,8);
                  $texto_evaluar = $globalLyA."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_apoyosub_I > 0){
                  $texto_evaluar = $globalLyA."-ApoyoSubasta ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  //echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                  }
                if ($D_logalm_primadom_I > 0){
                  $texto_evaluar = $globalLyA."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_primvacpro_I > 0){
                  $texto_evaluar = $globalLyA."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_primvacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_primvac_I > 0){
                  $texto_evaluar = $globalLyA."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_primvac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_primvacpro_I > 0){
                  $texto_evaluar = $globalLyA."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_primvacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_subsidio_I > 0){
                  $texto_evaluar = $globalLyA."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_sueldos_I > 0){
                  $texto_evaluar = $globalLyA."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_faltasinju_I > 0){
                  $texto_evaluar = $globalLyA."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_faltasinju_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_descunif_I > 0){
                  $texto_evaluar = $globalLyA."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_descunif_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_logalm_seggasmedmay_I > 0){
                  $texto_evaluar = $globalLyA."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("LOGISTICA Y ALMACEN", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_logalm_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }

                //$departamento_linea_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                //echo "switchs:".$departamento_linea_txt."<br>";

              }
              //echo "<b>-MONTERREY</b>".$D_monterrey_ajusteredondeo."-".$D_monterrey_sueldos."<br>";
              if (($D_monterrey_aguinaldo_I > 0 ) OR ($D_monterrey_ajusteredondeo_I > 0 ) OR ($D_monterrey_apoyos_I > 0 ) OR
                ($D_monterrey_compensacion_I > 0 ) OR ($D_monterrey_primadom_I > 0 ) OR ($D_monterrey_primavac_I > 0 ) OR
                ($D_monterrey_primavacpro_I > 0 ) OR ($D_monterrey_subsidio_I > 0 ) OR ($D_monterrey_sueldos_I > 0 ) OR
                ($D_monterrey_faltasinj_I > 0 ) OR ($D_monterrey_descuni_I > 0 ) OR ($D_monterrey_seggasmedmay_I > 0 )){
                $globalMon= "MONTERREY";
                //$D_concepto_8 = rellena_ceros("MONTERREY",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg9 = centro_costo("MONTERREY");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("MONTERREY");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_monterrey_ajusteredondeo_I + $D_monterrey_sueldos_I;
                if ($D_monterrey_aguinaldo_I > 0){
                  $texto_evaluar = $globalMon."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalMon."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_apoyos_I > 0){
                  $texto_evaluar = $globalMon."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_apoyos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_compensacion_I > 0){
                  $texto_evaluar = $globalMon."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_primadom_I > 0){
                  $texto_evaluar = $globalMon."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_primavac_I > 0){
                  $texto_evaluar = $globalMon."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_primavacpro_I > 0){
                  $texto_evaluar = $globalMon."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Prima dominical proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_subsidio_I > 0){
                  $texto_evaluar = $globalMon."-Subsidio ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_sueldos_I > 0){
                  $texto_evaluar = $globalMon."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_faltasinj_I > 0){
                  $texto_evaluar = $globalMon."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_descuni_I > 0){
                  $texto_evaluar = $globalMon."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_monterrey_seggasmedmay_I > 0){
                  $texto_evaluar = $globalMon."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Monterrey", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_monterrey_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-MARKETING</b>".$D_marketing_ajusteredondeo."-".$D_marketing_primvac."-".$D_marketing_medmay."-".$D_marketing_sueldos."<br>";
              if (($D_marketing_aguinaldo_I > 0)  OR  ($D_marketing_ajusteredondeo_I > 0)  OR ($D_marketing_apoyosub_I > 0)  OR
                ($D_marketing_compensacion_I > 0)  OR ($D_marketing_primvac_I > 0)  OR ($D_marketing_primvacpro_I > 0)  OR
                ($D_marketing_primdom_I > 0)  OR ($D_marketing_subsidio_I > 0)  OR ($D_marketing_sueldos_I > 0)  OR
                ($D_marketing_faltasinj_I > 0)  OR ($D_marketing_desuni_I > 0)  OR ($D_marketing_medmay_I > 0)){
                //$D_concepto_8 = rellena_ceros("MARKETING",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $globalMar = "MARKETING";
                $D_Seg_9 = centro_costo("MARKETING");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("MARKETING");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_marketing_ajusteredondeo_I + $D_marketing_primvac_I + $D_marketing_medmay_I + $D_marketing_sueldos_I;

                if($D_marketing_aguinaldo_I > 0){
                  $texto_evaluar = $globalMar."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalMar."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_marketing_apoyosub_I > 0){
                  $texto_evaluar = $globalMar."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_compensacion_I > 0){
                  $texto_evaluar = $globalMar."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_primvac_I > 0){
                  $texto_evaluar = $globalMar."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_marketing_primvac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_primvacpro_I > 0){
                  $texto_evaluar = $globalMar."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_primvacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_primdom_I > 0){
                  $texto_evaluar = $globalMar."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_primdom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_subsidio_I > 0){
                  $texto_evaluar = $globalMar."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 =  $D_marketing_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_sueldos_I > 0){
                  $texto_evaluar = $globalMar."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_marketing_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_faltasinj_I > 0){
                  $texto_evaluar = $globalMar."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_marketing_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_desuni_I > 0){
                  $texto_evaluar = $globalMar."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Descuento de uniformmes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_marketing_desuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_marketing_medmay_I > 0){
                  $D_concepto_8 = rellena_ceros("MARKETING-Seguro de gastos medicos mayores",100,8);
                  $texto_evaluar = $globalMar."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Marketing", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_marketing_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-TEC INF</b>".$D_tecinf_ajusteredondeo."-".$D_tecinf_apoyosubasta."-".$D_tecinf_medmay."-".$D_tecinf_sueldos."<br>";
              if (($D_tecinf_aguinaldo_I > 0) OR ($D_tecinf_ajusteredondeo_I > 0) OR ($D_tecinf_apoyosubasta_I > 0) OR
                ($D_tecinf_compensacion_I > 0) OR ($D_tecinf_primadom_I > 0) OR ($D_tecinf_primvac_I > 0) OR
                ($D_tecinf_promavacpro_I > 0) OR ($D_tecinf_subsidio_I > 0) OR ($D_tecinf_faltasinj_I > 0) OR
                ($D_tecinf_sueldos_I > 0) OR ($D_tecinf_descuni_I > 0) OR ($D_tecinf_medmay_I > 0)){
                $globalTecInf = "TECNOLOGIA DE LA INFORMACION";
                //$D_concepto_8 = rellena_ceros("TECNOLOGIAS DE LA INFORMACION",100,8);
                $D_Seg_9 = centro_costo("TECNOLOGIAS DE LA INFORMACION");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("TECNOLOGIAS DE LA INFORMACION");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_tecinf_ajusteredondeo_I + $D_tecinf_apoyosubasta_I + $D_tecinf_medmay_I + $D_tecinf_sueldos_I;

                if($D_tecinf_aguinaldo_I > 0){
                  $texto_evaluar = $globalTecInf."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalTecInf."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_apoyosubasta_I > 0){
                  $texto_evaluar = $globalTecInf."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_apoyosubasta_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_compensacion_I > 0){
                  $texto_evaluar = $globalTecInf."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_primadom_I > 0){
                  $texto_evaluar = $globalTecInf."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_primvac_I > 0){
                  $texto_evaluar = $globalTecInf."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_primvac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_promavacpro_I > 0){
                  $texto_evaluar = $globalTecInf."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_promavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_subsidio_I > 0){
                  $texto_evaluar = $globalTecInf."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_sueldos_I > 0){
                  $texto_evaluar = $globalTecInf."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_faltasinj_I > 0){
                  $texto_evaluar = $globalTecInf."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_descuni_I > 0){
                  $D_concepto_8 = rellena_ceros("TECNOLOGIAS DE LA INFORMACION-Descuento de uniformes",100,8);
                  $texto_evaluar = $globalTecInf."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_descuni_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_tecinf_medmay_I > 0){
                  $texto_evaluar = $globalTecInf."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Desarrollo TI", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_tecinf_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-OBRA GRAFICA</b>-".$D_obragraf_ajusteredondeo."-".$D_obragraf_descunif."-".$D_obragraf_sueldos."<br>";
              if (($D_obragraf_aguinaldopro_I > 0) OR ($D_obragraf_ajusteredondeo_I > 0) OR ($D_obragraf_apoyosub_I > 0) OR
                ($D_obragraf_compensacion_I > 0) OR ($D_obragraf_primadom_I > 0) OR ($D_obragraf_primvac_I > 0) OR
                ($D_obragraf_primavacpro_I > 0) OR ($D_obragraf_subsidio_I > 0) OR ($D_obragraf_sueldos_I > 0) OR
                ($D_obragraf_faltasinj_I > 0) OR ($D_obragraf_descunif_I > 0) OR ($D_obragraf_seggasmedmay_I > 0)){
                $globalObra = "OBRA GRAFICA";
                //$D_concepto_8 = rellena_ceros("OBRA GRAFICA",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("OBRA GRAFICA");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("OBRA GRAFICA");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_obragraf_ajusteredondeo_I + $D_obragraf_descunif_I + $D_obragraf_sueldos_I;

                if($D_obragraf_aguinaldopro_I > 0){
                  $texto_evaluar = $globalObra."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Obra Gráfica", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_aguinaldopro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalObra."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Obra Gráfica", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_apoyosub_I > 0){
                  $texto_evaluar = $globalObra."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_compensacion_I > 0){
                  $texto_evaluar = $globalObra."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_primadom_I > 0){
                  $texto_evaluar = $globalObra."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_primvac_I > 0){
                  $texto_evaluar = $globalObra."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_primvac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_primavacpro_I > 0){
                  $texto_evaluar = $globalObra."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_subsidio_I > 0){
                  $texto_evaluar = $globalObra."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_sueldos_I > 0){
                  $texto_evaluar = $globalObra."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_faltasinj_I > 0){
                  $texto_evaluar = $globalObra."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_descunif_I > 0){
                  $texto_evaluar = $globalObra."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_descunif_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_obragraf_seggasmedmay_I > 0){
                  $texto_evaluar = $globalObra."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Obra Gráfica", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_obragraf_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                /**/
              }
              //echo "<b>-OPORTUNIDADES</b>-".$D_oportunidades_ajusteredondeo."-".$D_oportunidades_apoyosub."-".$D_oportunidades_medmay."-".$D_oportunidades_sueldos."<br>";
              if (($D_oportunidades_aguinaldo_I > 0) OR ($D_oportunidades_apoyosub_I > 0) OR ($D_oportunidades_ajusteredondeo_I > 0) OR
                ($D_oportunidades_compensacion_I > 0) OR ($D_oportunidades_primadom_I > 0) OR ($D_oportunidades_primavac_I > 0) OR
                ($D_oportunidades_primavacpro_I > 0) OR ($D_oportunidades_subsidio_I > 0) OR ($D_oportunidades_sueldos_I > 0) OR
                ($D_oportunidades_faltasinj_I > 0) OR ($D_oportunidades_descuni_I > 0) OR ($D_oportunidades_medmay_I > 0) ){
                $globalOp = "OPORTUNIDADES";
                //$D_concepto_8 = rellena_ceros("OPORTUNIDADES",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("OPORTUNIDADES");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("OPORTUNIDADES");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_oportunidades_ajusteredondeo_I + $D_oportunidades_apoyosub_I + $D_oportunidades_medmay_I + $D_oportunidades_sueldos_I;

                if ($D_oportunidades_aguinaldo_I > 0){
                  $texto_evaluar = $globalOp."-Aguinaldo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Oportunidades", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_apoyosub_I > 0){
                  $texto_evaluar = $globalOp."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_apoyosub_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_ajusteredondeo_I > 0){
                  $D_concepto_8 = rellena_ceros("OPORTUNIDADES-Ajuste redondeo",100,8);
                  $texto_evaluar = $globalOp."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_compensacion_I > 0){
                  $texto_evaluar = $globalOp."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_primadom_I > 0){
                  $texto_evaluar = $globalOp."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_primavac_I > 0){
                  $texto_evaluar = $globalOp."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_primavacpro_I > 0){
                  $texto_evaluar = $globalOp."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_subsidio_I > 0){
                  $texto_evaluar = $globalOp."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_sueldos_I > 0){
                  $texto_evaluar = $globalOp."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_faltasinj_I > 0){
                  $texto_evaluar = $globalOp."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_descuni_I > 0){
                  $texto_evaluar = $globalOp."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_descuni_I ;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_oportunidades_medmay_I > 0){
                  $texto_evaluar = $globalOp."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Oportunidades", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_oportunidades_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-PRESIDENCIA</b>-".$D_presidencia_ajusteredondeo."-".$D_presidencia_primadom."-".$D_presidencia_subempleo."-".$D_presidencia_sueldos."<br>";
              if (($D_presidencia_aguinaldo_I > 0) OR ($D_presidencia_ajusteredondeo_I > 0) OR ($D_presidencia_apoyo_I > 0) OR
                ($D_presidencia_compensacion_I > 0) OR ($D_presidencia_primadom_I > 0) OR ($D_presidencia_primavac_I > 0) OR
                ($D_presidencia_primavacpro_I > 0) OR ($D_presidencia_subempleo_I > 0) OR ($D_presidencia_sueldos_I > 0) OR
                ($D_presidencia_faltasinj_I > 0) OR ($D_presidencia_descuento_I > 0) OR ($D_presidencia_seggasmedmay_I > 0)){
                $globalPre = "PRESIDENCIA";
                //$D_concepto_8 = rellena_ceros("PRESIDENCIA",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("PRESIDENCIA");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("PRESIDENCIA");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_presidencia_ajusteredondeo_I + $D_presidencia_primadom_I + $D_presidencia_subempleo_I + $D_presidencia_sueldos_I;

                if($D_presidencia_aguinaldo_I > 0){
                  $texto_evaluar = $globalPre."-AjusteAguinaldo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Presidencia", "Ajuste aguinaldo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalPre."-AjusteAguinaldo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_apoyo_I > 0){
                  $texto_evaluar = $globalPre."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_apoyo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_compensacion_I > 0){
                  $texto_evaluar = $globalPre."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_primadom_I > 0){
                  $texto_evaluar = $globalPre."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_primavac_I > 0){
                  $texto_evaluar = $globalPre."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_primavacpro_I > 0){
                  $texto_evaluar = $globalPre."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_subempleo_I > 0){
                  $texto_evaluar = $globalPre."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_subempleo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_sueldos_I > 0){
                  $texto_evaluar = $globalPre."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_faltasinj_I > 0){
                  $texto_evaluar = $globalPre."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_descuento_I > 0){
                  $texto_evaluar = $globalPre."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_descuento_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_presidencia_seggasmedmay_I > 0){
                  $texto_evaluar = $globalPre."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Presidencia", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_presidencia_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-SERVICIOS</b>-".$D_servicios_ajusteredondeo."-".$D_servicios_apoyo."-".$D_servicios_subempleo."-".$D_servicios_sueldos."<br>";
              if (($D_servicios_aguinaldo_I > 0) OR ($D_servicios_apoyo_I > 0) OR ($D_servicios_ajusteredondeo_I > 0) OR
                ($D_servicios_compensa_I > 0) OR ($D_servicios_primadom_I > 0) OR ($D_servicios_primavac_I > 0) OR
                ($D_servicios_primavacpro_I > 0) OR ($D_servicios_subempleo_I > 0) OR ($D_servicios_sueldos_I > 0) OR
                ($D_servicios_faltasinj_I > 0) OR ($D_servicios_descuento_I > 0) OR ($D_servicios_seggasmedmay_I > 0)){
                $globalSer = "SERVICIOS";
                //$D_concepto_8 = rellena_ceros("SERVICIOS",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("SERVICIO AL CLIENTE");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("SERVICIO AL CLIENTE");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_servicios_ajusteredondeo_I + $D_servicios_apoyo_I + $D_servicios_subempleo_I + $D_servicios_sueldos_I;

                if($D_servicios_aguinaldo_I > 0){
                  $texto_evaluar = $globalSer."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);

                  $regresa = get_CC_DB_personale("Servicios", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_apoyo_I > 0){
                  $texto_evaluar = $globalSer."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_apoyo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_servicios_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalSer."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_servicios_compensa_I > 0){
                  $texto_evaluar = $globalSer."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_compensa_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_primadom_I > 0){
                  $texto_evaluar = $globalSer."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_primadom_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_primavac_I > 0){
                  $texto_evaluar = $globalSer."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_primavacpro_I > 0){
                  $texto_evaluar = $globalSer."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_subempleo_I > 0){
                  $texto_evaluar = $globalSer."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_subempleo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_sueldos_I > 0){
                  $texto_evaluar = $globalSer."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_faltasinj_I > 0){
                  $texto_evaluar = $globalSer."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_descuento_I > 0){
                  $texto_evaluar = $globalSer."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_descuento_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_servicios_seggasmedmay_I > 0){
                  $texto_evaluar = $globalSer."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Servicios", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_servicios_seggasmedmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>-VINOS</b>-".$D_vinos_ajusteredondeo."-".$D_vinos_medmay."-".$D_vinos_sueldos."<br>";
              if (($D_vinos_aguinaldo_I > 0) OR ($D_vinos_ajusteredondeo_I > 0) OR ($D_vinos_apoyo_I > 0) OR
                ($D_vinos_compensacion_I > 0) OR ($D_vinos_primadominical_I > 0) OR ($D_vinos_primavac_I > 0) OR
                ($D_vinos_primavacpro_I > 0) OR ($D_vinos_subsidio_I > 0) OR ($D_vinos_sueldos_I > 0) OR
                ($D_vinos_faltasinj_I > 0) OR ($D_vinos_descuento_I > 0) OR ($D_vinos_medmay_I > 0)){
                $globalVino = "VINOS";
                //$D_concepto_8 = rellena_ceros("VINOS",100,8);
                //$D_Seg_9 = rellena_ceros("4", 4,9);
                $D_Seg_9 = centro_costo("VINOS");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("VINOS");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 =  $D_vinos_ajusteredondeo_I + $D_vinos_medmay_I + $D_vinos_sueldos_I;

                if($D_vinos_aguinaldo_I > 0){
                  $texto_evaluar = $globalVino."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_aguinaldo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalVino."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if($D_vinos_apoyo_I > 0){
                  $texto_evaluar = $globalVino."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_apoyo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_compensacion_I > 0){
                  $texto_evaluar = $globalVino."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_primadominical_I > 0){
                  $texto_evaluar = $globalVino."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_primadominical_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_primavac_I > 0){
                  $texto_evaluar = $globalVino."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_primavacpro_I > 0){
                  $texto_evaluar = $globalVino."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_primavacpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_subsidio_I > 0){
                  $texto_evaluar = $globalVino."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_sueldos_I > 0){
                  $texto_evaluar = $globalVino."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_faltasinj_I > 0){
                  $texto_evaluar = $globalVino."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Faltas injustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_descuento_I > 0){
                  $texto_evaluar = $globalVino."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Descuentos de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_descuento_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if($D_vinos_medmay_I > 0){
                  $texto_evaluar = $globalVino."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Vinos", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_vinos_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }
              //echo "<b>WEB</b>-".$D_web_ajusteredondeo."-".$D_web_apoyosubasta."-".$D_web_sueldos."<br>";
              if (($D_web_aguinaldoprop_I > 0) OR ($D_web_ajusteredondeo_I > 0) OR ($D_web_apoyosubasta_I > 0) OR
                ($D_web_compensacion_I > 0) OR ($D_web_primadominical_I > 0) OR ($D_web_primavac_I > 0) OR
                ($D_web_primavacionalpro_I > 0) OR ($D_web_subsidio_I > 0) OR ($D_web_sueldos_I > 0) OR
                ($D_web_faltasinj_I > 0) OR ($D_web_descuento_I > 0) OR ($D_web_medmay_I > 0)){
                $globalWeb = "WEB";
                //echo "primaVacPro:".$D_web_primavacionalpro_I."<br>";
                //$D_concepto_8 = rellena_ceros("WEB",100,8);
                $D_Seg_9 = centro_costo("WEB");
                $D_Seg_9 = rellenar_centro_costo($D_Seg_9);
                $respuesta_36 = get_36("WEB");
                if(strlen($respuesta_36) > 0){
                  $D_UUID_10 = $respuesta_36;
                }else{
                  $D_UUID_10 = "99999999-9999-9999-9999-999999999999";
                }
                //$D_importe_5 = $D_web_ajusteredondeo_I + $D_web_apoyosubasta_I + $D_web_sueldos_I;

                if ($D_web_aguinaldoprop_I > 0){
                  $texto_evaluar = $globalWeb."-AguinaldoPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Aguinaldo proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega aguinaldo";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_aguinaldoprop_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_ajusteredondeo_I > 0){
                  $texto_evaluar = $globalWeb."-AjusteRedondeo ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Ajuste redondeo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega ajuste";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_ajusteredondeo_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    //$depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    //fwrite($ar, $depaL_txt);
                    //fwrite($ar, "\n");
                  }
                }
                if ($D_web_apoyosubasta_I > 0){
                  $texto_evaluar = $globalWeb."-ApoyoSub ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Apoyo en subasta");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega apoyo";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_apoyosubasta_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_compensacion_I > 0){
                  $texto_evaluar = $globalWeb."-Compensacion ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Compensacion");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega apoyo";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_compensacion_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_primadominical_I > 0){
                  $texto_evaluar = $globalWeb."-PrimaDom ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Prima dominical");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega prima";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_primadominical_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_primavac_I > 0){
                  $texto_evaluar = $globalWeb."-PrimaVac ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Prima vacacional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega prima";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_primavac_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_primavacionalpro_I > 0){
                  $texto_evaluar = $globalWeb."-PrimaVacPro ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Prima vacacional proporcional");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega prima";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_primavacionalpro_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_subsidio_I > 0){
                  $texto_evaluar = $globalWeb."-SubsidioEmp ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Subsidio al empleo");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega prima";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_subsidio_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_sueldos_I > 0){
                  $texto_evaluar = $globalWeb."-Sueldos ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Sueldos");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega_sueldos";
                  $D_P_o_D_4 = 0;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_sueldos_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_faltasinj_I > 0){
                  $texto_evaluar = $globalWeb."-FaltasInj ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Faltas iinjustificadas");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega_sueldos";
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_faltasinj_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_descuento_I > 0){
                  $texto_evaluar = $globalWeb."-DescUnif ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Descuento de uniformes");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega_sueldos";
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_descuento_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
                if ($D_web_medmay_I > 0){
                  $texto_evaluar = $globalWeb."-SegGasMedMay ".$texto1;
                  $D_concepto_8 = rellena_ceros($texto_evaluar,100,8);
                  $regresa = get_CC_DB_personale("Web", "Seguro de gastos médicos mayores");
                  //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
                  if ($regresa == ""){
                    $D_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }else{
                    $D_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
                  }
                  //echo "llega_sueldos";
                  $D_P_o_D_4 = 1;
                  $D_importe_5 = "";
                  $D_importe_5 = $D_web_medmay_I;
                  $D_importe_5 = rellena_ceros($D_importe_5, 20,6);
                  if ($departamento_txt == 0){  //lAYOUT DEPARTMENT
                    echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10."<br>";
                  }
                  if ($departamento_txt_imprimir == 0){
                    $depaL_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
                    fwrite($ar, $depaL_txt);
                    fwrite($ar, "\n");
                  }
                }
              }

              //$departamento_linea_txt = $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$D_P_o_D_4.$espacio.$D_importe_5.$espacio.$D_cero_6.$espacio.$D_cero_7.$espacio.$D_concepto_8.$espacio.$D_Seg_9.$espacio.$D_UUID_10;
              //echo "line:-".$departamento_linea_txt."-<br>";
              //fwrite($ar, $departamento_linea_txt);
              //fwrite($ar, "\n");
        }
        $espacio = " ";
        //echo "-".$veces."<br>";
        //echo $D_pol_0.$espacio.$D_clave_1.$espacio.$D_referencia_2.$espacio.$D_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
        /*************************************
         * END_DEPARTMENT
         ************************************* */


        /*************************************
         * BEGIN_GLOBAL
         ************************************* */
        if($GLOBAL == 0){
            //echo "llega global";
            //echo "GLOBAL-caja ahorro".$GLOBAL_caja_ahorro."<br>";
            //echo "GLOBAL-caja prestamo".$GLOBAL_prestamoc_ahorro."<br>";
            //echo "GLOBAL-caja ISR".$GLOBAL_ISR."<br>";
            //echo "GLOBAL-caja IMSS".$GLOBAL_IMSS."<br>";
            //echo "GLOBAL-caja interes cahorro".$GLOBAL_Ic_ahorro."<br>";
            //echo "GLOBAL-caja prosperus".$GLOBAL_prosperus."<br>";
            //echo "GLOBAL-caja neto".$GLOBAL_Neto."<br>";
          $espacio = " ";
          $C_pol_0 = "M1";
          //$C_clave_1 = rellena_ceros("6000000100010000", 30, 2);     //CUENTA_CONTABLE->CHANGE

          $C_referencia_2 = "NOM.PER.".$periodo."";  //NOMINA->CHANGE
          //$C_referencia_2 = $texto1;
          //$C_nada_3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          //$C_cero_6 = "0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          //$C_cero_7 = "0.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          $C_nada_3 = "\x20\x20\x20\x20\x20\x20\x20\x20\x20";
          $C_cero_6 = "0\x20\x20\x20\x20\x20\x20\x20\x20\x20";
          $C_cero_7 = "0.0\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20";
          //$C_UUID_10 = "58AB597A-7419-45E2-A317-4C72018354B2";

          echo "<tr><td colspan=2></td></td>";
          if ($GLOBAL_caja_ahorro > 0){
              //echo "llega global<br>";
            $C_importe_5 = rellena_ceros($GLOBAL_caja_ahorro, 20,6);
            $textoGA = "GLOBAL-Caja de Ahorro".$texto1;
            $C_concepto_8 = rellena_ceros($textoGA,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-CajaAhorro");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            $regresa = get_CC_DB_Specific("GLOBAL-CajaAhorro");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }


            if($globla_tabla ==0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Caja de Ahorro</td><td>".$GLOBAL_caja_ahorro."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
            //echo "&2 &&&& &&&&&&&&&&&&&&&&&&&&&&&&30 &&&&&&&&10 ////////9 1 &&&&&&&&&&&&&&&&&&20 &&&&&&&&10 &&&&&&&&&&&&&&&&&&20 &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&100 &&&4 ////////////////////////////////////<br>";
            //echo "<td>".strlen($C_pol_1)."</td><td>".strlen($C_clave_2)."</td><td>".strlen($C_referencia_3)."</td><td>".strlen($C_nada_4)."</td><td>".strlen($C_P_o_D_5)."</td><td>".strlen($C_caja_ahorro_6)."</td><td>".strlen($C_cerro_7)."</td>";
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }
          }
          if ($GLOBAL_prestamoc_ahorro > 0){
            $C_importe_5 = rellena_ceros($GLOBAL_prestamoc_ahorro, 20,6);
            $textoGPA = "Global-Prestamo caja Ahorro ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGPA,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-PrestamoCajaAhorro");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }

            $contando = strlen($GLOBAL_prestamoc_ahorro);
            //echo "C:".$contando."<br>";

            $regresa = get_CC_DB_Specific("GLOBAL-PrestamoCajaAhorro");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }


            if($globla_tabla ==0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Prestamo caja Ahorro</td><td>".$GLOBAL_prestamoc_ahorro."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if ($GLOBAL_ISR > 0) {
            $C_importe_5 = rellena_ceros($GLOBAL_ISR, 20,6);
            $textoGISR = "Global-ISR ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGISR,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-ISR");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            if ($globla_tabla == 0){  echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>ISR</td><td>".$GLOBAL_ISR."</td><td>GLOBAL</td><td></td><td></td></tr>"; }

            $regresa = get_CC_DB_Specific("GLOBAL-ISR");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if ($GLOBAL_IMSS > 0) {
            $C_importe_5 = rellena_ceros($GLOBAL_IMSS, 20,6);
            $textoGIMSS = "Global-Cuota obrera IMSS ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGIMSS,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-IMSS");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            $regresa = get_CC_DB_Specific("GLOBAL-IMSS");

            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }
            if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Cuota obrera IMSS</td><td>".$GLOBAL_IMSS."</td><td>GLOBAL</td><td></td><td></td></tr>";  }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if ($GLOBAL_Ic_ahorro > 0) {
            $C_importe_5 = rellena_ceros($GLOBAL_Ic_ahorro, 20,6);
            $textoGPICA = "Global-Descuento intereses prestamo caja de ahorro ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGPICA,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-IntCajaAhorro");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            $regresa = get_CC_DB_Specific("GLOBAL-IntCajaAhorro");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";

            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }
            if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Descuento intereses préstamo caja de ahorro</td><td>".$GLOBAL_Ic_ahorro."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if ($GLOBAL_prosperus > 0) {
            $C_importe_5 = rellena_ceros($GLOBAL_prosperus, 20,6);
            $textoGDPP = "Global-Descuento prestamo propsperus ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGDPP,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-DescuentoProsperus");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            $regresa = get_CC_DB_Specific("GLOBAL-DescuentoProsperus");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }
            if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Descuento préstamo prósperus</td><td>".$GLOBAL_prosperus."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if ($GLOBAL_Neto > 0) {
            $C_importe_5 = rellena_ceros($GLOBAL_Neto, 20,6);
            $textoGN = "Global-Neto ".$texto1;
            $C_concepto_8 = rellena_ceros($textoGN,100,8);
            $C_P_o_D_4 = "1";
            $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
            $C_UUID_10 = get_36("GLOBAL-Neto");
            if(strlen($respuesta_36) > 0){
              $C_UUID_10 = $respuesta_36;
            }else{
              $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
            }
            $regresa = get_CC_DB_Specific("Neto");
            //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
            if ($regresa == ""){
              $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
            }else{
              $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
            }
            if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Neto</td><td>".$GLOBAL_Neto."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
            if ($global_txt_imprimir == 0){
              echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
            }
            if ($global_txt == 0){  //lAYOUT GLOBAL
              $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
              fwrite($ar, $globalL_txt);
              fwrite($ar, "\n");
            }

          }
          if($ImpPer > 0){
              $restaImpPer = $ImpPer - $SumaTotalPercepciones;
              $restaImpPer = number_format($restaImpPer, 2, '.', '');
              $C_importe_5 = rellena_ceros($restaImpPer, 20,6);
              $textoGIP = "Global-ImPercepcion ".$texto1;
              $C_concepto_8 = rellena_ceros($textoGIP,100,8);

              $C_P_o_D_4 = "1";
              $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
              $C_UUID_10 = get_36("GLOBAL-ImpPercepciones");
              if(strlen($respuesta_36) > 0){
                $C_UUID_10 = $respuesta_36;
              }else{
                $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
              }
              $regresa = get_CC_DB_Specific("GLOBAL-ImpPercepciones");
              //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
              if ($regresa == ""){
                $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
              }else{
                $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
              }
              if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Neto</td><td>".$GLOBAL_Neto."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
              if ($global_txt_imprimir == 0){
                echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
              }
              if ($global_txt == 0){  //lAYOUT GLOBAL
                $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
                fwrite($ar, $globalL_txt);
                fwrite($ar, "\n");
              }
          }
          if($ImpDed > 0){
              $restaImpDed = $ImpDed - $SumaTotalDeducciones;
              $restaImpDed = number_format($restaImpDed, 2, '.', '');

              $C_importe_5 = rellena_ceros($restaImpDed, 20,6);

              $textoGID = "Global-ImpDeduciones ".$texto1;
              $C_concepto_8 = rellena_ceros($textoGID,100,8);
              $C_P_o_D_4 = "1";
              $C_Seg_9 = rellena_ceros(" ", 4,9); //centro_costo
              $C_UUID_10 = get_36("GLOBAL-ImpDeduciones");
              if(strlen($respuesta_36) > 0){
                $C_UUID_10 = $respuesta_36;
              }else{
                $C_UUID_10 = "99999999-9999-9999-9999-999999999999";
              }
              $regresa = get_CC_DB_Specific("GLOBAL-ImpDeduciones");
              //echo "<br>depa:".$depa."cpto".$conceptoDepa."--".$regresa."<br>";
              if ($regresa == ""){
                $C_clave_1 = rellena_ceros("0000000000000000", 30, 2);     //CUENTA_CONTABLE->CHANGE
              }else{
                $C_clave_1 = rellena_ceros($regresa, 30, 2);     //CUENTA_CONTABLE->CHANGE
              }
              if ($globla_tabla == 0){ echo "<tr  bgcolor='".$colorr."'><td></td><td></td><td></td><td>Neto</td><td>".$GLOBAL_Neto."</td><td>GLOBAL</td><td></td><td></td></tr>"; }
              if ($global_txt_imprimir == 0){
                echo $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10."<br>";
              }
              if ($global_txt == 0){  //lAYOUT GLOBAL
                $globalL_txt = $C_pol_0.$espacio.$C_clave_1.$espacio.$C_referencia_2.$espacio.$C_nada_3.$espacio.$C_P_o_D_4.$espacio.$C_importe_5.$espacio.$C_cero_6.$espacio.$C_cero_7.$espacio.$C_concepto_8.$espacio.$C_Seg_9.$espacio.$C_UUID_10;
                fwrite($ar, $globalL_txt);
                fwrite($ar, "\n");
              }
          }
        }
        /*************************************
         * END_GLOBAL
         ************************************* */
        //echo "</tr>";
        //echo "<tr><td>API</td><td>".$ImpPer."</td><td>".$ImpDed."</td></tr>";
        //echo "<tr><td>MIO</td><td>".$SumaTotalPercepciones."</td><td>".$SumaTotalDeducciones."</td></tr>";
      echo "</table>";


    }else{
        echo "Unexpected".$response->getStatus().''.$response->getReasonPhrase();
    }
}catch(HTTP_Request2_Exception $e){

}
//echo "<br>.........Generar informaciones..-";
fclose($ar);

//echo "tabla:".$tabla."<br>";
if ($tabla == 1){
  echo "<table border=1>";
    echo "<tr><th>ARCHIVO GENERADO</th></tr>";
    echo "<tr><td>"; echo '<a href="layout.txt" download="Archivo"><img src="imagenes/des_min.jpg">IMG</a>'; echo "</td></tr>";
}
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

function rellena_dos($string){
  $contando = strlen($string);

  //echo "contando-".$contando."-<br>";

  if($contando == 1){
    $regresa = "0".$string;
  }
  //echo "regresa-".$regresa."-<br>";
  return $regresa;
}
function centro_costo($string){
  //echo "<br>string-".$string."<br>";
  switch(trim($string)){
    case "ADMINISTRACION Y FINANZAS":
      $cc_es = ' 2';
      break;
    case "ANTIGUEDADES":
      $cc_es = ' 9';
      break;
    case "ARTE MODERNO":
      $cc_es = '12';
      break;
    case "AUTOS Y CAMIONES":
      $cc_es = ' 7';
      break;
    case "CAPITAL HUMANO":
      $cc_es = ' 6';
      break;
    case "DIRECCION":
      $cc_es = ' 1';
      break;
    case "EMPEÑOS":
      $cc_es = '14';
      break;
    case "FOTOGRAFIA":
      $cc_es = '31';
      break;
    case "GUADALAJARA":
      $cc_es = '24';
      break;
    case "HERENCIAS Y COLECCIONES":
      $cc_es = '22';
      break;
    case "JOYERIA":
      $cc_es = '13';
      break;
    case "LIBROS":
      $cc_es = '10';
      break;
    case "LOGISTICA Y ALMACEN":
      $cc_es = '28';
      break;
    case "MARKETING":
      $cc_es = ' 3';
      break;
    case "MONTERREY":
      $cc_es = '20';
      break;
    case "MORTON & MORTON":
      $cc_es = '16';
      break;
    case "OBRA GRAFICA":
      $cc_es = '32';
      break;
    case "OPORTUNIDADES":
      $cc_es = ' 4';
      break;
    case "PARIS":
      $cc_es = '25';
      break;
    case "PLUMA Y MARTILLO":
      $cc_es = '29';
      break;
    case "PORCELANA":
      $cc_es = '34';
      break;
    case "PRESIDENCIA":
      $cc_es = '30';
      break;
    case "SERVICIO AL CLIENTE":
      $cc_es = ' 5';
    case "VINOS":
      $cc_es = '11';
      break;
    case "WEB":
      $cc_es = '23';
      break;
    case "TECNOLOGIAS DE LA INFORMACION":
      $cc_es = '37';
      break;
    case "LEGAL":
      $cc_es = '36';
      break;
    default :
      $cc_es = '99';    //ESTA EL DEPARTAMENTO PERO NO ESTA DEFINIDO EN LA LISTA
      break;
  }

  return $cc_es;
}
function rellenar_centro_costo($string){
  $contando = strlen($string);
  for($contando;$contando<4;$contando++){
      //$espacios_contados = $espacios_contados."&nbsp;";
      $espacios_contados = $espacios_contados."\x20";
  }
  $regresa = $espacios_contados.$string;

  $regresa = substr($regresa, 0, 4);
  return $regresa;
}
function rellena_ceros($string, $cuantos, $llega){
    $regresa = "";
    $contando = strlen($string);
    $e_e = " ";

    if($llega == 6){
      //echo "<br>recibe:-".$string."-contando:-".$contando."-cuantos:-".$cuantos."-<br>";
    }

    for($contando;$contando<$cuantos;$contando++){
        //$espacios_contados = $espacios_contados."&nbsp;";
        $espacios_contados = $espacios_contados."\x20";
    }

    $espacios = strlen($espacios_contados);

    if($llega == 9){
      $regresa = $espacios_contados.$string;
    }else{
      $regresa =$string.$espacios_contados;
    }

    if($llega == 6){
      $regresa =$string.$espacios_contados;
      //echo "<br>regresar{".$regresa."}-{".strlen($regresa)."}-{".$espacios."}<br>";
      //echo "-----------------------------------------------------------------------------<br>";
    }
    $contando = 0;
    $cuantos = 0;
    $string = "";
    $espacios_contados = "";
    $regresa = substr($regresa, 0, 100);
    /*if ($llega == 8){
      echo "<br>regresa_son".strlen($regresa)."<br>";
    }*/
    return $regresa;
}


?>


</fieldset>
</div>
</div>
</div>
<?php
/*
}else{
    include "header.php";
    include "error404.php";
}
*/
/*

*/
?>
