<?php

class LoginManager
{
  private $ConsultasBas;

  public function __construct()
  {
    $this->ConsultasBas = new ConsultasBasicas();
  }

  public function Autentificacion($login)
  {
    $userDto = $login->getUsuario();
    $datos = $this->ConsultasBas->getUsuarioDB($userDto);
    if ($datos) {
      $login->setTipoUser($datos['idTipoUsuario']);
      $login->setEstado($datos['estado']);
      $login->setEmail($datos['email']);
      //echo $login->getEmail();
      if ($this->AccesPermited($datos['estado'])==true) {

        if ($login->getPassword()==$datos['contrasena']) {
          $this->TipoUsuario($datos['idTipoUsuario'], $login);
        }else {
            header("Location: index.php?modo=ErrPass");
        }
      }else {
        header('Location: index.php?modo=AccesDenied');
      }
    }else {
      header('Location: index.php?modo=ErrUserInexitente');
    }

  }

  public function AccesPermited($estado)
  {
    if ($estado==1) {
      return true;
    }else {
      return false;
    }
  }

  public function TipoUsuario($tipo, $login)
  {
    if ($tipo==1) {
      $mnuAdmin = new ManagePage("default");
      $mnuAdmin->MenuAdmin($login);

    }else {
      if ($tipo==2) {
        $mnuAdmin = new ManagePage("default");

      }else {
        if ($tipo==3) {
          $mnuAdmin = new ManagePage("default");

        }else {
          header('Location: index.php?modo=AccesDenied');
        }
      }
    }
  }

}

?>
