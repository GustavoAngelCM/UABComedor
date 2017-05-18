<?php

class Despacho
{

  private $IdDespacho;
  private $CantidadRetirada;
  private $PrecioRetiro;
  private $FechaRetiro;
  private $Observaciones;

  private $C_Almacen;
  private $C_Plato;
  private $C_Usuario;

  function __construct($cantidad, $precio, $fecha, $observaciones, $almacen, $plato, $usuario)
  {
    $this->IdDespacho = null;
    $this->CantidadRetirada = $cantidad;
    $this->PrecioRetiro = $precio;
    $this->FechaRetiro = $fecha;
    $this->Observaciones = $observaciones;
    $this->C_Almacen = $almacen;
    $this->C_Plato = $plato;
    $this->C_Usuario = $usuario;
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
