<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= productos.xls");

require_once ("../Controlador/controladorHistorial.php");
require_once ("../Modelo/modeloHistorial.php");

$search_AllCFDI =  controladorHistorial::ctrlHistorial();

 ?>
 <table  bgcolor="##D5F5E3" border='1' width='100%'  bordercolordark='#999933' bordercolorlight='#CCCC66' border='8' cellpadding='1' cellspacing='1'>
   <!--class="table table-hover"-->
   <thead>
     <tr style="background-color: rgb(0, 77, 67);" font color = "#FDFEFE">

       <th><font color="white">Fecha</font></th>
       <th><font color="white">Recibo</font></th>
       <th><font color="white">Folio Fiscal UUID</font></th>
       <th><font color="white">Forma Pago</font></th>
       <th><font color="white">Método Pago</font></th>
       <th><font color="white">Usuario</font></th>
       <th><font color="white">Total</font></th>
       <th><font color="white">Subasta</font></th>
       <th><font color="white">Fecha Subasta</font></th>
       <th><font color="white">Paleta o Contrato</font></th>
     </tr>
   </thead>
   <?php
   $par=1;
   //echo "cuantos".count($search_AllCFDI);
   foreach ($search_AllCFDI as $key => $value){
       $arc = $value["empid"];
       if ($value["cfdiobs"] != ""){
           echo "<tbody class='buscar'>";
           if($par == 1){
             echo "<tr style='background-color: rgb(253, 254, 254);'>";
             $par - 1;
           }else{
             echo "<tr style='background-color: rgb(213, 219, 219);'>";

           }
           $par= $par + 1;
             echo "<td>".$value["cfdifec"]."</td>";
             echo "<td>".$value["cfdiobs"]."</td>";
             echo "<td>FOLIO</td>";
             echo "<td>".$value["cfdiforpag"]."</td>";
             echo "<td>".$value["cfdimetpag"]."</td>";
             echo "<td>".$value["cfdiclinom"]."</td>";
             echo "<td>".$value["cfditot"]."</td>";
             echo "<td>".$value["subasta"]."</td>";
             echo "<td>".$value[""]."</td>";
             echo "<td>".$value["paleta"]."</td>";
           echo "</tr>";
           echo "</tdbody>";
       }
     }
   ?> </table>
