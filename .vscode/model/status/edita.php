<?php 

include_once "../conexao.php";
$id = $_GET['id'];
$nome = $_POST['nome'];

$sql = "UPDATE statuspessoa SET descricao = '$nome' WHERE id='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>