<?php 
    include_once '../conexao.php';

    $VarMasp = $_POST['email'];
        $sql = $conn->query("SELECT masp FROM pessoas WHERE masp = '$VarMasp'");
        
        if(mysqli_num_rows($sql) > 0){
            echo json_encode(array('email' => 'Este MASP já está cadastrado'));
        } else {
            echo json_encode(array('email' => 'MASP válido'));
        }


?>