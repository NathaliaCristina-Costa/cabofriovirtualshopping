<?php
    require_once '../Classe/Loja.php';
    $l = new Loja();

    if (isset($_GET['id'])) {
      $id = addslashes($_GET['id']);
      $l->excluirFotoGaleriaRuaBiquinis($id);
      header('location:lojas.php');
    }
?>


