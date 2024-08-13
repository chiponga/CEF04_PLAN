<?php
session_start();
require_once("db.class.php");

if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

$usuario =	$_SESSION['usuario'];
$nome =	$_SESSION['nome'];
$turma = $_SESSION['turma'];
$professor = $_POST['professor'];
$data = $_POST['data'];
$coo = $_POST['coo'];
$escola = $objDb->nome;

$obj = new db();
$link = $obj->conecta_mysql();

/*$sql=("SELECT * FROM `token` WHERE Codigo = '$usuario'");
      $query = mysqli_query($link,$sql);

        while ($rows = mysqli_fetch_assoc($query)) {
          define( 'API_ACCESS_KEY', 'AAAAHwEWeZ0:APA91bEddRhGT8AwUuEI3LHzlcyLbJGm2-AeyQh6O1baXUfThJGurQeCQ7n9pXo0nvsuHCBcymJiStaUwu_xyX8vIjWYRpeLCtgBhpfTTnZ2BIKtPVYCeh1LFGg9owtOuAY9sJ3Ay5CS' );

              $singleID = $rows['Token'];
              
              $fcmMsg = array(
               'body' => 'Nova advertência escolar de '.$nome.'',
               'largeIcon'	=> 'imagens/bell.png',
               'title' => 'CEF04',
               'sound' => "default",
               'color' => "#49d676"
              );
              $fcmFields = array(
               'to' => $singleID,
               'priority' => 'high',
               'notification' => $fcmMsg
              );
              $headers = array(
               'Authorization: key=' . API_ACCESS_KEY,
               'Content-Type: application/json'
              );
              $ch = curl_init();
              curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
              curl_setopt( $ch,CURLOPT_POST, true );
              curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
              curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
              curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
              curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
              $result = curl_exec($ch );
              curl_close( $ch );
            }

*/

if(!isset($_POST['procurar'])){
	$procurar = $coo;
}else{
	$procurar =$_POST['procurar'];
}

$data_f =  date("d/m/Y", strtotime($data));

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
if(isset($_POST['c'])){
  $check_c= "X";
}else{
  $check_c= " ";
}
if(isset($_POST['d'])){
  $check_d= "X";
}else{
  $check_d= " ";
}
if(isset($_POST['e'])){
  $check_e= "X";
}else{
  $check_e= " ";
}
if(isset($_POST['f'])){
  $check_f= "X";
}else{
  $check_f= " ";
}
if(isset($_POST['g'])){
  $check_g= "X";
}else{
  $check_g= " ";
}
if(isset($_POST['h'])){
  $check_h= "X";
}else{
  $check_h= " ";
}
if(isset($_POST['i'])){
  $check_i= "X";
}else{
  $check_i= " ";
}
if(isset($_POST['j'])){
  $check_j= "X";
}else{
  $check_j= " ";
}
if(isset($_POST['k'])){
  $check_k= "X";
}else{
  $check_k= " ";
}
if(isset($_POST['l'])){
  $check_l= "X";
}else{
  $check_l= " ";
}


if($_POST['m'] != null){
  $check_m= "X";
  $outro = $_POST['m'];
}else{
  $check_m= " ";
}

if($_POST['m'] != null){
  $texto = '<span class="itens">M.('.$check_m.')</span><span style="font-size: 11;">Outro: '.$outro.'</span>



';

  }else{
    $texto = '';
  }






  if(isset($_POST['a'])){

    $m_a= "A ";
}else{
    $m_a= "";
}

if(isset($_POST['b'])){

    $m_b= "B ";
}else{
    $m_b= "";
}

if(isset($_POST['c'])){

    $m_c= "C ";
}else{
    $m_c= "";
}

if(isset($_POST['d'])){

    $m_d= "D ";
}else{
    $m_d= "";
}

if(isset($_POST['e'])){

    $m_e= "E ";
}else{
    $m_e= "";
}

if(isset($_POST['f'])){

    $m_f= "F ";
}else{
    $m_f= "";
}

if(isset($_POST['g'])){

    $m_g= "G ";
}else{
    $m_g= "";
}

if(isset($_POST['h'])){

    $m_h= "H ";
}else{
    $m_h= "";
}

if(isset($_POST['i'])){

    $m_i= "I ";
}else{
    $m_i= "";
}

if(isset($_POST['j'])){

    $m_j= "J ";
}else{
    $m_j= "";
}

if(isset($_POST['k'])){

    $m_k= "K ";
}else{
    $m_k= "";
}

