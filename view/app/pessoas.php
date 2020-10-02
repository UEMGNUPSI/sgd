<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Gestão de Encargos Didáticos</title>

  <link rel="shortcut icon" href="../../img/favicon.ico" >
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../css/index.css" rel="stylesheet">


  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php include_once "../../model/conexao.php" ?>
<?php include_once "../navbar.html" ?>

<div class="container-fluid">
    <div class="row">
         <a href="index.php" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>
         <a href="../form/cadastroPessoa.php" class="btn-circle btn-lg custom-link"  title="Cadastrar Loja"><i class="icoLojaCadastro fas fa-plus-circle"></i> </a>        
            <h1 style="font-weight: 330;" class="col-10 text-center">
                <i class="fas fa-users" style="color: #337ab7; "></i>
                Pessoas
            </h1>    
    </div>    
  <div class="card shadow mb-4 row">
        <div class="card-header py-3 ">
          <h6 class="m-0 font-weight-bold text-primary">Uemg Frutal</h6>
          <div class="form-check" style="float:right;">
          <input class="form-check-input" type="radio" name="exampleRadios" id="inativo" value="option2" >
            <label class="form-check-label" for="inativo">
              Inativo
            </label>
            </div>
            <div class="form-check mr-3" style="float:right;">
            <input class="form-check-input" type="radio" name="exampleRadios" id="ativo" value="option1" checked>
            <label class="form-check-label" for="ativo">
              Ativo
            </label>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>MASP</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Status</th>
                  <th>Consultar</th>
                </tr>
              </thead>
              <tbody>                
                <?php 
                  $sql = "SELECT * FROM pessoas WHERE status_id ";
                  $consulta = mysqli_query($conn, $sql);
                  while ($dados = mysqli_fetch_assoc($consulta)) {
                    $pessoa_id = $dados['id_pessoa'];       
                    $sql_unidade = "SELECT * FROM pessoas JOIN statuspessoa ON statuspessoa.id = pessoas.status_id WHERE id_pessoa = $pessoa_id";
                    $consulta_unidade = mysqli_query($conn, $sql_unidade);
                    $dados_pessoa = mysqli_fetch_assoc($consulta_unidade);   
                      echo "<tr>";
                      echo "<td>" . $dados['masp'] . "</td>";
                      echo "<td>" . $dados['nome'] . "</td>";
                      echo "<td>" . $dados['cpf'] . "</td>";
                      echo "<td>" . $dados_pessoa['descricao'] . "</td>"; ?>
                      
                      <td style="color: #337ab7;"><a href="consulta/consultaPessoa.php?id=<?php echo $dados['id_pessoa'];?>"><i class="fas fa-search"></i></a></td>
                      </tr>    
                <?php }
                  ?>                             
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div><!-- fim container fluid -->
      </div>   

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UEMG 2020</span>
          </div>
        </div>
      </footer>

    </div>
  </div> <!-- fim wrapper -->
  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="../../js/sb-admin-2.min.js"></script>


  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
