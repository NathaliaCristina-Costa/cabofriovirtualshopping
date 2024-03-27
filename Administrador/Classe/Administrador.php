<?php

    require_once 'Conexao.php';

    class Administrador
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getConexao();
        }

        public function logar($senha){
            $cmd = $this->pdo->prepare("SELECT id, senha FROM admin WHERE senha = :s");
            $cmd->bindValue(":s", $senha);
            $cmd->execute();

            if ($cmd->rowCount()>0) {
                $res = $cmd->fetch();
                session_start();
                $_SESSION['id'] = $res['id'];
                return true;
            }else{
                return false;
            }
        }

        public function verificacaoAcesso($path){
            if (!$_SESSION['id']) {
                header('location:'.$path);
                exit;
            }
        }
    }