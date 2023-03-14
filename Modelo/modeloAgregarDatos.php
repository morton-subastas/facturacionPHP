<?php

//require_once("conexion.php");
require_once "conexion.php";

Class ModeloAddDatos{

    //TABLA cfdi_clientes
	public static function mdl_addReceptor($rptor){
            $sql = "SELECT * FROM morton_receptores";
            //echo "asi".$sql;
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt -> execute();
		    		$son= $stmt -> fetchAll();

            //$contador = count($son);
            $receptor_desc = $son[0]['receptor_descripcion'];
            $receptor_dire = $son[0]['receptor_direccion'];
            $receptor_ctac = $son[0]['receptor_contacto'];
            $receptor_tele = $son[0]['receptor_telefono'];
            $receptor_emai = $son[0]['receptor_email'];

            //echo "rec".$receptor_desc;
            //echo "<br><br>***";

						$sql_insert = "INSERT INTO `cfdi_clientes`(`empid`, `cfdicliid`, `cfdiclista`, `cfdiclinom`, `cfdiclirfc`, `cfdiclidir`, `cfdiclitel`, `cfdiclicor`, `cfdiclicontacto`)
        		VALUES (1,1,'A','$receptor_desc','$rptor','$receptor_dire','$receptor_tele','$receptor_emai','$receptor_ctac')";

            echo "asi".$sql_insert."<br><br>";

            /**/
            $stmt = Conexion::conectar()->prepare($sql_insert);

            //EJECUTAMOS LA SENTENCIA
		    		$stmt -> execute();
            /**/

            //CERRAMOS LA CONEXION
		    		$stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;


	}

    //Tabla cfdi
    public static function mdl_addCFDI($folio, $receptor, $fec, $hor, $moneda,$tipo_use, $tp_com, $metodo, $forma_pago, $lugar_expedicion, $sub, $iva, $tot, $usu, $paleta, $subasta, $correo_gF){


        $pdo = Conexion::conectar();
        $pdo->beginTransaction();
        try{
            $tc =1; //TIPO DE CAMBIO
        		//echo "<br><Modelo";
						$sub = str_replace("$","", $sub); $sub = str_replace(",","", $sub);
						$iva = str_replace("$","", $iva); $iva = str_replace(",","", $iva);
						$tot = str_replace("$","", $tot); $tot = str_replace(",","", $tot);


						echo "tot:".$tot;
            $sql_insert = "INSERT INTO `cfdi`(`empid`, `cfdiserid`, `cfdiid`, `cfdicliid`, `cfdista`, `cfdifec`, `cfdihor`, `cfdimon`, `cfditc`, `cfditpocom`, `cfdiconpag`, `cfdinocer`, `cfdimetpag`, `cfdiforpag`, `cfdiuso`, `cfdilugexp`, `cfdisub`, `cfdiiva`,
							`cfdiieps`, `cfdiretiva`, `cfdides`, `cfditotret`,`cfditottra`, `cfditot`, `cfdiuuid`, `cfdicerfec`, `cfdicerhor`, `cfdisatsta`, `cfdixml`, `cfdipdf`, `cfdiobs`,`usuario`,`paleta`, `subasta`, `correo_e30`)
							VALUES (1,1,$folio,$receptor,'EM','$fec','$hor','$moneda','$tc','$tp_com','','','$metodo','$forma_pago','$tipo_use','$lugar_expedicion','$sub','$iva','0','0','0','0','$iva','$tot','','','','','','','prueba', '$usu', '$paleta', '$subasta','$correo_gF')";

            echo "asi<br>".$sql_insert."<br><br>";

            //$stmt = Conexion::conectar()->prepare($sql_insert);
            $stmt= $pdo->prepare($sql_insert);

            //EJECUTAMOS LA SENTENCIA
            $stmt -> execute();


            //CERRAMOS LA CONEXION
            //$pdo -> close();

						//echo "llega insersion MODELO";



            //mdl_UpdateCFDI($folio);
						/*
						if(!isset($_SESSION))
								{
								session_start();
								}
								$_SESSION['folio'] = $folio;
								*/

						$pdo->commit();

            return 1;
            //echo  "Registros Insertado". $_SESSION['folio'] ;



						//ANULAMOS EL OBJETO
						$pdo = null;

						$stmt = null;

        }catch(PDOException $e){
            $pdo->rollBack();
            return 0;
        }

    }

    public static function mdl_addCFDIRFC($folio, $receptor, $fec, $hor, $moneda,$tipo_use, $tp_com, $metodo, $forma_pago, $lugar_expedicion, $sub_r, $iva, $tot, $paleta, $recibo, $usu, $subasta, $correo_gF){


      $pdo = Conexion::conectar();
      $pdo->beginTransaction();
      try{
          $tc =1; //TIPO DE CAMBIO
          echo "<br><Modelo";

          $sub0 = str_replace("$","", $sub_r); $sub0 = str_replace(",","", $sub0);
          $iva = str_replace("$","", $iva); $iva = str_replace(",","", $iva);
          $tot = str_replace("$","", $tot); $tot = str_replace(",","", $tot);

					//echo "sub:".$sub0."<br>iva:".$iva."<br>total:".$total;
					/*
          if (($paleta >0) &&	($paleta <200)){
            $entra = 0;
              //PRESENCIAL
              $sub = $sub0 * 0.20;
          }
          if (($paleta >199) &&	($paleta <400)){
            $entra = 199;
              //OFERTAS EN AUSENCIA
              $sub = $sub0 * 0.20;
          }
          if (($paleta >399) &&	($paleta <700)){
            //
            $entra = "399";
            $suba = $sub0 * 0.20;
            $subb = $sub0 * 0.1;
            $sub = $suba + $subb;
          }
          if (($paleta >700) &&	($paleta <1000)){
            //
            $entra = "700";
            $suba = $sub0 * 0.20;
            $subb = $sub0 * 0.3;
            $sub = $suba + $subb;
          }
          if ($paleta >999) {
            //VIDSQUARD
            $entra = "999";
            $sub = $sub0 * 0.20;
        }
				*/
				$sub = $sub0;
        //echo "<br>entra".$entra."-sub:".$sub."<br>";
          $iva = $sub * 0.16;
          $tot = $sub + $iva;
          $sql_insert = "INSERT INTO `cfdi`(`empid`, `cfdiserid`, `cfdiid`, `cfdicliid`, `cfdista`, `cfdifec`, `cfdihor`, `cfdimon`, `cfditc`, `cfditpocom`, `cfdiconpag`, `cfdinocer`, `cfdimetpag`, `cfdiforpag`, `cfdiuso`, `cfdilugexp`, `cfdisub`, `cfdiiva`,
            `cfdiieps`, `cfdiretiva`, `cfdides`, `cfditotret`,`cfditottra`, `cfditot`, `cfdiuuid`, `cfdicerfec`, `cfdicerhor`, `cfdisatsta`, `cfdixml`, `cfdipdf`, `cfdiobs`, `usuario`,`paleta`,`subasta`,`correo_e30`)
            VALUES (1,1,$folio,$receptor,'EM','$fec','$hor','$moneda','$tc','$tp_com','','','$metodo','$forma_pago','$tipo_use','$lugar_expedicion','$sub','$iva','0','0','0','0','$iva','$tot','','','','','','','$recibo', '$usu','$paleta','$subasta', '$correo_gF')";

          //echo "asi<br>".$sql_insert."<br><br>";

          $stmt = Conexion::conectar()->prepare($sql_insert);
          $stmt= $pdo->prepare($sql_insert);

          //EJECUTAMOS LA SENTENCIA
          $stmt -> execute();
          $pdo->commit();
          /**/
          return 1;
          //echo  "Registros Insertado". $_SESSION['folio'] ;



          //ANULAMOS EL OBJETO
          $pdo = null;

          $stmt = null;

      }catch(PDOException $e){
          $pdo->rollBack();
          return 0;
      }

  }

    public static function mdl_UpdateCFDI($folio){
        $pdo = Conexion::conectar();
        $pdo->beginTransaction();
        try{
						//echo "<br>llega UPDATE";
            $sql = "SELECT * FROM `cfdi_detalle` where `cfdiid` = ".$folio."";
            //echo "<br>asi".$sql."<br>";

            $stmt1 = $pdo->prepare($sql);
            $stmt1 -> execute();
            $son= $stmt1 -> fetchAll();

            //$contador = count($son);
            $id_cli = $son[0]['cfdidetid'];


            $sql_update = "UPDATE `cfdi_productos` SET `cfdiprosta` = 'I' WHERE `cfdiproid` = ".$id_cli."";
            //echo "<br><br>".$sql_update."<br><br>";

            //$stmt = Conexion::conectar()->prepare($sql_insert);
            $stmt2= $pdo->prepare($sql_update);

            //EJECUTAMOS LA SENTENCIA
            $stmt2 -> execute();

            $pdo->commit();

						return 1;
            //ANULAMOS EL OBJETO
            $pdo = null;

            $stmt1 = null;
            $stmt2 = null;

        }catch(PDOException $e){
            $pdo->rollBack();
            return 0;
        }
    }


    public static function mdl_AllCFDI(){
        $pdo = Conexion::conectar();
        //$pdo->beginTransaction();
        $sql="SELECT MAX(cfdiid) AS id FROM cfdi";

        $stmt = $pdo->prepare($sql);

        $stmt -> execute();

        $valor=  $stmt -> fetchAll();

        $busca_f = $valor[0][0];

        $sql = "SELECT * FROM cfdi WHERE `cfdiid` = $busca_f";
        //echo "asi".$sql;
        $stmt = $pdo->prepare($sql);

        $stmt -> execute();

        return  $stmt -> fetchAll();

    }

    public static function mdl_countCFDI(){

        //echo "<br>------------modelo--------------<br>";
        $contador = 0;
        $sql = "SELECT * FROM cfdi";
            //echo "asi".$sql;
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt -> execute();

		    $son= $stmt -> fetchAll();
            $contador = count($son);
            //echo "antes".$contador;
            $contador= $contador + 1;

            //echo "envia ".$contador;

            return $contador;

            //CERRAMOS LA CONEXION
		    $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;


	}

    public static function mdl_searchCFDI($folio){
        $pdo = Conexion::conectar();
        //$pdo->beginTransaction();


            //echo "entra Modelo";
            $sql = "SELECT * FROM `cfdi` WHERE `cfdiid` = $folio";
            //echo "asi".$sql;
            $stmt = $pdo->prepare($sql);

            $stmt -> execute();

		    return  $stmt -> fetchAll();

            //$pdo->commit();

            $pdo = null;
            //CERRAMOS LA CONEXION
		    //$stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;

	}


    public static function mdl_SearchReceptor($rfc){
        //echo "entra Modelo<br>";
        $sql = "SELECT * FROM `cfdi_clientes` where `cfdiclirfc` = '".$rfc."'";
        //echo "asi".$sql."<br>";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> execute();
        $son= $stmt -> fetchAll();

        //$contador = count($son);
        $id_cli = $son[0]['cfdicliid'];
        //echo "numero cliente ".$id_cli."<br>";
        //$stmt -> close();
        //$stmt = null;

        return $id_cli;
    }

    public static function mdl_SearchRecibo($recibo){
      //echo "entra Modelo<br>";
      $sql = "SELECT * FROM `cfdi` where `cfdiobs` = '".$recibo."'";
      //echo "asi<br>".$sql."<br>";
      $stmt = Conexion::conectar()->prepare($sql);
      $stmt -> execute();
      $son= $stmt -> fetchAll();

      //$contador = count($son);
      $id_cli = $son[0]['cfdicliid'];
      //echo "numero cliente ".$id_cli."<br>";
      //$stmt -> close();
      //$stmt = null;

      return $id_cli;
  }

    public static function mdlDeleteConcpeto($id){
			$pdo = Conexion::conectar();
			$pdo->beginTransaction();
			try{
        $sql_delete = "DELETE  FROM `cfdi_productos` WHERE cfdiproid = $id";

        //echo "asi<br>".$sql_delete."<br><br>";

        $stmt = $pdo->prepare($sql_delete);

        //EJECUTAMOS LA SENTENCIA
        $stmt -> execute();
        //return $sql_delete;

        $sql_delete2 = "DELETE  FROM `cfdi_detalle` WHERE cfdiproid = $id";
				//echo "dos<br>".$sql_delete2."<br>";
        $stmt2 = $pdo->prepare($sql_delete2);

        //EJECUTAMOS LA SENTENCIA
        $stmt2 -> execute();
        //return $sql_delete;
        /**/
				$pdo->commit();

				return 1;
        //CERRAMOS LA CONEXION
        $stmt -> close();

        //ANULAMOS EL OBJETO
        $stmt = null;
			}catch(PDOException $e){
					$pdo->rollBack();
					return 0;
			}
    }

    public static function mdl_deleteConceptos($folio){
        error_reporting(0);
        $sql = "SELECT * FROM cfdi_detalle where cfdiid = '$folio'";
        //echo "asi".$sql."<br>";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt -> execute();

        $son= $stmt -> fetchAll();
        //var_dump($son);
        $contador = count($son);
        //var_dump($contador);
        $contador = $contador - 1;

        while ($contador >= 0){
            $id_cli = $son[$contador]['cfdiproid'];

            $sql1 = "DELETE  FROM cfdi_detalle where cfdiproid = $id_cli";

            $stmt = Conexion::conectar()->prepare($sql1);

            $stmt -> execute();

            $stmt -> close();
            //var_dump($sql);

            $sql2 = "DELETE FROM cfdi_productos where cfdiproid= $id_cli";
            //var_dump ($sql2);

            $stmt = Conexion::conectar()->prepare($sql2);

            $stmt -> execute();
            //$stmt -> close();
            $contador = $contador - 1;

        }
        //$id_cli = $son[0]['cfdicliid'];

        var_dump($stmt);
           //CERRAMOS LA CONEXION
		    $stmt -> close();

            //ANULAMOS EL OBJETO
            $stmt = null;
    }
}


?>
