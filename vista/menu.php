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
  <link rel="stylesheet" href="formulario.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catalogos SAT <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="CAT_SAT\v_MetodoPago.php">Catalogo Forma-Pago</a></li>
            <li><a href="#">Catalogo Moneda</a></li>
            <li><a href="#">Catalogo Productos-Servicios</a></li>
          </ul>
        </li>
        <li><a href="#">Catalogos Morton <span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
        <div class="pull-right">
            <a href="index.php" onclick="" class="btn btn-danger btn-flat">Salir</a>
        </div>
      </ul>
    </div>
  </div>
</nav>

<<div class="container">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Generar Factura</legend>

                        <div class="form-group">
                            <div class="col-md-2">
                                Folio<input id="fname" name="name" type="text" placeholder="First Name" class="bloqueado">
                            </div>
                            <div class="col-md-2">
                                Fecha<input id="lname" name="name" type="text" placeholder="Last Name" class="bloqueado">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Emisor</label>
                                <select class="form-control select2" style="width: 70%;">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Receptor</label>
                                <select class="form-control select2" style="width: 70%;">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Metodo</label>
                                <select class="form-control select2" style="width: 70%;">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Forma de Pago</label>
                                <select class="form-control select2" style="width: 70%;">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#AgregaConceptos">Conceptos</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box-body">
                        <table id="table" class="table table-bordered table-hover table-striped dt-responsive">
                            <thead>
                                <tr>
                                    <th>CLAVE SAT</th>
                                    <th>CLAVE UNIDAD</th>
                                    <th>CANTIDAD</th>
                                    <th>IMPORTE</th>
                                    <th>TOTAL</th>
                                    <th>DESCRIPCION</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Moneda</label>
                                <input type="text" class="bloqueado" name="folio" placeholder="" required="" value="MXN" readonly>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group"><br>
                            <select class="form-control select2" style="width: 100%;">
                                    <option></option>
                                    @foreach($c_Moneda as $moneda_c)
                                        <option value="{{ $moneda_c->moneda_clave}}">{{ $moneda_c->moneda_clave}}-{{ $moneda_c->moneda_nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subtotal</label>
                                <input type="text"  class="bloqueado" name="folio" placeholder="" required="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IVA</label>
                                <input type="text" class="bloqueado" name="folio" placeholder="" required="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descuento</label>
                                <input type="text" class="bloqueado" name="folio" placeholder="" required="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="text" class="bloqueado" name="folio" placeholder="" required="" readonly>
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg">Genear</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>


<div id="AgregaConceptos" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  method="post">
            @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <!--
                            <h2>Descripcion:</h2>
                            <select class="form-control imput-lg" name="sexo" required>
                                <option value="">Seleccionar...</option>
                            </select>
                                -->
                            <label>Cantidad</label>
                            <input type="text" class="form-control" name="folio" placeholder="0000" required="">
                        </div>

                        <div class="form-group">
                            <label>Valor Unitario</label>
                            <input type="text" class="form-control" name="folio" placeholder="00.00" required="">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCION</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option></option>
                                @foreach($ProSER_MorSat as $MorSat_proser)
                                    <option value="{{ $MorSat_proser->id_servicio}}">{{ $MorSat_proser->clave}}-{{ $MorSat_proser->desc_SAT }}-{{ $MorSat_proser->desc_MORTON }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>UNIDAD</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option></option>
                                @foreach($c_Unidad as $C_unidad)
                                    <option value="{{ $C_unidad->unidad_clave}}">{{ $C_unidad->unidad_clave}}-{{ $C_unidad->unidad_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
