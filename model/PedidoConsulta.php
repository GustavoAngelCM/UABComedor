<?php

class PedidoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaPedidosPendientes()
  {
    $query = " SELECT pe.idPedido, p.nombre, pe.cantidadPlato, pe.pedidoDespachado, pe.fechaPedido
               FROM pedido pe, plato p
               WHERE pe.idPlato = p.idPlato
               AND pedidoDespachado = 0";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
