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
      if ($this->AccesPermited($datos['estado'])==true) {

        if ($login->getPassword()==$datos['contrasena']) {
          session_start();
          $ses = new UsuarioSesion($login);
          $ses->crearSesion();
          $this->TipoUsuario($datos['idTipoUsuario']);
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

  public function TipoUsuario($tipo)
  {
    if ($tipo==1) {
      header("Location: view/menuAdmin.php");
    }else {
      if ($tipo==2) {

      }else {
        if ($tipo==3) {

        }else {
          header('Location: index.php?modo=AccesDenied');
        }
      }
    }
  }

}

?>
