<?php 

include_once "../conexao.php";
$id = $_GET['id'];
$nome = $_POST['nome'];

$sql = "UPDATE unidade SET descricao_unidade = '$nome' WHERE id_unidade='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>