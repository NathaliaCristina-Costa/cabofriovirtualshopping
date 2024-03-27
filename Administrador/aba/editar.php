<?php
  require_once '../Classe/Aba.php';
  $a = new Aba();

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id    = addslashes($_GET['id']);
    $loja  = $a->buscarLojaEditar($id);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar / Lojas</title>
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
      <h1>Editar Loja</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
          <li class="breadcrumb-item"><a href="lojas.php">Lojas</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar <?php echo $loja['nome']; ?></h5>
                <?php
                    if (isset($_POST['nome'])) {
                        if (isset($_GET['id']) && !empty($_GET['id']) ) {
                            $id           = addslashes($_GET['id']);
                            $nome         = addslashes($_POST['nome']);
                            $categoria    = addslashes($_POST['categoria']);

                            if ($a->editarAba($id, $nome, $categoria) == true) {
                ?>
                <meta http-equiv="refresh" content="0; https://cabofriovirtualshopping.com/Administrador/">
                <?php
                            }
                        }
                    }
                
                ?>            
              <!-- Multi Columns Form -->
              <form class="row g-3"  method="POST">
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label"><b>Nome</b></label>
                  <input type="text" name="nome"  class="form-control" value="<?php echo $loja['nome']; ?>">
                </div>
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label"><b>Categoria</b></label>
                  <input type="text" name="categoria"  class="form-control" value="<?php echo $loja['categoria']; ?>">
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