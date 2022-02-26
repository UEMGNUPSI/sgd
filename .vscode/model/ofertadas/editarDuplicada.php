<?php
  include_once '../conexao.php';
  
    $id_disciplina = $_GET['disciplina'];
	$valor = 1;
	
	$semestre = $_GET['semestre'];
	$curso = $_GET['curso'];
	// 1 PARA editarDuplicada
	// O PARA NÃO DUPLICADA

	$sql = "SELECT * FROM disciplina where id_disciplina=$id_disciplina";
    $consulta = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($consulta);

	$cat = $dados['credito_aulaTeorico'];
	$cap = $dados['credito_aulaPratica'];
	$cad = $dados['credito_aulaDistancia'];
	
	$cap_duplicada = $cap*2;
	$credito_total = $cat + $cap_duplicada + $cad;

	$sql = "UPDATE disciplina SET credito_aulaPratica='$cap_duplicada',credito_total='$credito_total',statusDuplicada = '$valor' WHERE id_disciplina='$id_disciplina'";
	$update = mysqli_query($conn, $sql);

	header('Location: /sgd/view/form/cadastroOfertadas.php?semestre='.$semestre.'&curso='.$curso.''); 

?>