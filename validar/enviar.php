<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2640683.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "mail@pulidosdesimone.com.ar";  // Mi cuenta de correo
$smtpClave = "rczZH@I5xF";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "mail@pulidosds.com";



$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";




// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Coral - mensaje desde el sitio"; // Este es el titulo del email.
$mensajeHtml = "Mensaje nuevo desde el sitio...<br>Nombre: {$nombre}<br>Email: {$email}<br>Asunto: {$asunto}<br>Mensaje: {$mensaje}<br>----------------------------------------" ;
$mail->Body = "{$mensajeHtml} <br><br><br><br>Sitio Realizado por Coral<br>"; // Texto del email en formato HTML
// FIN - VALORES A MODIFICAR //

?>
