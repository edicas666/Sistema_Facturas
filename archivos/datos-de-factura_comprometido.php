<?php include("conexion.php");include("login.php");

function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}
///////////////
	
//if (strlen($num) > 14) die("El n?mero introducido es demasiado grande");
//************* INICIO DE CÓDIGO ********* 

function numletras($numero,$_moneda=1) 
/* 
$numero=valor a retornar en letras. 
$_moneda=1=Colones, 2=Dólares 3=Euros 
Las siguientes funciones (unidad() hasta milmillon() forman parte de ésta función 
*/ 
{ 
switch($_moneda) 
{ 
case 1: 
$_nommoneda='PESOS'; 
break; 
case 2: 
$_nommoneda='DÓLARES'; 
break; 
case 3: 
$_nommoneda='EUROS'; 
break; 
} 
//*** 
$tempnum = explode('.',$numero); 

if ($tempnum[0] !== ""){ 
$numf = milmillon($tempnum[0]); 
if ($numf == "UNO") 
{ 
$numf = substr($numf, 0, -1); 
} 

$TextEnd = $numf.' '; 
$TextEnd .= $_nommoneda.' CON '; 
} 
if ($tempnum[1] == "" || $tempnum[1] >= 100) 
{ 
$tempnum[1] = "00" ; 
} 
$TextEnd .= $tempnum[1] ; 
$TextEnd .= "/100"; 
return $TextEnd; 
} 
?> 

<?php 

function unidad($numuero){ 
switch ($numuero) 
{ 
case 9: 
{ 
$numu = "NUEVE"; 
break; 
} 
case 8: 
{ 
$numu = "OCHO"; 
break; 
} 
case 7: 
{ 
$numu = "SIETE"; 
break; 
} 
case 6: 
{ 
$numu = "SEIS"; 
break; 
} 
case 5: 
{ 
$numu = "CINCO"; 
break; 
} 
case 4: 
{ 
$numu = "CUATRO"; 
break; 
} 
case 3: 
{ 
$numu = "TRES"; 
break; 
} 
case 2: 
{ 
$numu = "DOS"; 
break; 
} 
case 1: 
{ 
$numu = "UNO"; 
break; 
} 
case 0: 
{ 
$numu = ""; 
break; 
} 
} 
return $numu; 
} 

function decena($numdero){ 

if ($numdero >= 90 && $numdero <= 99) 
{ 
$numd = "NOVENTA "; 
if ($numdero > 90) 
$numd = $numd."Y ".(unidad($numdero - 90)); 
} 
else if ($numdero >= 80 && $numdero <= 89) 
{ 
$numd = "OCHENTA "; 
if ($numdero > 80) 
$numd = $numd."Y ".(unidad($numdero - 80)); 
} 
else if ($numdero >= 70 && $numdero <= 79) 
{ 
$numd = "SETENTA "; 
if ($numdero > 70) 
$numd = $numd."Y ".(unidad($numdero - 70)); 
} 
else if ($numdero >= 60 && $numdero <= 69) 
{ 
$numd = "SESENTA "; 
if ($numdero > 60) 
$numd = $numd."Y ".(unidad($numdero - 60)); 
} 
else if ($numdero >= 50 && $numdero <= 59) 
{ 
$numd = "CINCUENTA "; 
if ($numdero > 50) 
$numd = $numd."Y ".(unidad($numdero - 50)); 
} 
else if ($numdero >= 40 && $numdero <= 49) 
{ 
$numd = "CUARENTA "; 
if ($numdero > 40) 
$numd = $numd."Y ".(unidad($numdero - 40)); 
} 
else if ($numdero >= 30 && $numdero <= 39) 
{ 
$numd = "TREINTA "; 
if ($numdero > 30) 
$numd = $numd."Y ".(unidad($numdero - 30)); 
} 
else if ($numdero >= 20 && $numdero <= 29) 
{ 
if ($numdero == 20) 
$numd = "VEINTE "; 
else 
$numd = "VEINTI".(unidad($numdero - 20)); 
} 
else if ($numdero >= 10 && $numdero <= 19) 
{ 
switch ($numdero){ 
case 10: 
{ 
$numd = "DIEZ "; 
break; 
} 
case 11: 
{ 
$numd = "ONCE "; 
break; 
} 
case 12: 
{ 
$numd = "DOCE "; 
break; 
} 
case 13: 
{ 
$numd = "TRECE "; 
break; 
} 
case 14: 
{ 
$numd = "CATORCE "; 
break; 
} 
case 15: 
{ 
$numd = "QUINCE "; 
break; 
} 
case 16: 
{ 
$numd = "DIECISEIS "; 
break; 
} 
case 17: 
{ 
$numd = "DIECISIETE "; 
break; 
} 
case 18: 
{ 
$numd = "DIECIOCHO "; 
break; 
} 
case 19: 
{ 
$numd = "DIECINUEVE "; 
break; 
} 
} 
} 
else 
$numd = unidad($numdero); 
return $numd; 
} 

