<?php


class ManagePage
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function MenuIndex()
  {

    switch ($this->Modo) {

      case 'AccesDenied':
        include 'view/headerIn.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Acceso denegado</p>
        </div>
        <?php
        include 'view/bodyIn.php';
        include 'view/footerIn.php';
        break;

      case 'ErrUserInexitente':
        include 'view/headerIn.php';
        ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Usuario Inexistente</p>
        </div>
        <?php
        include 'view/bodyIn.php';
        include 'view/footerIn.php';
        break;

      case 'ErrPass':
        include 'view/headerIn.php';
        ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>¡ERROR!</strong> <p>Error en la contraseña</p>
        </div>
        <?php
        include 'view/bodyIn.php';
        include 'view/footerIn.php';
          break;

      case 'CampLlenos':
          include 'model/session.php';
          include 'model/login.php';
          include 'model/ConsultasBasicas.php';
          include 'model/conexion.php';
          include 'controller/ctrLogin.php';
          include_once 'model/SED.php';
          $login = new Login($_POST['user'],$_POST['pass']);
          $manLogin = new LoginManager();
          $manLogin->Autentificacion($login);
          break;

      default:
        include 'view/headerIn.php';
        include 'view/bodyIn.php';
        include 'view/footerIn.php';
        break;
    }
  }
  public function MenuAdmin()
  {
    switch ($this->Modo) {
      case 'gProduct':
        include 'headerAdmin.php';
        include 'bodyProduct.php';
        include 'footerAdmin.php';
        break;

      case 'cerrarSesion':
        session_start();
        session_destroy();
        header("Location: ../index.php");
        break;

      default:
        include 'headerAdmin.php';
        include 'bodyAdmin.php';
        include 'footerAdmin.php';
        exit;
        break;
    }
  }

}


?>
