<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/reg_usuario.css">
  <script type="text/javascript" src="js/funciones.js"></script>
  <script src="js/jquery-1.12.1.min.js"></script>
  <title>Nuevo Registro Formato</title>
</head>
<body>
    <form class="form-horizontal" action="registros/registrarFormato.php" method="post" id="form">
      <h1>Nuevo Formato</h1>
      <br>
      <div class="form-group">
        <label for="ur" class="col-sm-2">* Ur:</label>
        <div class="col-sm-10">
          <input id="ur" name="ur" type="text"  placeholder="Dirección de comunicación social" class="form-control" onkeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="acc" class="col-sm-2">* Acc:</label>
        <div class="col-sm-10">
          <input type="text"  id="acc" name="acc" value="" placeholder="Gastos operativos" class="form-control"  onkeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="20">
        </div>
      </div>
      <div class="form-group">
        <label for="oficio" class="col-sm-2">  Oficio:</label>
        <div class="col-sm-10">
          <input type="text" id="oficio" name="oficio" placeholder="Descripción del oficio" class="form-control" onkeypress="validarCaja()" onkeyUP="validarCaja()" onkeypress="LetrasEspacios()" maxlength="50">
        </div>
      </div>
      <div class="form-group">
        <label for="anio" class="col-sm-2">* Año fiscal:</label>
        <div class="col-sm-10">
            <select id="anioFiscal" name="anioFiscal" class="form-control" name="id_oficina" required onkeypress="validarCaja()" onclick="validarCaja()">
              <option value="a" selected>Selecionar año</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="codigotxt" class="col-sm-2">* Cog:</label>
        <div class="col-sm-10">
          <select id="codigo" name="codigo" class="form-control" name="id_cog" required onkeyUP="validarCaja()" onclick="validarCaja()">
            <option value="a">Seleccionar código</option>
            <?php
              include_once "funciones.php";
              $link = Conectarse();

              ?>
              <?php
                $sql = "SELECT id, nombre FROM cog ORDER BY id ASC";
                $result=$link->query($sql);
                while($codigo = mysqli_fetch_assoc($result)) {
             ?>
                <option value = "<?php echo $codigo['id']; ?>"><?php echo $codigo['nombre']; ?></option>
             <?php
              }
              $link->close();
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="descripcion" class="col-sm-2">* Descripción:</label>
        <div class="col-sm-10">
          <input type="text" id="descripcion" name="descripcion" required placeholder="Descripción de la cuenta" class="form-control"onkeyUP="validarCaja()"  onkeypress="LetrasNumeros()" maxlength="60">
        </div>
      </div>
      <div class="form-group">
        <label for="cantidad" class="col-sm-2">* Cantidad:</label>
        <div class="col-sm-10">
          <input type="cantidad" id="cantidad" name="cantidad" required class="form-control"  onkeyUP="validarCaja()" onkeypress=" return validarDecimales(event, this)"placeholder="100" maxlength="12">
        </div>
      </div>
      <div class="form-group">
        <label for="codigotxt" class="col-sm-2">* Oficina:</label>
        <div class="col-sm-10">
          <select class="form-control" id="oficina" name="oficina" required onkeyUP="validarCaja()" onclick="validarCaja()">
            <option value="a">Seleccionar oficina</option>
            <?php
              $link = Conectarse();
              ?>
              <?php
                $sql = "SELECT nombre,id FROM oficinas ORDER BY nombre ASC";
                $result=$link->query($sql);
                while($codigo = mysqli_fetch_assoc($result)) {
             ?>
                <option value = "<?php echo $codigo['id']; ?>"><?php echo $codigo['nombre']; ?></option>
             <?php
              }
              $link->close();
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <button name="btnReg"  id="btnReg" disabled type="button" onclick="registrar()"  class="btn btn-success">Registrar</button>
         <button type="button" onclick="window.location='consultaGen.php?valor=formato&bus=no';" class="btn btn-default">Regresar</button>
        </div>
      </div>
      <div class="form-group">
        <p class="help-block">* Campos obligatorios</p>
      </div>
    </form>
</body>
</html>
<script type="text/javascript">
function validarCaja() {
    $(function() {
      jQuery.fn.extend({
          disable: function(state) {
              return this.each(function() {
                  this.disabled = state;
              });
          }
      });

        if($("#ur").val().length> 0 &&
        $("#acc").val().length> 0 &&
        $("#oficio").val().length> 0 &&
        $("#descripcion").val().length> 0 &&
        $("#cantidad").val().length>0 &&
        $("#anioFiscal").val() != "a" &&
        $("#codigo").val() != "a" &&
        $("#oficina").val() != "a"){
              $('#btnReg').disable(false);
      }else{
        $('#btnReg').disable(true);
      }

  });
  }
  function registrar(){
    if(confirm("¿Esta seguro de proceder?")){
      document.getElementById('form').submit();
    }
}
</script>
