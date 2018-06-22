<?php
	echo "Iniciando proceso de transferencia de archico</BR>";
	echo "INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL, Daniela Aguilar, danix.jpg)";
	
	//conexion  a la BD
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "bdusuarios";

	$bandera_conexion = true;
	$conexion = mysqli_connect ($servername,$username,$password,$database);
	
	
	//iniciar la transferencia el archivo//1. validar si se presionó un submit con un método post en el formulario
	if(isset ($_POST["submit"])){
		Echo "<BR> Se presionó un botón submit con método post</BR>";
		//$_Files requiere el nombre el campo del formulario y
		//requiere de un nombre temporal mientras el archivo está en transito
		
	$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
	$archivoDestino = "imagenes/".$_FILES["fileToUpload"]["name"];
		echo "El archivo a subir es: ".$archivoDestino."</BR>";
		
	$imageFileType = pathinfo($archivoDestino,PATHINFO_EXTENSION);
		
	//Variable que valida que el archivo sea de tipo imagen
	$check = getimagesize($archivoOrigen);
		
	Echo "Extenisión del archivo: ".$imageFileType."</BR>";
	}
	if ($check!==false){
			echo "el archivo es una imagen</BR>";
			//transfiriendo el archivo
			move_uploaded_file($archivoOrigen,$archivoDestino);
			//transfiriendo la URL a la BD
			$query = "INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL,'Kenya','".$archivoDestino."')";
			Echo "Query a ejecutar: ".$query."</br>";
			//ejecutando Query de insercion
			if($query_a_ejecutar = mysqli_query($conexion, $query)){
				Echo "Query ejecutado correctamente</br>";
				Header ("Refresh:25; url=prac7.html");
			}else{
				echo "El archivo No es una imagen </BR>";
			}
		}
?>