if(isset($_POST['l'])){

    $m_l= "L ";
}else{
    $m_l= "";
}

if($_POST['m'] != null){

    $m_m= "M ";
}else{
    $m_m= "";
}



$motivos = "$m_a $m_b $m_c $m_d $m_e $m_f $m_g $m_h $m_i $m_j $m_k $m_l $m_m";


if(isset($_POST['a'])){

  $r_a= "Conversa Excessiva, \n";
}else{
  $r_a= '';
}

if(isset($_POST['b'])){

  $r_b= "Chegou atrasado (a) em sala na mudança de horário, \n";
}else{
  $r_b= '';
}

if(isset($_POST['c'])){

  $r_c= "Não realizou as atividades propostas em classe ou extraclasse, \n";
}else{
  $r_c= '';
}

if(isset($_POST['d'])){

  $r_d= "Ocupando-se de outra atividade em sala de aula, \n";
}else{
  $r_d= '';
}

if(isset($_POST['e'])){

  $r_e= "Não trouxe material essencial para atividades na aula, \n";
}else{
  $r_e= '';
}

if(isset($_POST['f'])){

  $r_f= "Saiu da sala sem autorização, \n";
}else{
  $r_f= '';
}

if(isset($_POST['g'])){

  $r_g= "Uso do celular em sala de aula ou Aparelho eletrônico,\n";
}else{
  $r_g= '';
}

if(isset($_POST['h'])){

  $r_h= "Desobediência ao professor, \n";
}else{
  $r_h= '';
}

if(isset($_POST['i'])){

  $r_i= "Sem uniforme de Educação Física, \n";
}else{
  $r_i= '';
}

if(isset($_POST['j'])){

  $r_j= "Agressão Verbal, \n";
}else{
  $r_j= '';
}

if(isset($_POST['k'])){

  $r_k= " Agressão Fisíca, \n";
}else{
  $r_k= '';
}

if(isset($_POST['l'])){

  $r_l= "Desrespeito ou agressão verbal ao professor, \n";
}else{
  $r_l= '';
}

if($_POST['m'] != null){

  $r_m = $_POST['m'];;
}else{
  $r_m= '';
}


//Lembramos que o(a) aluno(a) só voltará a frequentar as aulas após a presença do responsável
$codigo = $_SESSION['usuario'];

$nome =	$_SESSION['nome'];
$turma = $_SESSION['turma'];

$turno = $_SESSION['turno'];


$data = date ("Y-m-d");





if(isset($_POST['p'])){
$texto_a = "O(a) aluno(a) $nome foi advertido(a) pelos motivos abaixo:\n\n$r_a$r_b$r_c$r_d$r_e$r_f$r_g$r_h$r_i$r_j$r_k$r_l$r_m\n\nO resposável deve comparecer à escola no dia $data_f para falar com $procurar. ";
}else{
  $texto_a = "O(a) aluno(a) $nome foi advertido(a) pelos motivos abaixo:\n\n$r_a$r_b$r_c$r_d$r_e$r_f$r_g$r_h$r_i$r_j$r_k$r_l$r_m\n\n";
}
$objDb = new db();
$link = $objDb->conecta_mysql();
$escola = $objDb->nome;
$sql = "INSERT INTO `registro`(`Codigo`, `Nome`, `Turma`, `Tipo`, `Origem`, `Data`, `Profissional`, `Mensagem`, `Leitura`, `Assunto`,`Escola`) VALUES ('$usuario','$nome','','D','$professor','$data','$coo','$texto_a','NAO', 'Advertência','$escola')";

$resultado_id = mysqli_query($link,$sql);


$sql = "SHOW TABLE STATUS LIKE 'registro'";
$resultado_auto = mysqli_query($link,$sql);
while ($dados_turno = mysqli_fetch_assoc($resultado_auto)){
	$auto_increment = $dados_turno['Auto_increment'];
}


echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";


