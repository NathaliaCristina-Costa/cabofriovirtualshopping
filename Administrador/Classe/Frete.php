<?php
    require_once 'Conexao.php';

    class Frete
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getConexao();
        }

        public function listarFretes(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idFrete, nome, telefone, nomeJardim FROM frete JOIN grandejardim ON idLoja = idJardim");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function listarFretesCentro(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idFreteCentro, nomeCentroFrete, telefoneCentro, nomeCentro FROM freteCentro JOIN centrocabofrio ON idLojaCentro = idCentro");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function listarFretesBiquinis(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idFreteBiquinis, nomeBiquinisFrete, telefoneBiquinis, nomeBiquinis FROM freteBiquinis JOIN ruadosbiquinis ON idLojaBiquinis = idBiquinis");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function listarFretesTamoios(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idFreteTamoios, nomeTamoiosFrete, telefoneTamoios, nomeTamoios FROM freteTamoios JOIN tamoios ON idLojaTamoios = idTamoios");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCadastroFrete($id){
            $cmd = $this->pdo->prepare("SELECT nome, estado, cep, cidade, endereco, bairro, telefone, nomeJardim FROM `frete` JOIN grandejardim ON idLoja = idJardim WHERE idFrete = :idF");
            $cmd->bindValue(':idF', $id);

            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCadastroFreteCentro($id){
            $cmd = $this->pdo->prepare("SELECT nomeCentroFrete, estadoCentro, cepCentro, cidadeCentro, enderecoCentro, bairroCentro, telefoneCentro, nomeCentro FROM `freteCentro` JOIN centrocabofrio ON idLojaCentro = idCentro WHERE idFreteCentro = :idFC");
            $cmd->bindValue(':idFC', $id);

            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCadastroBiquinis($id){
            $cmd = $this->pdo->prepare("SELECT nomeBiquinisFrete, estadoBiquinis, cepBiquinis, cidadeBiquinis, enderecoBiquinis, bairroBiquinis, telefoneBiquinis, nomeBiquinis FROM `freteBiquinis` JOIN ruadosbiquinis ON idLojaBiquinis = idBiquinis WHERE idFreteBiquinis = :idFB");
            $cmd->bindValue(':idFB', $id);

            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCadastroFreteTamoios($id){
            $cmd = $this->pdo->prepare("SELECT nomeTamoiosFrete, estadoTamoios, cepTamoios, cidadeTamoios, enderecoTamoios, bairroTamoios, telefoneTamoios, nomeTamoios FROM `freteTamoios` JOIN tamoios ON idLojaTamoios = idTamoios WHERE idFreteTamoios = :idFT");
            $cmd->bindValue(':idFT', $id);

            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;
        }
  
        public function cadastroFrete($nome, $telefone , $cep, $endereco, $bairro, $cidade,$estado, $idJardim){
            $cmd = $this->pdo->prepare("INSERT frete (nome, telefone, cep,endereco, bairro, cidade, estado,idLoja) VALUES (:n, :t, :cep, :e, :b, :c,:es, :id)");

                $cmd->bindValue(':n'    ,       $nome);
                $cmd->bindValue(':t'    ,       $telefone);
                $cmd->bindValue(':cep'  ,       $cep);
                $cmd->bindValue(':e'    ,       $endereco);
                $cmd->bindValue(':b'    ,       $bairro);
                $cmd->bindValue(':c'    ,       $cidade);
                $cmd->bindValue(':es'   ,       $estado);
                $cmd->bindValue(':id'   ,       $idJardim);

                $cmd->execute();
                
                return true;


            
        }

        public function cadastroFreteCentro($nome, $telefone , $cep, $endereco, $bairro, $cidade,$estado, $idCentro){
            $cmd = $this->pdo->prepare("INSERT freteCentro (nomeCentroFrete, telefoneCentro, cepCentro,enderecoCentro, bairroCentro, cidadeCentro, estadoCentro,idLojaCentro) VALUES (:nC, :tC, :cepC, :eC, :bC, :cC,:esC, :idC)");

                $cmd->bindValue(':nC'    ,       $nome);
                $cmd->bindValue(':tC'    ,       $telefone);
                $cmd->bindValue(':cepC'  ,       $cep);
                $cmd->bindValue(':eC'    ,       $endereco);
                $cmd->bindValue(':bC'    ,       $bairro);
                $cmd->bindValue(':cC'    ,       $cidade);
                $cmd->bindValue(':esC'   ,       $estado);
                $cmd->bindValue(':idC'   ,       $idCentro);

                $cmd->execute();
                
                return true;


            
        }

        public function cadastroFreteRuaBiquinis($nome, $telefone , $cep, $endereco, $bairro, $cidade,$estado, $idBiquini){
            $cmd = $this->pdo->prepare("INSERT freteBiquinis (nomeBiquinisFrete, telefoneBiquinis, cepBiquinis,enderecoBiquinis, bairroBiquinis, cidadeBiquinis, estadoBiquinis,idLojaBiquinis) VALUES (:nB, :tB, :cepB, :eB, :bB, :cB,:esB, :idB)");

                $cmd->bindValue(':nB'    ,       $nome);
                $cmd->bindValue(':tB'    ,       $telefone);
                $cmd->bindValue(':cepB'  ,       $cep);
                $cmd->bindValue(':eB'    ,       $endereco);
                $cmd->bindValue(':bB'    ,       $bairro);
                $cmd->bindValue(':cB'    ,       $cidade);
                $cmd->bindValue(':esB'   ,       $estado);
                $cmd->bindValue(':idB'   ,       $idBiquini);

                $cmd->execute();
                
                return true;


            
        }

        public function cadastroFreteTamoios($nome, $telefone , $cep, $endereco, $bairro, $cidade,$estado, $idJardim){
            $cmd = $this->pdo->prepare("INSERT freteTamoios (nomeTamoiosFrete, telefoneTamoios, cepTamoios,enderecoTamoios, bairroTamoios, cidadeTamoios, estadoTamoios,idLojaTamoios) VALUES (:nT, :tT, :cepT, :eT, :bT, :cT,:esT, :idT)");

                $cmd->bindValue(':nT'    ,       $nome);
                $cmd->bindValue(':tT'    ,       $telefone);
                $cmd->bindValue(':cepT'  ,       $cep);
                $cmd->bindValue(':eT'    ,       $endereco);
                $cmd->bindValue(':bT'    ,       $bairro);
                $cmd->bindValue(':cT'    ,       $cidade);
                $cmd->bindValue(':esT'   ,       $estado);
                $cmd->bindValue(':idT'   ,       $idJardim);

                $cmd->execute();
                
                return true;


            
        }
    }
?>
