<?php
session_start();
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $curso = $_POST["curso"];
    $dep = $_POST["departamento"];
    $semestre = $_POST["semestre"];
    $cat = $_POST["cat"];
    $cap = $_POST["cap"];
    $cad = $_POST["cad"];
    $cht = $_POST["cht"];

    include_once '../conexao.php';

$sql_departamento ="SELECT * FROM departamento WHERE nome='$dep'";
$consulta_departamento = mysqli_query($conn,$sql_departamento); 
$dados_departamento = mysqli_fetch_assoc($consulta_departamento);
$id_departamento = $dados_departamento['id_departamento'];   

$sql_curso ="SELECT * FROM curso WHERE nome='$curso'";
$consulta_curso = mysqli_query($conn,$sql_curso); 
$dados_curso = mysqli_fetch_assoc($consulta_curso);
$id_curso = $dados_curso['id_curso'];   

$credito_total = $cat + $cap + $cad ;
$modulo = $cht/1.2;

    $sql = $conn->query("SELECT * FROM disciplina WHERE nome='$nome'");
			
		if(mysqli_num_rows($sql) > 0){
			unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Disciplina <span class="text-danger">'.$nome.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
    header('Location: /sgd/view/form/cadastroDisciplina.php');
		} else {
             if(!$conn->query("INSERT INTO disciplina(nome, sigla, curso_id, departamento_id, 
                semestre, credito_aulaTeorico, credito_aulaPratica, credito_aulaDistancia, cargaHoraria_total,
                modulo_aula, credito_total) 
                VALUES ('$nome','$sigla','$id_curso','$id_departamento','$semestre','$cat', '$cap', '$cad', '$cht'
                ,'$modulo' ,'$credito_total')"))
              die ('Os dados não foram inseridos');
              unset($_SESSION['msg']);
              unset($_SESSION['status']);
              $_SESSION['msg'] = '<span>Disciplina <span class="text-success"> '.$nome.' </span> cadastrado.</span>';
              $_SESSION['status'] = 'bg-success';
              header('Location: /sgd/view/form/cadastroDisciplina.php'); 
        }

?>