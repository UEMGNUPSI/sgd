<?php
 session_start();
    $name = $_POST["name"];
    $flag = $_POST["flag"];


    include_once '../conexao.php';

    $sql = $conn->query("SELECT * FROM departamento WHERE nome='$name'");
			
		if(mysqli_num_rows($sql) > 0){
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Departamento <span class="text-danger">'.$name.'</span> já está cadastrado</span>';
      $_SESSION['status'] = 'bg-danger';
      header('Location: /sgd/view/form/cadastroDepartamentos.php');	
		} else {
             if(!$conn->query("INSERT INTO departamento(nome, sigla) 
                VALUES ('$name', '$flag')"))
              die ('Os dados não foram inseridos');
              unset($_SESSION['msg']);
              unset($_SESSION['status']);
              $_SESSION['msg'] = '<span>Departamento <span class="text-success"> '.$name.' </span> cadastrado.</span>';
              $_SESSION['status'] = 'bg-success';
              header('Location: /sgd/view/form/cadastroDepartamentos.php'); 
        }

?>