if(isset($_POST['p'])){
  $texto1 = "O responsável deverá comparecer a escola até o dia $data_f";

  $texto2 = '------------------------------------------------------------------------------------------------------------------

  <div class="col-md-1" style="text-align:left;font-size: 16px;height: 10px">
  <img class="logo" width="70px" src="imagens/logo.png" alt="">
  </div>
      <div class="col-md-4 escola" style="border-bottom: 2px solid #000;font-size: 13px;">
      <span><b>GOVERNO DO DISTRITO FEDERAL</b></span><br>
      <span><b>SECRETARIA DE ESTADO DE EDUCAÇÃO</b></span><br>
      <span><b>COORDENAÇÃO REGIONAL DE ENSINO DE PLANALTINA</b></span><br>
        <span><i>'.$objDb->nome.'</i></span>
  
      </div>
  
    <div class="col-md-12";margin-top: -50px">
  
    <div claas="col-md-4" class="data">
    <br>
  
  
  
    <br>
  
      <span style="font-size: 15px;text-align:center" class="titulo"><b>CONVOCAÇÃO PARA COMPARECIMENTO DE RESPONSÁVEL</b></span><br><span>Planaltina-DF, '.date("d/m/Y").'</span><br><br>
        <span>'.$texto_a.'</span>
  
  </div>
  </div>';
}else{

  $texto1 = "";
  $texto2 = "";
}

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

padding:0px;

font-family: "Open Sans", sans-serif;

}

.logo {

margin-top: 15px;
margin-right: 300px;

}

.escola{
text-align:center;
margin-left: 130px;
LINE-HEIGHT:12px;
font-family: "Open Sans", sans-serif;

}
.data{


margin-left: 20px;
margin-top: 0px;

}
.titulo{
text-align:center;
margin-top:-50px;
margin-left:300px;
font-size: 20px
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

<div class="container-fluid" style="margin-top: -10px">
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

<div class="row" style="margin-top: 30px">
    <div claas="col-md-4" >

    </div>
    <div claas="col-md-4" >

    </div>
    <div claas="col-md-4" class="data">


      <span>Planaltina-DF, '.date("d/m/Y").'</span>
    </div>
</div>

<div class="row">
  <div class="col-md-12" style="text-align: center">
    <span><b>FICHA DE ADVERTÊNCIA</b></span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" >
    <span>Senhores pais ou responsáveis pelo (a) aluno (a): <i>'.$nome.'</i>, Turma: <i>'.$turma.'</i></span>
  </div>

</div>

<div class="row">
  <div class="col-md-12" style="margin-left: 16px">
    <span>O (a) Aluno (a) foi advertido por cometer as seguintes infrações:</span>
  </div>

</div>

<div class="row">
  <div class="col-md-12 itens" style="margin-left: 16px">
    <span class="itens">A.('.$check_a.')</span><span style="font-size: 12;">Conversa Excessiva</span><br>
    <span class="itens">B.('.$check_b.')</span><span style="font-size: 12;">Chegou atrasado (a) em sala na mudança de horário</span><br>
    <span class="itens">C.('.$check_c.')</span><span style="font-size: 12;">Não realizou as atividades propostas em classe ou extraclasse</span><br>
    <span class="itens">D.('.$check_d.')</span><span style="font-size: 12;">Ocupando-se de outra atividade em sala de aula</span><br>
    <span class="itens">E.('.$check_e.')</span><span style="font-size: 12;">Não trouxe material essencial para atividades na aula</span><br>
    <span class="itens">F.('.$check_f.')</span><span style="font-size: 12;">Saiu da sala sem autorização</span><br>
    <span class="itens">G.('.$check_g.')</span><span style="font-size: 12;">Uso do celular em sala de aula ou Aparelho eletrônico</span><br>
    <span class="itens">H.('.$check_h.')</span><span style="font-size: 12;">Desobediência ao professor</span><br>
    <span class="itens">I.('.$check_i.')</span><span style="font-size: 12;">Sem uniforme de Educação Física</span><br>
    <span class="itens">J.('.$check_j.')</span><span style="font-size: 12;">Agressão Verbal</span><br>
    <span class="itens">K.('.$check_k.')</span><span style="font-size: 12;">Agressão Física</span><br>
    <span class="itens">L.('.$check_l.')</span><span style="font-size: 12;">Desrespeito ou agressão verbal ao professor</span><br>
    '.$texto.'

  </div>
</div>

<div class="row">
  <div class="col-md-12 responsavel" style="">
    '.$texto1.'
  </div>
</div>

<div class="row" >
  <div class="col-md-6" style="text-align:left;">
  <br>
    <span>Professor: '.$professor.'</span><br>
    &#013;
    <span>Coordenador: '.$coo.'</span>
    <br>
    <span>Assinatura do responsável e telefone:__________________________________________ </span>
  </div>
</div>

'.$texto2.'

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
$dompdf->stream("advertencia.pdf",array("Attachment" => false));

//write pdf to directory
$output = $dompdf->output();

file_put_contents('pdfs/'.$objDb->nome .'_'. $auto_increment.'.pdf' , $dompdf->output());
