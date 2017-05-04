<?php

class ManageCategoria
{

  private $Conexion;

  function __construct($conn)
  {
    $this->Conexion =$conn;
  }

  public function registrarCategoria($name)
  {
    $consulta = new ConsultasBasicas();
    $cat = new Categoria($name);

    $existe =  $consulta->existeCategoria($name, $this->Conexion);

    if ($existe == 0) {
      $insert = new Insert();
      $insert->insertarCategoria($cat, $this->Conexion);
      header("Location: menuAdmin.php?modo=rExitoCat");
    }else {
      header("Location: menuAdmin.php?modo=eDupCat");
    }

  }

  public function listaCategoria()
  {
    $consulta = new ConsultasBasicas();
    $listaCate = $consulta->listaCategorias($this->Conexion);
    $listArray = array();
    $i = 0;

    foreach ($listaCate as $listaC) {
      $cat = new Categoria($listaC['nombreCategoria']);
      $cat->IdCategoria = $listaC['idCatProducto'];
      $listArray[$i] = $cat;
      $i++;
    }

    return $listArray;

  }

}

?>
