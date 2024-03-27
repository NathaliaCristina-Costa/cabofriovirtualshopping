<?php
    require_once '../Administrador/Classe/Frete.php';
    $f = new Frete();
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
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
            <h2>Fretis Grátis</h2>
            <p>Olá , preencha o cupom  e peça o reembolso do seu frete em até 24 horas após a compra.</p>
            <br>
            <p>No WhatsApp nos informe a loja em que comprou e qual valor da sua compra a data e quanto pagou de frete.
Iremos analisar as informações e estando tudo ok iremos ressarcir seu frete se for na área de cobertura da galeria de onde comprou.
</p>
            <br>
            <p class="fw-bold">Obs. Ressarcimento de valores até 15,00.</p>
        </div>

        <?php
        
            if (isset($_POST['nome'])) {
                if (isset($_GET['id']) && !empty($_GET['id']) ) {
                  $idBiquini   = addslashes($_GET['id']);
                  $nome       = addslashes($_POST['nome']);
                  $telefone   = addslashes($_POST['telefone']);
                  $cep        = addslashes($_POST['cep']);
                  $cidade     = addslashes($_POST['cidade']);
                  $estado     = addslashes($_POST['estado']);
                  $endereco   = addslashes($_POST['endereco']);
                  $bairro     = addslashes($_POST['bairro']);

                  if ($f->cadastroFreteCentro($nome, $telefone , $cep, $endereco, $bairro, $cidade,$estado,$idBiquini) == true) {
                    echo  header('location:contato.php');
        
                  }
                }
                
               
            }

        ?>

        <form class="form"  method="POST">
            <div class="row justify-content-center"  data-aos-delay="300">
              <div class="col-xl-9 col-lg-12 mt-4">
                
                  <div class="row">
                      <div class="col-md-6 form-group">
                      <input type="text" name="nome" class="form-control" id="name" placeholder="Nome" required>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="telefone" id="phone" placeholder="Telefone Com DDD" required>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" required>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="cidade" id="uf" placeholder="Cidade" required>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="estado" id="localidade" placeholder="Estado" required>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-8 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="endereco" id="logradouro" placeholder="Endereço" required>
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                      </div>
                  </div>
                  <!--div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div-->
                  <br>
                  <br>
                  <div class="text-center"><button type="submit">Enviar</button></div>
              
              </div>

            </div>
        </form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <b>L.C Produções e Marketing Ltda</b>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="https://instagram.com/lcapone2022?igshid=OGQ5ZDc2ODk2ZA== " class="instagram"><i class="bx bxl-instagram"></i></a>
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
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script>
    $('#cep').mask('00000000');      
    $('#cep').blur(function(){
        var cep = $("#cep").val();
        var url = `https://viacep.com.br/ws/${cep}/json/`;
        
        $.ajax({
          url:        url,
          type:       'get',
          dataType:   'json',

          success:function(dados){
            
            $('#uf').val(dados.uf);
            $('#localidade').val(dados.localidade);
            $('#logradouro').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            
            console.log(dados);
            
            
          }
        });
    });
  </script>

</body>

</html>