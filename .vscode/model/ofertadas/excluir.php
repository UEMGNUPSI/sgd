<?php
  include_once '../conexao.php';
  
    $id_disciplina = $_GET['disciplina'];
    $semestre = $_GET['semestre'];
	$curso = $_GET['curso'];

    $sql = "DELETE FROM ofertadas WHERE id_ofertadas='$id_disciplina'";
	$update = mysqli_query($conn, $sql);  

	header('Location: /sgd/view/form/cadastroOfertadas.php?semestre='.$semestre.'&curso='.$curso.''); 

?>