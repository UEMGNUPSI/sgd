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
<?php include_once "../navbar.php" ?>
<div class="container-fluid">
<div class="row justify-content-md-center">
        <a href="javascript:history.back()" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>            
        <h1 style="font-weight: 330;" class="col-9 text-center ">
          <i class="icoLojaCadastro fas fa-window-restore mr-3"></i>Nivel de Acesso
        </h1>    
</div>  

<form method="POST" action="../../model/acesso/cadastro.php" name="formulario" class="mt-5">
        <div class="form-row ">
          <div class="form-group col-sm-6">
              <label for="telefone">Nível:</label>
              <input type="number" id="nome" class="form-control" name="check[0]">
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check mt-3 ">
              <input type="checkbox" class="form-check-input " id="exampleCheck1" name="check[1]">
              <label class="form-check-label h5" for="exampleCheck1">Pessoas</label>          
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck2" name="check[2]">
              <label class="form-check-label h5" for="exampleCheck2">Disciplinas</label>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck3" name="check[3]">
              <label class="form-check-label h5" for="exampleCheck3">Ocorrências</label>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck4" name="check[4]">
              <label class="form-check-label h5" for="exampleCheck4">Atribuição</label>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck5" name="check[5]">
              <label class="form-check-label h5" for="exampleCheck5">Disciplinas Ofertadas</label>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck6" name="check[6]">
              <label class="form-check-label h5" for="exampleCheck6">Relatórios</label>
          </div>
        </div>
        <div class="form-row ">
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck7" name="check[7]">
              <label class="form-check-label h5" for="exampleCheck7">Paramêtros</label>
          </div>
        </div>
        <div class="form-row my-3" style="float: right;">
            <div class="col-sm-12" >                
                <input class="btn btn-primary mr-3" type="submit" value="Salvar" id="salvar"   />
                <a class="btn btn-danger text-white" id="voltar"  data-toggle="modal" data-target="#Cancelar">Cancelar</a>
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
