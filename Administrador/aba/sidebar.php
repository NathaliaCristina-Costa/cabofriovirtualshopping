<?php
  require_once '../Classe/Aba.php';

  $ab = new Aba();

  $aba = $ab->buscarGradeAbas();
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="../index.php">
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
        <a href="../jardim/lojas.php">
          <i class="bi bi-circle"></i><span>Grande Jardim</span>
        </a>
      </li>
      <li>
        <a href="../centro/lojas.php">
          <i class="bi bi-circle"></i><span>Centro Cabo Frio</span>
        </a>
      </li>
      <li>
        <a href="../biquinis/lojas.php">
          <i class="bi bi-circle"></i><span>Rua dos Biquínis</span>
        </a>
      </li>
      <li>
        <a href="../tamoios/lojas.php">
          <i class="bi bi-circle"></i><span>Tamoios</span>
        </a>
      </li>
      <li>
        <a href="../estrela/loja.php">
          <i class="bi bi-circle"></i><span>Estrela D'Alva</span>
        </a>
      </li>
      <?php
            foreach ($aba as $key) {            
          ?>
            <li>
              <a href="lojas.php?id=<?php echo $key['id'];?>">
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
            <a href="abas.php">
              <i class="bi bi-circle"></i><span>Nova Aba</span>
            </a>
          </li>
          <?php
            foreach ($aba as $key) {            
          ?>
            <li>
              <a href="loja.php?id=<?php echo $key['id'];?>">
                <i class="bi bi-circle"></i><span><?php echo $key['nome']; ?></span>
              </a>
            </li>
          <?php
            }
          ?>
        </ul>
    </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="parceiros.php">
      <i class="bi bi-list"></i>
      <span>Carrossel Parceiros</span>
    </a>
  </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-paper-heart"></i><span>Frete Gratis</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../frete/index.php">
              <i class="bi bi-circle"></i><span>Grande Jardim</span>
            </a>
          </li>
          <li>
            <a href="../freteCentro/index.php">
              <i class="bi bi-circle"></i><span>Centro Cabo Frio</span>
            </a>
          </li>
          <li>
            <a href="../freteBiquinis/index.php">
              <i class="bi bi-circle"></i><span>Rua dos Biquínis</span>
            </a>
          </li>
          <li>
            <a href="../freteTamoios/index.php">
              <i class="bi bi-circle"></i><span>Tamoios</span>
            </a>
          </li>
        </ul>
    </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="../logout.php">
      <i class="bi bi-box-arrow-in-left"></i>
      <span>Sair</span>
    </a>
  </li><!-- End Login Page Nav -->

</ul>

</aside><!-- End Sidebar-->
