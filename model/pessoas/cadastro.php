<?php
session_start();
$masp = $_POST["masp"];
$nome = $_POST["nome"];
$rg = $_POST["rg"];
$CPF = $_POST["CPF"];
$rt = $_POST["rt"];
$ch = $_POST["ch"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$cel = $_POST["cel"];
$cel2 = $_POST["cel2"];
$status = $_POST["status"];
$ende = $_POST["ende"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$cargo = $_POST["cargo"];
$unidade = $_POST["unidade"];
$lattes = $_POST["lattes"];
$ensino = $_POST["ensino"];
$ec = $_POST["ec"];
$vc = $_POST["vc"];
$dep = $_POST["dep"];

include_once '../conexao.php';

$sql_cargo ="SELECT * FROM cargo WHERE descricao_cargo='$cargo'";
$consulta_cargo = mysqli_query($conn,$sql_cargo); 
$dados_cargo = mysqli_fetch_assoc($consulta_cargo);
$id_cargo = $dados_cargo['id_cargo'];

$sql_unidade ="SELECT * FROM unidade WHERE descricao_unidade='$unidade'";
$consulta_unidade = mysqli_query($conn,$sql_unidade); 
$dados_unidade = mysqli_fetch_assoc($consulta_unidade);
$id_unidade = $dados_unidade['id_unidade'];

$sql_ensino ="SELECT * FROM ensino WHERE nome='$ensino'";
$consulta_ensino = mysqli_query($conn,$sql_ensino); 
$dados_ensino = mysqli_fetch_assoc($consulta_ensino);
$id_ensino = $dados_ensino['id_ensino'];

$sql_departamento ="SELECT * FROM departamento WHERE nome='$dep'";
$consulta_departamento = mysqli_query($conn,$sql_departamento); 
$dados_departamento = mysqli_fetch_assoc($consulta_departamento);
$id_departamento = $dados_departamento['id_departamento'];    
  
$sql = "SELECT * FROM statuspessoa WHERE descricao = '$status'";
$consulta = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($consulta);
$id_status = $dados['id'];

$sql = $conn->query("SELECT * FROM pessoas WHERE masp='$masp'");
        
    if(mysqli_num_rows($sql) > 0){
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
        $_SESSION['msg'] = '<span>MASP <span class="text-danger">'.$masp.'</span> já está cadastrado</span>';
        $_SESSION['status'] = 'bg-danger';
        header('Location: /sgd/view/form/cadastroPessoa.php');	
    } else {
         if(!$conn->query("INSERT INTO pessoas(masp, senha, nome, rg, cpf, regime_trabalho, carga_horaria, email,
            telefone, celular1, celular2, status_id, endereco, bairro, cidade, estado, cep, cargo_id,
            unidade_id, link_lattes, ensino_id, edital_concurso, vaga_concurso, departamento_id, nivel_id) 
            VALUES ('$masp', '1','$nome', '$rg', '$CPF', '$rt', '$ch', '$email', '$tel','$cel','$cel2',
                '$id_status', '$ende','$bairro','$cidade','$estado','$cep','$id_cargo', '$id_unidade', '$lattes',
                '$id_ensino','$ec', '$vc', '$id_departamento', '1')"))
          die ('Os dados não foram inseridos');
          unset($_SESSION['msg']);
          unset($_SESSION['status']);
          $_SESSION['msg'] = '<span>MASP <span class="text-success"> '.$masp.' </span> cadastrado.</span>';
          $_SESSION['status'] = 'bg-success';
          header('Location: /sgd/view/form/cadastroPessoa.php');  
    }

?>