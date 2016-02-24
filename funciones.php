<?php
    function Conectarse(){
      $link = new mysqli("localhost","root","","sistema");

      if($link->connect_errno){
        echo "Error conectando a la Base de Datos...<br>".mysqli_connect_error();
        exit();
      }else{
        echo "Conexión Exitosa...";
        echo "<br>";
      }
      return $link;
    }

    //$link = Conectarse();
    //$link->close();
 ?>
