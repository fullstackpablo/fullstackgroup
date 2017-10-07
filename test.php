<?php
// traigo hoja de funciones
  require_once("funciones.php");
// si la persona esta logueada, la redirijo al inicio.
  if(estaLogueado()) {
    header("location:inicio.php");exit;
  }
//armo un array de paises para "forichear" en un select
  $paises = [
    "Ar" => "Argentina",
    "Br" => "Brasil",
    "Co" => "Colombia",
    "Fr" => "Francia"
  ];

  //declaro variables vacias para persistir datos

  $nombre = "";
  $usuario = "";
  $edad ="";
  $mail = "";

// declaro  array de errores vacio
  $errores = [];
// si me llega algo por post entro a este if
  if ($_POST) {
    // valido los datos del form y me guardo los errores en $errores
    $errores = validarInformacion($_POST);
// si no tengo errores, entro a este if
    if (count($errores) == 0) {
// guardo la imagen y en caso de que haya problemas, guardo el error aqui
      $errores = guardarImagen("imgPerfil", $errores);
// si tampoco hubo error en la carga de la imagen entro a este if
      if (count($errores) == 0) {
// creo un array con los datos por $_POST y lo guardo en $usuario
        $usuario = crearUsuario($_POST);
// guardo ese array en mi JSON
        guardarUsuario($usuario);
// redirecciono a felicidad
        header("Location:felicidad.php");exit;
      }
    }

// si no tuve errores de validacion, persisto los datos.
    if (!isset($errores["nombre"])) {
        $nombre = $_POST["nombre"];
    }
    if (!isset($errores["edad"])) {
        $edad = $_POST["edad"];
    }
    if (!isset($errores["mail"])) {
        $mail = $_POST["mail"];
    }
    if (!isset($errores["usuario"])) {
        $usuario = $_POST["usuario"];
    }



  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
<!-- en caso de haber errores los imprimo usando foreach -->
    <?php if(count($errores) > 0) { ?>
      <ul>
          <?php foreach($errores as $error) { ?>
            <li>
              <?=$error?>
            </li>
          <?php } ?>
      </ul>
    <?php } ?>
    <form class="" action="test.php" method="post" enctype="multipart/form-data">
      <div class="">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?=$nombre?>">
      </div>
      <div class="">
        <label>Usuario:</label>
        <input class="" type="text" name="usuario" value="<?=$usuario?>">
      </div>
      <div class="">
        <label>Mail:</label>
        <input type="text" name="mail" value="<?=$mail?>">
      </div>
      <div class="">
        <label>Edad:</label>
        <input type="text" name="edad" value="<?=$edad?>">
      </div>
      <div class="">
        <label>Contraseña:</label>
        <input type="password" name="password" value="">
      </div>
        <div class="">
          <label>Confirmar contraseña:</label>
          <input type="password" name="cpassword" value="">
        </div>
      <div class="">
        <label for="">Paises</label>
        <select class="" name="pais">
			<option value="">Elegir</option>
          <?php
		  // "foricheo" el array de paises y persisto en caso de ya haya sido seleccionado
          foreach($paises as $codigo => $pais) { ?>
            <?php if($codigo == $_POST["pais"]) { ?>
              <option value="<?=$codigo?>" selected>
                <?=$pais?>
              </option>
            <?php } else { ?>
              <option value="<?=$codigo?>">
                <?=$pais?>
              </option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="">
        <label for="">Imagen de perfil:</label>
        <input type="file" name="imgPerfil" value="">
      </div>
      <div class="">
        <input type="submit" name="enviar" value="Enviar">
      </div>
    </form>

	<br><br><br>
	Ya tenes usuario ?<a href="login.php"> LOGUEATE!</a>
  </body>
</html>
