<?php
  session_start();

  $disciplina = $_GET["disciplina"];
  $curso = $_GET["curso"];
  $semestre = $_GET["semestre"];

  include_once '../conexao.php';

 	
    if(!$conn->query("INSERT INTO ofertadas(disciplina_id, semestre_id, curso_id) 
      VALUES ('$disciplina','$semestre','$curso')"))
      die ('Os dados não foram inseridos');
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Disciplina <span class="text-success"> '.$disciplina.' </span> será ofertada no semestre selecionado.</span>';
      $_SESSION['status'] = 'bg-success';
      header('Location: /sgd/view/form/cadastroOfertadas.php'); 
 
?>