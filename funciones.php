<?php
    function Conectarse(){
      $link = new mysqli("localhost","root","","sistema");

      if($link->connect_errno){
        echo "</script>alert('Error conectando a la Base de Datos: '".mysqli_connect_error()."'</script>";
        exit();
      }else{
        echo "<script>alert('Conexion exitosa')</script>";
      }
      return $link;
    }

     function consultar($tabla){
	      $link=Conectarse();
        $sql = sprintf("describe %s",$tabla);
	      $atributos = $link->query($sql);
	      $link->close();
	      return $atributos;
    }

    function con($tabla){
	      $link=Conectarse();
	      $atributos = mysql_query("Select * from $tabla", $link);
	      mysql_close($link);
	      return $atributos;
    }

    function evaluarSelect(){
    	  if(isset($_POST['submit'])) {
        	echo "alerta se realizo un submit";
        }
        else{
    	     echo "no se detecta ninguna acción";
        }
    }
 ?>
