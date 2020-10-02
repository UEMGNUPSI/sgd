<?php
 session_start();
$description = $_POST["description"];
$person = $_POST["person"];


include_once '../conexao.php';

$sql_pessoas ="SELECT * FROM pessoas WHERE nome='$person'";
$consulta_pessoas = mysqli_query($conn, $sql_pessoas); 
$dados_pessoas = mysqli_fetch_assoc($consulta_pessoas );
$id_pessoa = $dados_pessoas['id_pessoa'];


$sql = $conn->query("SELECT * FROM ocorrencia WHERE descricao_ocorrencia='$description'");
        
    if(mysqli_num_rows($sql) > 0){
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
        $_SESSION['msg'] = '<span>Ocorrência <span class="text-danger">'.$description.'</span> já está cadastrado</span>';
        $_SESSION['status'] = 'bg-danger';
        header('Location: /sgd/view/form/cadastroOcorrencia.php');	
    } else {
         if(!$conn->query("INSERT INTO ocorrencia(descricao_ocorrencia, pessoa_id) 
            VALUES ('$description', '$id_pessoa')"))
          die ('Os dados não foram inseridos');
          unset($_SESSION['msg']);
          unset($_SESSION['status']);
          $_SESSION['msg'] = '<span>Ocorrência <span class="text-success"> '.$description.' </span> cadastrado.</span>';
          $_SESSION['status'] = 'bg-success';
          header('Location: /sgd/view/form/cadastroOcorrencia.php'); 
    }

?>