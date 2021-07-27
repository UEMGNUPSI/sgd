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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
  <script>
              
  </script>

</head>

<body id="page-top">

<?php include_once "../../model/conexao.php" ?>
<?php include_once "../navbar.html" ?>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <a href="javascript:history.back()" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>            
            <h1 style="font-weight: 330;" class="col-9 text-center ">
            <i class="icoLojaCadastro fas fa-folder-plus"></i> Disciplinas Ofertadas
                </h1>    
        </div>    
        <form method="GET" action="#" name="formulario">
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="semestre">Semestre:</label>
                    <select class="form-control" name="semestre" id="semestre" onChange="update()" >
                    <option >Selecione...</option>
                        <optgroup label="Semestres">
                            <?php 
                                $sql = "SELECT * FROM semestreletivo";
                                $consulta = mysqli_query($conn, $sql);

                                while ($dados = mysqli_fetch_assoc($consulta)) {
                                    ?>

                                    <option value="<?php echo $dados['status_letivo'];?>" 
                                        <?php 
                                            if (isset($_GET['semestre'])) {
                                                echo $_GET['semestre']== $dados['status_letivo']?'selected':'';
                                                } 
                                        ?> 
                                    > <!-- VERIFICAÇÃO SELECTED DO OPTION --> 
                                        <?php echo $dados['descricao_letivo']; ?> <!-- VALOR DO OPTION -->
                                    </option>
                            <?php
                                }
                            ?>
                        </optgroup>
                    </select>
                </div>
                <script type="text/javascript">
                    function update() {
                        var select = document.getElementById('semestre');
                        var option = select.options[select.selectedIndex];
                        var ativo = "Ativo";                        
                          
                        if(option.value != ativo){
                            document.getElementById("msgStatus").innerText  = "Só será permitido cadastro quando o status do semestre estiver ATIVO!";
                        }else{
                            document.getElementById("msgStatus").innerText  = "";
                        }
                       

                        document.getElementById('status').value = option.value; // Valor(value) - Id semestre
                        // document.getElementById('text').value = option.text;  Nome - semestre
                    }                    
                </script>
                <div class="form-group col-sm-6">
                    <label for="status">Status:</label>
                    <input type="text" id="status" class="form-control" disabled value=" 
                        <?php if (isset($_GET['semestre'])) {echo $_GET['semestre'];}?>" />
                    <div id="msgStatus" class="text-danger"> </div>
                </div>               
            </div>
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="curso">Curso:</label>
                    <select class="form-control" name="curso" onChange="javascript: submitform()">
                    <option>Selecione...</option>
                        <optgroup label="Cursos">
                            <?php  
                                $sql = "SELECT * FROM curso";
                                $consulta = mysqli_query($conn, $sql);

                                while ($dados = mysqli_fetch_assoc($consulta)) { ?>

                                    <option value="<?php echo $dados['id_curso'];?>" 
                                        <?php 
                                            if (isset($_GET['curso'])) {
                                                echo $_GET['curso']== $dados['id_curso']?'selected':'';
                                                } 
                                        ?> > <!-- VERIFICAÇÃO SELECTED DO OPTION --> 
                                        <?php echo $dados['nome']; ?> <!-- VALOR DO OPTION -->
                                    </option>
                            <?php
                                }
                            ?>
                        </optgroup>
                    </select>
                </div>
            </div> <!-- Fim row -->         
            <script type="text/javascript">
                function submitform() {
                    document.formulario.submit();
                }
            </script>

            <?php                  
                if (isset($_GET['curso'])) {
                    $semestre = $_GET['semestre'];
                    $curso = $_GET['curso'];

                    $sql_semest = "SELECT * FROM semestreletivo WHERE status_letivo='$semestre'";
                    $consulta_semest = mysqli_query($conn, $sql_semest);
                    $dados_semest = mysqli_fetch_assoc($consulta_semest);
            ?>  

        </form>
 
<div class="row" >
    <div class="col-7">
        <div class="card shadow " >
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Disciplinas</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $sql = "SELECT * FROM disciplina where curso_id=$curso";
                                $consulta = mysqli_query($conn, $sql);
                                while ($dados = mysqli_fetch_assoc($consulta)) {     
                                    $id = $dados['id_disciplina'];                         
                                    echo "<tr>";
                                    echo "<td>" . $dados['nome'] . "</td>"; 
                                    echo "<td>" ?>
                                            <a href="../../model/ofertadas/cadastro.php?disciplina=<?php echo $id?>&semestre=<?php echo $dados_semest['id_letivo'] ?>&curso=<?php echo $curso?>">
                                                <i class="fas fa-plus-square"></i>
                                            </a> 
                                        </td>
                                </tr>     
                                <?php } ?>                                                 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      
    <div class="col-1" style="padding-top: 50px;"> 
        <a class="btn btn-primary text-white" style="pointer-events: none;cursor: default;text-decoration: none;">
            <i class="fa fa-arrow-right" aria-hidden="true" ></i>
        </a>

        <a class="btn btn-primary text-white mt-3" style="pointer-events: none;cursor: default;text-decoration: none;">
            <i class="fa fa-arrow-left" aria-hidden="true" ></i>
        </a>
    </div>

    <div class="col-4">
        <div class="card shadow " >
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Disciplinas Ofertadas</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM ofertadas WHERE curso_id = $curso";
                            $consulta = mysqli_query($conn, $sql);
                            while ($dados = mysqli_fetch_assoc($consulta)) {
                                $disciplina_id = $dados['disciplina_id'];       
                                $sql_ofertadas = "SELECT * FROM ofertadas JOIN disciplina ON disciplina.id_disciplina = ofertadas.disciplina_id WHERE disciplina_id = $disciplina_id";
                                $consulta_ofertadas = mysqli_query($conn, $sql_ofertadas);
                                $dados_ofertadas = mysqli_fetch_assoc($consulta_ofertadas);       
                                $id = $dados['id_ofertadas'];                              
                                echo "<tr>";
                                echo "<td>" . $dados_ofertadas['nome'] . "</td>"; //nome disciplina
                        ?>                     
                                <td><a href="#">
                                            <i class="fas fa-trash"></i>
                                    </a> </td>
                            </tr>           
                            <?php } ?>            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>                           
     
</div><!-- fim row tabelas-->

<?php }    
?>              
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
