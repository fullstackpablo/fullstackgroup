<?php
// me traigo hoja de funciones
  require_once("funciones.php");
// si NO esta logueado, redirijo al login
  if(!estaLogueado()) {
    header("location:login.php");exit;
  }
  // si esta logueado, busco al usuario por el id que me llega por $_GET
  // y me lo guardo en la variable $usuario
  $id = $_GET["id"];
  $usuario = buscarPorId($id);
// me guardo en la variable $file, la foto del usuario
  $file = glob('img/'.$usuario["usuario"].'.*');

  $file = $file[0];


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="css/styles2.css"> -->
    <link rel="shortcut icon" href="images/cubiertos.ico" />
    <link rel="stylesheet" href="css/register-login-body.css">
    <title>Perfil</title>
  </head>
  <body>
      <h1>Bienvenidos al perfil de <?=$usuario["nombre"]?></h1>
  </body>
</html>
