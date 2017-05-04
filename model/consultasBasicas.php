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

  public function existeCategoria($name, $conn)
  {
    $consulta = $conn->prepare('SELECT * FROM categoriaProducto where nombreCategoria=:name');
    $consulta->bindParam(':name', $name);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro) {
      return $registro;
    }else {
      $registro = 0;
      return $registro;
    }
  }

  public function listaCategorias($conn)
  {
    $consulta = $conn->prepare('SELECT * FROM categoriaProducto');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}


?>
