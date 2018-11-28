<?php

setlocale(LC_CTYPE,"es_ES");

if(!isset($_SESSION))
	session_start();
	
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    

    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : 0;
      break;
	  
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : 0;
      break;

    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;

    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  //$theValue = enes($theValue);
  return $theValue;
}
function fecha ($fecha = "")
{
	if($fecha=="")
	{
		$dia = date("d");
		$diaS = date("w")-1;
		$mes = 	date("n")-1;
		$ano = 	date("Y");
	} else
	{
		$fecha = strtotime($fecha);
		$dia = date("d", $fecha);
		$diaS = date("w", $fecha)-1;
		$mes = 	date("n", $fecha)-1;
		$ano = 	date("Y", $fecha);
	}
	
	$dias = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
	
	return $dias[$diaS].", ".$dia." de ".$meses[$mes]." de ".$ano;	
}


function consulta($db, $campo, $tabla, $id){
	$query_comodin = "SELECT $campo FROM $tabla WHERE Id = ".$id;
	$comodin = mysql_query($query_comodin, $db) or die(mysql_error());
	$row_comodin = mysql_fetch_assoc($comodin);
	mysql_free_result($comodin);
	return ($row_comodin[$campo]);
}

// FUNCIONES PARA CONVERTIR FECHAS DEL ESPAÑOL AL INGLÉS Y VICEVERSA
function espanol($hoy, $hora=0) {

	$cad2 = $hoy;
	$uno=substr($cad2, 8, 2);
	$dos=substr($cad2, 5, 2);
	$tres=substr($cad2, 0, 4);
	
	$hoy = ($uno."/".$dos."/".$tres);
	
	if($hora)
	{
		$hora=substr($cad2, 11, 5);	
		
		$hoy .= " ".$hora;
	}
	
	return ($hoy);
}
	
function ingles($hoy) {
	
	$hoy2 = substr($hoy, 0, 10);	
	$cad2 = $hoy2;	
	$uno=substr($cad2, 6, 4);
	$dos=substr($cad2, 3, 2);
	$tres=substr($cad2, 0, 2);
	$hoy = ($uno."/".$dos."/".$tres.substr($hoy, 11, 17));	
	
	return ($hoy);
	
}
	
function paginar($actual, $total, $por_pagina, $url="", $after="") {
	
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - $por_pagina;
  $posterior = $actual + $por_pagina;
  $pagina_actual = ($actual+$por_pagina)/$por_pagina;

  //15 es el total de páginas a mostrar
  if ($total_paginas <= 10) {
  	$minimo = 1;
	$maximo = $total_paginas;
  } else {
    if ($pagina_actual < 5) {
  	  $minimo = 1;
	  $maximo = 10;
  	} else {
	  $diferencia = $total_paginas - $pagina_actual;
	  if ($diferencia < 5) {
	    $minimo = $total_paginas - 10;
	    $maximo = $total_paginas;	
	  } else {
	    $minimo = $pagina_actual - 5;
	    if(!$minimo)
	    	$minimo = 1;
	    $maximo = $pagina_actual + 5;
	  }
	}
  }
  
  $texto = "";
  if ($pagina_actual > 1) {
  	if(!$anterior)
    	$texto .= "<a href='".$url."'>&lt;&lt;</a>  ";
    else
    	$texto .= "<a href='".$url."/tot/".$total."/page/".$anterior.$after."'>&lt;&lt;</a>  ";
  } else {
    $texto .= "";
  }
  if($minimo>1)
  {
	  $texto .="<a href='".$url."'>1</a>"."...";
  }
  for ($i=$minimo; $i<$pagina_actual; $i++) {
  	if($i==1)
  		$texto .= " <a href='".$url."'>$i</a>  ";
  	else
  		$texto .= " <a href='".$url."/tot/".$total."/page/".(($i*$por_pagina)-$por_pagina).$after."'>$i</a>  ";
  }
  $texto .= "<a href='javascript:void(0)' class='paginaActiva'><b> $pagina_actual</b></a>";
  for ($i=$pagina_actual+1; $i<=$maximo; $i++) {
    $texto .= " <a href='".$url."/tot/".$total."/page/".(($i*$por_pagina)-$por_pagina).$after."'>$i</a>  ";
  }
  if ($pagina_actual<$total_paginas) {
      $puntos = $pagina_actual+5;
	  if($puntos<$total_paginas){$texto .="..."."<a href='".$url."/tot/".$total."/page/".($total_paginas-1)*$por_pagina.$after."'>$total_paginas</a>"; }
    $texto .= "<a href='".$url."/tot/".$total."/page/".$posterior.$after."'>&gt;&gt;</a>";
  } else {
    $texto .= "";
  }
  $texto .= "";
  return $texto;

}

