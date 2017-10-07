<?php
	if ($_FILES["profile_pic"]["error"] == UPLOAD_ERR_OK){
		// Capturo el nombre que escribió el usuario
		$nombreImagen = $_POST["mail"];

		// Capturo el nombre
		$nombre = $_FILES["profile_pic"]["name"];

		// Aca tenemos el archivo en si
		$archivo = $_FILES["profile_pic"]["tmp_name"];

		// Obtenemos la extensión del archivo
		$ext = pathinfo($nombre, PATHINFO_EXTENSION);

		// Armo la ruta donde quiero la imagen
		$miArchivo = dirname(__FILE__) . "/users/" . $nombreImagen . "." . $ext;

		// Guardamos la imagen
		move_uploaded_file($archivo, $miArchivo);

		// Confirmo subida
		echo "<h2>Se subió tu archivo</h2>";
	} else {
		echo "<h1>No vino la imagen </h1>";

	}

?>
