<?php

  
  /** Crea y retorna la conexión a la db */
	function ConexionDB()
	{
		$servername = "localhost";
		$database = "encuesta";
		$username = "root";
		$password = "";

		$sql = "mysql:host=$servername;dbname=$database;";
		$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
		try { 
			$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
			return $my_Db_Connection;
		} catch (PDOException $error) {
			//echo 'Connection error: ' . $error->getMessage();
			return NULL;
		}
	}

  /**
   * Almacena una respuesta en base de datos
   */
  function nuevaRespuesta($nombre, $fecha, $color, $mascota){

    $conn = ConexionDB();
    if($conn == null) return false;

    // $sql = "INSERT INTO `respuestas`(`nombre`, `fecha`, `color`, `mascota`) 
    //   VALUES ('$nombre','$fecha','$color','$mascota')";

    // PROCEDIMIENTO ALMACENADO CREAR_RESPUESTA

    // USE encuesta;
    // DELIMITER //
    // CREATE PROCEDURE CrearEncuesta
    // (
    //     IN _nombre VARCHAR (25),
    //     IN _fecha date,
    //     IN _color VARCHAR (25),
    //     IN _mascota VARCHAR (25)
    // )
    // BEGIN 
    // 	INSERT INTO respuestas (nombre, fecha, color, mascota) VALUES (_nombre, _fecha, _color, _mascota);
    // //

    $sql = "CALL CrearRespuesta ('$nombre','$fecha','$color','$mascota');";

    $stm = $conn->prepare($sql);
    if($stm->execute()){
      return true;
    }
    else{
      return false;
    }
  }


  function traerRespuetasPorfecha($fechaIni, $fechaFin){
    $conn = ConexionDB();
    if($conn == null) return false;
    // $sql = "SELECT `id`, `nombre`, `fecha`, `color`, `mascota` 
    //         FROM `respuestas` 
    //         WHERE fecha > '$fechaIni' 
    //         AND fecha < '$fechaFin'; ";

    // DELIMITER //
    // CREATE PROCEDURE MostrarRespuesta (IN _fechaIni date, IN _fechaFin date)
    // BEGIN
    // 	SELECT * FROM respuestas WHERE fecha > _fechaIni AND fecha < _fechaFin;
    // END
    //
    $sql = "CALL MostrarRespuesta('$fechaIni', '$fechaFin');";

    $stm = $conn->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }