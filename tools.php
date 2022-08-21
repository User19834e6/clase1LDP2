<?php

  /**
   * Define si la fecha ingresada es menor a hoy
   * @param $fecha: fecha a validar
   * @return bool indica si la fecha es menor a hoy   
   */
  function fechaMenorHoy($fecha){
    $fechaHoy = date("Y-m-d");
    if($fecha < $fechaHoy){
      return true;
    }
    else{
      return false;
    }
  }
?>