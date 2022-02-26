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
  <script>
  function calcular() {
  var n1 = parseInt(document.getElementById('n1').value, 10);
  var n2 = parseInt(document.getElementById('n2').value, 10);
  var n3 = parseInt(document.getElementById('n3').value, 10);
  document.getElementById('resultado').innerHTML = n1 + n2 + n3;
}

  function calcular2() {
  var n4 = parseInt(document.getElementById('n4').value, 10);
  var n5 = 1.2;
  document.getElementById('resultado2').innerHTML = n4/n5;
}

</script>
</head>

<body id="page-top">

<?php include_once "../../model/conexao.php" ?>
<?php include_once "../navbar.php" ?>

<div class="container-fluid">

<!-- <div id="resultado"></div> -->
    <div class="row">        
        <div class="col-12 text-center my-4">            
            <h1 style="font-weight: 330;">
            <a class="btn-circle btn-lg custom-link" title="Voltar" onclick="history.go(-1);" style="float: left;"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>
                <i class="fas fa-users" style="color: #337ab7; "></i>
                Disciplinas
            </h1>
        </div>
    </div>
    <form action="../../model/disciplina/cadastro.php" method="POST">
        <div class="form-row ">
            <div class="form-group col-sm-5">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="form-control" name="nome" maxlength="255">
            </div>
            <div class="form-group col-sm-2">
                <label for="sigla">Sigla:</label>
                <input type="text" id="sigla" class="form-control" name="sigla" maxlength="10">
            </div>
            <div class="form-group col-sm-5">
                <label for="curso"> Curso:</label>
                <select id="curso" class="form-control" name="curso">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM curso";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['nome'] . "</option>";
                        }
                    ?>
                </select>
            </div>
        </div> <!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-4">
                <label for="departamento"> Departamento:</label>
                <select id="departamento" class="form-control" name="departamento">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM departamento";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['nome'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="semestre">Período:</label>
                <input type="text" id="semestre" class="form-control" name="semestre" maxlength="2">
            </div>
            <div class="form-group col-sm-4">
                <label for="cat">Créditos aulas teóricos:</label>
                <input type="number" id="n1" class="form-control" name="cat" maxlength="4">
            </div>
        </div><!-- Fim row -->

</script>
        <div class="form-row ">
            
            <div class="form-group col-sm-4">
                <label for="cap">Créditos aula práticas:</label>
                <input type="number" id="n2" class="form-control" name="cap" maxlength="4">
            </div>
            <div class="form-group col-sm-4">
                <label for="cad">Créditos aulas distância:</label>
                <input type="number" id="n3" class="form-control" name="cad" onblur="calcular()" maxlength="4">
            </div>
            <div class="form-group col-sm-4">
                <label for="cht">Carga horária total:</label>
                <input type="number" id="n4" class="form-control" name="cht" onblur="calcular2()" maxlength="4">
            </div>
        </div><!-- Fim row -->                         

        <div class="form-row my-3" >
        <div class="form-group col-sm-3">
                    <label for="credito_total">Crédito Totais(horas/aula):</label>
                    <button type="text" id="credito_total" class="form-control" name="credito_total"  disabled>
                        <span id='resultado'></span>
                    </button>
                </div>
                <div class="form-group col-sm-2">
                    <label for="modulo">Módulo Aula(/horas):</label>
                    <button type="text" id="modulo" class="form-control" name="modulo" disabled>    
                        <span id='resultado2'></span>
                    </button>
                </div>
                <div class="form-group col-sm-5"></div> 
                <div class="form-group ">    
                    <input class="btn btn-primary mr-2" type="submit" value="Salvar" id="salvar" style="float: right;" />
                </div>
                <div class="form-group ">
                    <a class="btn btn-danger text-white" id="voltar"  data-toggle="modal" style="float: right;" data-target="#Cancelar">Cancelar</a>
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