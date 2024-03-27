<?php
    require '../Classe/Parceiro.php';
    $p = new Parceiro();

    if (isset($_GET['id'])) {
        $id = addslashes($_GET['id']);
        $p->excluirParceiro($id);


        header('location: https://cabofriovirtualshopping.com/Administrador');
    }
?>