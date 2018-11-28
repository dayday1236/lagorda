<?php

require_once(dirname(__FILE__) . "/conexion.php");
require_once dirname(__FILE__) . '/PHPMailer/PHPMailerAutoload.php';
require_once dirname(__FILE__) . "/mailchimp/MailChimp.php";

function enviar_sec_mail_html ($host, $username, $password, $fromname, $fromemail, $to, $asunto, $html, $puerto = 587) {
    $mail = new phpmailer();
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->Hostname = $host;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPOptions = array(
            'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
            )
    );
    $mail->SMTPAutoTLS = false;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->Encoding = "quoted-printable";
    $mail->CharSet = 'UTF-8';
    $mail->ContentType = ("text/html; charset=utf-8\n");
    $mail->IsHTML(true);
    $mail->setFrom($fromemail, $fromname);
    if (is_array($to)) {
        foreach ($to as $eto) {
            $mail->AddAddress($eto);
        }
    } else {
        $mail->AddAddress($to);
    }
    //$mail->AddAddress("sergio.sitelicon@gmail.com");
    $mail->Subject = $asunto;
    $mail->msgHTML($html);
    //$mail->SMTPDebug = 2; $mail->Debugoutput = 'html';

    return $mail->Send();    
}

?>