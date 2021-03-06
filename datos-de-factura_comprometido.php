<?php
  require_once "funciones.php";
  $link = Conectarse();
  $idform = $_GET['idform'];
  $sql = sprintf("SELECT * FROM formato WHERE id = '%s'",$idform);
  $formato = $link->query($sql);
  $formato = mysqli_fetch_assoc($formato);
  $mes = array("01"=>"ENERO", "02"=>"FEBRERO", "03"=>"MARZO", "04"=>"ABRIL", "05"=>"MAYO", "06"=>"JUNIO", "07"=>"JULIO", "08"=>"AGOSTO", "09"=>"SEPTIEMBRE", "10"=>"OCTUBRE", "11"=>"NOVIEMBRE", "12"=>"DICIEMBRE");
  $sql1 = "SELECT nombre FROM cog where id ='".$formato['id_cog']."'";
  $result = $link->query($sql1);
  $desc = mysqli_fetch_assoc($result);
  ob_start();
  #Foranea
  $sql2 = "SELECT nombre,director FROM oficinas where  id ='".$formato['id_oficina']."'";
  $result1=$link->query($sql2);
  $datos = mysqli_fetch_assoc($result1);


  $content = "
<page>
<table width='100%' border='0'>
  <tr>
    <td colspan='3' align='center'><table width='100%' border='0'>
      <tr>
        <td width='118'><img src='img/logo2.png' width='100' height='90' /></td>
        <td width='519' align='center'><h3>H. AYUNTAMIENTO DE HUETAMO, MICHOACÁN</h3>
          <h3>2015-2018</h3></td>
        <td width='100'><img src='img/logo1.png' width='100' height='90' /></td>
      </tr>
    </table>
      <br />
      <table width='700' border='1'>
        <tr>
          <td width='94'>UPP</td>
          <td colspan='4'>1...MUNICIPIO DE HUETAMO MICHOACÁN</td>
        </tr>
        <tr>
          <td>UR</td>
          <td colspan='4'  style='text-transform:uppercase'>".$formato['ur']."</td>
        </tr>
        <tr>
          <td>PROG.</td>
          <td colspan='4' style='text-transform:uppercase'>SUBSIDIOS Y ACCIONES SOCIALES</td>
        </tr>
        <tr>
          <td>ACC.</td>
          <td colspan='4' style='text-transform:uppercase'>".$formato['acc']."</td>
        </tr>
        <tr>
          <td>P.E.C.</td>
          <td width='97'>******</td>
          <td>PRESUPUESTO DE EGRESOS COMPROMETIDO</td>
        </tr>
        <tr>
          <td>OFICIO</td>
          <td>No.</td>
          <td colspan='3'  style='text-transform:uppercase'> ".$formato['oficio']."</td>
        </tr>
        <tr>
          <td>TIPO</td>
          <td>******</td>
          <td colspan='3'>OFICIO EXTERNO A TESORERIA</td>
        </tr>
        <tr>
          <td>FECHA</td>
          <td colspan='4'style='text-transform:uppercase'>".date('Y-m-d')."</td>
        </tr>
      </table>
      <br />
      <table width='300' border='0' align='left'>
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
      <table width='800' border='0'>
        <tr>
          <td>POR MEDIO DE LA PRESENTE QUE CON ESTA FECHA DEBERA ORIGINAR EL REGISTRO CONTABLE PARA COMPROMETER EL PRESUPUESTO DE EGRESOS, QUE CONFORMA EL PRESUPUESTO APROBADO PARA EL EJERCICIO FISCAL DE ".$formato['afiscal'].", EN LO CORRESPONDIENTE AL MES DE ".$mes[date(m)]." DEL PRESENTE AÑO EN LA PARTIDA PRESUPUESTAL:</td>
        </tr>
      </table>
      <br />
      <table width='700' border='1'>
        <tr>
          <td width='100'>CUENTA</td>
          <td width='600'>DESCRIPCIÓN DE LA CUENTA</td>
        </tr>
        <tr>
          <td>".$formato['id_cog']."</td>
          <td  style='text-transform:uppercase'>".$desc['nombre']."</td>
        </tr>
      </table>
      <br />
      <table width='700' border='1'>
        <tr>
          <td width='300'>DE LA UNIDAD RESPONSABLE DE:</td>
          <td style='width: 400; text-transform:uppercase'>".$datos['nombre']."</td>
        </tr>
        <tr>
          <td>CORRESPONDIENTE A:</td>
          <td  style='text-transform:uppercase'>".$formato['descripcion']."</td>
        </tr>
      </table>
      <br />
      <br />
      <table width='800' border='0'>
        <tr>
          <td><p>LO ANTERIOR PARA PODER LLEVAR A CABO TODOS MOMENTOS CONTABLES DE CONFORMIDAD A LAS DISPOSICIONES DE LA CONTABILIDAD GENERAL ARMONIZADA.</p>
          <p>EL PRESUPUESTO COMPROMETIDO QUE SE DEBE CONSIDERAR EN EL REGISTRO CONTABLE ES LA CANTIDAD DE:</p></td>
        </tr>
      </table>
      <br />
      <table width='800' border='1'>
        <tr>
          <td width='172'>$ ".$formato['cantidad']."</td>
          <td  style=' width:400; text-transform:uppercase'>".numero($formato['cantidad'])."</td>
        </tr>
      </table>
      <br />
      <br />
      <p>&nbsp;</p>
      <table width='600' border='0' align='center'>
        <tr>
          <td align='center'><p>FIRMA</p>
          <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td align='center'>_______________________________________</td>
        </tr>
        <tr>
          <td style='align: center; text-transform:uppercase'>".$datos['director']."</td>
        </tr>
        <tr>
          <td style='align: center; text-transform:uppercase'>DIRECTOR DE ".$datos['nombre']."</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</page>";

    require_once('html2pdf-4.03\html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr','UTF-8');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('factura_comprometido.pdf');
?>
