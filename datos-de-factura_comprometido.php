
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  include_once "funciones.php";
  $link=Conectarse();
  $idform = $_GET['idform'];
  echo "$idform";
  $sql = sprintf("SELECT * FROM formato WHERE id = '%s'",$idform);
  $formato = $link->query($sql);
  $formato = mysqli_fetch_assoc($formato);
  print_r($formato);
  echo "<br>";
  echo "id:".$formato['id'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    table {
  border-collapse: collapse;
}
</style>
</head>

<body>


<table width="950" border="0">
  <tr>
    <td width="154">&nbsp;</td>
    <td width="664">&nbsp;</td>
    <td width="174">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><table width="800" border="0">
      <tr>
        <td width="118"><img src="img/logo2.png" width="161" height="183" /></td>
        <td width="519" align="center"><h3>H. AYUNTAMIENTO DE HUETAMO, MICHOACÁN</h3>
          <h3>2015-2018</h3></td>
        <td width="141"><img src="img/logo1.png" width="189" height="176" /></td>
      </tr>
    </table>
      <br />
      <table width="550" border="1">
        <tr>
          <td width="94">UPP</td>
          <td colspan="4">1... MUNICIPIO DE HUETAMO MICHOACÁN</td>
        </tr>
        <tr>
          <td>UR</td>
          <td colspan="4"><?php echo "".$formato['ur']; ?></td>
        </tr>
        <tr>
          <td>PROG.</td>
          <td colspan="4" style="text-transform:uppercase">SUBSIDIOS Y ACCIONES SOCIALES</td>
        </tr>
        <tr>
          <td>ACC.</td>
          <td colspan="4" style="text-transform:uppercase"><?php echo "".$formato['acc']; ?></td>
        </tr>
        <tr>
          <td>P.E.C.</td>
          <td width="97">******</td>
          <td colspan="3">PRESUPUESTO DE EGRESOS COMPROMETIDO</td>
        </tr>
        <tr>
          <td>OFICIO</td>
          <td>No.</td>
          <td colspan="3"><?php echo "".$formato['oficio']; ?></td>
        </tr>
        <tr>
          <td>TIPO</td>
          <td>******</td>
          <td colspan="3">OFICIO EXTERNO A TESORERIA</td>
        </tr>
        <tr>
          <td>FECHA</td>
          <td colspan="4"style="text-transform:uppercase; font-size:10px;"><?php echo date('Y-m-d'); ?></td>
        </tr>
      </table>
      <br />
      <table width="300" border="0" align="left">
        <tr>
          <td>GILBERTO ZARCO SAUCEDO</td>
        </tr>
        <tr>
          <td>TESORERO MUNICIPAL</td>
        </tr>
        <tr>
          <td>P R E S E N T E:</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="800" border="0">
        <tr>
          <?php
              $mes = array("01"=>"ENERO", "02"=>"FEBRERO", "03"=>"MARZO", "04"=>"ABRIL", "05"=>"MAYO", "06"=>"JUNIO", "07"=>"JULIO", "08"=>"AGOSTO", "09"=>"SEPTIEMBRE", "10"=>"OCTUBRE", "11"=>"NOVIEMBRE", "12"=>"DICIEMBRE");
           ?>
          <td>POR MEDIO DE LA PRESENTE QUE CON ESTA FECHA DEBERA ORIGINAR EL REGISTRO CONTABLE PARA COMPROMETER EL PRESUPUESTO DE EGRESOS, QUE CONFORMA EL PRESUPUESTO APROBADO PARA EL EJERCICIO FISCAL DE <?php echo "".$formato['afiscal']; ?>, EN LO CORRESPONDIENTE AL MES DE <?php echo "".$mes[date(m)]; ?> DEL PRESENTE AÑO EN LA PARTIDA PRESUPUESTAL:</td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td width="118">CUENTA</td>
          <td width="666">DESCRIPCIÓN DE LA CUENTA</td>
        </tr>
        <tr>
          <td><?php echo "".$formato['id_cog']; ?></td>
          <td><?php
              $sql = "SELECT nombre FROM cog where id ='".$formato['id_cog']."'";
              $result = $link->query($sql);
              $desc = mysqli_fetch_assoc($result);
             echo "".$desc['nombre'];


           ?></td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td width="235">DE LA UNIDAD RESPONSABLE DE:</td>
          <td width="549">unidad</td>
        </tr>
        <tr>
          <td>CORRESPONDIENTE A:</td>
          <td><?php
            echo "".$formato['descripcion'];
           ?></td>
        </tr>
      </table>
      <br />
      <br />
      <table width="800" border="0">
        <tr>
          <td><p>LO ANTERIOR PARA PODER LLEVAR A CABO TODOS MOMENTOS CONTABLES DE CONFORMIDAD A LAS DISPOSICIONES DE LA CONTABILIDAD GENERAL ARMONIZADA.</p>
          <p>EL PRESUPUESTO COMPROMETIDO QUE SE DEBE CONSIDERAR EN EL REGISTRO CONTABLE ES LA CANTIDAD DE:</p></td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td width="172"><?php echo "".$formato['cantidad']; ?></td>
          <td width="612" style="text-transform:uppercase">cantidad en letras</td>
        </tr>
      </table>
      <br />
      <br />
      <p>&nbsp;</p>
      <table width="600" border="0" align="center">
        <tr>
          <td align="center"><p>FIRMA</p>
          <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td align="center">_______________________________________</td>
        </tr>
        <tr>
          <td align="center">nombre del director</td>
        </tr>
        <tr>
          <td align="center">DIRECTOR DE oficina</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br />
</body>
</html>
