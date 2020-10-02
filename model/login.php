<?php
    session_start();

    $masp = $_POST["masp"];
    $senha = $_POST["senha"];

    $_SESSION['masp'] = $masp;

    include_once 'conexao.php';

    $result_usuario = "SELECT * FROM pessoas WHERE masp = '$masp' && senha = '$senha'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);

    if(isset($resultado)){
    
    header('Location: ../view/app/index.php?a='.$_SESSION['masp'].'');
    }else {    
    echo"<script language='javascript' type='text/javascript'>window.location.href='../view/login.php?l=Usuário ou senha Inválido!';</script>"; 
    }

?>