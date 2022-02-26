<?php
include_once "model/conexao.php"; 
$id = $_GET['id'];
$sql = "SELECT * FROM pessoas WHERE id_pessoa = $id ";
$consulta = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($consulta); 
    $departamento_id = $dados['departamento_id']; 
    $pessoa_id = $dados['id_pessoa'];       

    $sql_departamento = "SELECT * FROM departamento WHERE id_departamento = $departamento_id";
    $consulta_departamento = mysqli_query($conn, $sql_departamento);
    $dados_departamento = mysqli_fetch_assoc($consulta_departamento);
    
    //PEGANDO ID DA DISCIPLINA OFERTADA
    $sql_atribuicao = "SELECT * FROM atribuicao WHERE pessoa_id = $pessoa_id";
    $consulta_atribuicao = mysqli_query($conn, $sql_atribuicao);
    $dados_atribuicao = mysqli_fetch_assoc($consulta_atribuicao);
    $disciplina_id_ofertada = $dados_atribuicao['disciplina_id'];
    //PEGANDO ID DA DISCIPLINA
    $sql_ofertadas = "SELECT * FROM ofertadas WHERE id_ofertadas = $disciplina_id_ofertada";
    $consulta_ofertadas = mysqli_query($conn, $sql_ofertadas);
    $dados_ofertadas = mysqli_fetch_assoc($consulta_ofertadas);
    $disciplina_id = $dados_ofertadas['disciplina_id'];
    //PEGANDO NOME DA DISCIPLINA 
    $sql_disciplina = "SELECT * FROM disciplina WHERE id_disciplina = $disciplina_id";
    $consulta_disciplina = mysqli_query($conn, $sql_disciplina);
    $dados_disciplina = mysqli_fetch_assoc($consulta_disciplina); 
    $departamento_id = $dados_disciplina['departamento_id'];
    //NOME DEPARTAMENTO
    $sql_departamento = "SELECT * FROM departamento WHERE id_departamento= $departamento_id ";
    $consulta_departamento = mysqli_query($conn, $sql_departamento);
    $dados_departamento = mysqli_fetch_assoc($consulta_departamento);
    
    $html = '<p style="font-size: 25px;font-weight: bold;">Dados Pessoais:</p>';
    $html .= '<p>Docente:'.$dados['nome'].'</p>';
    $html .= '<p>Masp:'.$dados['masp'].'</p>'; //numero masp    
    $html .= '<p>Departamento:'.$dados_departamento['nome'].'</p>'; //Departamento
    $html .= '<p style="font-size: 25px;font-weight: bold;">Atribuições:</p>';
    $html .= '<table border=1 ';	
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Disciplinas Atribuídas</th>';
    $html .= '<th>Carga Horária Total</th>';
    $html .= '<th>Departamento</th>';
    $html .= '</tr>';
    $html .= '</thead>';  
    $html .= '<tbody>';
    $html .= '</tbody>';
    $html .= '<td>'.$dados_disciplina['nome'].'</td>'; //disciplina atribuida
    $html .= '<td>'.$dados_disciplina['cargaHoraria_total'].'</td>'; //carga horaria
    $html .= '<td>'.$dados_departamento['nome'].'</td>'; //carga horaria
    $html .= '</table';


require __DIR__.'/vendor/autoload.php'; 

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

$fileUrl = __DIR__ . "/view/pdf.php";

//get file content after the script is server-side interpreted
$fileContent = file_get_contents( $fileUrl ) ;

$dompdf->load_html('<p>'.$fileContent.'</p>'.$html);

$dompdf->render();

header('Content-type: application/pdf');
echo $dompdf->output();
?>