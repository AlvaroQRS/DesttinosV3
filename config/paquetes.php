<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$radio = $_POST['cmethod'];
header('Content-Type: application/json');
if ($name === ''){
    print json_encode(array('message' => 'Nombre es obligatorio', 'code' => 0));
    exit();
}
if ($email === ''){
    print json_encode(array('message' => 'E-mail es obligatorio', 'code' => 0));
    exit();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print json_encode(array('message' => 'Ingresa un correo Valido.', 'code' => 0));
        exit();
}
}
if ($subject === ''){
    print json_encode(array('message' => 'El telefono es olbigatorio', 'code' => 0));
    exit();
}
if ($message === ''){
    print json_encode(array('message' => 'Mensaje obligatorio', 'code' => 0));
    exit();
}
if ($radio === 'false') {
    print json_encode(array('message' => 'marque la opcion de telefono o correo', 'code' => 0));
    exit();
}
$asunto = "Experiencias";
$content="Asunto: $asunto \nDe: $name \nEmail: $email \nFecha: ".date('d/m/Y')."\nHora".date('h:i:s a')."\nTelefono: $subject"." \nMensage: $message"."\nOpción: $radio";
$recipient = "info@destinosquillabamba.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Enviado, te contactaremos lo antes posible!', 'code' => 1));
exit();
?>