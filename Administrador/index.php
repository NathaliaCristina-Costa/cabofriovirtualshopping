<?php
  session_start();

  require_once 'Classe/Administrador.php';

  $a = new Administrador();

  $a->verificacaoAcesso('login.php');

  require_once 'Classe/Aba.php';

  $ab = new Aba();

  $aba = $ab->buscarGradeAbas();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Cabo Frio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img/icon.ico" class="rounded" alt="">
        <span class="d-none d-lg-block">Cabo Frio Virtual</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/icon.ico" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">ADMIN</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shop"></i><span>Lojas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="jardim/lojas.php">
              <i class="bi bi-circle"></i><span>Grande Jardim</span>
            </a>
          </li>
          <li>
            <a href="centro/lojas.php">
              <i class="bi bi-circle"></i><span>Centro Cabo Frio</span>
            </a>
          </li>
          <li>
            <a href="biquinis/lojas.php">
              <i class="bi bi-circle"></i><span>Rua dos Biquínis</span>
            </a>
          </li>
          <li>
            <a href="tamoios/lojas.php">
              <i class="bi bi-circle"></i><span>Tamoios</span>
            </a>
          </li>
          <li>
            <a href="centro/lojas.php">
              <i class="bi bi-circle"></i><span>Estrela D'Alva</span>
            </a>
          </li>
          <?php
            foreach ($aba as $key) {            
          ?>
            <li>
              <a href="aba/lojas.php?id=<?php echo $key['id'];?>">
                <i class="bi bi-circle"></i><span><?php echo $key['nome']; ?></span>
              </a>
            </li>
          <?php
            }
          ?>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts" data-bs-toggle="collapse" href="#">
          <i class="bi bi-square"></i><span>Abas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts" class="nav-content collapse " data-bs-parent="#sidebar">
          <li>
            <a href="aba/abas.php">
              <i class="bi bi-circle"></i><span>Nova Aba</span>
            </a>
          </li>
          <?php
            foreach ($aba as $key) {            
          ?>
            <li>
              <a href="aba/loja.php?id=<?php echo $key['id'];?>">
                <i class="bi bi-circle"></i><span><?php echo $key['nome']; ?></span>
              </a>
            </li>
          <?php
            }
          ?>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-paper-heart"></i><span>Frete Gratis</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="frete/index.php">
              <i class="bi bi-circle"></i><span>Grande Jardim</span>
            </a>
          </li>
          <li>
            <a href="freteCentro/index.php">
              <i class="bi bi-circle"></i><span>Centro Cabo Frio</span>
            </a>
          </li>
          <li>
            <a href="freteBiquinis/index.php">
              <i class="bi bi-circle"></i><span>Rua dos Biquínis</span>
            </a>
          </li>
          <li>
            <a href="freteTamoios/index.php">
              <i class="bi bi-circle"></i><span>Tamoios</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="parceiros/parceiros.php">
          <i class="bi bi-list"></i>
          <span>Carrossel Prceiros</span>
        </a>
      </li><!-- End Login Page Nav -->
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Sair</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <?php
                include 'config.php';
                $select_rows = mysqli_query($conn, "SELECT * FROM `frete`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);

                ?>
                <div class="card-body">
                  <h5 class="card-title"><a href="frete/index.php">Fretes Grande Jardim</a><span>| Registrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-send"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row_count; ?></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <?php
                include 'config.php';
                $select_rows = mysqli_query($conn, "SELECT * FROM `freteCentro`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);

                ?>
                <div class="card-body">
                  <h5 class="card-title"><a href="freteCentro/index.php">Fretes Centro Cabo Frio</a><span>| Registrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-send"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row_count; ?></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <?php
                include 'config.php';
                $select_rows = mysqli_query($conn, "SELECT * FROM `freteBiquinis`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);

                ?>
                <div class="card-body">
                  <h5 class="card-title"><a href="freteBiquinis/index.php">Fretes Rua dos Biquínis</a><span>| Registrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-send"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row_count; ?></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <?php
                include 'config.php';
                $select_rows = mysqli_query($conn, "SELECT * FROM `freteTamoios`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);

                ?>
                <div class="card-body">
                  <h5 class="card-title"><a href="freteTamoios/index.php">Fretes Tamoios</a><span>| Registrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-send"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row_count; ?></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Nathalia Cristina</span></strong>  
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>