<?php
	//Defino la funcion para salvar los datos
	function saveData($value_post){
	  //Nombre del archivo a abrir
	  $file = "people.json";

	  //extraigo el contenido y cierro el archivo
	  $db = file_get_contents($file);
	  //convierto el contendido del json en array
	  $data = json_decode($db,true); //retorna un array
		$temp = end($data); //retorno el ultimo elemento
	  $id = $temp['id']; //retorna el ultimo id
	  $id++; //aumento el id
	  $people = [
	    "id" => $id,
			"mail"=> $value_post["mail"],
	    "name" => $value_post["name"],
			"password" => password_hash( $value_post["password"], PASSWORD_DEFAULT)
	  ];

	  array_push($data, $people);
	  $data = json_encode($data);
	  file_put_contents($file, $data);
	}

	//funcion para hacer un debugger
	function dump($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";

		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}


?>
