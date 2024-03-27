<?php

    require_once '../Classe/Aba.php';
    $a = new Aba();

    if (isset($_GET['id'])) {
      $id = addslashes($_GET['id']);
      $a->excluirLoja($id);
      header('location: https://cabofriovirtualshopping.com/Administrador ');
    }
?>

