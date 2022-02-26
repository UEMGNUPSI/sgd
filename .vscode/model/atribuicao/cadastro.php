<?php
  session_start();

  $disciplina = $_GET["disciplina"];
  $curso = $_GET["curso"];
  $semestre = $_GET["semestre"];
  $docente = $_GET["docente"];

  include_once '../conexao.php';

 	
    if(!$conn->query("INSERT INTO atribuicao(disciplina_id, semestre_id, curso_id, pessoa_id) 
      VALUES ('$disciplina','$semestre','$curso','$docente')"))
      die ('Os dados não foram inseridos');
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Disciplina <span class="text-success"> '.$disciplina.' </span> será ofertada no semestre selecionado.</span>';
      $_SESSION['status'] = 'bg-success';
      header('Location: /sgd/view/app/atribuicao.php'); 
 
?>