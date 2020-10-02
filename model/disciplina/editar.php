<?php 

include_once "../conexao.php";

$id = $_POST['id'];
$nome = $_POST["nome"];
$sigla = $_POST["sigla"];
$curso = $_POST["curso"];
$dep = $_POST["departamento"];
$semestre = $_POST["semestre"];
$cat = $_POST["cat"];
$cap = $_POST["cap"];
$cad = $_POST["cad"];
$cht = $_POST["cht"];

$sql_departamento ="SELECT * FROM departamento WHERE nome='$dep'";
$consulta_departamento = mysqli_query($conn,$sql_departamento); 
$dados_departamento = mysqli_fetch_assoc($consulta_departamento);
$id_departamento = $dados_departamento['id_departamento'];   
$id_departamento = 2;   

$sql_curso ="SELECT * FROM curso WHERE nome='$curso'";
$consulta_curso = mysqli_query($conn,$sql_curso); 
$dados_curso = mysqli_fetch_assoc($consulta_curso);
$id_curso = $dados_curso['id_curso'];   
$id_curso = 2;   

$credito_total = $cat + $cap + $cad ;
$modulo = $cht/1.2;

$sql = "UPDATE disciplina SET nome = '$nome', sigla = '$sigla', 
curso_id = '$id_curso', departamento_id = '$id_departamento', semestre = '$semestre', 
credito_aulaTeorico = '$cat', credito_aulaPratica = '$cap', credito_aulaDistancia = '$cad', 
cargaHoraria_total = '$cht', modulo_aula = '$modulo', credito_total = '$credito_total' WHERE id_disciplina='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>