<?php
  require_once '../Classe/Loja.php';
  $l = new Loja();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lojas / Cabo Frio Virtual Shopping</title>
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
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800">Lojas - Grande Jardim</h1>
          <a href="cadastro.php"><button class="btn btn-warning text-white" style="background-color: #ee5921; border-color:#ee5921">Nova Loja</button></a>               
        </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
          <li class="breadcrumb-item">Lojas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lojas</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    
                    <th scope="col">Nome</th>
                    <th scope="col">Frete</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $dados = $l->buscarLojasJardim();
                    if (count($dados) > 0) {
                      for ($i=0; $i < count($dados); $i++) { 
                        echo '<tr>';
                          foreach ($dados[$i] as $key => $value) {
                              if ($key!='idJardim') {
                                echo '<td>'.$value.'</td>';
                              }
                          }
                      
                  
                  ?>

                    <td>
                    
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ações
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="capa.php?id=<?php echo $dados[$i]['idJardim'];?>"><span class="badge rounded-pill bg-primary">CAPA</span></a></li>
                        <li><a class="dropdown-item" href="editar.php?id=<?php echo $dados[$i]['idJardim'];?>"><span class="badge rounded-pill bg-warning">EDITAR</span></a></li>      
                        <li><a class="dropdown-item" href="galeria.php?id=<?php echo $dados[$i]['idJardim'];?>"><span class="badge rounded-pill bg-success">GALERIA</span></a></li>
                        <li><a class="dropdown-item" href="add_galeria.php?id=<?php echo $dados[$i]['idJardim'];?>"><span class="badge rounded-pill bg-info">ADD GALERIA</span></a></li>                                        
                        <li><a class="dropdown-item" href="excluir.php?id=<?php echo $dados[$i]['idJardim'];?>" ><span class="badge rounded-pill bg-danger" onclick="return confirm('Deseja Excluir o Produto?')">EXCLUIR</span></a></li>
                      </ul>
                    </div>
                  </td>
                  <?php
                        echo '</tr>';
                      }
                    }
                  ?>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


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