<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facturacion Electronica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="hhttps://icons.getbootstrap.com/icons/trash/">

  <link rel="stylesheet" href="css/formulario.css">
  <link rel="stylesheet" href="css/menu.css">
  
  <script type="text/javascript">
  function logine(){
    var usu = document.getElementById("usuario").value;
    var pas = document.getElementById("password").value;

    alert(usu);
    
    var request = $.ajax({
        url: '../Controlador/controladorUsuario.php',
        method: "POST",
        data:{usuario:usu, password:pas},
        dataType: "" 
    });
    request.done(function(respuesta){
      alert(respuesta);
    });
    request.fail(function (jqXHR, textStatus){
      alert("hubo un error");
    });
    }
  </script>

</head>
<body>
    <form>

      <div class="container">
        <div class="col-md-8">
            <div class="well well-sm">
                    <fieldset>
                        <legend class="text-center header">Ingresar al Sistema</legend>
                        <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control"  id="usuario" name="usuario"  placeholder="" required="" >
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                                <label>Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password"  placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            </div>
                        </div>
        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" onclick="logine();" class="btn btn-success btn-lg">Ingresar</button>
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>  
        </div>
</form>
    </div>
