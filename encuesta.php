<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  <title>Encuesta</title>
</head>

<body>
  <!-- https://www.w3schools.com/quiztest/default.asp -->

  <button class="return"><a href="./index.php">Volver</a></button>
  <h1>Encuesta</h1>

  <main class="main-container">
    <form method="post">
      <label class="form__label" for="">Nombre </label>
      <input class="form__input" type="text" name="nombre" pattern="[A-Za-zÑñ]+"><br>
      <label class="form__label" for="">Fecha nacimiento</label>
      <input class="form__input" type="date" name="fecha"><br>
      <label class="form__label" for="">Color</label>
      <input class="form__input color" type="color" name="color"><br>
      <label class="form__label" for="">Seleccione el tipo de mascota favorita</label>
      <div class="form__radio">
        <input type="radio" name="mascota" value="perro">Perro
        <input type="radio" name="mascota" value="gato">Gato
      </div>
      <br>
      <input class="button" type="submit" name="btnEnviar" value="Enviar encuesta">
    </form>
  </main>

  <?php

  require "libs/php/db.php";
  require "libs/php/tools.php";
  limpiarEntradas();

  if (isset($_POST['btnEnviar'])) {

    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $color = $_POST['color'];
    $mascota = $_POST['mascota'];

    echo "<div><br>";
    if (nuevaRespuesta($nombre, $fecha, $color, $mascota)) {
      echo "Encuesta enviada";
    } else {
      echo "Error al enviar encuesta";
    }
    echo "<br></div>";
  }

  ?>

  <br>
</body>

</html>