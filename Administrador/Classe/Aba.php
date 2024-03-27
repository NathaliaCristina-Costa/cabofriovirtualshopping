<?php
    require_once 'Conexao.php';

    class Aba
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getConexao();
        }

        public function cadastrarAba($fotos = array(), $nome, $categoria){

            $cmd = $this->pdo->prepare("SELECT id FROM aba  WHERE nome = :n");
            $cmd->bindValue(":n", $nome);
            $cmd->execute();

            if ($cmd->rowCount() > 0) {
                return false;
            }else{
                $cmd = $this->pdo->prepare("INSERT INTO aba (nome, categoria) VALUES(:n, :c)");
                
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":c", $categoria);

                $cmd->execute();

                $id_aba = $this->pdo->LastInsertId();

                if (count($fotos) >0) {
                    for ($i=0; $i < count($fotos) ; $i++) { 
                        $nome_fotos = $fotos[$i];

                        $cmd = $this->pdo->prepare("INSERT INTO imagemaba(nomeImagem, fk_id) VALUES (:img, :fk)");

                        $cmd->bindValue(':img', $nome_fotos);
                        $cmd->bindValue(':fk', $id_aba);
                        $cmd->execute();
                    }
                }
            }            
        }

        public function buscarAbas(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT id, nome, categoria FROM aba");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function buscarNovasLojas($id){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idLoja, nomeLoja, freteLoja FROM novaloja WHERE fk_idAba = :fk_id");
            $cmd->bindValue(':fk_id', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function excluirAba($id){
            $cmd = $this->pdo->prepare("DELETE FROM aba WHERE id = :id");
            $cmd->bindValue(':id', $id);
            $cmd->execute();
        }

        public function buscarLojaEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM aba WHERE id = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function buscarNovaLojaEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM novaloja WHERE idLoja = :idL');
            $cmd->bindValue(':idL', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarAba($id,$nome,$categoria){
            $cmd = $this->pdo->prepare('UPDATE aba SET nome = :n, categoria = :c WHERE id = :id' );
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':c', $categoria); 

            $cmd->execute();

            return true;
        }

        public function editarNovaLoja($id,$nome,$descricao,$whats,$insta,$face, $frete, $localizacao){
            $cmd = $this->pdo->prepare('UPDATE novaloja SET nomeLoja = :nL, descricaoLoja = :dL, whatsLoja = :wL, instaLoja = :iL, faceLoja = :fL, freteLoja = :fgL, localizacaoLoja = :lL WHERE idLoja = :idL' );
            $cmd->bindValue(':idL', $id);
            $cmd->bindValue(':nL', $nome);
            $cmd->bindValue(':dL', $descricao);  
            $cmd->bindValue(':wL', $whats);
            $cmd->bindValue(':iL', $insta);
            $cmd->bindValue(':fL', $face);
            $cmd->bindValue(':fgL',$frete);
            $cmd->bindValue(':lL', $localizacao);
            

            $cmd->execute();

            return true;
        }

        public function buscarGradeAbas(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT 	id, nome FROM aba");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCapaIndex(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idImgAba, nomeImagem, nome, id FROM imagemaba JOIN aba ON fk_id = id");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function buscarCapaIndexId($id){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idLoja, nomeLoja, capaLoja, id FROM novaloja JOIN aba ON fk_idAba = id WHERE id = :id");

            $cmd->bindValue(":id", $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }
        

        public function buscarCapaAba($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgAba, nomeImagem FROM imagemaba WHERE fk_id =:id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function buscarLojaTamoiosPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idLoja, nomeLoja, freteLoja FROM novaloja WHERE fk_idAba = :fk_aba');
            $cmd->bindValue(':idT', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function cadastrarNovaLoja($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete, $fk_idAba){

            $cmd = $this->pdo->prepare("SELECT idLoja FROM novaLoja WHERE nomeLoja = :nL");
            $cmd->bindValue(":nL", $nome);
            $cmd->execute();
 
            if ($cmd->rowCount() > 0) {
                 return false;
            }else{
 
                 $cmd = $this->pdo->prepare("INSERT INTO novaLoja(nomeLoja, descricaoLoja, whatsLoja, instaLoja, faceLoja,freteLoja, localizacaoLoja, fk_idAba) VALUES (:nL, :dL, :wL, :iL, :fL, :fgL, :lj, :fk_id)");
 
                    $cmd->bindValue(":nL", $nome);
                     $cmd->bindValue(":dL", $descricao);
                     $cmd->bindValue(":wL", $whats);
                     $cmd->bindValue(":iL", $insta);
                     $cmd->bindValue(":fL", $face);
                     $cmd->bindValue(":lj", $localizacao);
                     $cmd->bindValue(":fgL", $frete);
                     $cmd->bindValue(":fk_id", $fk_idAba);
 
                     $cmd->execute();
 
                    $idLoja = $this->pdo->LastInsertId();
 
                 if (count($fotos) > 0 ) {
                     for ($i=0; $i < count($fotos) ; $i++) { 
                         $nome_imagens = $fotos[$i];
 
                         $cmd = $this->pdo->prepare("INSERT INTO imagemnovaloja(nomeImgLoja, fk_idLoja) VALUES (:nIL, :fkL)");
 
                         $cmd->bindValue(":nIL", $nome_imagens);
                         $cmd->bindValue("fkL", $idLoja);
                         $cmd->execute();
                     }
                 }
                
            }
        }

        public function buscarAbaLoja(){
            $cmd = $this->pdo->prepare("SELECT id, nome FROM aba");
            $cmd->execute();

            if ($cmd->rowCount()>0) {
                while($dados = $cmd->fetch(PDO::FETCH_ASSOC)){echo"<option value='{$dados['id']}'>{$dados['nome']}</option>";}
            }
        }

        public function buscarCapa($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idLoja, capaLoja FROM novaloja WHERE idLoja = :idLoja');
            $cmd->bindValue(':idLoja',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function capaNovaLoja($id, $capa =array()){
            if (count($capa) > 0) {
                for ($i=0; $i < count($capa); $i++) { 
                    $nome_capa = $capa[$i];

                    $cmd = $this->pdo->prepare('UPDATE novaloja SET capaLoja = :capa WHERE idLoja =:idL');
                    $cmd->bindValue(':idL', $id);
                    $cmd->bindValue(':capa', $nome_capa);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function galeriaLoja($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImaLoja, nomeImgLoja FROM imagemnovaloja WHERE fk_idLoja =:idL');
            $cmd->bindValue(':idL',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function excluirLoja($id){
            $cmd = $this->pdo->prepare("DELETE FROM novaloja WHERE idLoja = :idL");
            $cmd->bindValue(':idL', $id);
            $cmd->execute();
        }

        public function buscarGradeNovaLoja(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idLoja, nomeLoja, capaLoja FROM novaloja");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function addNovaImagemGaleria($id, $img_loja = array()){
            if (count($img_loja) > 0) {
                for ($i=0; $i < count($img_loja); $i++) { 
                    $nome_img_loja = $img_loja[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagemnovaloja` ( `nomeImgLoja`, `fk_idLoja`) VALUES (:nIL, :fk_IdL);');
                    $cmd->bindValue(':nIL', $nome_img_loja);
                    $cmd->bindValue(':fk_IdL', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function editarGaleria($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto_Lojas = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagemnovaloja SET nomeImgLoja = :niL WHERE idImaLoja = :idL');
                    $cmd->bindValue(':idL', $id);
                    $cmd->bindValue(':niL', $nome_foto_Lojas);

                    $cmd->execute();
    
                    return true;
                }
            }
        }

        public function excluirFotoGaleria($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagemnovaloja WHERE idImaLoja = :idL");
            $cmd->bindValue(':idL', $id);
            $cmd->execute();
        }

        public function buscarLojaPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idLoja, nomeLoja, capaLoja, instaLoja, descricaoLoja,  faceLoja, whatsLoja, localizacaoLoja, freteLoja FROM novaloja WHERE idLoja = :idL');
            $cmd->bindValue(':idL', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

      
    }
?>