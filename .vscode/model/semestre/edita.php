<?php 

include_once "../conexao.php";
$id = $_GET['id'];
$nome = $_POST['nome'];
$status = $_POST['status'];

$sql = "UPDATE semestreletivo SET descricao_letivo = '$nome', status_letivo = '$status' WHERE id_letivo='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "1";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>