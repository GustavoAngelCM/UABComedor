<?php


class ConsultasBasicas
{
  const Tabla = 'Usuarios';
  public function getUsuarioDB($usuario)
  {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM ' . self::Tabla. ' WHERE usuario = :usuario');
    $consulta->bindParam(':usuario', $usuario);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

}


?>
