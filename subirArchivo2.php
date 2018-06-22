<?php
	echo "Iniciando proceso de transferencia de archico</BR>";
	//echo "INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL, Daniela Aguilar, danix.jpg)";
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "bdusuarios";

	$bandera_conexion = true;
	$conexion = mysqli_connect ($servername,$username,$password,$database);
	
	
	if(isset ($_POST["submit"])){
		Echo "<BR> Se presionó un botón submit con método post</BR>";
		
	$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
	$archivoDestino = $_FILES["fileToUpload"]["name"];
		echo "El archivo a subir es: ".$archivoDestino."</BR>";
		
	$excelFileType = pathinfo($archivoDestino,PATHINFO_EXTENSION);
		
	$check = filetype($archivoOrigen);
		
	Echo "Extenisión del archivo: ".$excelFileType."</BR>";
	}
	if ($excelFileType=="xlsx"){
			echo "el archivo es un excel</BR>";
			move_uploaded_file($archivoOrigen,$archivoDestino);
			$query = "INSERT INTO alumnos (id_usuario, nombre_usuario, excel) VALUES (NULL,'Kenya','".$archivoDestino."')";
			Echo "Query a ejecutar: ".$query."</br>";
			if($query_a_ejecutar = mysqli_query($conexion, $query)){
				Echo "Query ejecutado correctamente</br>";
				Header ("Refresh:5; url=formularioArchivo2.html");
			}else{
				echo "El archivo No es un excel </BR>";
			}
		}
?>