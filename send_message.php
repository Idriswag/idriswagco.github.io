<?php

$response['status'] = 'failed';

if(!isset($_POST['email']) OR empty($_POST['email'])){
	$response['message'] = "Veuillez entrer votre adresse E-mail";
	exit(json_encode($response));
}

if(!isset($_POST['message']) OR empty($_POST['message'])){
	$response['message'] = "Veuillez entrer un message";
	exit(json_encode($response));
}


$email   = $_POST['email'];
$object  = isset($_POST['object']) ? $_POST['object'] : '';

$message = "<!DOCTYPE html>
            <html>
            <head>
                <title>Un utilisateur a envoyé un message dépuis le site web</title>
            </head>
            <body>

                <h1 style='color: #0069d9;font-weight: bold'>Doulimmo</h1>

                <h4 class='card-title'>Message depuis le site web</h4>

                <div style='width: 100%;float: left;height: 10px'></div>

                <p style='font-size:110%'>" . $_POST['message'] . "<p>
                
            </body>
            </html>";

$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type:text/html; charset=utf-8";


$mail = mail('idriswagoum@gmail.com', $subject, $message, $headers);

if (!$mail) {
    $response['message'] = "Une erreur inconnue s'est produite ! Veuillez rééssayer plus tard.";
}


$response['status'] = 'success';
$response['message'] = 'Votre message a bien été envoyé ! Nous vous remercions.';
exit(json_encode($response));

