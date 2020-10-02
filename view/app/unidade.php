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
         <a href="../form/cadastroUnidade.php" class="btn-circle btn-lg custom-link"  title="Cadastrar Ocorrencia"><i class="icoLojaCadastro fas fa-plus-circle"></i> </a>        
            <h1 style="font-weight: 330;" class="col-9 text-center">
                Unidade
            </h1>    
    </div>    
  <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Uemg Frutal</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Unidade</th>
                  <th>Excluir</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  $sql = "SELECT * FROM unidade";
                  $consulta = mysqli_query($conn, $sql);
                  while ($dados = mysqli_fetch_assoc($consulta)) {
                    $id = $dados['id_unidade'];                                 
                      echo "<tr>";
                      echo "<td>" . $dados['descricao_unidade'] . "</td>"; //nome ocorrencia ?>
                      <td style="color: #337ab7;" data-toggle="modal" data-target="#Cancelar"><i class="fas fa-trash-alt"></i></td>
                      <td style="color: #337ab7;"><a data-toggle="modal" data-target="#editar<?php echo $id; ?>"><i class="fas fa-pencil-alt"></i></i></a></td>
                      </tr> 
                      <!-- MODAL EDITAR  -->
<div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel">Deseja editar essa Unidade?</h4>                     
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                              
                </div>
                <div classs="modal-body">
                <form method="POST" action="../../model/unidade/edita.php?id=<?php echo $dados['id_unidade']; ?>" class="ml-2">
                  <div class="form-row ml-3">
                      <div class="form-group col-sm-8">
                          <label for="nome">Descrição Unidade:</label>
                          <input type="text" id="nome" class="form-control" name="nome" value="<?php echo $dados['descricao_unidade']; ?>">
                      </div>
                  </div>                  
                </div>
                <div class="modal-footer">                  
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Ops, não quero!</button>
                    <input type="submit"  class="btn btn-primary" style="color: white" value="Sim, eu quero!">
                </div>
              </form>
            </div>
        </div>
    </div>
</div>   
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

  <!-- MODAL -->
  <div class="modal fade" id="Cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel">Deseja mesmo excluir este cadastro?</h4>                     
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                              
                </div>
                
                <div class="modal-footer">
                    <button type="button" href="#" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>
  
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="../../js/sb-admin-2.min.js"></script>


  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
