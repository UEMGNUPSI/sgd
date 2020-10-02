<?php
    session_start();
    $description = $_POST["description"];


    include_once '../conexao.php';

    $sql = $conn->query("SELECT * FROM unidade WHERE descricao_unidade='$description'");
			
		if(mysqli_num_rows($sql) > 0){
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Unidade <span class="text-danger">'.$description.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
      header('Location: /sgd/view/form/cadastroUnidade.php');
		} else {
             if(!$conn->query("INSERT INTO unidade(descricao_unidade) 
                VALUES ('$description')"))
              die ('Os dados não foram inseridos');
              unset($_SESSION['msg']);
              unset($_SESSION['status']);
              $_SESSION['msg'] = '<span>Unidade <span class="text-success"> '.$description.' </span> cadastrado.</span>';
              $_SESSION['status'] = 'bg-success';
              header('Location: /sgd/view/form/cadastroUnidade.php'); 
        }

?>