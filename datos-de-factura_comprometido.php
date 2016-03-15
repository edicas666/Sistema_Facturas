
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  require_once "funciones.php";
  $link = Conectarse();

  $idform = $_GET['idform'];
  echo "$idform";
  $sql = sprintf("SELECT * FROM formato WHERE id = '%s'",$idform);
  $formato = $link->query($sql);
  $formato = mysqli_fetch_assoc($formato);
  print_r($formato);
  echo "<br>";
  echo "id:".$formato['id'];
  ob_start();
  ?>
  <page>
    h1
  </page>

  <?php
  $content = ob_get_clean();
    require_once('html2pdf-4.03\html2pdf.class.php');
    $html2pdf = new HTML2PDF('P', 'A4', 'fr','UTF-8');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->output('Formato.pdf');
 ?>
