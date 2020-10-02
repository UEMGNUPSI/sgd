<?php
    session_start();
    $name = $_POST["nome"];
    
    include_once '../conexao.php';

    $sql = $conn->query("SELECT * FROM statuspessoa WHERE descricao='$name'");
			
		if(mysqli_num_rows($sql) > 0){
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Status <span class="text-danger">'.$name.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
      header('Location: /sgd/view/form/cadastroStatus.php');	
		} else {
             if(!$conn->query("INSERT INTO statuspessoa(descricao) 
                VALUES ('$name')"))
            die ('Os dados não foram inseridos');
            unset($_SESSION['msg']);
            unset($_SESSION['status']);
            $_SESSION['msg'] = '<span>Status <span class="text-success"> '.$name.' </span> cadastrado.</span>';
            $_SESSION['status'] = 'bg-success';
            header('Location: /sgd/view/form/cadastroStatus.php'); 
        }

?>