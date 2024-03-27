<?php
    require_once '../Classe/Aba.php';
    $a = new Aba;

    if (isset($_GET['id'])) {
        $id = addslashes($_GET['id']);
        $a->excluirAba($id);

        echo '<script>alert(Excluido com sucesso!)</script>';
    }
?>