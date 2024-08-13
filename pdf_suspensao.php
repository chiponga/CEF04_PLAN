<?php

session_start();
require_once("db.class.php");

if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}

$codigo = $_SESSION['usuario'];

$nome =	$_SESSION['nome'];
$turma = $_SESSION['turma'];
$motivo = $_POST['Motivo'];
$turno = $_SESSION['turno'];
$dias = $_POST['dias'];
$professor = $_POST['professor'];
$responsavel = $_POST['responsavel'];
$data = date ("Y-m-d");
$data_f = $_POST['data'];
$data_f = date("d/m/Y");
$procurar = $_POST['procurar'];
$obj = new db();
$link = $obj->conecta_mysql();
 $escola = $obj->nome;
$texto1 = "$sql O(a) aluno(a) $nome está sendo Suspenso(a) das atividades em classe por $dias dias pelo motivo descrito abaixo: \n\n$motivo\n\n O resposável deve comparecer à escola no dia $data_f para falar com $procurar.\nLembramos que o(a) aluno(a) só voltará a frequentar as aulas após a presença do responsável.";

$sql = "INSERT INTO `registro`( `Codigo`, `Nome`, `Turma`, `Leitura`, `Tipo`, Assunto, `Origem`, `Data`, `Profissional`,`Mensagem`, `Escola`) VALUES ('$codigo','$nome','','NAO','D','Suspensão','$professor','$data','$responsavel','$texto1','$escola')";
$resultado_id = mysqli_query($link,$sql);
   
if($resultado_id){
        echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

      }else{
        echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

      }
if(isset($_POST['a'])){

  $check_a= "X";
}else{
  $check_a= " ";
}
if(isset($_POST['b'])){
  $check_b= "X";
}else{
  $check_b= " ";
}

//inlude template

ob_start();



//inlcude dompdf library
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$html = '<HTML lang="pt-BR">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
</head>

<style>

*{


font-family: "Open Sans", sans-serif;

}

.logo {

margin-top: 24px;
margin-right: 400px;

}

.escola{
margin-left: 130px;
text-align:center;
LINE-HEIGHT:20px;
font-family: "Open Sans", sans-serif;

}
.data{

margin-left: 635px;
margin-top: 17px;

}
.titulo{
text-align:center;

margin-left:300px;
font-size: 24px
}
.senhores{
text-align:left;
}

.itens{
/*font-family: "Courier New", Courier,monospace;*/
font-family: "Courier New", Courier,monospace;

}

.responsavel{
margin-top: 18px;
}

</style>

<body >

<div class="container-fluid" style="">
<div class="row" style="">

<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>
    <div class="col-md-4 escola" style="border-bottom: 2px solid #000;font-size: 13px;">
		<span><b>GOVERNO DO DISTRITO FEDERAL</b></span><br>
		<span><b>SECRETARIA DE ESTADO DE EDUCAÇÃO</b></span><br>
		<span><b>COORDENAÇÃO REGIONAL DE ENSINO DE PLANALTINA</b></span><br>
      <span><i>'.$objDb->nome.'</i></span>

    </div>

    <div class="col-md-4">
    </div>

</div>



<div class="row">

  <div class="col-md-12" style="text-align: justify"">



    <span ><b>Aluno (a): </b>'.$nome.'</span><br>
    <span ><b>Turma: </b>'.$turma.'</span><br>
    <span ><b>Telefone:</b>______________________</span><br>
    <span ><b>Turno: </b>'.$turno.'</span><br>
    <span><b>Responsável:</b>'.$responsavel.'</span><br>


  </div>
</div>
<br>

  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ATO DE SUSPENSÃO</b></span>

  </div>

<div class="row">
  <div class="col-md-12" >
    <span>Senhores pais ou responsáveis,</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-top: 7px;text-align: justify;">
    <span>'.$texto1.'</span>
    
    </div>

</div>

<div class="row">
  <div class="col-md-12 responsavel" style="text-align: justify"">
    <span>('.$check_a.') Após 3 advertências escritas.</span><br>
    ('.$check_b.') Sem passar pelas Advertências Escritas considerando a gravidade do Ato cometido pelo(a) mesmo(a).
  </div>
</div>



<div class="row">
  <div class="col-md-12 responsavel" style="">
  <span style="text-decoration: underline;">Professor: </span><span>'.$professor.'</span><br>
    <span style="text-decoration: underline;" >Nota:</span>
    Caberá ao responsável acompanhar a reposição dos conteúdos durante o período de afastamento das atividades na classe.

  </div>
</div>

<div class="row" style="margin-top:3px">
  <div class="col-md-12" style="text-align:left">
  <br>
    <span>Ass. Direção : _____________________________________________________</span><br>
    <span>Ass Responsável: _______________________________________________________</span><br>
    <span>Ass Aluno: __________________________________________________</span>





-------------------------------------------------------------------------------------------------------------------------
  </div>
</div>


<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>
    <div class="col-md-4 escola" style="border-bottom: 2px solid #000;font-size: 13px;">
		<span><b>GOVERNO DO DISTRITO FEDERAL</b></span><br>
		<span><b>SECRETARIA DE ESTADO DE EDUCAÇÃO</b></span><br>
		<span><b>COORDENAÇÃO REGIONAL DE ENSINO DE PLANALTINA</b></span><br>
      <span><i>'.$objDb->nome.'</i></span>
			<span ><b>Planaltina - DF, '.date("d/m/Y").'</B></span>

    </div>
		<div claas="col-md-4" class="">
		<br>



		<br>

			<span style="font-size: 15px;text-align:center" class="titulo"><b>CONVOCAÇÃO PARA COMPARECIMENTO DE RESPONSÁVEL</b></span><br><span>Planaltina-DF, '.date("d/m/Y").'</span><br><br>
				<span style="text-align: left">Solicitamos o comparecimento do(a) responsável pelo(a) aluno(a): <i>'.$nome.'</i>, da Turma: <i>'.$turma.'</i> no dia '.$data_f.' referente ao(s) motivo(s): '.$motivo.' <br>Procurar: '.$procurar.'</span>

	</div>

</div>









</body>

</HTML>';

//using pdf dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

//set papger size
$dompdf->set_paper('A4', 'portrait');

//Render the html to pdf
$dompdf->render();

//ouput to browser
$dompdf->stream("suspensão.pdf",array("Attachment" => false));

//write pdf to directory
//file_put_contents('pdfs/message-'.time().'.pdf', $dompdf->output());
