  <?php
  require_once 'Administrador/Classe/Aba.php';
  $a = new Aba();
  $capa = $a->buscarCapaIndex();
  require_once 'Administrador/Classe/Parceiro.php';
  $p         = new Parceiro();
  $parceiros = $p->buscarCarrosselParceiros();
  // Armazenar o número de acessos em um arquivo de texto
  $arquivoAcessos = "acessos.txt";

  // Abrir o arquivo de acessos
  $fp = fopen($arquivoAcessos, "r+");

  // Se o arquivo não existir, criá-lo e definir o número de acessos como 0
  if (!$fp) {
    $fp = fopen($arquivoAcessos, "w+");
    fwrite($fp, "10000");
  }

  // Ler o número de acessos do arquivo
  $numeroAcessos = fread($fp, filesize($arquivoAcessos));

  // Incrementar o número de acessos
  $numeroAcessos++;

  // Rebobinar o ponteiro do arquivo
  fseek($fp, 0);

  // Escrever o novo número de acessos no arquivo
  fwrite($fp, $numeroAcessos);

  // Fechar o arquivo
  fclose($fp);


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
    <link href="assets/img/icon.ico" rel="icon">
    <link href="assets/img/icon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>

  <body>


    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">


        <h1><img src="assets/img/logo-removebg-preview.png" class="img-fluid" style="height: 62px;" alt="..."></h1>


        <!--nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
          <li><a class="nav-link scrollto" href="#values">Parceiros</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Destaques</a></li>         
          
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav--><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <div class="container text-center" style="background-color: #da5a29;">
      <div class="row">
        <div class="col-sm-6 d-flex flex-column justify-content-center text-center   text-start">
          <a href="" target="_blank"><span class="badge text-bg-secondary">Acessos : <?php echo $numeroAcessos; ?></span></a>
        </div>
        <div class="col-sm-6 ">
          <img src="assets/img/capa-removebg-preview.png" class="img-fluid" alt="...">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 d-flex flex-column justify-content-center text-center   text-start">
          <div class="section-title">
            <h3 class="text-white">Escolha em qual centro comercial deseja comprar </h3>
          </div>
        </div>
      </div>
    </div>

    <main>
      <div class="container mb-0">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php
            foreach ($parceiros as $key) {
            ?>
              <div class="swiper-slide"><a href="<?php echo $key['link']; ?>" target="_blank"><img style="width: 70px;" src="Administrador/parceiros/imagens/<?php echo $key['logo']; ?>" class="img-fluid rounded-5" alt=""></a>
              </div>

            <?php
            }
            ?>

          </div>
          <!--div class="swiper-pagination"></div-->
        </div>

      </div>
      <!-- ======= Values Section ======= -->
      <section>
        <div class="container">
          <div class="section-title">
            <h6>Aqui você vai encontrar as melhores lojas e produtos</h6>
          </div>
          <div class="row">
            <div class="col-sm-6 d-flex align-items-stretch">
              <img src="./assets/img/grandeJardim.png" class="img-thumbnail" style="width: ;" alt="...">
              <!--div class="card" style="background-image: url(assets/img/grandejardim.jpg);">
                <div class="card-body">
                  <h5 class="card-title"><a href="">Grande Jardim Esperança</a></h5>
                  <div class="read-more">
                    <a href="lojas-jardim/index.php"><button type="button" class="btn btn-dark" style="background-color: #ee5921; border-color: #ee5921;">
                        <i class="bi bi-arrow-right"></i> Clique Aqui
                      </button></a>
                  </div>
                </div>
              </div-->
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
              <img src="./assets/img/centro.png" class="img-thumbnail" style="width: ;" alt="...">
              <!--div class="card" style="background-image: url(assets/img/centro.jpg);">
                <div class="card-body">
                  <h5 class="card-title"><a href="">Centro Cabo Frio</a></h5>
                  <div class="read-more">
                    <a href="lojas-centro/index.php"><button type="button" class="btn btn-dark" style="background-color: #ee5921; border-color: #ee5921;">
                        <i class="bi bi-arrow-right"></i> Clique Aqui
                      </button></a>
                  </div>
                </div>
              </div-->
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
              <img src="./assets/img/ruaDosBiquinis.png" class="img-thumbnail" style="width: ;" alt="...">
              <!--div class="card" style="background-image: url(assets/img/biquini.jpg);">
                <div class="card-body">
                  <h5 class="card-title"><a href="">Gamboa - Rua dos Biquínis</a></h5>
                  <div class="read-more">
                    <a href="lojas-biquinis/index.php"><button type="button" class="btn btn-dark" style="background-color: #ee5921; border-color: #ee5921;">
                        <i class="bi bi-arrow-right"></i> Clique Aqui
                      </button></a>
                  </div>
                </div>
              </div-->
            </div>
            <div class="col-sm-6 d-flex align-items-stretch">
              <img src="./assets/img/tamoios.png" class="img-thumbnail" style="width: ;" alt="...">
              <!--div class="card" style="background-image: url(assets/img/tamoios.jpeg);">
                <div class="card-body">
                  <h5 class="card-title"><a href="">Tamoios</a></h5>
                  <div class="read-more"><a href="#">
                      <a href="lojas-tamoios/index.php"><button type="button" class="btn btn-dark" style="background-color: #ee5921; border-color: #ee5921;">
                          <i class="bi bi-arrow-right"></i> Clique Aqui
                        </button></a>
                  </div>
                </div>
              </div-->
            </div>
            <?php
            foreach ($capa as $value) {
            ?>
              <div class="col-sm-6 d-flex align-items-stretch">
                <img src="Administrador/aba/imagens/<?php echo $value['nomeImagem']; ?>" class="img-thumbnail" alt="...">
                <!--div class="card" style="background-image: url(Administrador/aba/imagens/<?php echo $value['nomeImagem']; ?>)">
                  <div class="card-body">
                    <h5 class="card-title"><a href=""><?php echo $value['nome']; ?></a></h5>
                    <div class="read-more">
                      <a href="lojas/index.php?id=<?php echo $value['id']; ?>"><button type="button" class="btn btn-dark" style="background-color: #ee5921; border-color: #ee5921;">
                          <i class="bi bi-arrow-right"></i> Clique Aqui
                        </button></a>
                    </div>
                  </div>
                </div-->
              </div>
            <?php
            }
            ?>
            <!--div class="col-md-6 d-flex align-items-stretch mt-4"  data-aos-delay="300">
            <div class="card" style="background-image: url(assets/img/biquinis.jpg);">
              <div class="card-body">
                <h5 class="card-title"><a href="">Rua dos Biquínis</a></h5>
                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium voluptatem.</p>
                <div class="read-more">
                  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ruaBiquinis">
                    <i class="bi bi-arrow-right"></i> Saiba Mais
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 d-flex align-items-stretch mt-4"  data-aos-delay="300">
            <div class="card" style="background-image: url(assets/img/cabofrio.jpg);">
              <div class="card-body">
                <h5 class="card-title"><a href="">Centro Cabo Frio</a></h5>
                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium voluptatem.</p>
                <div class="read-more">
                  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#centroCaboFrio">
                    <i class="bi bi-arrow-right"></i> Saiba Mais
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div-->

          </div>
      </section><!-- End Values Section -->

      <!-- ======= Portfolio Section ======= -->
      <!-- section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2 >Confira os Destaques</h2>
        </div>

        <div class="row"  data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todas</li>
              <li data-filter=".filter-app">Saúde</li>
              <li data-filter=".filter-card">Beleza</li>
              <li data-filter=".filter-web">Casa</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container"  data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section--><!-- End Portfolio Section -->

      <!-- ======= Contact Section ======= -->
      <!--section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 >Contato</h2>
        </div>

        <div class="row justify-content-center">

          

          <div class="col-xl-5 col-lg-5 mt-4"  data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>cabofriovirtualshopping@gmail.com</p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 mt-4"  data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Ligue</h3>
              <p>(22) 9 8822-6484</p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center"  data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nome" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <br>
              <br>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>

        </div>

      </div>
    </section--><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-top">
        <div class="container">
          <div class="row">


            <div class="col-lg-2 col-md-6 footer-contact">
              <img src="./assets/img/capa.jpg" class="img-thumbnail" style="width: 200px;" alt="...">
              <br>
              <p>
                <br>
                <strong>Whatsapp:</strong> (22) 9 8822-6484<br>
                <strong>Email:</strong> cabofriovirtualshopping@gmail.com<br>
              </p>
            </div>

            <!--div class="col-lg-2 col-md-6 footer-links">
              <h4>Menu Principal</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Inicio</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#values">Parceiros</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Destaques</a></li>
              </ul>
            </div-->

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
          <div class="copyright"> <b>L.C Produções e Marketing Ltda</b>
          </div>
        </div>
      </div>
    </footer><!-- End Footer -->

    <!--a href="https://api.whatsapp.com/send?phone=5522988226484" target="_blank"><i class="bi bi-chat-fill fale-conosco"></i> </a-- >


  
  



  <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

  </html>