<?php
    session_start();
    $desc = $_POST["desc"];

    include_once '../conexao.php';

    $sql = $conn->query("SELECT * FROM ensino WHERE nome='$desc'");
			
		if(mysqli_num_rows($sql) > 0){
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Nível de Ensino <span class="text-danger">'.$desc.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
      header('Location: /sgd/view/form/cadastroEnsino.php');
		} else {
             if(!$conn->query("INSERT INTO ensino(nome) 
                VALUES ('$desc')"))
              die ('Os dados não foram inseridos');
              unset($_SESSION['msg']);
              unset($_SESSION['status']);
              $_SESSION['msg'] = '<span>Nível de Ensino<span class="text-success"> '.$desc.' </span> cadastrado.</span>';
              $_SESSION['status'] = 'bg-success';
              header('Location: /sgd/view/form/cadastroEnsino.php'); 
        }

?>