<?php
  session_start();

  $description = $_POST["description"];
  $status = $_POST["status"];

  include_once '../conexao.php';

  $sql = $conn->query("SELECT * FROM cargo WHERE descricao_cargo='$description'");
			
	if(mysqli_num_rows($sql) > 0){
    unset($_SESSION['msg']);
    unset($_SESSION['status']);
    $_SESSION['msg'] = '<span>Semestre <span class="text-danger">'.$description.'</span> já está cadastrado</span>';
    $_SESSION['status'] = 'bg-danger';
    header('Location: /sgd/view/form/cadastroSemestre.php');
	} else {
    if(!$conn->query("INSERT INTO semestreletivo(descricao_letivo, status_letivo) 
      VALUES ('$description','$status')"))
      die ('Os dados não foram inseridos');
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Semestre <span class="text-success"> '.$description.' </span> cadastrado.</span>';
      $_SESSION['status'] = 'bg-success';
      header('Location: /sgd/view/form/cadastroSemestre.php'); 
    }
?>