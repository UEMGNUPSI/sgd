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
        <a href="javascript:history.back()" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>            
        <h1 style="font-weight: 330;" class="col-9 text-center ">
          <i class="icoLojaCadastro fas fa-user-plus"></i>Atribuições
        </h1>    
    </div>    
      <form method="GET" action="#" name="formulario">
        <div class="form-row ">
            <div class="form-group col-sm-6">
                <label for="telefone">Docente:</label>
                <select class="form-control" name="pessoa">
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-sm-6">
                <label for="telefone">Semestre:</label>
                <select class="form-control" name="semestre" id="semestre">
                    <option >Selecione...</option>
                        <optgroup label="Semestres">
                            <?php 
                                $sql = "SELECT * FROM semestreletivo";
                                $consulta = mysqli_query($conn, $sql);

                                while ($dados = mysqli_fetch_assoc($consulta)) {
                                    ?>

                                    <option value="<?php echo $dados['id_letivo'];?>" 
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
        </div> <!-- Fim row -->
        <div class="form-row justify-content-md-center">
            <div class="form-group col-sm-6 text-center">
              <label for="telefone">Curso:</label>
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
      </form>  

  <?php                  
      if (isset($_GET['curso'])) {
        $semestre = $_GET['semestre'];
        $curso = $_GET['curso'];
  ?>  

    <div class="row">
      <div class="col-7">
        <div class="card shadow">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Disciplinas Ofertadas</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive" >

                  <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Disciplina</th>
                        <th>Curso</th>
                        <th>Adicionar</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql = "SELECT * FROM ofertadas WHERE curso_id = $curso";
                          $consulta = mysqli_query($conn, $sql);
                          while ($dados = mysqli_fetch_assoc($consulta)) {
                            $disciplina_id = $dados['disciplina_id'];        
                            $curso_id = $dados['curso_id'];    
                            $sql_ofertadas = "SELECT * FROM ofertadas JOIN disciplina ON disciplina.id_disciplina = ofertadas.disciplina_id WHERE disciplina_id = $disciplina_id";
                            $consulta_ofertadas = mysqli_query($conn, $sql_ofertadas);
                            $dados_ofertadas = mysqli_fetch_assoc($consulta_ofertadas);  
                            
                            $sql_curso = "SELECT * FROM ofertadas JOIN curso ON curso.id_curso = ofertadas.curso_id WHERE curso_id = $curso_id";
                            $consulta_curso = mysqli_query($conn, $sql_curso);
                            $dados_curso = mysqli_fetch_assoc($consulta_curso);
                            $id = $dados['id_ofertadas'];                              
                            echo "<tr>";
                            echo "<td>" . $dados_ofertadas['nome'] . "</td>"; //nome disciplina
                            echo "<td>" . $dados_curso['nome'] . "</td>"; //nome curso 
                        ?>                     
                            <td>
                              <a href="#"><i class="fas fa-trash"></i></a> 
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
        <div class="card shadow">
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
    </div> <!-- fim row -->

   <?php } ?>      
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
