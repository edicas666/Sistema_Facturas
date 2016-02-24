<?php //;include("login.php");

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

function num2letras($num, $fem = false, $dec = true) {
//if (strlen($num) > 14) die("El n?mero introducido es demasiado grande");
   $matuni[2]  = "dos";
   $matuni[3]  = "tres";
   $matuni[4]  = "cuatro";
   $matuni[5]  = "cinco";
   $matuni[6]  = "seis";
   $matuni[7]  = "siete";
   $matuni[8]  = "ocho";
   $matuni[9]  = "nueve";
   $matuni[10] = "diez";
   $matuni[11] = "once";
   $matuni[12] = "doce";
   $matuni[13] = "trece";
   $matuni[14] = "catorce";
   $matuni[15] = "quince";
   $matuni[16] = "dieciseis";
   $matuni[17] = "diecisiete";
   $matuni[18] = "dieciocho";
   $matuni[19] = "diecinueve";
   $matuni[20] = "veinte";
   $matunisub[2] = "dos";
   $matunisub[3] = "tres";
   $matunisub[4] = "cuatro";
   $matunisub[5] = "quin";
   $matunisub[6] = "seis";
   $matunisub[7] = "sete";
   $matunisub[8] = "ocho";
   $matunisub[9] = "nove";
   $matdec[2] = "veint";
   $matdec[3] = "treinta";
   $matdec[4] = "cuarenta";
   $matdec[5] = "cincuenta";
   $matdec[6] = "sesenta";
   $matdec[7] = "setenta";
   $matdec[8] = "ochenta";
   $matdec[9] = "noventa";
   $matsub[3]  = 'mill';
   $matsub[5]  = 'bill';
   $matsub[7]  = 'mill';
   $matsub[9]  = 'trill';
   $matsub[11] = 'mill';
   $matsub[13] = 'bill';
   $matsub[15] = 'mill';
   $matmil[4]  = 'millones';
   $matmil[6]  = 'billones';
   $matmil[7]  = 'de billones';
   $matmil[8]  = 'millones de billones';
   $matmil[10] = 'trillones';
   $matmil[11] = 'de trillones';
   $matmil[12] = 'millones de trillones';
   $matmil[13] = 'de trillones';
   $matmil[14] = 'billones de trillones';
   $matmil[15] = 'de billones de trillones';
   $matmil[16] = 'millones de billones de trillones';
   $num = trim((string)@$num);
   if ($num[0] == '-') {
      $neg = 'menos ';
      $num = substr($num, 1);
   }else
      $neg = '';
   while ($num[0] == '0') $num = substr($num, 1);
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num;
   $zeros = true;
   $punt = false;
   $ent = '';
   $fra = '';
   for ($c = 0; $c < strlen($num); $c++) {
      $n = $num[$c];
      if (! (strpos(".,'''", $n) === false)) {
         if ($punt) break;
         else{
            $punt = true;
            continue;
         }
      }elseif (! (strpos('0123456789', $n) === false)) {
         if ($punt) {
            if ($n != '0') $zeros = false;
            $fra .= $n;
         }else
            $ent .= $n;
      }else
         break;
   }
   $ent = '     ' . $ent;
   if ($dec and $fra and ! $zeros) {
      $fin = ' con';
      for ($n = 0; $n < strlen($fra); $n++) {
         if (($s = $fra[$n]) == '0')
            $fin .= ' cero';
         elseif ($s == '1')
            $fin .= $fem ? ' una' : ' un';
         else
            $fin .= ' ' . $matuni[$s];
      }
   }else
      $fin = '';
   if ((int)$ent === 0) return 'Cero ' . $fin;
   $tex = '';
   $sub = 0;
   $mils = 0;
   $neutro = false;
   while ( ($num = substr($ent, -3)) != '   ') {
      $ent = substr($ent, 0, -3);
      if (++$sub < 3 and $fem) {
         $matuni[1] = 'una';
         $subcent = 'as';
      }else{
         $matuni[1] = $neutro ? 'un' : 'uno';
         $subcent = 'os';
      }
      $t = '';
      $n2 = substr($num, 1);
      if ($n2 == '00') {
      }elseif ($n2 < 21)
         $t = ' ' . $matuni[(int)$n2];
      elseif ($n2 < 30) {
         $n3 = $num[2];
         if ($n3 != 0) $t = 'i' . $matuni[$n3];
         $n2 = $num[1];
         $t = ' ' . $matdec[$n2] . $t;
      }else{
         $n3 = $num[2];
         if ($n3 != 0) $t = ' y ' . $matuni[$n3];
         $n2 = $num[1];
         $t = ' ' . $matdec[$n2] . $t;
      }
      $n = $num[0];
      if ($n == 1) {
         $t = ' ciento' . $t;
      }elseif ($n == 5){
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
      }elseif ($n != 0){
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
      }
      if ($sub == 1) {
      }elseif (! isset($matsub[$sub])) {
         if ($num == 1) {
            $t = ' mil';
         }elseif ($num > 1){
            $t .= ' mil';
         }
      }elseif ($num == 1) {
         $t .= ' ' . $matsub[$sub] . '&oacute;n';
      }elseif ($num > 1){
         $t .= ' ' . $matsub[$sub] . 'ones';
      }
      if ($num == '000') $mils ++;
      elseif ($mils != 0) {
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub];
         $mils = 0;
      }
      $neutro = true;
      $tex = $t . $tex;
   }
   $tex = $neg . substr($tex, 1) . $fin;
   return ucfirst($tex);
}
//Funcion para pasar de numeros a letras
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
			$numu = "UN";
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
#texto1 {
	font-size:13px;

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

<br /><?php }else echo "factura no encontrada"; }?>
</body>
</html>
