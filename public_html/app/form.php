<?php
// Force PHP to use the UTF-8 charset
header('Content-Type: text/html; charset=utf-8');
$errors = [];
$json_return = [];

if (!function_exists('post')) require_once('../modules/security/security.php');


$name = post('nombre');
$email = post('email');
$message = post('mens');

if (empty($name)) {
    $errors[] = 'El campo nombre no puede estar vacío.';
}

if (empty($email)) {
    $errors[] = 'El campo email no puede estar vacío.';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email inválido';
}

if (empty($message)) {
    $errors[] = 'El campo consulta no puede estar vacío.';
}


if (empty($errors)) {
    date_default_timezone_set('America/Sao_Paulo');
    // $toEmail = 'glaucius_zacher@hotmail.com';
    $toEmail = 'orozco8@adinet.com.uy';
    // Define and Base64 encode the subject line
    $subject_text = 'Contacto através de losorozco.com';
    $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';
    // Add custom headers
    $headers = 'Content-Type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    $headers .= 'From: ' . $email;

    // Define and Base64 the email body text
    $mess = "<h4>De: $name ($email)</h4><p>$message</p>";
    $mess_mail = chunk_split(base64_encode($mess), 70, "\r\n");

    // Send mail with custom headers
    if (@mail($toEmail, $subject, $mess_mail, $headers)) {
        $json_return['status'] = 0;
        $json_return['response'] = 'Hemos recibido su mensaje y le contestaremos a la brevedad.<br>Gracias por su preferencia!';
        mail('glaucius_zacher@hotmail.com', $subject, $mess_mail, $headers);
    } else {
        $json_return['status'] = 1;
        $json_return['response'] = 'Ha ocurrido un error, por favor intente nuevamente.';
        $json_return['message'] = $message;
        $json_return['name'] = $name;
        $json_return['email'] = $email;
    }
} else {
    $allErrors = join('<br>', $errors);
    $json_return['status'] = 2;
    $json_return['response'] = $allErrors;
    $json_return['message'] = $message;
    $json_return['name'] = $name;
    $json_return['email'] = $email;
}
echo json_encode($json_return);
