<?php
  require_once '../Classe/Loja.php';
  $l = new Loja();

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id    = addslashes($_GET['id']);
    $loja  = $l->estrelaLojaEditar($id);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar / Loja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'header.php'; ?>

  <!-- ======= Sidebar ======= -->
  <?php include 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar Estrela D'Alva</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
          <li class="breadcrumb-item"><a href="loja.php">Loja</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar <?php echo $loja['nomeEstrela']; ?></h5>
                <?php
                    if (isset($_POST['nome'])) {
                        if (isset($_GET['id']) && !empty($_GET['id']) ) {
                            $id           = addslashes($_GET['id']);
                            $nome         = addslashes($_POST['nome']);
                            $descricao    = addslashes($_POST['descricao']);
                            $whats        = addslashes($_POST['whats']);
                            $face         = addslashes($_POST['face']);
                            $insta        = addslashes($_POST['insta']);  
                            $localizacao  = addslashes($_POST['localizacao']);
                            $frete        = addslashes($_POST['frete']);

                            if ($l->editarLojaEstrela($id, $nome, $descricao, $whats, $face, $insta, $localizacao, $frete) == true) {
                              echo "<script>alert('Atualizada com sucesso!');</script>";
                            }
                        }
                    }
                
                ?>            
              <!-- Multi Columns Form -->
              <form class="row g-3"  method="POST">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Nome</label>
                  <input name="nome" type="text" class="form-control" id="inputName5" value="<?php echo $loja['nomeEstrela']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Descrição</label>
                  <textarea name="descricao" cols="30" rows="5" type="text" class="form-control" id="inputName5"><?php echo $loja['descricao']; ?></textarea>
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Whatsapp</label>
                  <input name="whats" type="text" class="form-control" id="inputName5"  value="<?php echo $loja['whats']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Facebook</label>
                  <input name="face" type="text" class="form-control" id="inputName5"  value="<?php echo $loja['insta']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Instagram</label>
                  <input name="insta" type="text" class="form-control" id="inputName5"  value="<?php echo $loja['face']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Localização</label>
                  <textarea name="localizacao" type="text" class="form-control" id="inputName5"><?php echo $loja['localizacao'] ?></textarea>
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label fw-bold">Ativar Botão Frete Gratis</label>
                  <input name="frete" type="text" class="form-control" id="inputName5"  value="<?php echo $loja['freteEstrela']; ?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-warning text-white">Editar</button>
                  <button type="reset" class="btn btn-danger">Limpar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>