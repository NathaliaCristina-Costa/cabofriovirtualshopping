<?php
    require_once '../Classe/Loja.php';
    $l = new Loja();

    if (isset($_GET['id'])) {
      $id = addslashes($_GET['id']);
      $l->excluirLojaCentro($id);
      header('location: https://cabofriovirtualshopping.com/Administrador/jardim/lojas.php');
    }
?>

