<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedheader.dataTables.min.css">
-->
  </head>
  <body>SIN ESTILO
    <table id="example" class="display">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nº</th>
            <th>Canción</th>
            <th>Detalles</th>
            <th>Reproducir</th>
          </tr>
        </thead>
        <tbody class="buscar">
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>
          <tr>
              <td>1</td>
              <td>1.1</td>
              <td>a</td>
              <td>a</td>
              <td>a</td>
          </tr>

          <tr>
              <td>2</td>
              <td>2.1</td>
              <td>b</td>
              <td>a</td>
              <td>a</td>
          </tr>
        </tbody>
      </table>


        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script>
$(document).ready(function(){
  //INICIALIZAMOS LA TABLA
  var table = $('#example').DataTable({
      orderCellsTop: true,
      fixedheader: true
  });

  //CLONAMOS LA TABLA
  $('#example thead tr').clone(true).appendTo('#example thead');
  //BUSCAMOS EL DATO EN LA TABLA
  $('#example thead tr:eq(1) th').each(function (i){
    var title = $(this).text();
    $(this).html('<input type="text" placeholder="" />');
    $('input', this).on('keyup change', function(){
      if (table.column(i).search() != this.value){
        table
          .column(i)
          .search(this.value)
          .draw();
      }
    });
  });

});

</script>
    </body>
</html>
