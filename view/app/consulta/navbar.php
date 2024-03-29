<?php
  session_start();
  include_once '../../model/conexao.php';
?>

  <div id="wrapper">

    <?php 
        $nivel = $_SESSION['nivel'];
        $sql = "SELECT * FROM nivel WHERE id_nivel = $nivel";
        $consulta = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($consulta);    
          $pessoas = $dados['pessoas'];    
          $disciplinas = $dados['disciplinas'];    
          $ocorrencias = $dados['ocorrencias'];    
          $atribuicao = $dados['atribuicao'];    
          $disciplinas_ofertadas = $dados['disciplinas_ofertadas'];    
          $relatorios = $dados['relatorios'];   
          $parametros = $dados['parametros'];         
    ?>
    
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #3c6178;">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../app/index.php">
        <div class="sidebar-brand-icon">
          <img class="ml-4" src="../../img/logo_sgd.png" width="300" height="290">
        </div>
        <!-- <div class="sidebar-brand-text mx-3"><img  class="ml-4" src="../../img/logo_sgd.png" width="300"></div> -->
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Início</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Opções
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item" style="<?php if($pessoas=='0') echo 'display:none';?>">
        <a class="nav-link " href="../app/pessoas.php" >
          <i class="fas fa-users"></i>
          <span>Pessoas</span>
        </a>
      </li> 
      <li class="nav-item" style="<?php if($disciplinas=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="../app/disciplinas.php" >
          <i class="fas fa-book"></i>
          <span>Disciplinas</span>
        </a>
      </li> 
      <li class="nav-item" style="<?php if($ocorrencias=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="../app/ocorrencias.php" >
          <i class="fas fa-exclamation-circle"></i>
          <span>Ocorrências</span>
        </a>
      </li>             
      <li class="nav-item" style="<?php if($atribuicao=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="../app/atribuicao.php" >
          <i class="fas fa-user-plus"></i>
          <span>Atribuição</span>
        </a>
      </li>  
      <li class="nav-item" style="<?php if($disciplinas_ofertadas=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="../app/ofertadas.php" >
          <i class="fas fa-folder-plus"></i>
          <span>Disciplinas Ofertadas</span>
        </a>
      </li>
      <li class="nav-item" style="<?php if($relatorios=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="../app/relatorios.php" >
          <i class="fas fa-paste"></i>
          <span>Relatórios</span>
        </a>
      </li>  
      <li class="nav-item" style="<?php if($parametros=='0') echo 'display:none';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-paint-brush"></i>
          <span>Paramêtros</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Paramêtros Disponíveis:</h6>
            <a class="collapse-item" href="../app/cargos.php">Cargos</a>
            <a class="collapse-item" href="../app/cursos.php">Cursos</a>            
            <a class="collapse-item" href="../app/departamentos.php" >Departamentos</a>
            <a class="collapse-item" href="../app/ensino.php">Nível de Ensino</a>            
            <a class="collapse-item" href="../app/acesso.php">Nível de Acesso</a>
            <a class="collapse-item" href="../app/semestreLetivo.php">Semestre Letivo</a>
            <a class="collapse-item" href="../app/status.php">Status</a>
            <a class="collapse-item" href="../app/unidade.php">Unidades</a>
            
          </div>
        </div>
      </li>   
               
      
  
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- Fim Menu Lateral -->

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- Menu Central -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Navbar -->
          <ul class="navbar-nav ml-auto">             

            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#"  id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pedro</span>
                <img class="img-profile rounded-circle" src="../../img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Cancelar">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>
        </nav>