<?php ob_start();
session_start();
require_once("dompdf/autoload.inc.php");
require_once("db.class.php");

$prof_conse = $_POST['prof_conse'];

$coordenador = $_POST['coordenador'];
$aluno_representante = $_POST['aluno_representante'];
$vice_representante = $_POST['vice_representante'];
$Professores = $_POST['Professores'];
$direcao = $_POST['direcao'];
$destaques = $_POST['destaques'];
$providencias = $_POST['providencias'];

$elogios = $_POST['elogios'];



$html = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';

$html .= '




	';
	$html .="<style>html {margin:20; margin-top: 10px;font-family: 'Open Sans', sans-serif}
	h6 {font-family: 'Open Sans', sans-serif}


	</style>";

	$html .= '<table style="font-size:8px;margin-top: 5px" class="table table-sm table-bordered">';
	$html .= '<thead style="background:#56c4b6">';
	$html .= '<tr style="text-align:left">';
	$html .= '<th style="text-align:left; width: 200px;padding: 5px"><b>Aluno</b></th>';
	$html .= '<th style="text-align:left; width: 300px;padding: 5px"><b>Causas</b></th>';
	$html .= '<th style="text-align:left; width: 100px;padding: 5px"><b>Notas</b></th>';
		$html .= '<th style="text-align:left; width: 100px;padding: 5px"><b>Rendimento</b></th>';
	$html .= '<th style="text-align:left;padding: 5px"><b>Observações</b></th>';


	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';




	$i = 1;
	$usuario = $_POST['codigo_aluno'.$i];
	while($i <= $_POST['Alunos'] && $usuario != ''){
		if(isset($_POST['nome'.$i])){
			$usuario = $_POST['codigo_aluno'.$i];
			$turma = $_POST['turma'.$i];
			$aluno = $_POST['nome'.$i];
			$mencao = $_POST['mencao'.$i];
		}
	$dia = date("Y/m/d");
		//if($usuario != '' ){

			$sql = "SELECT * FROM `Marcacoes` WHERE Codigo = '$usuario'";



				$objDb = new db();
				$link = $objDb->conecta_mysql();

			$resultado_livros = mysqli_query($link, $sql);
			while($rows_livros = mysqli_fetch_assoc($resultado_livros)){

								if($rows_livros['Destaque'] != 0){
										$causas = '1('.$rows_livros['Destaque'].'), ';
								}if($rows_livros['Bom'] != 0){
										$causas .= '2('.$rows_livros['Bom'].'), ';
								}if($rows_livros['Educado'] != 0){
										$causas .= '3('.$rows_livros['Educado'].'), ';
								}if($rows_livros['Participativo'] != 0){
										$causas .= '4('.$rows_livros['Participativo'].'), ';
								}if($rows_livros['Organizado'] != 0){
										$causas .= '5('.$rows_livros['Organizado'].'), ';
								}if($rows_livros['Prestativo'] != 0){
										$causas .= '6('.$rows_livros['Prestativo'].'), ';
								}if($rows_livros['Responsavel'] != 0){
										$causas .= '7('.$rows_livros['Responsavel'].'), ';
								}if($rows_livros['Aplicado'] != 0){
										$causas .= '8('.$rows_livros['Aplicado'].'), ';
								}if($rows_livros['Falta'] != 0){
										$causas .= '9('.$rows_livros['Falta'].'), ';
								}if($rows_livros['Desantencao'] != 0){
										$causas .= '10('.$rows_livros['Desantencao'].'), ';
								}if($rows_livros['Desinteresse'] != 0){
										$causas .= '11('.$rows_livros['Desinteresse'].'), ';
								}if($rows_livros['Agressividade'] != 0){
										$causas .= '12('.$rows_livros['Agressividade'].'), ';
								}if($rows_livros['Nao'] != 0){
										$causas .= '13('.$rows_livros['Nao'].'), ';
								}if($rows_livros['Brincadeiras'] != 0){
										$causas .= '14('.$rows_livros['Brincadeiras'].'), ';
								}if($rows_livros['Inquietude'] != 0){
										$causas .= '15('.$rows_livros['Inquietude'].'), ';
								}if($rows_livros['Conversa'] != 0){
										$causas .= '16('.$rows_livros['Conversa'].'), ';
								}if($rows_livros['Faltoso'] != 0){
										$causas .= '17('.$rows_livros['Faltoso'].'), ';
								}if($rows_livros['Desrespeitoso'] != 0){
										$causas .= '18('.$rows_livros['Desrespeitoso'].'), ';
								}


						}
	       //echo "$aluno - $mencao <br>";
		$html .= '<tr ><td style="text-align:left; width: 100px;padding 20px">'.$aluno.'</td>';
		if(isset($causas)) {
			$html .= '<td style="text-align:left">'.$causas.'</td>';
		}else{
			$html .= '<td style="text-align:left"></td>';
		}

		$sql_conselho = "SELECT * FROM `conselho` WHERE Codigo = '$usuario'";
		$resultado_conselho = mysqli_query($link, $sql_conselho);
		$rows_conselho= mysqli_fetch_assoc($resultado_conselho);

		$sql_notas = "SELECT * FROM `notas` WHERE Codigo = '$usuario'";
		$resultado_notas = mysqli_query($link, $sql_notas);
		$rows_notas= mysqli_fetch_assoc($resultado_notas);


	$html .= '<td style="text-align:left">'.$rows_notas['MEDIA'].'</td>';
		$html .= '<td style="text-align:left">'.$rows_conselho['Mencao'].'</td>';
 		$html .= '<td style="text-align:left">'.$mencao.'</td></tr>';

 		$causas = null;
		$mencao = null;
		$aluno = null;

	$i++;
	}
	$contador = 40 - $_POST['Alunos'];
	$numero = 0;
	while ($numero <= $contador ) {

		$html .= '<tr ><td style="text-align:left; width: 100px; padding: 10px"></td>';
		$html .= '<td style="text-align:left"></td>';
		$html .= '<td style="text-align:left"></td>';
		$html .= '<td style="text-align:left"></td>';
		$html .= '<td style="text-align:left"></td></tr>';

		$numero++;

	}





        $html .= '</tbody>';
	$html .= '</table>';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader


	//Criando a Instancia
	$dompdf = new DOMPDF();
	$dompdf->load_html('



	<div class="card-body" style="font-size: 11px; text-align: justify">
	<div class="card-body" style="font-size: 11px; text-align: center">
   <b>'.$objDb->nome.'</b>
	</div>
   Aos ______ dias do Mês _______ de 2021, às _____ horas, esteve reunido
	 o CONSELHO DE CLASSE do turno __________, Ensino Fundamental, referente ao ______ bimestre para analisar, decidir e propor
	 soluções sobre os aspectos formativos e informativos de rendimento escolar dos alunos
	 	<span style="font-size: 10px; text-align: center"><br><b>Turma : '.$_SESSION['turma_pdf'].'</b></span>
	</div>

  <div class="card-body" style="font-size: 12px; border: 1px solid #000">
    1 - Destaque |
		2 - Bom(a) Aluno(a) |
		3 - Educado(a) |
		4 - Participativo(a) |
		5 - Organizado(a) |
		6 - Prestativo(a) |
		7 - Responsavel |
		8 - Aplicado(a) |
		9 - Falta Hábito de Estudo |
		10 - Desatenção |
		11 - Desinteresse |
		12 - Agressividade |
		13 - Nao Realiza Tarefas |
		14 - Brincadeiras Inoportunas |
		15 - Inquietude |
		16 - Conversa Excessiva |
		17 - Faltoso(a) |
		18 - Desrespeitoso(a) |
  </div>

  '.$html.'



	----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	<div class="card-body" style="font-size: 13px; text-align: left">
	Professor Conselheiro: '.$prof_conse.'   ------  Coordenador: '.$coordenador.'<br>
	Aluno Representante:'.$aluno_representante.'  ------  Vice Representante: '.$vice_representante.'<br>
	<br>

	ALUNO(S) ELOGIOS:

	'.$elogios.'<BR>

	ALUNO(S) DESTAQUE:

	'.$destaques.'

	</div>






<br>
<br>
<br>
<br>
<br>

<br>

<br>

<br>

<br>

	<table style="font-size:10px;margin-top: 5px" class="table table-bordered">
	<thead style="background:#5695cc">
	<tr style="text-align:left">
	<th style="text-align:left; width: 200px;padding:10px"><b>Disciplina</b></th>
	<th style="text-align:left; width: 300px;padding:10px"><b>Professor(a)</b></th>
	<th style="text-align:left; width: 300px;padding:10px"><b>Assinatura</b></th>


	</tr>
	</thead>
	<tbody>

	<tr ><td style="text-align:left; width: 100px">Lingua Portuguesa</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Matematica</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Língua Estr. Moderna(Inglês)</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Geografia</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">História</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Ciências Naturais</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Arte</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Ed. Física</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Projeto Interdisciplinar</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Sala de Recurso</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Sala de Recurso</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Orientadora Educacional</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>

	<tr ><td style="text-align:left; width: 100px">Orientadora Educacional</td>
	<td style="text-align:left"></td>
	<td style="text-align:left"></td></tr>


			</tbody>
			</table>







		');
		$dompdf->setPaper('A4', 'landscape');
	//Renderizar o html
	$dompdf->render();


	//Exibibir a página
	$dompdf->stream("conselho.pdf",array("Attachment" => true));

	$output = $dompdf->output();




?>x
