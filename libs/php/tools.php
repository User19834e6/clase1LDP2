<?php

/**
 * Limpia cadenas
 */
  function limpiarCadena($cadena)
  {
    $cadena = htmlspecialchars($cadena);
    return $cadena;
  }

  function limpiarEntradas(){
    foreach($_POST as $key => $value){
      $_POST[$key] = limpiarCadena($value);
    }
  }


?>