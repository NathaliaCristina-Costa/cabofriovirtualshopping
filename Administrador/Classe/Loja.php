<?php
    require_once 'Conexao.php';

    class Loja
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getConexao();
        }
        //////////////////////////////////////////////////////
        ////////////////////GRANDE JARDIM/////////////////////
        ///////////////////////////////////////////////////////
        public function cadastrarLojaJardim($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete){

           $cmd = $this->pdo->prepare("SELECT idJardim FROM grandejardim WHERE nomeJardim = :n");
           $cmd->bindValue(":n", $nome);
           $cmd->execute();

           if ($cmd->rowCount() > 0) {
                return false;
           }else{

                $cmd = $this->pdo->prepare("INSERT INTO grandejardim(nomeJardim, descricaoJardim, whatsJardim, instaJardim,faceJardim,localizacaoJardim, freteJardim) VALUES (:n, :d, :w, :i, :f, :l, :fg)");

                $cmd->bindValue(":n", $nome);
                    $cmd->bindValue(":d", $descricao);
                    $cmd->bindValue(":w", $whats);
                    $cmd->bindValue(":i", $insta);
                    $cmd->bindValue(":f", $face);
                    $cmd->bindValue(":l", $localizacao);
                    $cmd->bindValue(":fg", $frete);

                    $cmd->execute();

                $id_jardim = $this->pdo->LastInsertId();

                if (count($fotos) > 0 ) {
                    for ($i=0; $i < count($fotos) ; $i++) { 
                        $nome_fotos = $fotos[$i];

                        $cmd = $this->pdo->prepare("INSERT INTO imagemjardim(nomeImagem, fk_idJardim) VALUES (:nI, :fk)");

                        $cmd->bindValue(":nI", $nome_fotos);
                        $cmd->bindValue("fk", $id_jardim);
                        $cmd->execute();
                    }
                }
               
           }
        }
        
        public function buscarLojasJardim(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idJardim, nomeJardim, freteJardim FROM grandejardim");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }
          
        public function buscarGradeLojaJardim(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idJardim, nomeJardim, capaJardim FROM grandejardim ");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }
      
        public function buscarLojaJardimPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idJardim, nomeJardim, capaJardim, instaJardim, descricaoJardim, faceJardim, whatsJardim, localizacaoJardim, freteJardim FROM grandejardim WHERE idJardim = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function excluirLojaJardim($id){
            $cmd = $this->pdo->prepare("DELETE FROM grandejardim WHERE idJardim = :id");
            $cmd->bindValue(':id', $id);
            $cmd->execute();
        }

        public function excluirFotoGaleria($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagemjardim WHERE idImagem = :id");
            $cmd->bindValue(':id', $id);
            $cmd->execute();
        }
  
        public function capaLojaJardim($id, $capaLoja =array()){
            if (count($capaLoja) > 0) {
                for ($i=0; $i < count($capaLoja); $i++) { 
                    $nome_capa_jardim = $capaLoja[$i];

                    $cmd = $this->pdo->prepare('UPDATE grandejardim SET capaJardim = :c WHERE idJardim =:idJ');
                    $cmd->bindValue(':idJ', $id);
                    $cmd->bindValue(':c', $nome_capa_jardim);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function addNovaImagemGaleria($id, $img = array()){
            if (count($img) > 0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_img = $img[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagemjardim` ( `nomeImagem`, `fk_idJardim`) VALUES (:nI, :fk_Id);');
                    $cmd->bindValue(':nI', $nome_img);
                    $cmd->bindValue(':fk_Id', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function editarLojaJardim($id,$nome,$descricao,$whats,$insta,$face, $localizacao, $frete){
            $cmd = $this->pdo->prepare('UPDATE grandejardim SET nomeJardim = :n, descricaoJardim = :d, whatsJardim = :w, instaJardim = :i, faceJardim = :f, localizacaoJardim = :l, freteJardim = :fg WHERE idJardim = :id' );
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':d', $descricao);  
            $cmd->bindValue(':w', $whats);
            $cmd->bindValue(':i', $insta);
            $cmd->bindValue(':f', $face);
            $cmd->bindValue(':l', $localizacao);
            $cmd->bindValue(':fg',$frete);

            $cmd->execute();

            return true;
        }

        public function editarGaleria($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagemjardim SET nomeImagem = :ni WHERE idImagem = :id');
                    $cmd->bindValue(':id', $id);
                    $cmd->bindValue(':ni', $nome_foto);

                    $cmd->execute();
    
                    return true;
                }
            }
        }
        
        public function galeriaLojaJardim($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImagem, nomeImagem FROM imagemjardim WHERE fk_idJardim =:id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function imagemGaleriaPorId($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImagem, nomeImagem FROM imagemjardim WHERE idImagem =:id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function buscarCapaPorId($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idJardim, capajardim FROM grandejardim WHERE idJardim = :id');
            $cmd->bindValue(':id',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function buscarLojaEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM grandejardim WHERE idJardim = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        //////////////////////////////////////////////////////////
        /////////////////////CENTRO CABO FRIO////////////////////
        ////////////////////////////////////////////////////////
        public function buscarLojasCentro(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idCentro, nomeCentro, freteCentro FROM centrocabofrio");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function cadastrarLojaCentro($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete){

            $cmd = $this->pdo->prepare("SELECT idCentro FROM centrocabofrio WHERE nomeCentro = :nC");
            $cmd->bindValue(":nC", $nome);
            $cmd->execute();
 
            if ($cmd->rowCount() > 0) {
                 return false;
            }else{
 
                 $cmd = $this->pdo->prepare("INSERT INTO centrocabofrio(nomeCentro, descricaoCentro, whatsCentro, instaCentro, faceCentro,freteCentro, localizacaoCentro) VALUES (:nC, :dC, :wC, :iC, :fC, :fgC, :lC)");
 
                    $cmd->bindValue(":nC", $nome);
                     $cmd->bindValue(":dC", $descricao);
                     $cmd->bindValue(":wC", $whats);
                     $cmd->bindValue(":iC", $insta);
                     $cmd->bindValue(":fC", $face);
                     $cmd->bindValue(":lC", $localizacao);
                     $cmd->bindValue(":fgC", $frete);
 
                     $cmd->execute();
 
                 $idCentro = $this->pdo->LastInsertId();
 
                 if (count($fotos) > 0 ) {
                     for ($i=0; $i < count($fotos) ; $i++) { 
                         $nome_fotos = $fotos[$i];
 
                         $cmd = $this->pdo->prepare("INSERT INTO imagemcentro(nomeImgCentro, fk_idCentro) VALUES (:nIc, :fkc)");
 
                         $cmd->bindValue(":nIc", $nome_fotos);
                         $cmd->bindValue("fkc", $idCentro);
                         $cmd->execute();
                     }
                 }
                
            }
        }

        public function buscarCapaCentroPorId($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idCentro, capaCentro FROM centrocabofrio WHERE idCentro = :idC');
            $cmd->bindValue(':idC',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function capaLojaCentro($id, $capa =array()){
            if (count($capa) > 0) {
                for ($i=0; $i < count($capa); $i++) { 
                    $nome_capa_centro = $capa[$i];

                    $cmd = $this->pdo->prepare('UPDATE centrocabofrio SET capaCentro = :centro WHERE idCentro =:idC');
                    $cmd->bindValue(':idC', $id);
                    $cmd->bindValue(':centro', $nome_capa_centro);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function excluirLojaCentro($id){
            $cmd = $this->pdo->prepare("DELETE FROM centrocabofrio WHERE idCentro = :idC");
            $cmd->bindValue(':idC', $id);
            $cmd->execute();
        }

        public function buscarLojaCentroEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM centrocabofrio WHERE idCentro = :idC');
            $cmd->bindValue(':idC', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarLojaCentro($id,$nome,$descricao,$whats,$insta,$face, $localizacao, $frete){
            $cmd = $this->pdo->prepare('UPDATE centrocabofrio SET nomeCentro = :nC, descricaoCentro = :dC, whatsCentro = :wC, instaCentro = :iC, faceCentro = :fC, localizacaoCentro = :lC, freteCentro = :fgC WHERE idCentro = :idC' );
            $cmd->bindValue(':idC', $id);
            $cmd->bindValue(':nC', $nome);
            $cmd->bindValue(':dC', $descricao);  
            $cmd->bindValue(':wC', $whats);
            $cmd->bindValue(':iC', $insta);
            $cmd->bindValue(':fC', $face);
            $cmd->bindValue(':lC', $localizacao);
            $cmd->bindValue(':fgC',$frete);

            $cmd->execute();

            return true;
        }

        public function galeriaLojaCentro($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgCentro, nomeImgCentro FROM imagemcentro WHERE fk_idCentro =:idC');
            $cmd->bindValue(':idC',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function excluirFotoGaleriaCentro($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagemcentro WHERE idImgCentro = :idC");
            $cmd->bindValue(':idC', $id);
            $cmd->execute();
        }

        public function editarGaleriaCentro($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagemcentro SET nomeImgCentro = :niC WHERE idImgCentro = :idC');
                    $cmd->bindValue(':idC', $id);
                    $cmd->bindValue(':niC', $nome_foto);

                    $cmd->execute();
    
                    return true;
                }
            }
        }

        public function buscarGradeLojaCentro(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idCentro, nomeCentro, capaCentro FROM centrocabofrio ");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarLojaCentroPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idCentro, nomeCentro, capaCentro, instaCentro, descricaoCentro, faceCentro, whatsCentro, localizacaoCentro, freteCentro FROM centrocabofrio WHERE idCentro = :idC');
            $cmd->bindValue(':idC', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function addNovaImagemGaleriaCentro($id, $img_centro = array()){
            if (count($img_centro) > 0) {
                for ($i=0; $i < count($img_centro); $i++) { 
                    $nome_img_centro = $img_centro[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagemcentro` ( `nomeImgCentro`, `fk_idCentro`) VALUES (:nIC, :fk_IdC);');
                    $cmd->bindValue(':nIC', $nome_img_centro);
                    $cmd->bindValue(':fk_IdC', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        //////////////////////////////////////////////////////////////////
        /////////////////RUA DOS BIQUINIS////////////////////////////////
        /////////////////////////////////////////////////////////////////
        public function buscarLojasRuaBiquinis(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idBiquinis, nomeBiquinis, freteBiquinis FROM ruadosbiquinis");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function cadastrarLojaRuaBiquinis($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete){

            $cmd = $this->pdo->prepare("SELECT idBiquinis FROM ruadosbiquinis WHERE nomeBiquinis = :nB");
            $cmd->bindValue(":nB", $nome);
            $cmd->execute();
 
            if ($cmd->rowCount() > 0) {
                 return false;
            }else{
 
                 $cmd = $this->pdo->prepare("INSERT INTO ruadosbiquinis(nomeBiquinis, descricaoBiquinis, whatsBiquinis, instaBiquinis, faceBiquinis,freteBiquinis, localizacaoBiquinis) VALUES (:nB, :dB, :wB, :iB, :fB, :fgB, :lB)");
 
                    $cmd->bindValue(":nB", $nome);
                     $cmd->bindValue(":dB", $descricao);
                     $cmd->bindValue(":wB", $whats);
                     $cmd->bindValue(":iB", $insta);
                     $cmd->bindValue(":fB", $face);
                     $cmd->bindValue(":lB", $localizacao);
                     $cmd->bindValue(":fgB", $frete);
 
                     $cmd->execute();
 
                 $idBiquinis = $this->pdo->LastInsertId();
 
                 if (count($fotos) > 0 ) {
                     for ($i=0; $i < count($fotos) ; $i++) { 
                         $nome_imagens = $fotos[$i];
 
                         $cmd = $this->pdo->prepare("INSERT INTO imagembiquinis(nomeImgRua, fk_idBiquinis) VALUES (:nIb, :fkb)");
 
                         $cmd->bindValue(":nIb", $nome_imagens);
                         $cmd->bindValue("fkb", $idBiquinis);
                         $cmd->execute();
                     }
                 }
                
            }
        }

        public function buscarCaparRuaBiquinisPorId($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idBiquinis, capaBiquinis FROM ruadosbiquinis WHERE idBiquinis = :idB');
            $cmd->bindValue(':idB',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function capaLojaRuaBiquinis($id, $capa =array()){
            if (count($capa) > 0) {
                for ($i=0; $i < count($capa); $i++) { 
                    $nome_capa_biquinis = $capa[$i];

                    $cmd = $this->pdo->prepare('UPDATE ruadosbiquinis SET capaBiquinis = :biquinis WHERE idBiquinis =:idB');
                    $cmd->bindValue(':idB', $id);
                    $cmd->bindValue(':biquinis', $nome_capa_biquinis);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function buscarLojaRuaBiquinisEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM ruadosbiquinis WHERE idBiquinis = :idB');
            $cmd->bindValue(':idB', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarLojaRuaBiquinis($id,$nome,$descricao,$whats,$insta,$face, $localizacao, $frete){
            $cmd = $this->pdo->prepare('UPDATE ruadosbiquinis SET nomeBiquinis = :nB, descricaoBiquinis = :dB, whatsBiquinis = :wB, instaBiquinis = :iB, faceBiquinis = :fB, localizacaoBiquinis = :lB, freteBiquinis = :fgB WHERE idBiquinis = :idB' );
            $cmd->bindValue(':idB', $id);
            $cmd->bindValue(':nB', $nome);
            $cmd->bindValue(':dB', $descricao);  
            $cmd->bindValue(':wB', $whats);
            $cmd->bindValue(':iB', $insta);
            $cmd->bindValue(':fB', $face);
            $cmd->bindValue(':lB', $localizacao);
            $cmd->bindValue(':fgB',$frete);

            $cmd->execute();

            return true;
        }

        public function galeriaLojaRuaBiquinis($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgRua, nomeImgRua FROM imagembiquinis WHERE fk_idBiquinis =:idB');
            $cmd->bindValue(':idB',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function excluirFotoGaleriaRuaBiquinis($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagembiquinis WHERE idImgRua = :idR");
            $cmd->bindValue(':idR', $id);
            $cmd->execute();
        }

        public function editarGaleriaRuaBiquinis($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto_biquinis = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagembiquinis SET nomeImgRua = :niB WHERE idImgRua = :idB');
                    $cmd->bindValue(':idB', $id);
                    $cmd->bindValue(':niB', $nome_foto_biquinis);

                    $cmd->execute();
    
                    return true;
                }
            }
        }

        public function addNovaImagemGaleriaRuaBiquinis($id, $img_biquinis = array()){
            if (count($img_biquinis) > 0) {
                for ($i=0; $i < count($img_biquinis); $i++) { 
                    $nome_img_biquinis = $img_biquinis[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagembiquinis` ( `nomeImgRua`, `fk_idBiquinis`) VALUES (:nIB, :fk_IdB);');
                    $cmd->bindValue(':nIB', $nome_img_biquinis);
                    $cmd->bindValue(':fk_IdB', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function excluirLojaRuaBiquinis($id){
            $cmd = $this->pdo->prepare("DELETE FROM ruadosbiquinis WHERE idBiquinis = :idB");
            $cmd->bindValue(':idB', $id);
            $cmd->execute();
        }

        public function buscarGradeLojaRuaBiquinis(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT 	idBiquinis, nomeBiquinis, capaBiquinis FROM ruadosbiquinis ");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }
        
        public function buscarLojaRuaBiquinisPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idBiquinis, nomeBiquinis, capaBiquinis, instaBiquinis, descricaoBiquinis, faceBiquinis, whatsBiquinis, localizacaoBiquinis, freteBiquinis FROM ruadosbiquinis WHERE idBiquinis = :idB');
            $cmd->bindValue(':idB', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        ///////////////////////////////////////////////////////
        //////////////////TAMOIOS/////////////////////////
        /////////////////////////////////////////////////////
        public function cadastrarLojaTamoios($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete){

            $cmd = $this->pdo->prepare("SELECT idTamoios FROM tamoios WHERE nomeTamoios = :nT");
            $cmd->bindValue(":nT", $nome);
            $cmd->execute();
 
            if ($cmd->rowCount() > 0) {
                 return false;
            }else{
 
                 $cmd = $this->pdo->prepare("INSERT INTO tamoios(nomeTamoios, descricaoTamoios, whatsTamoios, instaTamoios,faceTamoios,localizacaoTamoios, freteTamoios) VALUES (:nT, :dT, :wT, :iT, :fT, :lT, :fgT)");
 
                     $cmd->bindValue(":nT", $nome);
                     $cmd->bindValue(":dT", $descricao);
                     $cmd->bindValue(":wT", $whats);
                     $cmd->bindValue(":iT", $insta);
                     $cmd->bindValue(":fT", $face);
                     $cmd->bindValue(":lT", $localizacao);
                     $cmd->bindValue(":fgT", $frete);
 
                     $cmd->execute();
 
                 $id_tamoios = $this->pdo->LastInsertId();
 
                 if (count($fotos) > 0 ) {
                     for ($i=0; $i < count($fotos) ; $i++) { 
                         $nome_fotos_tamoios = $fotos[$i];
 
                         $cmd = $this->pdo->prepare("INSERT INTO imagemtamoios(nomeImgTamoios, fk_idTamoios ) VALUES (:nIT, :fkT)");
 
                         $cmd->bindValue(":nIT", $nome_fotos_tamoios);
                         $cmd->bindValue("fkT", $id_tamoios);
                         $cmd->execute();
                     }
                 }
                
            }
        }
        
        public function buscarLojasTamoios(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idTamoios, nomeTamoios, freteTamoios FROM tamoios");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCapaTamoiosPorId($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idTamoios, capaTamoios FROM tamoios WHERE idTamoios = :idT');
            $cmd->bindValue(':idT',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function capaLojaTamoios($id, $capaLoja =array()){
            if (count($capaLoja) > 0) {
                for ($i=0; $i < count($capaLoja); $i++) { 
                    $nome_capa_tamoios = $capaLoja[$i];

                    $cmd = $this->pdo->prepare('UPDATE tamoios SET capaTamoios = :cT WHERE idTamoios =:idT');
                    $cmd->bindValue(':idT', $id);
                    $cmd->bindValue(':cT', $nome_capa_tamoios);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function buscarLojaTamoiosEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM tamoios WHERE idTamoios = :idT');
            $cmd->bindValue(':idT', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarLojaTamoios($id,$nome,$descricao,$whats,$insta,$face, $localizacao, $frete){
            $cmd = $this->pdo->prepare('UPDATE tamoios SET nomeTamoios = :nT, descricaoTamoios = :dT, whatsTamoios = :wT, instaTamoios = :iT, faceTamoios = :fT, localizacaoTamoios = :lT, freteTamoios = :fgT WHERE idTamoios = :idT' );
            $cmd->bindValue(':idT', $id);
            $cmd->bindValue(':nT', $nome);
            $cmd->bindValue(':dT', $descricao);  
            $cmd->bindValue(':wT', $whats);
            $cmd->bindValue(':iT', $insta);
            $cmd->bindValue(':fT', $face);
            $cmd->bindValue(':lT', $localizacao);
            $cmd->bindValue(':fgT',$frete);

            $cmd->execute();

            return true;
        }

        public function galeriaLojaTamoios($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgTamoios, nomeImgTamoios FROM imagemtamoios WHERE fk_idTamoios =:idT');
            $cmd->bindValue(':idT',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }
        
        public function excluirFotoGaleriaTamoios($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagemtamoios WHERE idImgTamoios = :idT");
            $cmd->bindValue(':idT', $id);
            $cmd->execute();
        }

        public function editarGaleriaTamoios($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagemtamoios SET nomeImgTamoios = :niT WHERE idImgTamoios = :idT');
                    $cmd->bindValue(':idT', $id);
                    $cmd->bindValue(':niT', $nome_foto);

                    $cmd->execute();
    
                    return true;
                }
            }
        }

        public function addNovaImagemGaleriaTamoios($id, $img = array()){
            if (count($img) > 0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_img_tamoios = $img[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagemtamoios` ( `nomeImgTamoios`, `fk_idTamoios`) VALUES (:nIT, :fk_IdT);');
                    $cmd->bindValue(':nIT', $nome_img_tamoios);
                    $cmd->bindValue(':fk_IdT', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function excluirLojaTamoios($id){
            $cmd = $this->pdo->prepare("DELETE FROM tamoios WHERE idTamoios = :idT");
            $cmd->bindValue(':idT', $id);
            $cmd->execute();
        }

        public function buscarGradeLojaTamoios(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idTamoios, nomeTamoios, capaTamoios FROM tamoios");

            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarLojaTamoiosPorId($id){
            $dados = array();

            $cmd= $this->pdo->prepare('SELECT idTamoios, nomeTamoios, capaTamoios, instaTamoios, descricaoTamoios,  faceTamoios, whatsTamoios, localizacaoTamoios, freteTamoios FROM tamoios WHERE idTamoios = :idT');
            $cmd->bindValue(':idT', $id);
            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }
    
        /////////////////////////////////////////////////////////////
        /////////////////ESTRELAD'ALVA///////////////////////////////
        ////////////////////////////////////////////////////////////
        public function cadastrarLojaEstrela($fotos = array(),  $nome, $descricao, $whats, $face, $insta, $localizacao, $frete){

            $cmd = $this->pdo->prepare("SELECT idEstrela FROM estrela WHERE nomeEstrela = :nE");
            $cmd->bindValue(":nE", $nome);
            $cmd->execute();
 
            if ($cmd->rowCount() > 0) {
                 return false;
            }else{
 
                 $cmd = $this->pdo->prepare("INSERT INTO estrela(nomeEstrela, descricao, whats, insta,face,localizacao, freteEstrela) VALUES (:nE, :dE, :wE, :iE, :fE, :lE, :fgE)");
 
                    $cmd->bindValue(":nE", $nome);
                    $cmd->bindValue(":dE", $descricao);
                    $cmd->bindValue(":wE", $whats);
                    $cmd->bindValue(":iE", $insta);
                    $cmd->bindValue(":fE", $face);
                    $cmd->bindValue(":lE", $localizacao);
                    $cmd->bindValue(":fgE", $frete);
 
                    $cmd->execute();
 
                 $id_estrela = $this->pdo->LastInsertId();
 
                 if (count($fotos) > 0 ) {
                     for ($i=0; $i < count($fotos) ; $i++) { 
                         $nome_foto_estrela = $fotos[$i];
 
                         $cmd = $this->pdo->prepare("INSERT INTO imagemestrela(nomeImgEstrela, fk_idEstrela) VALUES (:nIE, :fkE)");
 
                         $cmd->bindValue(":nIE", $nome_foto_estrela);
                         $cmd->bindValue("fkE", $id_estrela);
                         $cmd->execute();
                    }
                }
                
            }
        }

        public function buscarLojaEstrela(){
            $dados = array();

            $cmd = $this->pdo->prepare("SELECT idEstrela, nomeEstrela, freteEstrela FROM estrela");

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function buscarCapaEstrela($id){
            $dados = array();

            $cmd = $this->pdo->prepare('SELECT idEstrela, capaEstrela FROM estrela WHERE idEstrela = :idE');
            $cmd->bindValue(':idE',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function capaLojaEstrela($id, $capaEstrela =array()){
            if (count($capaEstrela) > 0) {
                for ($i=0; $i < count($capaEstrela); $i++) { 
                    $nome_capa_est = $capaEstrela[$i];

                    $cmd = $this->pdo->prepare('UPDATE estrela SET capaEstrela = :cE WHERE idEstrela =:idE');
                    $cmd->bindValue(':idE', $id);
                    $cmd->bindValue(':cE', $nome_capa_est);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function estrelaLojaEditar($id){
            $cmd= $this->pdo->prepare('SELECT * FROM estrela WHERE idEstrela = :ide');
            $cmd->bindValue(':ide', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;

        }

        public function editarLojaEstrela($id,$nome,$descricao,$whats,$insta,$face, $localizacao, $frete){
            $cmd = $this->pdo->prepare('UPDATE estrela SET nomeEstrela = :nE, descricao = :dE, whats = :wE, insta = :iE, face = :fE, localizacao = :lE, freteEstrela = :fgE WHERE idEstrela = :idE' );
            $cmd->bindValue(':idE', $id);
            $cmd->bindValue(':nE', $nome);
            $cmd->bindValue(':dE', $descricao);  
            $cmd->bindValue(':wE', $whats);
            $cmd->bindValue(':iE', $insta);
            $cmd->bindValue(':fE', $face);
            $cmd->bindValue(':lE', $localizacao);
            $cmd->bindValue(':fgE',$frete);

            $cmd->execute();

            return true;
        }

        public function galeriaLojaEstrela($id){
            $dados = array();

            $cmd =$this->pdo->prepare('SELECT idImgEstrela, nomeImgEstrela FROM imagemestrela WHERE fk_idEstrela  =:idE');
            $cmd->bindValue(':idE',$id);

            $cmd->execute();

            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            
            return $dados;
        }

        public function excluirFotoGaleriaEstrela($id){
            $cmd = $this->pdo->prepare("DELETE FROM imagemestrela WHERE idImgEstrela = :idE");
            $cmd->bindValue(':idE', $id);
            $cmd->execute();
        }

        public function editarGaleriaEstrela($id,$img=array()){
            if (count($img)>0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_foto_Estrela = $img[$i];

                    $cmd = $this->pdo->prepare('UPDATE imagemestrela SET nomeImgEstrela = :niE WHERE idImgEstrela = :idE');
                    $cmd->bindValue(':idE', $id);
                    $cmd->bindValue(':niE', $nome_foto_Estrela);

                    $cmd->execute();
    
                    return true;
                }
            }
        }

        public function addNovaImagemGaleriaEstrela($id, $img = array()){
            if (count($img) > 0) {
                for ($i=0; $i < count($img); $i++) { 
                    $nome_img_estr = $img[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO `imagemestrela` ( `nomeImgEstrela`, `fk_idEstrela`) VALUES (:nIE, :fk_IdE);');
                    $cmd->bindValue(':nIE', $nome_img_estr);
                    $cmd->bindValue(':fk_IdE', $id);

                    $cmd->execute();

                    return true;
                }
            }
        }

        public function excluirLojaEstrela($id){
            $cmd = $this->pdo->prepare("DELETE FROM estrela WHERE idEstrela = :idE");
            $cmd->bindValue(':idE', $id);
            $cmd->execute();
        }
    }
?>