function paginar_javascript($actual, $total, $por_pagina) {

  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - $por_pagina;
  $posterior = $actual + $por_pagina;
  $pagina_actual = ($actual+$por_pagina)/$por_pagina;

  //15 es el total de páginas a mostrar
  if ($total_paginas <= 10) {
  	$minimo = 1;
	$maximo = $total_paginas;
  } else {
    if ($pagina_actual < 5) {
  	  $minimo = 1;
	  $maximo = 10;
  	} else {
	  $diferencia = $total_paginas - $pagina_actual;
	  if ($diferencia < 5) {
	    $minimo = $total_paginas - 10;
	    $maximo = $total_paginas;	
	  } else {
	    $minimo = $pagina_actual - 5;
	    if(!$minimo)
	    	$minimo = 1;
	    $maximo = $pagina_actual + 5;
	  }
	}
  }
  
  $texto = "";
  if ($pagina_actual > 1) {
    $texto .= "<a href='javascript:ir_paginacion(".$anterior.",".$total.");'>&lt;&lt;</a>  ";
  } else {
    $texto .= "";
  }
  if($minimo>1)
  {
	  $texto .="<a class='nPagina' href='javascript:ir_paginacion(0,".$total.");'>1</a>"."...";
  }
  for ($i=$minimo; $i<$pagina_actual; $i++) {
    $texto .= " <a class='nPagina' href='javascript:ir_paginacion(".(($i*$por_pagina)-$por_pagina).",".$total.");'>$i</a>  ";
  }
  $texto .= "<span class='paginaActiva'><b> $pagina_actual</b></span>";
  for ($i=$pagina_actual+1; $i<=$maximo; $i++) {
    $texto .= "<a class='nPagina' href='javascript:ir_paginacion(".(($i*$por_pagina)-$por_pagina).",".$total.");'>$i</a>  ";
  }
  if ($pagina_actual<$total_paginas) {
      $puntos = $pagina_actual+5;
	  if($puntos<$total_paginas){$texto .="..."."<a class='nPagina' href='javascript:ir_paginacion(".($total_paginas-1)*$por_pagina.",".$total.");'>$total_paginas</a>"; }
    $texto .= "<a href='javascript:ir_paginacion(".$posterior.",".$total.");'>&gt;&gt;</a>";
  } else {
    $texto .= "";
  }
  $texto .= "";
  return $texto;
}



function escape($val) {
    if (get_magic_quotes_gpc()) $val = stripslashes($val);
    $f = (function_exists('mysql_real_escape_string')) ? "mysql_real_escape_string" : ((function_exists('mysql_escape_string')) ? "mysql_escape_string" : "addslashes");
 //   return (!is_numeric($val)) ? "'".$f($val)."'" : $val;
    return (!is_numeric($val)) ? $f($val) : $val;
}  

function acortar ($cadena, $tam)
{
	$cadenaDev = texto_plano($cadena);
	$cadenaDev = strip_tags($cadenaDev);
	$cadenaDev = mb_substr($cadenaDev, 0, $tam, 'UTF-8');
	$cadenaDev .= (strlen($cadena)>$tam) ? '...' : '';
	return $cadenaDev;
}

function texto_plano($texto)
{
	$texto = preg_replace('@<head[^>]*?>.*?</head>@siu','',$texto);
	$texto = preg_replace('@<style[^>]*?>.*?</style>@siu','',$texto);
	$texto = preg_replace('@<script[^>]*?>.*?</script>@siu','',$texto);	
	
	return $texto;
}

