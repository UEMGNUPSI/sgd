<?php
session_start();
$id = $_POST['id'];
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
$id_cargo = 1;

$sql_unidade ="SELECT * FROM unidade WHERE descricao_unidade='$unidade'";
$consulta_unidade = mysqli_query($conn,$sql_unidade); 
$dados_unidade = mysqli_fetch_assoc($consulta_unidade);
$id_unidade = $dados_unidade['id_unidade'];
$id_unidade = 1;

$sql_ensino ="SELECT * FROM ensino WHERE nome='$ensino'";
$consulta_ensino = mysqli_query($conn,$sql_ensino); 
$dados_ensino = mysqli_fetch_assoc($consulta_ensino);
$id_ensino = $dados_ensino['id_ensino'];
$id_ensino = 1;

$sql_departamento ="SELECT * FROM departamento WHERE nome='$dep'";
$consulta_departamento = mysqli_query($conn,$sql_departamento); 
$dados_departamento = mysqli_fetch_assoc($consulta_departamento);
$id_departamento = $dados_departamento['id_departamento'];    
$id_departamento = 1;
  
$sql = "SELECT * FROM statuspessoa WHERE descricao = '$status'";
$consulta = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($consulta);
$id_status = $dados['id'];
$id_status = 1;

$sql = "UPDATE pessoas SET masp = '$masp', nome = '$nome', 
rg = '$rg', cpf = '$CPF', regime_trabalho = '$rt', 
carga_horaria = '$ch', email = '$email', telefone = '$tel', 
celular1 = '$cel', celular2 = '$cel2', endereco = '$ende', bairro = '$bairro',
cidade = '$cidade', estado = '$estado', cep = '$cep', link_lattes = '$lattes', edital_concurso = '$ec',
vaga_concurso = '$vc', unidade_id = '$id_unidade', status_id = '$id_status', 
cargo_id = '$id_cargo', departamento_id = '$id_departamento', ensino_id = '$id_ensino', nivel_id = '1'
 WHERE id_pessoa='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
   echo "Cadastrado";
} else {
    echo("Error description: " . mysqli_error($conn));
}

?>