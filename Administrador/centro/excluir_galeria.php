<?php
    require_once '../Classe/Loja.php';
    $l = new Loja();

    if (isset($_GET['id'])) {
      $id = addslashes($_GET['id']);
      $l->excluirFotoGaleriaCentro($id);
      header('location:lojas.php');
    }
?>


