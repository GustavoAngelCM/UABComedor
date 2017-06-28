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

      case 'gIngresarProducto':
        include 'headerAdmin.php';
        include 'bodyIngresarProducto.php';
        include 'footerAdmin.php';
        break;

      case 'detalleAlmacen':
        include 'headerAdmin.php';
        include 'bodyDetalleAlmacen.php';
        include 'footerAdmin.php';
        break;

      case 'registroExitosoAlmacen':
        include 'headerAdmin.php';
        ?>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><h4><i class="fa fa-check-circle"></i>¡Exito!</h4></strong> <p>Al Registrar el Producto en el Almacen...</p>
        </div>
        </div>
        </div>
        <?php
        include 'bodyIngresarProducto.php';
        include 'footerAdmin.php';
        break;

      case 'rProductoAlmacen':
      if (isset($_POST['datos'])) {
        include '../model/conexion.php';
        include '../model/ConsultasAlmacen.php';
        include '../model/Almacen.php';
        include '../model/DetalleAlmacen.php';
        include '../controller/ctrAlmacen.php';
        include '../controller/ctrDetalleAlmacen.php';

        $con = new Conexion();

        $manejadorAlmacen=new ConsultasAlmacen($con);
        $datosUsuario=$manejadorAlmacen->idUsuarioAlmacen($_SESSION['user']);
        $almacen=new Almacen();
        $almacen->IdProducto=$_POST['producto'];
        $almacen->Cantidad=$_POST['cantidadProducto'];

        $detalleAlmacen=new DetalleAlmacen();
        $detalleAlmacen->CantidadIngresada=$_POST['cantidadProducto'];
        $detalleAlmacen->FechaRegistro=$_POST['fechaIngeso'];
        $detalleAlmacen->PrecioTotal=$_POST['precioProducto'];
        $detalleAlmacen->IdUsuario=$datosUsuario['idUsuario'];
        $detalleAlmacen->FechaVencimiento=$_POST['fechaVencimiento'];
        if ($detalleAlmacen->FechaVencimiento=="")
          $detalleAlmacen->FechaVencimiento=null;

        $existeProductoEnAlmacen=$manejadorAlmacen->existeProductoAlmacen($almacen->IdProducto);
        $ctrAlmacen=new ctrAlmacen($con);
        $ctrDetalleAlmacen=new ctrDetalleAlmacen($con);


        if ($existeProductoEnAlmacen==true) {
          // Existe producto
          $ctrAlmacen->actualizarAlmacen($almacen);
          $datoAlmacen=$manejadorAlmacen->idAlmacen($almacen->IdProducto);
          $detalleAlmacen->IdAlmacen=$datoAlmacen['idAlmacen'];

          $ctrDetalleAlmacen->insertarDetalleAlmacen($detalleAlmacen);

          header("Location: menuAdmin.php?modo=registroExitosoAlmacen");

        }
        else {
          // No existe producto
          $ctrAlmacen->registrarAlmacen($almacen);
          $datoAlmacen=$manejadorAlmacen->idAlmacen($almacen->IdProducto);
          $detalleAlmacen->IdAlmacen=$datoAlmacen['idAlmacen'];

          $ctrDetalleAlmacen->insertarDetalleAlmacen($detalleAlmacen);

          header("Location: menuAdmin.php?modo=registroExitosoAlmacen");


        }
      }else {
        header("Location: menuAdmin.php?modo=forVacioProd");
      }
      break;

        break;
      // CRUD DE CATEGORIA Y METRICA START
      case 'gCategoriaProducto':
        include 'headerAdmin.php';
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'forVacioCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-exclamation-triangle"></i>¡Advertencia!</strong> <p>Por Favor llene el Formulario</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'rExitoCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Exito!</strong> <p>Al Registrar Categoria</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'eDupCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> <i class="fa fa-times-circle"></i> ¡ERROR!</strong> <p>La Categoria ya Existe</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'eRegCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> <i class="fa fa-times-circle"></i> ¡ERROR!</strong> <p>Error al Registrar</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'rCat':
        if (isset($_POST['datos'])) {
          include '../model/conexion.php';
          include '../model/categoria.php';
          include '../model/consultasBasicas.php';
          include '../model/insert.php';
          include '../controller/ctrCategoria.php';
          $con = new Conexion();
          $manage = new ManageCategoria($con);
          $manage->registrarCategoria($_POST['nombre']);
        }else {
          header("Location: menuAdmin.php?modo=forVacioCat");
        }
        break;

      case 'rMet':
        if (isset($_POST['datos'])) {
          include '../model/conexion.php';
          include '../model/metrica.php';
          include '../model/consultasBasicas.php';
          include '../model/insert.php';
          include '../controller/ctrMetrica.php';
          $con = new Conexion();
          $manage = new ManageMetrica($con);
          $manage->crear($_POST['nombre'], $_POST['abrev']);
        }else {
          header("Location: menuAdmin.php?modo=forVacioCat");
        }
        break;

      case 'eCat':
        if (isset($_POST['datos'])) {
          include '../model/conexion.php';
          include '../model/categoria.php';
          include '../model/consultasBasicas.php';
          include '../model/editar.php';
          include '../controller/ctrCategoria.php';
          $con = new Conexion();
          $manage = new ManageCategoria($con);
          $manage->editar($_POST['nombre'], $_POST['id'], $_POST['name']);
        }else {
          header("Location: menuAdmin.php?modo=forVacioCat");
        }
        break;

      case 'errEditCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong> <i class="fa fa-times-circle"></i> ¡ERROR!</strong> <p>Error al Editar Producto</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'editCat':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Exito!</strong> <p>Al Editar Categoria</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      case 'rExitoMet':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Exito!</strong> <p>Al Registrar Unidad de Medida</p>
        </div>
        <?php
        include 'bodyCatProducto.php';
        include 'footerAdmin.php';
        break;

      // CRUD DE CATEGORIA Y METRICA END
