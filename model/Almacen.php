<?php

class Almacen
{

  private $IdAlmacen;
  private $Cantidad;

  private $C_Producto;

  function __construct()
  {
    $this->IdAlmacen = null;
  }

  public function __set($atributo, $value)
  {
    if (property_exists($this, $atributo)) {
      $this->$atributo = $value;
    }else {
      echo "Error al encontrar Atributo SET {$atributo} .";
    }
  }

  public function __get($atributo)
  {
    if (property_exists($this, $atributo)) {
      return $this->$atributo;
    }else {
      return "Error al encontrar Atributo GET {$atributo} .";
    }

  }

}

?>
