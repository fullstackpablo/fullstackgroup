<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Subir archivo</title>
	</head>
	<body>
		<form action="procesar-archivo.php" method="post" enctype="multipart/form-data">
			<input type="text" name="usuario">
			<br>
			<input type="file" name="profile_pic" accept="image/*">
			<button type="submit">Subir Imagen</button>
		</form>
	</body>
</html>
