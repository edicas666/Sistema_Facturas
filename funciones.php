<?php
    function Conectarse(){
      $link = new mysqli("localhost","root","12345678","sistema",8889);
      if($link->connect_errno){
        echo "</script>alert('Error conectando a la Base de Datos: '".mysqli_connect_error()."'</script>";
        exit();
      }else{

      }
      return $link;
    }

     function consultarcampos($tabla){
	      $link=Conectarse();
        $sql = sprintf("describe %s",$tabla);
	      $atributos = $link->query($sql);
	      $link->close();
	      return $atributos;
    }

    function consulta($sql){
	      $link=Conectarse();
	      $atributos = $link->query($sql);
	      $link->close();
	      return $atributos;
    }

    function buscar($tabla,$campo,$bustxt){
      $link=Conectarse();
      $sql = sprintf("SELECT * FROM %s WHERE %s LIKE '%s'", $tabla, $campo, $bustxt);
      $result = $link->query($sql);
      $link->close();
      return $result;
    }
 ?>
