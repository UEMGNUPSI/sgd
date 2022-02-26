<?php 

include_once "../conexao.php";
$id = $_GET['id'];
$nome = $_POST['nome'];
$nivel = $_POST['nivel'];
$nivel = 1;

$sql = "UPDATE cargo SET descricao_cargo = '$nome', nivel_id = '$nivel' WHERE id_cargo='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>