<?php

header('Content-type: text/json');
header('Content-type: application/json');

if($_POST["accion"] == "enviar" && $_POST["nombre"] != "" && $_POST["correo"] != "" && $_POST["telefono"] != ""){

	$send['code'] = 'k8Dqa2C9lKgxT6kpNs1z6RgKb0r3WaCvN6RjK7rU';
	$send['nombre'] = $_POST["nombre"];
	$send['correo'] = $_POST["correo"];
	$send['telefono'] = $_POST["telefono"];
	$send['mensaje'] = $_POST["mensaje"];
	$send['tipo'] = 3;

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.izusushi.cl/mail_jardin');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send));
    if(!curl_errno($ch)){
    $resp_email = json_decode(curl_exec($ch));
    curl_close($ch);
    if($resp_email->{'op'} == 1){
        // ALERTAR ERROR //
        $info['op'] = 1;
    }
    if($resp_email->{'op'} != 1){
        // ALERTAR ERROR //
        $info['op'] = 2;
        $info['msj'] = "Error: Mensaje no fue enviado";
    }
	}else{
		$info['op'] = 2;
		$info['msj'] = "Error: Mensaje no fue enviado";
	}
   
}else{
    $info['op'] = 2;
    $info['msj'] = "Error: Debe Completar los Campos";
}

echo json_encode($info);

?>