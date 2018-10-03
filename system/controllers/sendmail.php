<?php
require_once('../packages/sendmail/main.class.php');

$mensaje = new sendMail();

$mensaje->name = "Diego Luna";
$mensaje->mail = "dluna88@gmail.com";
$mensaje->message = "Hola, esta es una prueba de sendmail class";
$mensaje->domain = "devslw.com";

if($mensaje->send()){
  echo "Mensaje enviado";
}else{
  echo $mensaje->error_description;
}

?>
