<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type='text/javascript' src='jquery-1.2.3.min.js'></script>
<script type='text/javascript' src='menu.js'></script>
<style type="text/css">
    table {
  border-collapse: collapse;
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
          <td width="94">UPP</td>
          <td colspan="4">1... MUNICIPIO DE HUETAMO MICHOACÁN</td>
        </tr>
        <tr>
          <td>UR</td>
          <td colspan="4">23 INVERSIÓN EN OBRA PÚBLICA</td>
        </tr>
        <tr>
          <td>PROG.</td>
          <td colspan="4" style="text-transform:uppercase"><?php echo $data['programas'];?></td>
        </tr>
        <tr>
          <td>ACC.</td>
          <td colspan="4" style="text-transform:uppercase"><?php echo $data['acciones'];?></td>
        </tr>
        <tr>
          <td>P.E.C.</td>
          <td width="97">******</td>
          <td colspan="3">PRESUPUESTO DE EGRESOS COMPROMETIDO</td>
        </tr>
        <tr>
          <td>OFICIO</td>
          <td>No.</td>
          <td width="115">&nbsp;</td>
          <td colspan="2"><?php
		  if($data['anhio']==0){ echo "2015"; }
		  elseif ($data['anhio']==1){ echo "2016"; }
		  elseif ($data['anhio']==2){ echo "2017"; }
		  elseif ($data['anhio']==3){ echo "2018"; } ?>
          </td>
        </tr>
        <tr>
          <td>TIPO</td>
          <td>******</td>
          <td colspan="3">OFICIO EXTERNO A TESORERIA</td>
        </tr>
        <tr>
          <td>FECHA</td>
          <td colspan="2"style="text-transform:uppercase; font-size:10px;"><?php echo fechaesp($data['fechaactual']);?></td>
          <td width="126">SEMANA</td>
          <td width="184" style="text-transform:uppercase; font-size:10px;"> del <?php if($data['raya']==1){ echo fechaesp($data['fecha1']).' al '.fechaesp($data['fecha2']); }?></td>
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
          <td>POR MEDIO DE LA PRESENTE QUE CON ESTA FECHA DEBERA ORIGINAR EL REGISTRO CONTABLE PARA COMPROMETER EL PRESUPUESTO DE EGRESOS, QUE CONFORMA EL PRESUPUESTO APROBADO PARA EL EJERCICIO FISCAL DE <?php echo substr($data['fechafi'],0,4);?>, EN LO CORRESPONDIENTE AL MES DE: <span style="text-transform:uppercase">
            <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		if(substr($data['fechafi'],5,2)!="12")
 echo $meses[substr($data['fechafi'],6,1)-1];
 else echo $meses[11];
 ?>
          </span> DEL PRESENTE AÑO EN LA PARTIDA PRESUPUESTAL:</td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td width="118">PARTIDA</td>
          <td width="666">DESCRIPCIÓN DE LA CUENTA</td>
        </tr>
        <tr>
          <td><?php echo $data['codigopartida'];?></td>
          <td><?php echo $data['nombrepartida'];?></td>
        </tr>
      </table>
      <br />
      <table width="800" border="1">
        <tr>
          <td width="235">DE LA UNIDAD RESPONSABLE DE:</td>
          <td width="549">07 OBRAS PUBLICAS Y COORDINACIÓN DE RAMO 33</td>
        </tr>
      </table>
      <br />
      <table width="800" border="0">
        <tr>
          <td>CORRESPONDIENTE A LA SIGUIENTE INFORMACIÓN DE LA OBRA:</td>
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
          <td style="text-transform:uppercase" colspan="3" ><?php echo $data['titulo'];?></td>
        </tr>
      </table>
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
          <td>$<?php echo  number_format($data['cantidad'],2);?></td>
          <td style="text-transform:uppercase"><?php
		  echo numletras($data['cantidad']);?> MN</td>
        </tr>
      </table>
      <br />
      <table width="800" border="0">
        <tr>
          <td width="176">A FAVOR DE</td>
          <td width="614" align="center"><span style="text-transform:uppercase"><?php echo $data['proveedor'];?></span></td>
        </tr>
      </table>
      <table width="800" border="1">
        <tr>
          <td>&nbsp;</td>
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
          <td align="center" style=" text-transform:uppercase"><?php echo $data['descripcion'];?></td>
        </tr>
      </table>
      <table width="800" border="0">
        <tr>
          <td>SE ANEXA LA SIGUENTE DOCUMENTACIÓN</td>
        </tr>
      </table>
      <table width="800" border="1">
        <tr>
          <td align="center" style="text-transform:uppercase;"><?php if($data['raya']==1){?>LISTA DE RAYA del <?php echo fechaesp($data['fecha1']).' al '.fechaesp($data['fecha2']); }else echo 'Factura '.$data['factura'];?></td>
        </tr>
      </table>
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
          <td align="center">ARQ. ARISTIDES GARCÍA GÓMEZ</td>
        </tr>
        <tr>
          <td align="center">DIRECTOR DE OBRAS PÚBLICAS</td>
        </tr>
      </table></td>
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
