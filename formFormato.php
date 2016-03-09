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
          <input type="text"  id="acc" name="acc" value="" placeholder="Gastos operativos" class="form-control"  onkeyUP="validarCaja()" onkeypress="validarLetras()" maxlength="14">
        </div>
      </div>
      <div class="form-group">
        <label for="oficio" class="col-sm-2">* Oficio:</label>
        <div class="col-sm-10">
          <input type="text" id="oficio" name="oficio" placeholder="Descripción del oficio" class="form-control" onkeyUP="validarCaja()"onkeypress="validarLetras()" maxlength="14">
        </div>
      </div>
      <div class="form-group">
        <label for="fecha" class="col-sm-2">* Fecha:</label>
          <div class="col-sm-10">
            <input  disabled="" type="datetime" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>" class="form-control">
          </div>
      </div>
      <div class="form-group">
        <label for="anioFiscal" class="col-sm-2">* Año fiscal:</label>
        <div class="col-sm-10">
            <select class="form-control" name="id_oficina" required>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label for="deptotxt" class="col-sm-2">* Id_cog:</label>
        <div class="col-sm-10">
          <select class="form-control" name="id_cog" required>
            <option value="presidencia">codigo1</option>
            <option value="tesoreria">codigo2</option>
            <option value="oficialia">codigo3</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="descripcion" class="col-sm-2">* Descripción:</label>
        <div class="col-sm-10">
          <input type="text" id="descripcion" name="descripcion" required placeholder="Descripción de la cuenta" class="form-control"onkeyUP="validarCaja()"  onkeypress="LetrasNumeros()" maxlength="40">
        </div>
      </div>
      <div class="form-group">
        <label for="cantidad" class="col-sm-2">* Cantidad:</label>
        <div class="col-sm-10">
          <input type="cantidad" id="cantidad" name="cantidad" required class="form-control"  onkeyUP="validarCaja()" placeholder="100" maxlength="80">
        </div>
      </div>
      <div class="form-group">
        <label for="deptotxt" class="col-sm-2">* Id_oficina:</label>
        <div class="col-sm-10">
          <select class="form-control" name="id_oficina" required>
            <option value="presidencia">codigo1</option>
            <option value="tesoreria">codigo2</option>
            <option value="oficialia">codigo3</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <button name="btnReg"  id="btnReg" disabled type="button" onclick="registrar()"  class="btn btn-success">Registrar</button>
         <button type="button" onclick="history.back()" class="btn btn-default">Regresar</button>
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
        $("#fecha").val().length> 0  &&
        $("#descripcion").val().length> 0 &&
        $("#cantidad1").val().length==0){
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