function upImg ($nombreCampo, $nombreHid, $formatos, $carpeta_dest, $nuevoNombre="", $wmax=1000, $hmax=1000, $tam_max=500000)
{	
	/*Parámetros: 	
					$nombreCampo: Nombre del campo en el formulario
					$formatos: Array con los formatos que se quiere permitir subir al servidor
					$carpeta_dest: Carpeta destino en el servidor
					$nuevoNombre: Nuevo nombre para el archivo (sin extensión)
					$wmax: Ancho máximo permitido para la imagen
					$hmax: Alto máximo permitido para la imagen
					$tam_max: Tamaño máximo permitido para la imagen
	*/

	if(!$_FILES[$nombreCampo]['size'])
	{
		return (isset($_POST[$nombreHid])) ? $_POST[$nombreHid] : ''; //No hay imagen nueva que subir
	}
		
	$filesize = $_FILES[$nombreCampo]['size'];
	$filename = trim($_FILES[$nombreCampo]['name']);
	
	if($filesize > $tam_max) 
		return -1; //Tamaño superior al permitido
		
	//Comprobamos si el formato es correcto
	$extension = explode(".",$filename); 
	$extension = $extension[1];
	foreach($formatos as $formato)
	{
		if(strtolower($formato) == strtolower($extension))
		{
			$correcto = 1;	
			break;
		}
	}
	
	if(!$correcto)
		return -2; //Formato de archivo incorrecto
	
	$nombre = ($nuevoNombre) ? $nuevoNombre.".".$extension : $filename;
	$uploadfile = $carpeta_dest.$nombre;
	
	//Subimos el archivo
	if (move_uploaded_file($_FILES[$nombreCampo]['tmp_name'], $uploadfile)) {	
		//Redimensionamos la imagen si es necesario
		$datos = getimagesize($uploadfile); 
		if($datos[2]==1){$img = @imagecreatefromgif($uploadfile);}  //GIF
		if($datos[2]==2){$img = @imagecreatefromjpeg($uploadfile);} //JPG
		if($datos[2]==3){$img = @imagecreatefrompng($uploadfile);}  //PNG
		if($datos[0]>$wmax || $datos[1]>$hmax)
		{
			$ratio = ($datos[0] / $wmax); 
			$altura = ($datos[1] / $ratio); 
			if($altura>$hmax){ $anchura2=$hmax*$wmax/$altura;$altura=$hmax;$wmax=$anchura2; }
			$imagen = imagecreatetruecolor($wmax,$altura); 
			$cosa = imagecopyresampled($imagen, $img, 0, 0, 0, 0, $wmax, $altura, $datos[0], $datos[1]); 
			
			unlink($uploadfile);
			
			if($datos[2]==1){imagegif($imagen,$uploadfile);}  //GIF
			if($datos[2]==2){imagejpeg($imagen,$uploadfile);} //JPG
			if($datos[2]==3){imagepng($imagen,$uploadfile);}  //PNG
		}
		

		return $nombre; //Se ha subido correctamente la imagen
	} else {
		return -3; //Se ha producido algun error al subir la imagen
	}
}

