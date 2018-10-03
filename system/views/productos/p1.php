<?php
if(isset($_POST["tokenId"])){

  if($_POST["tokenId"] === $_SESSION["__TOKEN"]){

    require_once('system/packages/sendmail/main.class.php');

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

  }
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Heluim | Producto1</title>

  </head>
  <body>
    <form method="post">
      <input type="hidden" value="<?= $_SESSION["__TOKEN"]; ?>" name="tokenId">
      <input type="submit" name="enviar" value="Enviar">
    </form>
  </body>
</html>
<?php } ?>
