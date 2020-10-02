<?php 

include_once "../conexao.php";

$id_departamento = $_GET['id'];
$departamento = $_POST["desc"];
$sigla = $_POST["sigla"];


$sql = "UPDATE departamento SET nome = '$departamento', sigla = '$sigla'  WHERE id_departamento='$id_departamento'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Editado";
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>