// CRUD PRODUCTOS START /////////////////////////////////////////////////////////////////////
      case 'rProd':
        if (isset($_POST['datos'])) {
          include '../model/conexion.php';
          include '../model/categoria.php';
          include '../model/consultasBasicas.php';
          include '../model/insert.php';
          include '../model/metrica.php';
          include '../model/producto.php';
          include '../controller/ctrProducto.php';
          $con = new Conexion();
          $manage = new ManageProducto($con);
          $manage->insertar($_POST['nombre'], $_POST['categoria'], $_POST['metrica']);
        }else {
          header("Location: menuAdmin.php?modo=forVacioProd");
        }
        break;

      case 'exiRegProd':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-check-circle"></i>¡Exito!</strong> <p>Al Registrar Producto</p>
        </div>
        <?php
        include 'bodyProduct.php';
        include 'footerAdmin.php';
        break;

      case 'errRegProd':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-times-circle"></i>Error!</strong> <p>Al Registrar Producto</p>
        </div>
        <?php
        include 'bodyProduct.php';
        include 'footerAdmin.php';
        break;

      case 'pExi':
        include 'headerAdmin.php';
        ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-times-circle"></i>¡Error!</strong> <p>Al Registrar Producto Existente</p>
        </div>
        <?php
        include 'bodyProduct.php';
        include 'footerAdmin.php';
        break;

// CRUD PRODUCTOS END //////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////// CRUD DESPACHOS START
      case 'gDespachos':
        include 'headerAdmin.php';
        include 'despachosForm.php';
        include 'footerAdmin.php';
        break;

      case 'despacharPedidos':
        include '../model/conexion.php';
        include '../model/pedido.php';
        include '../model/PedidoConsulta.php';
        include '../model/detallePedido.php';
        include '../model/despacho.php';
        include '../model/DespachoConsulta.php';
        include '../model/DetallePedidoConsulta.php';
        include '../controller/ctrPedido.php';

        $conexion = new Conexion();
        $despachoManage = new ManageDespacho($conexion);
        $despachoManage->registrar();

        $conexion = new Conexion();
        echo "hola";
        break;
///////////////////////////////////////////////////////////////////// CRUD DESPACHOS END

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
