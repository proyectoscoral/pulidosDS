<?php
// Ingresa tu clave secreta.....
define("CLAVE", '6LeOiXcdAAAAAEM9uMxff6NQN12wy9CMvIpW7l4V');

$token = $_POST['token'];
$action = $_POST['action'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['tel'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

// verificar la respuesta
//if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
if($arrResponse["success"] == 1 && $arrResponse["score"] >= 0.5) {
	echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "ca!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!ptcha valido";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
    echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";

	//procesador de email
	include('enviar.php');

	//fin del procesador del email


}else{
	echo "captcha invalido";
}
    // Si entra aqui, es un humano, puedes procesar el formulario
	//echo "ok!, eres un humano";
//} else {
    // Si entra aqui, es un robot....
//	echo "Lo siento, parece que eres un Robot";
//}

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    ?>
		<meta http-equiv="refresh" content="0;url=../contacto.php">
	   	<?php
} else {
    ?>
		<meta http-equiv="refresh" content="0;url=../contacto-error.php">
	   	<?php
}



?>