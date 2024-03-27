<?php
  require_once '../Administrador/Classe/Loja.php';
  $l = new Loja();

  if (isset($_GET['id']) && !empty($_GET['id']) ) {
    $id       = addslashes($_GET['id']);
    $loja     = $l->buscarLojaJardimPorId($id);
    $galeria  = $l->galeriaLojaJardim($id);
    $mapa     = $l->buscarLojaEditar($id);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cabo Frio Virtual</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>


   <!-- ======= Header ======= -->
   <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">


        <h1><img src="../assets/img/logo-removebg-preview.png" class="img-fluid" style="height: 62px;" alt="..."></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php">Início</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Loja</li>
        </ol>
        <h2>Detalhes</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <?php
                  foreach ($galeria as $k => $v) { 
                ?>
                <div class="swiper-slide">
                  <img src="../Administrador/jardim/imagens/<?php echo $v['nomeImagem']; ?>" alt="">
                </div>
                <?php
                  }
                ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <?php
                foreach ($loja as $key => $value) {            
              ?>
              <h3><img src="../Administrador/jardim/imagens/<?php echo $value['capaJardim']; ?>" class="img-thumbnail"  alt="..."></h3>
              <div class="portfolio-description">
                <h2><?php echo $value['nomeJardim'];?><a href="<?php echo $value['instaJardim']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a> <a href="<?php echo $value['faceJardim']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                </h2>
                <p><?php echo $value['descricaoJardim']; ?></p>
                <a class="whatsapp-link" href="https://api.whatsapp.com/send?phone=55<?php echo$value['whatsJardim']; ?>" target="_blank"><i class="bi bi-whatsapp icone-whatsapp"></i> </a>
                <?php
                  if($value['freteJardim'] == 'Sim'){ 
                ?>
                <hr>
                Faça o Cadastro e tenha frete grátis!
                <a href="frete.php?id=<?php echo $value['idJardim'] ?>" target="_blank" class="text-white">
                  <button type="button" class="btn btn-dark mt-3" style="background-color: #ee5921; border-color: #ee5921;">
                    <i class="bi bi-arrow-right"></i> Frete Grátis!
                  </button>
                </a>
                </p>
              <?php
                  }
                }
              ?>
                  
              </div>
              <!--ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul-->
            </div>
            
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2 >Todos Nossos Produtos</h2>
      </div>
                

      <div class="row portfolio-container"  data-aos-delay="200">
        <?php
          foreach($galeria as $img){
        ?>
        <a href="../Administrador/jardim/imagens/<?php echo $img['nomeImagem'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" >
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="../Administrador/jardim/imagens/<?php echo $img['nomeImagem'];?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>            
            </div>
          </div>
        </a>
        <?php
          }
        ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

   <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-2 col-md-6 footer-contact">
            <?php
              foreach ($loja as $key => $footer){
            ?>
              <img src="../Administrador/jardim/imagens/<?php echo $footer['capaJardim']; ?>" class="img-thumbnail" alt="...">
              <br>
            <?php
              }
            ?>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu Principal</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Parceiros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Destaques</a></li>
            </ul>
          </div>

          <!--div class="col-lg-3 col-md-6 footer-links">
            <h4>Parceiros</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Shopping 1</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Shopping 2</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Shopping 3</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Shopping 4</a></li>
            </ul>
          </div-->


        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <b>L.C Produções e Marketing Ltda</b>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="https://www.instagram.com/lcapone2022?igshid=OGQ5ZDc2ODk2ZA%3D%3D" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

 
  

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>