//Funciones autocomplete
function array_to_json( $array ){

    if( !is_array( $array ) ){
        return false;
    }

    $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
    if( $associative ){

        $construct = array();
        foreach( $array as $key => $value ){

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.

            // Format the key:
            if( is_numeric($key) ){
                $key = "key_$key";
            }
            $key = "\"".addslashes($key)."\"";

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "\"".addslashes($value)."\"";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode( ", ", $construct ) . " }";

    } else { // If the array is a vector (not associative):

        $construct = array();
        foreach( $array as $value ){

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode( ", ", $construct ) . " ]";
    }

    return $result;
}

function resaltar($search,$string) {
    $search = preg_quote($search,"/");
    preg_match_all('/'. $search .'/i',$string,$matches);
    $replace = array();
    $new_search = $matches[0];
    foreach($new_search as $r) { $replace[] = '<strong>'. $r .'</strong>'; }
    return str_replace($new_search,$replace,$string);
}

function codAleatorio($numStr,$strPrx) 
{ 
	srand((double)microtime()*rand(1000000,9999999)); 
	$arrChar=array(); 
	$uId=$strPrx; 
	for($i=65;$i<90;$i++) 
	{ 
		array_push($arrChar,chr($i)); 
		array_push($arrChar,strtolower(chr($i))); 
	} 
	for($i=48;$i<57;$i++) 
	{ 
		array_push($arrChar,chr($i)); 
	} 
	for($i=0;$i<$numStr;$i++) 
	{ 
	$uId.=$arrChar[rand(0,count($arrChar)-1)]; 
	} 
	
	return $uId;
}

function cargarMail ($parte, $mensaje_cabecera="")
{
	$contenido = '';
	switch ($parte)
	{
		case "header":
			$contenido = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Tienda</title>
			</head>
		
			<body style="font-family:Tahoma, Verdana, Arial;font-size:12px">
			<table style="border-bottom:1px solid #000; width: 100%;font-family:Tahoma, Verdana, Arial;font-size:16px">
				<tr>
					<td style="width:180px">
						<img src="'.LOGO_EMAIL_CABECERA.'" width="359" />
					</td>
					<td style="text-align:right;vertical-align:bottom">
						<h3>'.$mensaje_cabecera.'</h3>
					</td>
				</tr>
			</table>';
			break;
			
		case "footer":
			$contenido = '
			<div style="font-size:11px;color:#a6a6a6;border-top:1px solid #000;margin-top:40px;">
				Este email es un mensaje autom&aacute;tico enviado desde la web de '.BASE_URL_TEXT.' a raiz del env&iacute;o de un formulario web. 
				En caso de que no sea usted la persona que ha completado dicho formulario por favor elimine este mensaje. 
				Para cualquier aclaraci&oacute;n puede encontrar nuestros datos de contacto en '.BASE_URL_TEXT.'
			</div>
			</body>
			</html>';
			break;
				
		case "cabeceras":
			$contenido .= "MIME-Version: 1.0\n";
			$contenido .= "Content-type: text/html; charset=iso-8859-1\n";
			$contenido .= utf8_decode("From: ".PREF_NOMBRE." <".PREF_EMAIL.">");
			$contenido .= "\n";
			break;
	}
	
	return $contenido;
}


function retornarStringValido($cadena) 
{ 
	$cadena = utf8_decode($cadena);
    $cadena = strtolower($cadena); 
	$cadena = utf8_encode($cadena); 
    $b     = array("Ó","á","é","í","ó","ú","ä","ë","ï","ö","ü","à","è","ì","ò","ù","ñ","Ñ","'",",",".",";",":","¡","!","¿","?",'"',"(",")","%","-"); 
    $c     = array("O","a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","n","n","","","","","","","","","",'',"","","",""); 
    $cadena = str_replace($b,$c,$cadena); 
    return $cadena; 
} 

function sinprepo ($nombre)
{
	$palabras_eliminar = array('/ a /i', '/ ante /i', '/ bajo /i', '/ con /i', '/ de /i', '/ desde /i', '/ durante /i', '/ en /i', '/ entre /i', '/ excepto /i', '/ hacia /i', '/ hasta /i', '/ mediante /i', '/ para /i', '/ por /i', '/ salvo /i', '/ según /i', '/ segun /i', '/ sin /i', '/ sobre /i', '/ tras /i', '/ y /i', '/ el /i', '/ la /i', '/ los /i', '/ las /i', '/ un /i', '/ una /i', '/ unos /i', '/ unas /i', '/ lo /i', '/ al /i', '/ del /i');
	
	$nombre_limpio = preg_replace($palabras_eliminar, ' ', $nombre);

	return $nombre_limpio;
}


function nombreSemantico ($nombre)
{
	$palabras_eliminar = array('/ a /i', '/ ante /i', '/ bajo /i', '/ con /i', '/ de /i', '/ desde /i', '/ durante /i', '/ en /i', '/ entre /i', '/ excepto /i', '/ hacia /i', '/ hasta /i', '/ mediante /i', '/ para /i', '/ por /i', '/ salvo /i', '/ según /i', '/ segun /i', '/ sin /i', '/ sobre /i', '/ tras /i', '/ y /i', '/ el /i', '/ la /i', '/ los /i', '/ las /i', '/ un /i', '/ una /i', '/ unos /i', '/ unas /i', '/ lo /i', '/ al /i', '/ del /i');
	
	$nombreSemantico = preg_replace($palabras_eliminar, '/', $nombre);
	
	$nombreSemantico = retornarStringValido($nombreSemantico);
	$nombreSemantico = str_replace("  ", "", $nombreSemantico);
	$nombreSemantico = str_replace("+", "", $nombreSemantico);
	$nombreSemantico = str_replace(" ", "/", $nombreSemantico);
	return $nombreSemantico;
}

function limpiar_texto($texto)
{
	$texto = preg_replace('@<script[^>]*?>.*?</script>@siu','',$texto);	
	
	return $texto;
}

function cache ($campo, $idioma, $conexion)
{
	$query_cache = sprintf("SELECT cache_$idioma FROM cache WHERE nombre_campo=%s", GetSQLValueString($campo,"text"));
	$res = mysql_query($query_cache, $conexion);
	return mysql_result($res, 0);
}

function extTags($id, $db, $extId=0)
{
	$campo = ($extId) ? 'id_tag' : 'nombre_es';
	$query_tags = $db->prepare("SELECT $campo as valor FROM productos_tags INNER JOIN tags ON tags.Id=productos_tags.id_tag WHERE productos_tags.id_producto=?");
	$query_tags->execute(array($id));
	$tag_url='';
	while($tag=$query_tags->fetch(PDO::FETCH_OBJ))
	{
		$tag_url.=nombreSemantico($tag->valor).'/';
	}	
	
	return $tag_url;
}

function getPreferences($pref, $db)
{
	$query_pref = $db->prepare("SELECT valor FROM preferencias WHERE pref = ?");
	$query_pref->execute(array($pref));
	return $query_pref->fetch(PDO::FETCH_OBJ)->valor;
}

function mayusculas ($cadena)
{
	return mb_strtoupper($cadena,'UTF-8');
}

function minusculas ($cadena)
{
	return mb_strtolower($cadena,'UTF-8');
}

/* Funciones de color */
function oscurece_color($color,$cant){
	//voy a extraer las tres partes del color
	$rojo = substr($color,1,2);
	$verd = substr($color,3,2);
	$azul = substr($color,5,2);
	
	//voy a convertir a enteros los string, que tengo en hexadecimal
	$introjo = hexdec($rojo);
	$intverd = hexdec($verd);
	$intazul = hexdec($azul);
	
	//ahora verifico que no quede como negativo y resto
	if($introjo-$cant>=0) $introjo = $introjo-$cant;
	if($intverd-$cant>=0) $intverd = $intverd-$cant;
	if($intazul-$cant>=0) $intazul = $intazul-$cant;
	
	//voy a convertir a hexadecimal, lo que tengo en enteros
	$rojo = dechex($introjo);
	$verd = dechex($intverd);
	$azul = dechex($intazul);
	
	//voy a validar que los string hexadecimales tengan dos caracteres
	if(strlen($rojo)<2) $rojo = "0".$rojo;
	if(strlen($verd)<2) $verd = "0".$verd;
	if(strlen($azul)<2) $azul = "0".$azul;
	
	//voy a construir el color hexadecimal
	$oscuridad = "#".$rojo.$verd.$azul;
	
	//la función devuelve el valor del color hexadecimal resultante
	return $oscuridad;
}

function aclara_color($color,$cant){
	//voy a extraer las tres partes del color
	$rojo = substr($color,1,2);
	$verd = substr($color,3,2);
	$azul = substr($color,5,2);
	
	//voy a convertir a enteros los string, que tengo en hexadecimal
	$introjo = hexdec($rojo);
	$intverd = hexdec($verd);
	$intazul = hexdec($azul);
	
	//ahora verifico que no quede como negativo y resto
	if($introjo-$cant>=0) $introjo = $introjo+$cant;
	if($intverd-$cant>=0) $intverd = $intverd+$cant;
	if($intazul-$cant>=0) $intazul = $intazul+$cant;
	
	//voy a convertir a hexadecimal, lo que tengo en enteros
	$rojo = dechex($introjo);
	$verd = dechex($intverd);
	$azul = dechex($intazul);
	
	//voy a validar que los string hexadecimales tengan dos caracteres
	if(strlen($rojo)<2) $rojo = "0".$rojo;
	if(strlen($verd)<2) $verd = "0".$verd;
	if(strlen($azul)<2) $azul = "0".$azul;
	
	//voy a construir el color hexadecimal
	$oscuridad = "#".$rojo.$verd.$azul;
	
	//la función devuelve el valor del color hexadecimal resultante
	return $oscuridad;
}
/* Funciones de color */

?>
