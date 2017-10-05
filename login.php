<?php
require_once("funciones.php");
// si el usuario esta logueado redirecciono a pagina de inicio
  if(estaLogueado()) {
    header("location:inicio.php");exit;
  }
//declaro array de errores vacio !
  $errores = [];

//si me envian algo por post, entro a este if
  if ($_POST) {
	 // en el array "errores", declarado vacio anteriormente, guardo los errores que devuelve la validacion, solo en caso de que existan los mismos.
    $errores = validarLogin($_POST);

// si valirdarLogin , no me devuelve ningun error, es decir, SI MI ARRAY ERRORES SE ENCUENTRA VACIO, entro al if
    if(empty($errores)) {
	// me guardo en la variable $usuario los datos del usuario que se quiere loguear
      $usuario = buscarPorMail($_POST["mail"]);
	 // guardo al ID del usuario en session.
      loguear($usuario);

	  // si checkean "recordarme" guardo al usuario en su cookie por 30 dias
      if (isset($_POST["recordame"])) {
        setcookie("idUser", $usuario["id"], time() + 60 * 60 * 24 * 30);
      }
// redirecciono al usuario a su perfil
      header("location:perfilDeUsuario.php?id=" . $usuario["id"]);exit;
    }
  }
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
  <title>Inicio</title>
</head>

<body>
  <header class="main-header">
    <div class="logo">
      <a href="home.php"><img src="images/cubiertos.svg" alt="logo">CookHub</a>
    </div>
    <nav class="nav-container">
      <input type="checkbox" id="abreNav">
      <label for="abreNav" class="open"><span class="ion-navicon-round"></span></label>
      <ul>
          <li>
            <a href="home.php">
              Inicio
            </a>
            <label for="abreNav" class="close"><span class="ion-close-circled"></span></label>
          </li>
          <li>
            <a href="#">
              Eventos
            </a>
          </li>
          <li>
            <a href="#conocenos">
            Conocenos
            </a>
          </li>
          <li>
          <a href="#">FAQ's</a>
        </li>
      <ul/>
    </nav>
    <div class="nav-right">
        <a href="registro.php">Registrate</a>
    </div>
  </header>

  <div class="login-container">
    <div class="form-box">
      <h2>Ingresa para disfrutar las mejores comidas</h2>
      <form class="login-box" action="" method="post">
        <input type="email" name="mail" id="mail" required placeholder="Correo Electronico">
        <br>
        <br>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <br>
        <br>
        <button type="submit" name="login">
          Ingresa</button>
      </form>
      <br>
      <span class="recover-password">
        <a href="recover.html">¿Olvidaste tu contraseña?</a>
      </span>
      <span class="register-link">No tenes una cuenta? <a href="registro.php">Registrate acá</a></span>
    </div>


  </div>
</body>

</html>
