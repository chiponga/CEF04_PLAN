<?php ob_start();
session_start();
require_once("dompdf/autoload.inc.php");
require_once("db.class.php");

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
$dia_ate = $_POST['dia_ate'];
$mes_ate = $_POST['mes_ate'];
$ano_ate = $_POST['ano_ate'];

$turma = $_POST['turmas'];

$data = "$ano-$mes-$dia";

if($dia_ate == 'Nenhum'){
	$data_ate = $data;
}else{
	$data_ate = "$ano_ate-$mes_ate-$dia_ate";
}


$html = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';

$html .= '




	';
	$html .="<style>html {margin:20;font-family: 'Open Sans', sans-serif}
	h6 {font-family: 'Open Sans', sans-serif}


	</style>";

	$html .= '<table style="font-size:10px;margin-top: 5px" class="table table-sm">';
	$html .= '<thead style="background:#c7bd9d">';
	$html .= '<tr style="text-align:center">';
	$html .= '<th style="text-align:center;"><b>Código</b></th>';
	$html .= '<th style="text-align:center"><b>Turma</b></th>';
	$html .= '<th style="text-align:center"><b>Nome</b></th>';

	$html .= '<th style="text-align:center">Entradas</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	$objDb = new db();
	$escola = $objDb->nome;
	$link = $objDb->conecta_mysql();

	$sql = "SELECT Codigo, Nome,Turma, count(*) FROM entrada where Digitado = 'SIM' And Escola = '$escola'and Turma = '$turma' AND Dia between('$data') and ('$data_ate') GROUP BY Nome ORDER BY count(*) DESC";


		

	$resultado_livros = mysqli_query($link, $sql);
	while($rows_livros = mysqli_fetch_assoc($resultado_livros)){

				$html .= '<tr ><td style="text-align:center">'.$rows_livros['Codigo']. "</td>";
				$html .= '<td style="text-align:center">'.$rows_livros['Turma']. "</td>";
				$html .= '<td>'.$rows_livros['Nome']. "</td>";


		$html .= '<td style="text-align:center">'.$rows_livros['count(*)'] . "</td></tr>";
        }

        $html .= '</tbody>';
	$html .= '</table>';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader


	//Criando a Instancia
	$dompdf = new DOMPDF();
	$dompdf->load_html('

	<div style="text-align:center">
	<img src="imagens/logo_gdf.png" style="width:120px; height:70px;float:left">
	</div>

	<div style="margin-left: 2px;float: left;text-align:center">
	<label style="font-size:12px;text-align: center">SECRETARIA DE ESTADO DE EDUCAÇÃO DO DESTRITO FEDERAL</label><br>
	<label style="font-size:12px;text-align: center">COORDENAÇÃO REGIONAL DE ENSINO DE PLANALTINA</label><br>
	<label style="font-size:12px">'.$objDb->nome.'</label>
	</div>

	<div style="text-align:left">
	<img src="imagens/logo.png" style="width:120px; height:100px;">
	</div>
	<hr style="border-width: 3px;background: black;margin-top: -10px">
	<h6 style="text-align:center">Relatório de Alunos Sem Carteirinha</h6>





  '.$html.'

		');
		$dompdf->setPaper('A4', 'portrait');
	//Renderizar o html
	$dompdf->render();


	//Exibibir a página
	$dompdf->stream("alunos_sem_carteirnha.pdf",array("Attachment" => false));



?>x
