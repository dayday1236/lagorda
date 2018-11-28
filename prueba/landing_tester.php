<?php

header('Content-Type: text/html; charset=utf-8');


require_once(dirname(__FILE__) . "/inc/connections/conexion.php");
require_once(dirname(__FILE__) . "/inc/funciones.php");
//require_once(dirname(__FILE__) . "/inc/funciones_ex.php");
require_once(dirname(__FILE__) . "/inc/config.php");
require_once dirname(__FILE__) . '/inc/PHPMailer/PHPMailerAutoload.php';
require_once dirname(__FILE__) . "/inc/mailchimp/MailChimp.php";

if (isset($_POST["accion"]) && !empty($_POST["accion"])) {
    $pstatus = $_POST["accion"];
    $status = FALSE;
    switch ($pstatus) {
        case "A": 
            $status = 1;
            break;
        case "D": 
            $status = 0;
            break;
        case "O": 
            $status = -1;
            break;
    }
    
    if (!($status === FALSE)) {    
        $query_ganadores = $db->prepare("update lottery set status = ? where Id = ?");
        $query_ganadores->execute(array($status,$id_sorteo,));
    }
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$white_list = ['37.10.150.211','88.26.219.190','84.78.21.4','47.60.38.197','81.0.1.243'];

print_r("<br>");
print_r("-------------------------- Prueba Landing : From: $ip --------------------------");
print_r("<br>");

if (in_array($ip, $white_list)) {

print_r("<br>");
$query = $db->prepare("SELECT status FROM lottery WHERE Id=?");
$query->execute(array($id_sorteo));
$rstatus = $query->fetch(PDO::FETCH_OBJ)->status;
//print_r($rstatus);
$status_landing = $rstatus;
print_r(" Landing ".($rstatus == 1 ? "<span style='background: green; color: white;'> Activa </span>" : ($rstatus == 0 ? "<span style='background: yellow; color: black;'> Visible - Pero Sin Posibilidad de Ganadores </span>" : ($rstatus == -1 ? "<span style='background: red; color: white;'> Oculta </span>" : "Error")))." <br>");
print_r("<br>");

    
print_r("Horas <b>(Cada hora representa 1 premio disponible a partir de ella, si está verde es que ya se ha añadido)</b>: <br>");
echo "<table>";
echo    "<tr>".
                "<td><b>Hora</b></td>".                
                "<td><b></b></td>".                
            "</tr>";
foreach ($horas as $fila) {
    $color = "";
    $masuno = false;
    if (in_array(date('Y-m-d'),$dias) && date('H:i') > $fila) {
        $color = "background-color: lightgreen;";
        $masuno = true;
    }
    echo    "<tr>".
                "<td>".("<span style='$color'>").$fila."</span></td>". 
                "<td>".("<span style='$color'>").($masuno ? "+1" : "")."</span></td>".
            "</tr>";
}
echo "</table>";
print_r("<br>");

$query_participantes_por_fecha = $db->prepare("SELECT DATE_FORMAT(date_add,'%Y-%m-%d') dia , count(*) cant FROM lottery_emails WHERE id_lottery=? group by DATE_FORMAT(date_add,'%Y-%m-%d') order by date_add asc");
$query_participantes_por_fecha->execute(array($id_sorteo,));
$dparticipantes_por_fecha = $query_participantes_por_fecha->fetchAll(PDO::FETCH_ASSOC);

$cant_por_fecha = [];


foreach ($dparticipantes_por_fecha as $elp) {
    $cant_por_fecha[$elp["dia"]] = $elp["cant"];
}
//print_r($cant_por_fecha);
print_r("Dias - Premios - Participantes: <br>");
echo "<table border=1 cellspacing=10 cellpadding=10>";
echo    "<tr>".
                "<td><b>Día</b></td>".
                "<td><b>Premios</b></td>".
                "<td><b>Participantes</b></td>".
            "</tr>";
foreach ($dias as $ind => $fila) {
    $color = "";
    $actual = false;
    if (in_array(date('Y-m-d'),$dias) && date('Y-m-d') > $fila) {
        $color = "background-color: lightgreen;";
        
    }
    
    if (in_array(date('Y-m-d'),$dias) && date('Y-m-d') == $fila) {
        $color = "background-color: lightgreen;";
        $actual = true;
    }
    
    echo    "<tr>".
                "<td>".("<span style='$color'>").$fila."</span>".($actual ? " - Actual" : "")."</td>".
                "<td>".$arr_num_premios_dia[$ind]."</td>".
                "<td>".(isset($cant_por_fecha[$fila]) ? $cant_por_fecha[$fila] : "")."</td>".
            "</tr>";
}
echo "</table>";
print_r("<br>");

print_r("Hora Desde: <br>");
print_r($hora_ini);
print_r("<br>");

print_r("Hora Hasta: <br>");
print_r($hora_fin);
print_r("<br>");

$query_ganadores = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE date_add > ? AND date_add < ? AND winner=1 AND id_lottery=?");
$query_ganadores->execute(array(date('Y-m-d').' '.$hora_ini, date('Y-m-d H:i'),$id_sorteo,));
$ganadores = $query_ganadores->fetch(PDO::FETCH_OBJ)->conta;	                       

$query_ganadores_totales = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE winner=1 AND id_lottery=?");
$query_ganadores_totales->execute(array($id_sorteo));
$ganadores_totales = $query_ganadores_totales->fetch(PDO::FETCH_OBJ)->conta;

$query_participantes = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE id_lottery=?");
$query_participantes->execute(array($id_sorteo));
$participantes = $query_participantes->fetch(PDO::FETCH_OBJ)->conta;	

$query_participantes_hoy = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE date_add >= ? AND date_add <= ? AND id_lottery=?");
$query_participantes_hoy->execute(array(date('Y-m-d').' '.'00:00', date('Y-m-d H:i'),$id_sorteo,));
$participantes_hoy = $query_participantes_hoy->fetch(PDO::FETCH_OBJ)->conta;



$premios = 0;
foreach($horas as $hora){
    if($hora < date('H:i')){
            $premios ++;
    }
}
if($premios > $ganadores){
        $winner = 1;
}
if($premios > $num_premios_dia){
        $winner = 0;
}

if($ganadores_totales >= $max_premios){	
    $winner = 0;
}

if($premios > ($num_premios_dia) && $winner == 1){				
    //maximo premios dia
    
    $winner = 0;
}

if($ganadores_totales >= $max_premios && $winner == 1){	
    //maximo premios totales
    $winner = 0;
}



print_r("Cant Participantes de Hoy: <br>");
print_r($participantes_hoy);
print_r("<br>");

print_r("Cant Participantes Totales: <br>");
print_r($participantes);
print_r("<br>");
        
print_r("Cant Premios a entregar (hasta la hora actual): <br>");
print_r($premios);
print_r("<br>");

print_r("Cant Premios entregados para hoy (hasta la hora actual): <br>");
print_r($ganadores." ".($ganadores == $num_premios_dia ? "<span style='background: green; color: white; padding: 0 .5em;'>Entregados todos los premios para hoy</span>" : ""));
print_r("<br>");

print_r("Max premios para Hoy: <br>");
print_r($num_premios_dia);
print_r("<br>");

print_r("Cant Premios Totales Entregados segun BD: <br>");
print_r($ganadores_totales);
print_r("<br>");

print_r("Max Premios Totales: <br>");
print_r($max_premios);
print_r("<br>"); 

print_r("<br>Día de Hoy: <br>");
print_r(date('Y-m-d'));
print_r("<br>");

print_r("Dentro de Rango de Días y de Hora Desde y Hasta Landing?: <br>");
print_r((in_array(date('Y-m-d'),$dias) && date('H:i') > $hora_ini && date('H:i') < $hora_fin) ? "Si" : "No");
print_r("<br>");

print_r("Test: Valor de Winner para la Hora Actual <br>");
print_r($winner == 1 ? "<div style='background: green; color: white;'> El proximo participante Ganará </div>" : "<div style='background: red; color: white;'> No habrá ganadores para esta hora </div>");
print_r("<br>"); 

print_r("<b>------------------------------ Status Actuales Desarrollo (Fer): ------------------------------</b><br>");
print_r("<br><b>Pixel Facebook</b>: ".($cnd_pixel_actual == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Google Analytics</b>: ".($cnd_analytics_actual == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Mailchimp</b>: ".($cnd_mailchimp_actual == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));

print_r("<br><b>Bases y Condiciones</b>: ".($cnd_condiciones == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Fechas</b>: ".($cnd_fechas == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Imagenes de Mails</b>: ".($cnd_mails == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));

print_r("<br>");

print_r("<b>------------------------------ Status Actuales Confirmado / Validado (Jose): ------------------------------</b><br>");
print_r("<br><b>Pixel Facebook</b>: ".($cnd_pixel_actual_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Google Analytics</b>: ".($cnd_analytics_actual_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Mailchimp</b>: ".($cnd_mailchimp_actual_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));

print_r("<br><b>Bases y Condiciones</b>: ".($cnd_condiciones_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Fechas</b>: ".($cnd_fechas_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));
print_r("<br><b>Imagenes de Mails</b>: ".($cnd_mails_cj == 1 ? "<span style='background: green; color: white;'> Listo </span>" : "<span style='background: red; color: white;'> Pendiente </span>"));


print_r("<br>");

$query_participantes_hoy2 = $db->prepare("SELECT * FROM lottery_emails WHERE id_lottery=? order by date_add desc"); //date_add >= ? AND date_add <= ? AND 
$query_participantes_hoy2->execute(array($id_sorteo,));
$dparticipantes_hoy = $query_participantes_hoy2->fetchAll(PDO::FETCH_ASSOC);



echo "-------- Configurar Landing (<b>Para uso solo en caso de emergencia , al presionar el boton se cambiara el status de la landing, sin preguntar nada</b>) --------";

echo "<br>";
echo "<br>";
echo "<form method='post'>";
echo "<button name='accion' value='A' style='text-align: center; margin: 1em; font-size: 1.3em;'><b>Activar</b><br> <img style='height: 10em;' src='img/boton_danger.jpeg' /></button>";
echo "<button name='accion' value='D' style='text-align: center; margin: 1em; font-size: 1.3em;'><b>Desactivar Ganadores</b><br> <img style='height: 10em;' src='img/boton_danger.jpeg' /></button>";
echo "<button name='accion' value='O' style='text-align: center; margin: 1em; font-size: 1.3em;'><b>Ocultar</b><br> <img style='height: 10em;' src='img/boton_danger.jpeg' /></button>";
echo "</form>";

echo "<br><br><h1>Si algo falla recordad La dura vida del desarrollador y el tester 😂 </h1> <br><img style='width: 40%;' src='https://media1.tenor.com/images/7876350f0a51b6ef667c64b9aac7ac01/tenor.gif?itemid=8682110' />";
echo "<img style='width: 40%;' src='https://media1.tenor.com/images/4bdd05191c9d1c5b58ab48c4784be5d6/tenor.gif?itemid=8487352' />";

echo "<br><br><br>";
echo "<br><a href='landing_data_export.php'><button name='accion' value='download' style='text-align: center; margin: 1em; font-size: 1.3em;'><b>Descargar Excel</b><br> <img style='height: 10em;' src='img/boton_danger.jpeg' /></button></a>";

echo "<br>";

print_r("<br><br> <h2>Detalle Participantes (Ordenado de mas reciente a más antiguo) </h2><br><br>");

echo "<table>";
echo    "<tr>".
                "<td><b>Email</b></td>".
                "<td><b>Nombre</b></td>".
                "<td><b>Pais</b></td>".
                "<td><b>Fecha</b></td>".
                "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>".
                "<td>IP</td>".
                "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>".
                "<td><b>Ganador?</b></td>".
            "</tr>";
foreach ($dparticipantes_hoy as $fila) {
    
    $qip = $db->prepare("SELECT count(*) cant FROM lottery_emails WHERE id_lottery=? and ip=? and winner = 1 order by date_add desc");
    $qip->execute(array($id_sorteo,$fila["ip"]));
    $ganadores_por_ip = $qip->fetch(PDO::FETCH_ASSOC)["cant"] > 0;
    //print_r($ganadores_por_ip["cant"]);
    //$ganadores_por_ip = $ganadores_por_ip["cant"] > 0;
    echo    "<tr>".
                "<td>".$fila["email"]."</td>".
                "<td>".$fila["nombre"]."</td>".
                "<td>".$fila["pais"]."</td>".
                "<td>".$fila["date_add"]."</td>".
                "<td>&nbsp;</td>".
                "<td>".$fila["ip"]."</td>".
                "<td>&nbsp;</td>".
                "<td>".($fila["winner"] == 1 ? "<span style='background: green; color: white; padding: 0 .5em;'>Si</span>" : "<span style='background: red; color: white; padding: 0 .5em;'>No</span>".($ganadores_por_ip ? " - Ya hay un ganador para esta ip" : ""))."</td>".
            "</tr>";
}
echo "</table>";



} else {
    echo "<h1>Fuera intruso</h1> <br><img src='https://media1.tenor.com/images/74c8c493476b10bf37ce51b2c9553a27/tenor.gif?itemid=3456638' />";
}


