<?php

require_once dirname(__FILE__) . "/inc/connections/conexion.php";
require_once dirname(__FILE__) . "/inc/config.php";

error_reporting(E_ERROR | E_WARNING | E_PARSE);

sleep(3);

//variables de configuración

$activa = 1;
$id_sorteo = 1;

if ($_POST['nombre'] != " ") {
    $nombre = $_POST['nombre'];
}

if ($_POST['check2'] != null) {
    $publi = 'Si';
} else {
    $publi = 'No';
}

if ($activa) {

    // Validamos que el email no exista
    if ($_POST["email"] != "") {

        $email = $_POST["email"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE email=?");
        $query_exist->execute(array($email));
        $existe = $query_exist->fetch(PDO::FETCH_OBJ)->conta;

        //Validamos que el email no exista ya
        if (!$existe) {
            $query_exist = $db->prepare("SELECT COUNT(Id) conta FROM lottery_emails WHERE ip=?");
            $query_exist->execute(array($ip));
            $existe_ip = $query_exist->fetch(PDO::FETCH_OBJ)->conta;

            //validamos que la ip no exista ya
            if ($existe_ip == 0) {

                $winner = 0; //Registro correcto

                $query_lottery = $db->prepare("INSERT INTO lottery_emails (id_lottery,nombre,email,ip,winner,date_add) VALUES (?,?,?,?,?,CURDATE())");
                $query_lottery->execute(array($id_sorteo, $nombre, $email, $ip, $winner));

            } else {
                $winner = 1; // La ip ya existe en la base de datos
            }

        } else {
            $winner = 2; // El email existe, no es ganador, y no se guarda en la bbdd
        }
    } else {
        $winner = 3; // No ha introducido email
    }
}
echo json_encode($winner);

die();
