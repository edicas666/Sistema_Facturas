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
  <body>
  <div class="contaniner-fluid" id="contPanel">
   <div class="col-md-10 col-md-offset-1 col-xs-12">
 	<form   method="get" action="consultaGen.php">
 		<div class="form-group">
	    <select name="entidad" id="entidad">
			  <option value="cog">Cog</option>
			  <option value="formato">Formato</option>
			  <option value="oficinas">Oficinas</option>
			  <option value="proveedores">Proveedores</option>
		</select>
		</div>
	</form>
	<a class="btn btn-success" id="agregar" href="#">Agregar</a>
	<form action="" name="fromBuscar" >
		<div class="form-group">
			<select id="selectCampo">
				<?php
					include_once "funciones.php";
					 $tabla = $_GET['valor'];
					 $datos=consultar($tabla);
					 while($fila=mysql_fetch_assoc($datos)){
				    	echo "<option>".$fila['Field']."</option>";
				   	 }
				?>
			</select>
		    <input type="text" placeholder="Buscar..." name="busTxt" id="busTxt">
		    <button type="button" id="btnBuscar" class="btn btn-info">Buscar</button>
		  
		    

		</div>
	</form>
	
 
    <?php
	    $datos=consultar($tabla);
	    echo "<table class='table table-hover'>";
	    echo "<thead><tr class='success' >";
	    while($fila=mysql_fetch_assoc($datos)){
	    	
	    	echo "<th>".$fila['Field']."</th>";
	    	
	    }
	    echo "<th colspan='2'></th></tr></thead>";

	    $ren=con($tabla);
	    while($renglo=mysql_fetch_array($ren)){
	      echo "<tr>";
	      $datos=consultar($tabla);
	      while($fila=mysql_fetch_assoc($datos)){
	    	echo "<td>".$renglo[$fila['Field']]."</td>";
	      }
	      echo "<td>"."<input type='button' onclick='formmodCog.php' class='btn btn-warning' value ='Modificar'>"
	                 ."</td>";
	      echo "<td>"."<input type='button' class='btn btn-danger' value ='Eliminar'>"
	                 ."</td>";           
	      echo "</tr>";
	    }
	    
	    echo "</table>";
	    
    ?>
</div>
</div>
   <script>
  	    $('#contPanel').css('margin-top','100px');
    	$('select#entidad').on('change',function(){
		    var valor = $(this).val();
		    window.location.href="consultaGen.php?valor="+valor;
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

                 