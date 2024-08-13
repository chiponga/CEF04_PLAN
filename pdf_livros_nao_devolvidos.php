<?php ob_start();
session_start();
require_once("db.class.php");
require_once("dompdf/autoload.inc.php");
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}



$html = '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
$objDb = new db();
			$escola = $objDb->nome;
			$link = $objDb->conecta_mysql();


	$sql = "SELECT * FROM `biblioteca` WHERE Devolver < NOW() AND DEVOLVIDO = 'NAO' And Escola = '$escola'";



			


	$html.= "

	<style>
	html { margin: 0px;font-family: 'Open Sans', sans-serif}
	label{
		font-family: 'Open Sans', sans-serif;

	}
	table{
		margin-left: 30px;
		margin-right: 30px;

	}

	</style>";
	$html .= '<table style="font-size:13px;margin-top:60px" class="table table-bordered">';
	$html .= '<thead>';
	$html .= '<tr style="">';
	$html .= '<th style="text-align: center;">Código Aluno</th>';
	$html .= '<th style="text-align: center;">Aluno</th>';
	$html .= '<th style="text-align: center;">Livro</th>';
	$html .= '<th style="text-align: center;">Empréstimo</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';






	$resultado_livros = mysqli_query($link, $sql);
	while($rows_livros = mysqli_fetch_assoc($resultado_livros)){

		$html .= '<tr ><td style="text-align: center;">'.$rows_livros['CodigoAluno'] . "</td>";
		$html .= '<td style="text-align: center;">'.$rows_livros['NomeAluno'] . "</td>";
		$html .= '<td style="text-align: center;">'.$rows_livros['NomeLivro'] . "</td>";
		$html .= '<td style="text-align: center;">'.date('d/m/Y', strtotime($rows_livros['DataEmprestimo'])) . "</td></tr>";


	}
	$html .= '</tbody>';
	$html .= '</table>';

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader


	//Criando a Instancia
	$dompdf = new DOMPDF();
	$dompdf->load_html('
	<img style="margin-left:100px;float:left" width="100px" src="imagens/logo.png" alt="">
	<label style="font-size:20px;margin-top:15px">Livros não devolvidos</label>
	<br>
	<label style="font-size:15px;margin-top:15px">'.$objDb->nome.'</label>'.$html.'');
		$dompdf->setPaper('A4', 'portrait');
	//Renderizar o html
	$dompdf->render();


	//Exibibir a página
	$dompdf->stream("livro_nao_devolvidos.pdf",array("Attachment" => false));
?>
