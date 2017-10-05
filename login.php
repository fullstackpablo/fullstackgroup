

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
          <a href="#">FAQ's</a></li>
      <ul/>
    </nav>
    <div class="nav-right">
        <a href="login.php">Ingresa</a>
        <a href="registro.php">Registrate</a>
    </div>
  </header>

  <div class="login-container">
    <h2>Ingresa para disfrutar las mejores comidas</h1>
    <div class="form-box">
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
