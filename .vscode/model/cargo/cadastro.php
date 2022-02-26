<?php
  session_start();

  $description = $_POST["description"];
  $nivel = $_POST["nivel"];

  include_once '../conexao.php';

  $sql = $conn->query("SELECT * FROM cargo WHERE descricao_cargo='$description'");
			
	if(mysqli_num_rows($sql) > 0){
    unset($_SESSION['msg']);
    unset($_SESSION['status']);
    $_SESSION['msg'] = '<span>Cargo <span class="text-danger">'.$description.'</span> já está cadastrado</span>';
    $_SESSION['status'] = 'bg-danger';
    header('Location: /sgd/view/form/cadastroCargo.php');
	} else {
    if(!$conn->query("INSERT INTO cargo(descricao_cargo, nivel_id) 
      VALUES ('$description','$nivel')"))
      die ('Os dados não foram inseridos');
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Cargo <span class="text-success"> '.$description.' </span> cadastrado.</span>';
      $_SESSION['status'] = 'bg-success';
      header('Location: /sgd/view/form/cadastroCargo.php'); 
    }
?>