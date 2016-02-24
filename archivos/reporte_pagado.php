<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type='text/javascript' src='jquery-1.2.3.min.js'></script>
<script type='text/javascript' src='menu.js'></script>
<style type="text/css">
    table {
  border-collapse: collapse;
}
#texto1 {
	font-size:13px;

}
</style>
</head>

<body>

<?php //if((isset($loginCorrecto) and $loginCorrecto==1) or (isset($db) and $db==1)){?>
<?php //if($id)$consulta=mysql_query("select a.*,a.fecha as fechafi,CURDATE() as fechaactual, b.nombre as proveedor,f.*,c.codigo as codigopartida,c.nombre as nombrepartida, concat(c.capitulo,' - ',c.codigo,' - ',c.nombre) as cog,concat(d.codigo,' - ',d.titulo) as programas,concat(e.codigo,' - ',e.titulo) as acciones from factura a inner join proveedores b on a.proveedor=b.id  left join cog c on a.cog=c.id left join programas d on d.id=a.programa left join acciones e on e.id=a.accion inner join partida f on f.id=a.partida where a.id='$id' ");
 //if(mysql_num_rows($consulta)==1){ $data=mysql_fetch_assoc($consulta);
?>
<table width="950" border="0">
  <tr>
    <td width="154">&nbsp;</td>
    <td width="664">&nbsp;</td>
    <td width="174">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><table width="800" border="0">
      <tr>
        <td width="118"><img src="images/logo2.png" width="118" height="134" /></td>
        <td width="519" align="center"><h3>H. AYUNTAMIENTO DE HUETAMO, MICHOACÁN</h3>
          <h3>2015-2018</h3></td>
        <td width="141"><img src="images/logo1.png" width="141" height="131" /></td>
      </tr>
    </table>
      <br />
      <table width="650" border="1">
        <tr>
          <td width="94" id="texto1">UPP</td>
          <td colspan="4" id="texto1">1... MUNICIPIO DE HUETAMO MICHOACÁN</td>
        </tr>
        <tr>
          <td id="texto1">UR</td>
          <td colspan="4" id="texto1">23 INVERSIÓN EN OBRA PÚBLICA</td>
        </tr>
        <tr>
          <td id="texto1">PROG.</td>
          <td colspan="4" style="text-transform:uppercase" id="texto1"><?php echo $data['programas'];?></td>
        </tr>
        <tr>
          <td id="texto1">ACC.</td>
          <td colspan="4" style="text-transform:uppercase" id="texto1"><?php echo $data['acciones'];?></td>
        </tr>
        <tr>
          <td id="texto1">P.E.C.</td>
          <td width="97" id="texto1">******</td>
          <td colspan="3" id="texto1">PRESUPUESTO DE EGRESOS COMPROMETIDO</td>
        </tr>
        <tr>
          <td id="texto1">OFICIO</td>
          <td id="texto1">No.</td>
          <td width="115" id="texto1">&nbsp;</td>
          <td colspan="2" id="texto1">
          <?php
		  if($data['anhio']==0){ echo "2015"; }
		  elseif ($data['anhio']==1){ echo "2016"; }
		  elseif ($data['anhio']==2){ echo "2017"; }
		  elseif ($data['anhio']==3){ echo "2018"; } ?>

          </td>
        </tr>
        <tr>
          <td id="texto1">TIPO</td>
          <td id="texto1">******</td>
          <td colspan="3" id="texto1">OFICIO EXTERNO A TESORERIA</td>
        </tr>
        <tr>
          <td id="texto1">FECHA</td>
          <td colspan="2"style="text-transform:uppercase; font-size:10px;"><?php echo fechaesp($data['fechaactual']);?></td>
          <td width="126" id="texto1">SEMANA</td>
          <td width="184" style="text-transform:uppercase; font-size:10px;"> del <?php if($data['raya']==1){ echo fechaesp($data['fecha1']).' al '.fechaesp($data['fecha2']); }?></td>
        </tr>
      </table>
      <br />
      <table width="300" border="0" align="center">
        <tr>
          <td align="right">PAGADO</td>
        </tr>
      </table>
      <br />
      PAGARSE LA ORDEN DE:<br />
      <table width="800" border="1">
        <tr>
          <td align="center"><span style="text-transform:uppercase"><?php echo $data['proveedor'];?></span></td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td>$<?php echo  number_format($data['cantidad'],2);?></td>
          <td style="text-transform:uppercase"><?php echo num2letras($data['cantidad']);?> PESOS </td>
        </tr>
      </table>
      <br />
      <table width="800" border="0">
        <tr>
          <td>POR LOS CONCEPTOS SIGUIENTES:</td>
        </tr>
      </table>
      <table width="800" height="70" border="1">
        <tr>
          <td align="center" style=" text-transform:uppercase"><?php echo $data['titulo'];?></td>
        </tr>
      </table>
      <br />
      <table width="800" border="0">
        <tr>
          <td>LO ANTERIOR DE ACUERDO A LA INFORMACIÓN SIGUIENTE:</td>
        </tr>
      </table>
      <table width="800" border="1">
        <tr>
          <td width="145">LOCALIDAD</td>
          <td style="text-transform:uppercase"><?php echo $data['ubicacion'];?></td>
          <td width="257">No. DE OBRA</td>
          <td width="59"><span style="text-transform:uppercase"><?php echo $data['numero']?></span></td>
        </tr>
        <tr>
          <td>OBRA Y/O ACCIÓN</td>
          <td colspan="3" style="text-transform:uppercase" id="texto2"><?php echo $data['titulo'];?></td>
        </tr>
      </table>
      <br />
      <br />
      <table width="800" border="0">
        <tr>
          <td id="texto1"><p>LA PRESENTE LIQUIDACIÓN CORRESPONDE AL EJERCICIO DEL GASTO DEL PRESUPUESTO PAGADO DE CONFORMIDAD AL PRESUPUESTO EJERCIDO PARA ESTE EVENTO, LO CUAL PERMITE REALIZAR EL REGISTRO CONTABLE CORRESPONDIENTE.</p>
          <p>SIN MAS POR EL MOMENTO QUEDO DE USTED.</p></td>
        </tr>
      </table>
      <br />
      <table width="600" border="0" align="center">
        <tr>
          <td align="center"><p>RECIBE:<br />
            <br />
          </p></td>
        </tr>
        <tr>
          <td align="center">_______________________________________</td>
        </tr>
        <tr>
          <td align="center"><span style="text-transform:uppercase"><?php echo $data['proveedor'];?></span></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
      <br />
      <table width="800" border="0" align="center">
        <tr>
          <td width="400" align="center"><p>ATENTAMENTE:<br />
            <br />
          </p></td>
          <td width="390" align="center">ATENTAMENTE:</td>
        </tr>
        <tr>
          <td align="center">_______________________________________</td>
          <td align="center">_______________________________________</td>
        </tr>
        <tr>
          <td align="center">PROFR. GILBERTO ZARCO SAUCEDO</td>
          <td align="center">DR. ELIAS IBARRA TORRES</td>
        </tr>
        <tr>
          <td align="center">TESORERO MUNICIPAL</td>
          <td align="center">PRESIDENTE MUNICIPAL</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br /><?php// }else echo "factura no encontrada"; }?>
</body>
</html>
