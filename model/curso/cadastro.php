<?php
  session_start();
    $desc = $_POST["desc"];
    $unidade = $_POST["unidade"];
    $modalidade = $_POST["modalidade"];
    $semestres = $_POST["semestres"];
    $turno = $_POST["turno"];
    $vaga = $_POST["vaga"];

    include_once '../conexao.php';

    $sql_unidade ="SELECT * FROM unidade WHERE descricao_unidade='$unidade'";
    $consulta_unidade = mysqli_query($conn,$sql_unidade); 
    $dados_unidade = mysqli_fetch_assoc($consulta_unidade);
    $id_unidade = $dados_unidade['id_unidade'];

    $sql = $conn->query("SELECT * FROM curso WHERE nome='$desc'");
			
		if(mysqli_num_rows($sql) > 0){
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Curso <span class="text-danger">'.$desc.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
      header('Location: /sgd/view/form/cadastroCurso.php');
		} else {
        if(!$conn->query("INSERT INTO curso(nome, unidade_id, modalidade, quantidade_semestres, turno, quantidade_vagas) 
          VALUES ('$desc','$id_unidade','$modalidade','$semestres','$turno','$vaga')"))
        die ('Os dados não foram inseridos');
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
        $_SESSION['msg'] = '<span>Curso <span class="text-success"> '.$desc.' </span> cadastrado.</span>';
        $_SESSION['status'] = 'bg-success';
        header('Location: /sgd/view/form/cadastroCurso.php'); 
        }

?>