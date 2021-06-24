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
        <div class="row justify-content-md-center">
            <a href="index.php" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>            
            <h1 style="font-weight: 330;" class="col-9 text-center ">
            <i class="icoLojaCadastro fas fa-user-plus"></i>     Atribuições
                </h1>    
        </div>    
        <form method="POST" action="#">
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="telefone">Docente:</label>
                    <select class="form-control" name="nivel">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="telefone">Semestre:</label>
                    <select class="form-control" name="nivel">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div> <!-- Fim row -->
            <div class="form-row justify-content-md-center">
                <div class="form-group col-sm-6 text-center">
                    <label for="telefone">Curso:</label>
                    <select class="form-control" name="nivel">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div> <!-- Fim row -->
    <div class="row">
     <div class="card shadow " style="width: 55%;">
     <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Lista de Disciplinas</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Departamento</th>
                  <th>Adicionar</th>
                </tr>
                </thead>
                <tbody>
                <tr> 
                    <td>SI</td>
                    <td>AAA</td>
                    <td style="color: #337ab7;"><i class="fas fa-user-plus"></i></td>
                </tr>                           
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div> 
        <a class="btn btn-primary ml-3 mt-5 text-white" style="pointer-events: none;cursor: default;text-decoration: none;">
          <i class="fa fa-arrow-right" aria-hidden="true" ></i>
        </a>
      </div>
      <div class="card shadow ml-3 " style="width: 35%;">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Disciplinas Atribuidas</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Departamento</th>
                  <th>Curso</th>
                </tr>
                </thead>
                <tbody>
                <tr> 
                    <td>SI</td>
                    <td>AAA</td>
                    <td> asas</td>
                </tr>                              
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
            <div class="form-row my-3" style="float: right;">
                <div class="col-sm-12" >                
                    <input class="btn btn-primary mr-3" type="submit" value="Salvar" id="salvar"  />
                </div>
            </div>
        </form>        
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
