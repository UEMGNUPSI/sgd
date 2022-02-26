<?php 

include_once "../conexao.php";
$id = $_POST['id'];
$nome = $_POST['nome'];
$unidade = $_POST['unidade'];
$modalidade = $_POST['modalidade'];
$semestres = $_POST['semestres'];
$turno = $_POST['turno'];
$vaga = $_POST['vaga'];

$sql_unidade ="SELECT * FROM unidade WHERE descricao_unidade='$unidade'";
$consulta_unidade = mysqli_query($conn,$sql_unidade); 
$dados_unidade = mysqli_fetch_assoc($consulta_unidade);
$id_unidade = $dados_unidade['id_unidade'];

$sql = "UPDATE curso SET nome = '$nome', modalidade = '$modalidade', 
quantidade_semestres = '$semestres', turno = '$turno', quantidade_vagas = '$vaga', 
unidade_id = '$id_unidade' WHERE id_curso='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>