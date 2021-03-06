<?php
  session_start();
  if(!empty($_SESSION['user']) && !empty($_SESSION['pass'])){
    include_once "funciones.php";
    $tabla = $_GET['valor'];
    $bus = $_GET['bus'];
    if($bus=='yes'){
      $bustxt = $_GET['bustxt'];
      $buscampo = $_GET['cam'];
    }
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/inicio_sesion.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <script src="js/jquery-1.12.1.min.js"></script>
    <title>Consulta</title>
  </head>
  <header>
      <p style="margin-right:10px;">Bienvenido <?php echo $_SESSION['user'] ?></p><a style="font-size: .8em !important; margin-right:10px;" href="logout.php">Salir</a>
  </header>
  <body>
  <div class="contaniner-fluid" id="contPanel">
   <div class="col-md-10 col-md-offset-1 col-xs-12">
 	<form   method="get" action="consultaGen.php">
 		<div class="form-group">
      <label for="entidad">Tabla:</label>
	    <select name="entidad" id="entidad">
			  <option value="cog">Cog</option>
			  <option value="formato">Formato</option>
			  <option value="oficinas">Oficinas</option>
			  <option value="proveedores">Proveedores</option>
		</select>
		</div>
	</form>
  <hr>
	<form action="buscar.php" name="fromBuscar" method="get">
		<div class="form-group">
      <label for="selectCampo">Campo:</label>
			<select id="selectCampo" data-toggle='tooltip' data-placement='right' title='Filtrar por'>
        <?php
          $result=consultarcampos($tabla);
          while ($fila=mysqli_fetch_assoc($result)) {
            echo "<option>".$fila['Field']."</option>";
          }
          mysqli_free_result($result);
         ?>
			</select>
		  <input type="text" placeholder="Buscar..."  name="bustxt" id="busTxt">
      <input type="hidden" name="tabla" value="<?php echo $tabla; ?>">
      <input type="hidden" name="campo" id="idcampo" value="">
		  <button id="btnBuscar" data-toggle='tooltip' data-placement='right' title='Buscar' onmouseover="$('#idcampo').val($('#selectCampo').val())" class="btn btn-info">Buscar</button>
      <a class="btn btn-success" data-toggle='tooltip' data-placement='right' title='Agregar' id="agregar" href="#">Agregar</a>
		</div>
    </form>
    <hr>
    <form class="" action="modelim.php" method="post" name="formmodelim">
      <input type="hidden" name="id" id="idfila" value="">
      <input type="hidden" name="modelim" id="idopcion" value="">
      <input type="hidden" name="tabla" value="<?php  echo $tabla; ?>">

      <?php
        //Encabezado
  	    $result=consultarcampos($tabla);
  	    echo "<table class='table table-hover'>";
  	    echo "<thead><tr class='success' >";
  	    while($fila=mysqli_fetch_assoc($result)){
  	    	echo "<th>".$fila['Field']."</th>";
  	    }
        mysqli_free_result($result);
  	    echo "<th colspan='3'></th></tr></thead>";
        //datos
        if($bus=='yes'){
          $ren=buscar($tabla,$buscampo,$bustxt);
        }else{
          $ren=consulta("SELECT * FROM $tabla");
        }
  	    while($renglo=mysqli_fetch_array($ren)){
  	      echo "<tr>";
  	      $datos=consultarcampos($tabla);
  	      while($fila=mysqli_fetch_assoc($datos)){
  	    	    echo "<td>".$renglo[$fila['Field']]."</td>";
  	      }
          $id=$renglo['id'];
  	      echo "<td><input type='button' data-toggle='tooltip' data-placement='right' title='Modificar formato' onmouseover=\"$('#idfila').val('$id');$('#idopcion').val('mod');\" onclick=\"formmodelim.submit();\" class='btn btn-warning' value ='Modificar'></td>";
  	      echo "<td>"."<input type='button' data-toggle='tooltip' data-placement='right' title='Eliminar formato' onmouseover=\"$('#idfila').val('$id');$('#idopcion').val('elim');\" onclick=\"if(confirm('esta seguro de eliminar registro?')){formmodelim.submit();}\" class='btn btn-danger' value ='Eliminar'>"."</td>";
          if($tabla == "formato"){
            echo "<td>"."<input type='button' data-toggle='tooltip' data-placement='right' title='Generar formato' onmouseover=\"$('#idfila').val('$id');$('#idopcion').val('form');\" onclick=\"formmodelim.submit();\" class='btn btn-primary' value ='Formato'>"."</td>";
          }
          echo "</tr>";
  	    }
  	    echo "</table>";
      ?>
    </form>

</div>
</div>
   <script>
  	    $('#contPanel').css('margin-top','100px');
    	$('select#entidad').on('change',function(){
		    var valor = $(this).val();
		    window.location.href="consultaGen.php?bus=no&valor="+valor;
		});
		$(document).ready(function(){
			$('#entidad').val('<?php echo "$tabla" ?>');

			$('#agregar').hover(function(){
				var t = 'form'+$('#entidad').val()+'.php';
				$('#agregar').attr('href',t);
			});
		});
    </script>
  </body>
</html>
<?php
}else{
  echo "<h1>Usted no tiene permiso para ver esta págia</h1>";
} ?>
