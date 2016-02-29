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
 	
 	<form name="entidad" method="post" action="consultaCog">
	    <select name="entidad" class="form-control">
			  <option value="cog">Cog</option>
			  <option value="formato">Formato</option>
			  <option value="oficinas">Oficinas</option>
			  <option value="proveedores">Proveedores</option>
			  <option value="usuarios">Usuarios</option>
		</select>
	    <input type="submit">
	</form>

    <?php
	    include_once "funciones.php";

	    #$datos=consultar("formato");

	    if(isset($_POST['submit'])) { 
			$entidad = $_POST['entidad'];
			$datos=consultar($entidad);
		    echo "<table class='table table-hover'>";
		    echo "<thead><tr class='success' >";
		    while($fila=mysql_fetch_assoc($datos)){
		     	echo "<th>".$fila['Field']."</th>";
		    }
		    echo "<th colspan='2'></th></tr></thead>";

		    $ren=con($entidad);
		    while($renglo=mysql_fetch_array($ren)){
		      echo "<tr>";
		      $datos=consultar($entidad);
		      while($fila=mysql_fetch_assoc($datos)){
		    	echo "<td>".$renglo[$fila['Field']]."</td>";
		      }
		      echo "<td>"."<input type='button'  class='btn btn-danger' value ='Eliminar'>"
		                 ."</td>";
		      echo "<td>"."<input type='button' class='btn btn-warning' value ='Modificar'>"
		                 ."</td>";           
		      echo "</tr>";
		    }
		    
		    echo "</table>";
    ?>
    <script>
    	$('select#entidad').on('change',function(){
		    var valor = $(this).val();
		    alert(valor);
		});
    </script>
  </body>
</html>

                 