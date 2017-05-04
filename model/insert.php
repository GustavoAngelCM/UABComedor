<?php

class Insert
{

  public function insertarCategoria($cat, $conn)
  {
    $id = $cat->IdCategoria;
    $name = $cat->NombreCategoria;

    try {

      $conn->beginTransaction();

      $cat_insert = 'INSERT INTO categoriaProducto (idCatProducto, nombreCategoria)
                    VALUES (:idCatProducto, :nombreCategoria)';

      $stmtCat = $conn->prepare($cat_insert);

      $stmtCat->bindParam(':idCatProducto', $id);
      $stmtCat->bindParam(':nombreCategoria', $name);

      $stmtCat->execute();

      $conn->commit();

    } catch (PDOException $e) {
      header("Location: menuAdmin.php?modo=eRegCat");
      $conn->rollBack();
    }

  }

}

?>
