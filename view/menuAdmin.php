<?php

  session_start();
  if (isset($_SESSION['user'])) {
    include '../controller/ctrIndex.php';
    if (isset($_GET['modo'])) {
        $menu = new ManagePage($_GET['modo']);
        $menu->menuAdmin();
    }else {
      $menu = new ManagePage("default");
      $menu->menuAdmin();
    }
  }else {
    header("Location: ../index.php?modo=AccesDenied");
  }

?>
