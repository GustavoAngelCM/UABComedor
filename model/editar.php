<?php

class Editar
{

  public function editarCat($categoria, $conn)
  {
    $id = $categoria->IdCategoria;
    $name = $categoria->NombreCategoria;
    $error = 1;

    try {

      $conn->beginTransaction();

      $cat_update = 'UPDATE categoriaProducto SET nombreCategoria = :nombreCategoria WHERE idCatProducto = :idCatProducto';

      $stmtCat = $conn->prepare($cat_update);

      $stmtCat->bindParam(':idCatProducto', $id);
      $stmtCat->bindParam(':nombreCategoria', $name);

      $stmtCat->execute();

      $conn->commit();
      $error = 0;

    } catch (PDOException $e) {
      $error = 1;
      $conn->rollBack();
    }

    return $error;
  }

}

?>
