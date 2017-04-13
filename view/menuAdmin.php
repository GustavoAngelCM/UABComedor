<?php
  ///agrgear session
  include '../controller/ctrIndex.php';
  if (isset($_GET['modo'])) {
      $menu = new ManagePage($_GET['modo']);
      $menu->MenuAdmin();
  }else {
    $menu = new ManagePage("default");
    $menu->MenuAdmin();
  }


?>
