<?php

require_once dirname(__FILE__) . "/inc/connections/conexion.php";
// require_once dirname(__FILE__) . "/inc/funciones.php";
require_once dirname(__FILE__) . "/inc/funciones.php";
require_once dirname(__FILE__) . "/inc/config.php";
require_once dirname(__FILE__) . '/inc/PHPMailer/PHPMailerAutoload.php';
require_once dirname(__FILE__) . "/inc/mailchimp/MailChimp.php";
error_reporting(E_ERROR | E_WARNING | E_PARSE);

sleep(3);

$host = 'smtp.office365.com';
$username = 'notificaciones@complejocastejon.com';
$password = 'Zuwa1170';
$fromname = "LA GORDA DE NAVIDAD";

$to = $_POST["email"];
if ($_POST['nombre'] != " ") {
    $nombre = $_POST['nombre'];
}
if ($_POST['check2'] != null) {
    $publi = 'Si';
} else {
    $publi = 'No';
}

$control = $dias;

$winner = 0;

if (in_array(date('Y-m-d'), $dias) && date('H:i') > $hora_ini && date('H:i') < $hora_fin) {
    if ($_POST["email"] != "") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE email=? AND id_lottery=?");
        $query_exist->execute(array($email, $id_sorteo));
        $existe = $query_exist->fetch(PDO::FETCH_OBJ)->conta;

        if (!$existe) {
            $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE ip=? AND id_lottery=?");

            $query_exist->execute(array($ip, $id_sorteo));
            $existe = $query_exist->fetch(PDO::FETCH_OBJ)->conta;

            if (!$existe) {
                $query_ganadores = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE date_add > ? AND date_add < ? AND winner=1 AND id_lottery=?");
                $query_ganadores->execute(array(date('Y-m-d') . ' ' . $hora_ini, date('Y-m-d H:i'), $id_sorteo));
                $ganadores = $query_ganadores->fetch(PDO::FETCH_OBJ)->conta;

                $query_ganadores_totales = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE winner=1 AND id_lottery=?");
                $query_ganadores_totales->execute(array($id_sorteo));
                $ganadores_totales = $query_ganadores_totales->fetch(PDO::FETCH_OBJ)->conta;

                $premios = 0;
                foreach ($horas as $hora) {
                    if ($hora < date('H:i')) {
                        $premios++;
                    }
                }
                if ($premios > $ganadores) {
                    $winner = 1;
                }
                if ($premios > $num_premios_dia) {
                    $winner = 0;
                }

                if ($ganadores_totales >= $max_premios) {
                    $winner = 0;
                }

                if ($premios == ($num_premios_dia - 1) && $winner == 1) {
                    $ato = array('camino@sitelicon.com', 'mufarte@gmail.com', 'fernando.sitelicon@gmail.com');
                    $exito = enviar_email($host, $username, $password, $fromname, $host, $to, $asunto, 'Se han repartido los ' . $num_premios_dia . ' premios de hoy de ' . $cliente . '');
                }

                if ($ganadores_totales == $max_premios && $winner == 1) {
                    $winner = 0;
                    $ato = array('camino@sitelicon.com', 'mufarte@gmail.com', 'fernando.sitelicon@gmail.com');
                    $exito = enviar_email($host, $username, $password, $fromname, $host, $to, $asunto, 'Se han repartido los ' . $max_premios . ' premios totales de ' . $cliente . '');
                }
            }
            if ($status_landing != 1) {
                $winner = 0;
            }

            $query_lottery = $db->prepare("INSERT INTO lottery_emails (id_lottery,nombre,email,ip,winner) VALUES (?,?,?,?,?)");
            $query_lottery->execute(array($id_sorteo, $nombre, $email, $ip, $winner));
            registrar_mailchimp($email, $nombre);

        } else { /*Si la ip ya existe */
            $winner = 2;
        }

    } else { /* Si el email ya existe*/
        $winner = 3;
    }

    if ($_POST["email"] != "") {
//        echo 'else';
        //        echo '<br/>';
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE email=? AND id_lottery=?");

        $query_exist->execute(array($email, $id_sorteo));
        $existe = $query_exist->fetch(PDO::FETCH_OBJ)->conta;
        if (!$existe) {

            $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE ip=? AND id_lottery=?");
            $query_exist->execute(array($ip, $id_sorteo));
            $existe = $query_exist->fetch(PDO::FETCH_OBJ)->conta;
            if (!$existe) {
                $query_lottery = $db->prepare("INSERT INTO lottery_emails (id_lottery,nombre,email,ip,winner,date_add) VALUES (?,?,?,?,?,CURDATE())");
                $query_lottery->execute(array($id_sorteo, $nombre, $email, $ip, $winner));

            }
            registrar_mailchimp($email, $nombre);
        }
    }
}
//$winner = true;

$varwin = 0;

//Mandamos respuesta json y evitamos envio de email.
echo json_encode($winner);

die();

//$varwin = 0;

if ($to == "ganador@sitelicon.com") {
    $winner = 1;
    //$to = "fernando.sitelicon@gmail.com";
    $to = array("fernando.sitelicon@gmail.com", "rrss.sitelicon@gmail.com");
}

if ($winner == 1) {
    //$variaciones = 2;
    //$varwin = rand(1,$variaciones);

    $asunto = "¡Enhorabuena has ganado!";

    $html = '	<html>
				<head>
					<title>' . $cliente . '</title>
				</head>
				<body>
					<table style="width:100%;background-color:#fff;">
						<tr>
                                                    <td style="text-align:center"><a href="https://docs.google.com/forms/d/e/1FAIpQLSe7BvuomGeu9ccRkIswN0r3CvWbAB1U1vcaex01mM5EXNQzeQ/viewform?usp=sf_link"><img src="' . $url_tienda . 'sorteo/assets/img/email-ganadores-copy.png"></img></a></td>
						</tr>
					</table>
				</body>
			</html>';
} else {
    $asunto = "Código descuento para tu próxima compra";

    $html = '	<html>
				<head>
					<title>' . $cliente . '</title>
				</head>
				<body>
					<table style="width:100%;background-color:#fff;">
						<tr>
							<td style="text-align:center">
								<a href="http://www.google.com/url?q=http%3A%2F%2Flagordadenavidad.es%2Fcomprar%2Fbilletes%3Futm_source%3Dnewsletter%26utm_medium%3Demail%26utm_campaign%3Demail_nowin&sa=D&sntz=1&usg=AFQjCNHxh2FIOdGcA1PZxxg3YlBCyAPnDw">
									<img src="' . $url_tienda . 'sorteo/assets/img/email-no-ganadores-copy-2.png"/>
								</a>
							</td>
						</tr>
					</table>
				</body>
			</html>';
}

//LLamamos a la funcion que manda el email
$exito = enviar_email($host, $username, $password, $fromname, $username, $to, $asunto, $html); //Viene de funciones_ex_php

$intentos = 1;
while ((!$exito) && ($intentos < 2)) {
    sleep(2);
    $exito = enviar_email($host, $username, $password, $fromname, $username, $to, $asunto, $html);
    $intentos = $intentos + 1;
}

echo json_encode($winner);
