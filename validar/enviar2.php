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
$smtpHost = "novus.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "mails@novus.com.ar";  // Mi cuenta de correo
$smtpClave = "Coral1826";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "pgfossa@coralweb.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
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

$mail->Subject = "Novus - mensaje desde el sitio"; // Este es el titulo del email.
$mensajeHtml = "Mensaje nuevo desde el sitio2...<br>Nombre: {$nombre}<br>Email: {$email}<br>Tel: {$tel}<br>Asunto: {$asunto}<br>Mensaje: {$mensaje}<br>----------------------------------------" ;
$mail->Body = "{$mensajeHtml} <br><br><br><br>Sitio Realizado por Coral<br>"; // Texto del email en formato HTML
// FIN - VALORES A MODIFICAR //

?>