function centena($numc){ 
if ($numc >= 100) 
{ 
if ($numc >= 900 && $numc <= 999) 
{ 
$numce = "NOVECIENTOS "; 
if ($numc > 900) 
$numce = $numce.(decena($numc - 900)); 
} 
else if ($numc >= 800 && $numc <= 899) 
{ 
$numce = "OCHOCIENTOS "; 
if ($numc > 800) 
$numce = $numce.(decena($numc - 800)); 
} 
else if ($numc >= 700 && $numc <= 799) 
{ 
$numce = "SETECIENTOS "; 
if ($numc > 700) 
$numce = $numce.(decena($numc - 700)); 
} 
else if ($numc >= 600 && $numc <= 699) 
{ 
$numce = "SEISCIENTOS "; 
if ($numc > 600) 
$numce = $numce.(decena($numc - 600)); 
} 
else if ($numc >= 500 && $numc <= 599) 
{ 
$numce = "QUINIENTOS "; 
if ($numc > 500) 
$numce = $numce.(decena($numc - 500)); 
} 
else if ($numc >= 400 && $numc <= 499) 
{ 
$numce = "CUATROCIENTOS "; 
if ($numc > 400) 
$numce = $numce.(decena($numc - 400)); 
} 
else if ($numc >= 300 && $numc <= 399) 
{ 
$numce = "TRESCIENTOS "; 
if ($numc > 300) 
$numce = $numce.(decena($numc - 300)); 
} 
else if ($numc >= 200 && $numc <= 299) 
{ 
$numce = "DOSCIENTOS "; 
if ($numc > 200) 
$numce = $numce.(decena($numc - 200)); 
} 
else if ($numc >= 100 && $numc <= 199) 
{ 
if ($numc == 100) 
$numce = "CIEN "; 
else 
$numce = "CIENTO ".(decena($numc - 100)); 
} 
} 
else 
$numce = decena($numc); 

return $numce; 
} 

function miles($nummero){ 
if ($nummero >= 1000 && $nummero < 2000){ 
$numm = "MIL ".(centena($nummero%1000)); 
} 
if ($nummero >= 2000 && $nummero <10000){ 
$numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000)); 
} 
if ($nummero < 1000) 
$numm = centena($nummero); 

return $numm; 
} 

function decmiles($numdmero){ 
if ($numdmero == 10000) 
$numde = "DIEZ MIL"; 
if ($numdmero > 10000 && $numdmero <20000){ 
$numde = decena(Floor($numdmero/1000))."MIL ".(centena($numdmero%1000)); 
} 
if ($numdmero >= 20000 && $numdmero <100000){ 
$numde = decena(Floor($numdmero/1000))." MIL ".(miles($numdmero%1000)); 
} 
if ($numdmero < 10000) 
$numde = miles($numdmero); 

return $numde; 
} 

function cienmiles($numcmero){ 
if ($numcmero == 100000) 
$num_letracm = "CIEN MIL"; 
if ($numcmero >= 100000 && $numcmero <1000000){ 
$num_letracm = centena(Floor($numcmero/1000))." MIL ".(centena($numcmero%1000)); 
} 
if ($numcmero < 100000) 
$num_letracm = decmiles($numcmero); 
return $num_letracm; 
} 

function millon($nummiero){ 
if ($nummiero >= 1000000 && $nummiero <2000000){ 
$num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000)); 
} 
if ($nummiero >= 2000000 && $nummiero <10000000){ 
$num_letramm = unidad(Floor($nummiero/1000000))." MILLONES ".(cienmiles($nummiero%1000000)); 
} 
if ($nummiero < 1000000) 
$num_letramm = cienmiles($nummiero); 

return $num_letramm; 
} 

function decmillon($numerodm){ 
if ($numerodm == 10000000) 
$num_letradmm = "DIEZ MILLONES"; 
if ($numerodm > 10000000 && $numerodm <20000000){ 
$num_letradmm = decena(Floor($numerodm/1000000))."MILLONES ".(cienmiles($numerodm%1000000)); 
} 
if ($numerodm >= 20000000 && $numerodm <100000000){ 
$num_letradmm = decena(Floor($numerodm/1000000))." MILLONES ".(millon($numerodm%1000000)); 
} 
if ($numerodm < 10000000) 
$num_letradmm = millon($numerodm); 

return $num_letradmm; 
} 

function cienmillon($numcmeros){ 
if ($numcmeros == 100000000) 
$num_letracms = "CIEN MILLONES"; 
if ($numcmeros >= 100000000 && $numcmeros <1000000000){ 
$num_letracms = centena(Floor($numcmeros/1000000))." MILLONES ".(millon($numcmeros%1000000)); 
} 
if ($numcmeros < 100000000) 
$num_letracms = decmillon($numcmeros); 
return $num_letracms; 
} 

function milmillon($nummierod){ 
if ($nummierod >= 1000000000 && $nummierod <2000000000){ 
$num_letrammd = "MIL ".(cienmillon($nummierod%1000000000)); 
} 
if ($nummierod >= 2000000000 && $nummierod <10000000000){ 
$num_letrammd = unidad(Floor($nummierod/1000000000))." MIL ".(cienmillon($nummierod%1000000000)); 
} 
if ($nummierod < 1000000000) 
$num_letrammd = cienmillon($nummierod); 

return $num_letrammd; 
} 

//******* FIN DE CÓDIGO ******** 
////////////////

$conec=conecta();mysql_query ("SET NAMES 'utf8'",$conec);
extract($_REQUEST);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<?php if((isset($loginCorrecto) and $loginCorrecto==1) or (isset($db) and $db==1)){?>
<?php if($id)$consulta=mysql_query("select a.*,a.fecha as fechafi,CURDATE() as fechaactual, b.nombre as proveedor,f.*,c.codigo as codigopartida,c.nombre as nombrepartida, concat(c.capitulo,' - ',c.codigo,' - ',c.nombre) as cog,concat(d.codigo,' - ',d.titulo) as programas,concat(e.codigo,' - ',e.titulo) as acciones from factura a inner join proveedores b on a.proveedor=b.id  left join cog c on a.cog=c.id left join programas d on d.id=a.programa left join acciones e on e.id=a.accion inner join partida f on f.id=a.partida where a.id='$id' ");
 if(mysql_num_rows($consulta)==1){ $data=mysql_fetch_assoc($consulta);
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

<br /><?php }else echo "factura no encontrada"; }?>
</body>
</html>