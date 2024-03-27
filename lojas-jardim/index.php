<?php
    require_once '../Administrador/Classe/Loja.php';
    $l = new Loja();
    $lojas  = $l->buscarGradeLojaJardim();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lojas / Grande Jardim</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/img/icon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
        

            <h1><img src="../assets/img/logo-removebg-preview.png" class="img-fluid" style="height: 62px;" alt="..."></h1>


        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="https://www.cabofriovirtualshopping.com/">Início</a></li>        
            
            
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Confira Nossas Lojas Parceiras!</h2>
                <!-- Portfolio Grid Items-->
                <div class="row row-cols-2 row-cols-md-2 justify-content-center">
                    <!-- Portfolio Item 1-->
                    <?php
                        foreach ($lojas as $k) {
                            
                        
                    ?>
                    <div class="col-md-4 col-lg-2 mb-5">
                        <a href="loja.php?id=<?php echo $k['idJardim'];?>">
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                                <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i></div>
                                </div>
                                <img class="img-thumbnail" src="../Administrador/jardim/imagens/<?php echo $k['capaJardim']; ?>"  alt="..." />
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                 
                    
                </div>
            </div>
        </section>
        
    </body>
</html>
