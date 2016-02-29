<?php
    function Conectarse(){
      if(!($link=mysql_connect("localhost","root","harrison"))){
        //echo "Error conectando a la Base de Datos...";
        exit();
      }else{
        //echo "Conexión Exitosa...";
        //echo "<br>";
      }
      if(!mysql_select_db("sistema",$link)){
        //echo "Error seleccionando la Base de Datos...";
        exit();
      }else{
        //echo "Selección correcta de la Base de Datos...";
      }
      
      return $link;
    }
     function consultar($tabla){
	      $link=Conectarse();
	      $atributos = mysql_query("describe $tabla", $link);
	      mysql_close($link);
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
        	echo "alerta se realizo un sutmit";
        }
    else{
    	echo "no se detecta ninguna acción";
    }
    }
 ?>

