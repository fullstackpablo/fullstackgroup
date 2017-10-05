<?php
	require_once "save.php";

	$errors = "";
	$isReceived = false;

	$successSave = "";
	$fields = [
		"mail" => "mail",
		"password" => "contraseña"
	];

	$values = [
		"mail" => "",
		"password" => ""
	];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$isReceived = true;
		// se recorre la variable $_POST (que en key => value)
		foreach ($_POST as $key_post => $value_post) {
			if(empty($_POST[$key_post])){ // verifico si los datos estan vacios
				$errors = "El Campo $fields[$key_post] es requerido";
			}else{ // en caso contrario persisto la data en el array values
				$values[$key_post] = $_POST[$key_post];
			}
		}
	}

	// verifico si hay errores y se hizo la peticion POST
	if ($errors == "" && $isReceived == true) {
		// reinicio el array de persistencia porque no hay errores
		$values = [
			"mail" => "",
			"password" => ""
		];
		// guardo la data con la funcion
		saveData($_POST);

		// hago un set en $successSave indicando que se guardo la data
		$successSave = "Registro guardado con exito!!!";
		header ("Location: felicidad.php");
		exit;
	}



?>

<!DOCTYPE html>
<html>

<head>
	<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width" name="viewport">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/cubiertos.ico"/>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/register-login-body.css">
  <title>Registrate</title>
</head>

<body>
  <div><?php echo $errors; ?></div>
  <div><?php echo $successSave; ?></div>
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
        <a href="login.php">Ingresá</a>
    </div>
  </header>
  <div class="register-container">
    <div class="form-box">
			<h2>Registrate para disfrutar las mejores comidas</h2>
      <form class="register" action="registro.php" method="post" id="formCheckPassword">
				<input type="text" name="name" id="name" required placeholder="Nombre de Usuario">
				<br>
        <br>
				<input type="email" name="mail" id="mail" required placeholder="Correo Electronico"
        value="<?php echo $values["mail"]; ?>">
        <br>
        <br>
        <input type="password" name="password" id="password" required placeholder="Contraseña"
        value="<?php echo $values["password"]; ?>">
        <br>
        <br>
        <input type="password" name="cfmPassword" id="cfmPassword" required placeholder="Repetir Contraseña">
        <br>
        <br>
        <div class="tos">
        <input class="check-box" type="checkbox" name="TOS" id="TOS" required>
        <label>Acepto los <a href="terminos.php">Términos y Condiciones</a> </label>
        </div>
        <br>
        <br>
        <button type="submit" >
          Registrarse</button>
					<script type="text/javascript">
					$("#formCheckPassword").validate({
										 rules: {
												 password: {
													 required: true,
															minlength: 6,
															maxlength: 12,

												 } ,

														 cfmPassword: {
															equalTo: "#password",
															 minlength: 6,
															 maxlength: 12
												 }


										 },
							 messages:{
									 password: {
													 required:"Password Requerido",
													 minlength: "Mínimo 6 caracteres",
													 maxlength: "Máximo 12 caracteres"
												 },
								 cfmPassword: {
									 equalTo: "Las contraseñas no coinciden",
									 minlength: "Mínimo 6 caracteres",
									 maxlength: "Máximo 12 caracteres"
								 }
							 }

					});
					</script>
      </form>
      <br>
      <span>Ya tenes una cuenta? <a href="login.php"> Ingresa</a></span> <!--ingresa o inicia sesion -->
    </div>
  </div>
</body>

</html>
