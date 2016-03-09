<?php
  $tabla = $_GET['tabla'];
  $campo = $_GET['campo'];
  $bustxt = $_GET['bustxt'];

  header("Location: consultaGen.php?valor=$tabla&cam=$campo&bustxt=$bustxt&bus=yes");
 ?>
