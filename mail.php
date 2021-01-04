<?php
include_once '../Model/Paiement.php';
include_once '../Controller/PaiementC.php';

require_once ('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail-> isSMTP();
$mail->SMTPAuth();
$mail->SMTPSecure = 'ssl';
$mail->host = 'smtp.gmail.com';
$mail-> port = '465';
$mail->isHTML();
$mail->username = 'Kharrat.raed@esprit.tn';
$mail->password = '181JMT1558';
$mail-> SetFrom ('no-relpy@howcode.org');
$mail-> subject = 'PENTA-TRAVEL';
$mail-> body = 'this is the price of u r selection of the hotel <'prix_p'>';
$mail-> AddAddress (mail_p);

$mail-> send ();
?>