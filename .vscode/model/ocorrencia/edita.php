<?php 

include_once "../conexao.php";

$id_ocorrencia = $_GET['id'];
$ocorrencia = $_POST["desc"];
$nome_pessoa = $_POST["nome"];

$sql_pessoas ="SELECT * FROM pessoas WHERE nome='$nome_pessoa'";
$consulta_pessoas = mysqli_query($conn, $sql_pessoas); 
$dados_pessoas = mysqli_fetch_assoc($consulta_pessoas );
$id_pessoa = $dados_pessoas['id_pessoa'];
$id_pessoa = 1;

$sql = "UPDATE ocorrencia SET descricao_ocorrencia = '$ocorrencia', pessoa_id = '$id_pessoa'  WHERE id_ocorrencia='$id_ocorrencia'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Editado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>