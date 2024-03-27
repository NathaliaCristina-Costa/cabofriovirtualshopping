<?php
    require_once '../Classe/Loja.php';
    $l = new Loja();

    if (isset($_GET['id'])) {
      $id = addslashes($_GET['id']);
      $l->excluirFotoGaleriaTamoios($id);
      header('location:lojas.php');
    }
?>


