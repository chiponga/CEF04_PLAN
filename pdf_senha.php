<?php
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;
ob_start();


session_start();




if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}

require_once("db.class.php");
	//$usuario = "263171";
	$data = date("Y/m/d");
	
  $objDb = new db();
  $escola = $objDb->nome;
  $link = $objDb->conecta_mysql();


	
	$sql_entrada = "SELECT Senha FROM `senha` Where Escola = '$escola'";




	$resultado_entrada = mysqli_query($link,$sql_entrada);

	if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);
		
    }
    
    $senha = $dados_entrada['Senha'];


//inlude template



//inlcude dompdf library




//using pdf dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('



<div class="div" style="margin-top: 0px;">
<div class="row" style="">
   
<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>

</div>
<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ACESSO AO SITE</b></span>
  </div>

</div>

<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-md-12" >
    <span>Para ter acesso ao site, acesse a página inicial do site e entre na opção <b>ESCOLA</b>, clique em "Cadastrar" e ultilize a senha <i> '.$senha.' </i> para prosseguir com o cadastro.</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>Na página de cadastro preencha os campos com os dados necessários.</span>
  </div>

</div>




<hr>

<div class="div" style="margin-top: 0px;">
<div class="row" style="">
   
<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>

</div>
<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ACESSO AO SITE</b></span>
  </div>

</div>

<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-md-12" >
    <span>Para ter acesso ao site, acesse a página inicial do site e entre na opção <b>ESCOLA</b>, clique em "Cadastrar" e ultilize a senha <i> '.$senha.' </i> para prosseguir com o cadastro.</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>Na página de cadastro preencha os campos com os dados necessários.</span>
  </div>

</div>




<hr>

<div class="div" style="margin-top: 0px;">
<div class="row" style="">
   
<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>

</div>
<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ACESSO AO SITE</b></span>
  </div>

</div>

<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-md-12" >
    <span>Para ter acesso ao site, acesse a página inicial do site e entre na opção <b>ESCOLA</b>, clique em "Cadastrar" e ultilize a senha <i> '.$senha.' </i> para prosseguir com o cadastro.</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>Na página de cadastro preencha os campos com os dados necessários.</span>
  </div>

</div>




<hr>

<div class="div" style="margin-top: 0px;">
<div class="row" style="">
   
<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>

</div>
<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ACESSO AO SITE</b></span>
  </div>

</div>

<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-md-12" >
    <span>Para ter acesso ao site, acesse a página inicial do site e entre na opção <b>ESCOLA</b>, clique em "Cadastrar" e ultilize a senha <i> '.$senha.' </i> para prosseguir com o cadastro.</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>Na página de cadastro preencha os campos com os dados necessários.</span>
  </div>

</div>




<hr>

<div class="div" style="margin-top: 0px;">
<div class="row" style="">
   
<div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
<img class="logo" width="70px" src="imagens/logo.png" alt="">
</div>

</div>
<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span class="titulo"><b>ACESSO AO SITE</b></span>
  </div>

</div>

<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-md-12" >
    <span>Para ter acesso ao site, acesse a página inicial do site e entre na opção <b>ESCOLA</b>, clique em "Cadastrar" e ultilize a senha <i> '.$senha.' </i> para prosseguir com o cadastro.</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>Na página de cadastro preencha os campos com os dados necessários.</span>
  </div>

</div>




<hr>


');
//set papger size 
$dompdf->set_paper('A4', 'portatil');

//Render the html to pdf
$dompdf->render();

//ouput to browser
$dompdf->stream("senha.pdf",array("Attachment" => false));

//write pdf to directory
//file_put_contents('pdfs/message-'.time().'.pdf', $dompdf->output());