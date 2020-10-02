<!DOCTYPE html>
<?php session_start();?>
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

</head>

<body id="page-top">

<?php include_once "../navbar.html" ?>

<div class="container-fluid">
    <div class="row">        
        <div class="col-12 text-center my-4">            
            <h1 style="font-weight: 330;">
            <a class="btn-circle btn-lg custom-link" title="Voltar" onclick="history.go(-1);" style="float: left;"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>
                <i class="fas fa-users" style="color: #337ab7; "></i>
                Unidades
            </h1>
        </div>
    </div>
    <form method="POST" action="../../model/unidade/cadastro.php">
        <div class="form-row ">
            <div class="form-group col-sm-12">
                <label for="nome">Descrição Unidade:</label>
                <input type="text" id="nome" class="form-control" name="description" maxlength="255">
            </div>
        </div> <!-- Fim row -->



        <div class="form-row my-3" style="float: right;">
            <div class="col-sm-12" >                
                <input class="btn btn-primary mr-3" type="submit" value="Salvar" id="salvar"  />
                <a class="btn btn-danger text-white" id="voltar"  data-toggle="modal" data-target="#Cancelar">Cancelar</a>
            </div>
        </div>
    </form>            

</div><!-- fim container fluid -->
<?php
      if(isset($_SESSION['msg'])) {
        session_destroy();

        if (isset($_SESSION['status'])) {
          if($_SESSION['status'] == 'bg-success'){
            $text ='<i class="fas fa-check-circle"></i><span class="mr-3"> Cadastrado com sucesso </span>';
          }else {
            $text ='<i class="fas fa-exclamation-triangle"></i><span class="mr-3"> Erro ao cadastrar </span>';
          }
        }
        echo'
          <div class="toast" data-delay="31500" style="position: absolute; top: 80px; right: 26px;">
            <div class="toast-header '.$_SESSION['status'].'">
              <span class="mr-auto text-light">'.$text.'</span>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
              </button>
            </div>
            <div class="toast-body">
             '.$_SESSION['msg'].'
            </div>
          </div>';
      }
    ?>  

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
                    <h4 id="myModalLabel">Deseja mesmo cancelar este cadastro?</h4>                     
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                              
                </div>
                
                <div class="modal-footer">
                    <button type="button" onclick="history.go(-1);" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="../../js/sb-admin-2.min.js"></script>

  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
  <script>
  $(document).ready(function(){
    $('.toast').toast('show');
  });
</script>
</body>

</html>
