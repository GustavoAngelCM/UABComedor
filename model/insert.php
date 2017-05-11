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

  public function insertarMetrica($metrica, $conn)
  {
    $id = $metrica->IdMetrica;
    $name = $metrica->NombreMetrica;
    $abrev = $metrica->Abreviatura;
    $error = 1;
    try {

      $conn->beginTransaction();

      $met_insert = 'INSERT INTO udiadmedida (idUnidMedida, nombre, abreviatura)
                    VALUES (:idUnidMedida, :nombre, :abreviatura);';

      $stmtMet = $conn->prepare($met_insert);

      $stmtMet->bindParam(':idUnidMedida', $id);
      $stmtMet->bindParam(':nombre', $name);
      $stmtMet->bindParam(':abreviatura', $abrev);

      $stmtMet->execute();

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
