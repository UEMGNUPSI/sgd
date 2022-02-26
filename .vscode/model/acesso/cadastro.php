<?php
  session_start();
  include_once '../conexao.php';

  $form = $_POST["check"];

  $teste = $form[0];
  $teste1 = $form[1];
  $teste2 = $form[2];
  $teste3 = $form[3];
  $teste4 = $form[4];
  $teste5 = $form[5];
  $teste6 = $form[6];
  $teste7 = $form[7];


if(!$conn->query("INSERT INTO atribuicao(descricao_nivel, pessoas, disciplinas, ocorrencias, atribuicao, disciplinas_ofertadas, relatorios, parametros) 
      VALUES ('$teste','$teste1','$teste2',' $teste3','$teste4','$teste5','$teste6','$teste7')"))
      die ('Os dados não foram inseridos');
      unset($_SESSION['msg']);
      unset($_SESSION['status']);
      $_SESSION['msg'] = '<span>Disciplina <span class="text-success"> '.$nivel.' </span> será ofertada no semestre selecionado.</span>';
      $_SESSION['status'] = 'bg-success';
      header('Location: /sgd/view/app/cadsatroNivelacesso.php'); 
 
?>