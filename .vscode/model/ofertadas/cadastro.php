<?php
  session_start();

  $semestre = $_GET["semestre"];
  $curso = $_GET["curso"];
  $disciplina = $_POST["checkbox"];

  include_once '../conexao.php';

  $sql_semest = "SELECT * FROM semestreletivo WHERE status_letivo='$semestre'";
  $consulta_semest = mysqli_query($conn, $sql_semest);
  $dados_semest = mysqli_fetch_assoc($consulta_semest);

  $id_semestre = $dados_semest['id_letivo'];
  //Percorremos todos os conteúdos do array
  for ($i = 0; $i < count($disciplina); $i++){
      //exibimos o valor atual na tela
      $sql = "SELECT * FROM disciplina where curso_id=$curso AND id_disciplina=$disciplina[$i]";
      $consulta = mysqli_query($conn, $sql);
      $dados = mysqli_fetch_assoc($consulta);

      $cat = $dados['credito_aulaTeorico'];
      $cap = $dados['credito_aulaPratica'];
      $ct = $dados['credito_total'];
      $duplicada = $dados['statusDuplicada'];


      if(!$conn->query("INSERT INTO ofertadas(disciplina_id, semestre_id, curso_id, credito_aulapratica, credito_aulaTeorico, credito_total, status_duplicada)
      VALUES ('$disciplina[$i]','$id_semestre','$curso','$cat','$cap','$ct','$duplicada')"))
      die ('Os dados não foram inseridos');
    }

     
      header('Location: /sgd/view/form/cadastroOfertadas.php?semestre='.$semestre.'&curso='.$curso.''); 
?>