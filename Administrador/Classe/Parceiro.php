<?php
    require_once 'Conexao.php';

    class Parceiro
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getConexao();
        }

        public function cadastroParceiro($nome, $link){

            $cmd = $this->pdo->prepare("SELECT idParceiro FROM parceiros WHERE nomeParceiro = :n");
            $cmd->bindValue(":n", $nome);
            $cmd->execute();

            if ($cmd->rowCount() > 0) {
                return false;
            }else{
                $cmd = $this->pdo->prepare("INSERT INTO parceiros (nomeParceiro, link) VALUES(:n, :l)");
                
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":l", $link);

                $cmd->execute();

               
            }            
        }

        public function buscarLogoPorId($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idParceiro, logo FROM parceiros WHERE idParceiro = :id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function logoParceiros($id, $logo =array()){
            if (count($logo) > 0) {
                for ($i=0; $i < count($logo); $i++) { 
                    $nome_logo = $logo[$i];

                    $cmd = $this->pdo->prepare('UPDATE parceiros SET logo = :l WHERE idParceiro  =:idL');
                    $cmd->bindValue(':idL', $id);
                    $cmd->bindValue(':l', $nome_logo);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function buscarParceiros(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idParceiro, nomeParceiro, link FROM parceiros");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function buscarCarrosselParceiros(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT * FROM parceiros");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function excluirParceiro($id){
            $cmd = $this->pdo->prepare("DELETE FROM parceiros WHERE idParceiro = :id");
            $cmd->bindValue(':id', $id);
            $cmd->execute();
        }

        public function buscarParceiroEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM parceiros WHERE idParceiro = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function buscarLogoParceiro($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgParceiro, nomeImgParceiro FROM imagemparceiro WHERE fk_idParceiro =:id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function buscarParceiroVisualizar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM parceiros WHERE idParceiro = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarParceiro($id,$nome,$link){
            $cmd = $this->pdo->prepare('UPDATE parceiros SET nomeParceiro = :n, link = :l WHERE idParceiro  = :id' );
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':l', $link);  

            $cmd->execute();

            return true;
        }

        
    }
?>