<!DOCTYPE html>
<html>

<head>
  <title>Respuestas</title>
  <link rel="stylesheet" href="./styles.css">
</head>

<body>
<button class="return"><a href="./index.php">Volver</a></button>
  <h1>Respuestas</h1>
  <main class="main-container">
    <form method="post">
      <fieldset>
        <label class="form__label" for="">Fecha inicial</label>
        <input class="form__input" type="date" name="fechaInicial"><br>
        <label class="form__label" for="">Fecha final</label>
        <input class="form__input" type="date" name="fechaFinal"><br>
        <input class="button" type="submit" name="btnEnviar" value="Consultar">
      </fieldset>
      <?php
      require_once "libs/php/db.php";
      require "libs/php/tools.php";
      limpiarEntradas();
      if (isset($_POST['btnEnviar'])) {
        $fechaIni = $_POST['fechaInicial'];
        $fechaFin = $_POST['fechaFinal'];
        $result = traerRespuetasPorfecha($fechaIni, $fechaFin);
        echo "<div><br>";
        foreach ($result as $row) {
          echo "<div><br>";
          echo "Nombre: " . $row['nombre'] . "<br>";
          echo "Fecha: " . $row['fecha'] . "<br>";
          echo "Color: " . $row['color'] . "<br>";
          echo "Mascota: " . $row['mascota'] . "<br>";
          echo "<br></div>";
        }
        echo "<br></div>";
      }
      ?>
    </form>
  </main>
</body>

</html>