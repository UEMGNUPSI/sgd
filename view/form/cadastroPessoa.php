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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="../../js/mascara.js"></script>

</head>

<body id="page-top">

<?php include_once "../../model/conexao.php" ?>
<?php include_once "../navbar.html" ?>


<div class="container-fluid">
    <div class="row">        
        <div class="col-12 text-center my-4">            
            <h1 style="font-weight: 330;">
            <a class="btn-circle btn-lg custom-link" title="Voltar" onclick="history.go(-1);" style="float: left;"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>
                <i class="fas fa-users" style="color: #337ab7; "></i>
                Pessoas
            </h1>
        </div>
    </div>
    <form action="../../model/pessoas/cadastro.php" method="POST" id="form1" name="form1">
        <div class="form-row ">
            <div class="form-group col-sm-4">
                <label for="masp">Masp:</label>
                <input type="text" id="masp" class="form-control" name="masp" maxlength="15">
                <p id="resposta"></p>
            </div>
            <div class="form-group col-sm-8">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="form-control" name="nome" maxlength="255">
            </div>
        </div> <!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-4">
                <label for="rg">Rg:</label>
                <input type="text" id="rg" class="form-control" name="rg" maxlength="10">
            </div>
            <div class="form-group col-sm-4">
                <label for="CPF">CPF:</label>
                <input type="text" id="CPF" class="form-control" name="CPF" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
            </div>
            <div class="form-group col-sm-4">
                <label for="rt">Regime de Trabalho:</label>
                <input type="text" id="rt" class="form-control" name="rt" maxlength="10">
            </div>
        </div><!-- Fim row -->

        <div class="form-row ">
            
            <div class="form-group col-sm-4">
                <label for="ch">Carga Horária:</label>
                <input type="text" id="ch" class="form-control" name="ch" maxlength="10">
            </div>
            <div class="form-group col-sm-6">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" maxlength="255">
            </div>
            <div class="form-group col-sm-2">
                <label for="tel">Telefone:</label>
                <input type="text" id="tel" class="form-control" name="tel" onkeyup="mascara( this, mtel );" maxlength="14">
            </div>
        </div><!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-4">
                <label for="cel">Celular:</label>
                <input type="text" id="cel" class="form-control" name="cel" onkeyup="mascara( this, mtel );" maxlength="15">
            </div>
            <div class="form-group col-sm-4">
                <label for="cel2">Celular 2(Opcional):</label>
                <input type="text" id="cel2" class="form-control" name="cel2" onkeyup="mascara( this, mtel );" maxlength="15">
            </div>
            <div class="form-group col-sm-4">
                <label for="status"> Status:</label>
                <select id="status" class="form-control" name="status">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM statuspessoa";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['descricao'] . "</option>";
                        }
                    ?>
                </select>
            </div>
        </div><!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-3">
                <label for="ende">Endereço:</label>
                <input type="text" id="ende" class="form-control" name="ende" maxlength="255">
            </div>
            <div class="form-group col-sm-2">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" class="form-control" name="bairro" maxlength="255">
            </div>
            <div class="form-group col-sm-3">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" class="form-control" name="cidade" maxlength="255">
            </div>
            <div class="form-group col-sm-2">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" class="form-control" name="estado" maxlength="255">
            </div>
            <div class="form-group col-sm-2">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" class="form-control" name="cep" onkeypress="mascar(this, '#####-###')" maxlength="9">
            </div>
        </div><!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-3">
                <label for="cargo"> Cargo:</label>
                <select id="cargo" class="form-control" name="cargo">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM cargo";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['descricao_cargo'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="unidade"> Unidade:</label>
                <select id="unidade" class="form-control" name="unidade">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM unidade";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['descricao_unidade'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="lattes">Lattes:</label>
                <input type="text" id="lattes" class="form-control" name="lattes" maxlength="255">
            </div>
            <div class="form-group col-sm-3">
                <label for="ensino">Nivel de Ensino:</label>
                <select id="ensino" class="form-control" name="ensino">
                <option selected>Selecione...</option>
                    <?php 
                        $sql = "SELECT * FROM ensino";
                        $consulta = mysqli_query($conn, $sql);

                        while ($dados = mysqli_fetch_assoc($consulta)) {

                            echo "<option>" . $dados['nome'] . "</option>";
                        }
                    ?>
                </select>
            </div>
        </div><!-- Fim row -->

        <div class="form-row ">
            <div class="form-group col-sm-4">                
            <label for="ec">Edital Concurso:</label>
            <input type="text" id="ec" class="form-control" name="ec" maxlength="255">
            </div>
            <div class="form-group col-sm-4">
                <label for="vc">Vaga Concurso:</label>
                <input type="text" id="vc" class="form-control" name="vc" maxlength="10">
            </div>
            <div class="form-group col-sm-4">
                <label for="dep"> Departamento:</label>
                <select id="dep" class="form-control" name="dep">
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
        </div><!-- Fim row -->                    

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
    
  <script type="text/javascript" src="../../js/verificaMasp.js"></script>

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
