<?php 
session_start();
require_once("db.class.php");
$codigo = $_SESSION['usuario'];
$aluno = $_SESSION['nome'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
$dia_ate = $_POST['dia_ate'];
$mes_ate = $_POST['mes_ate'];
$ano_ate = $_POST['ano_ate'];
 


$html = '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';

$data = "$ano-$mes-$dia";

if($dia_ate == 'Nenhum'){
	$data_ate = $data;
}else{
	$data_ate = "$ano_ate-$mes_ate-$dia_ate";
}

$sql = "INSERT INTO `bloqueio`(`Nome`, `Codigo`, `DiaDe`, `DiaAte`) VALUES ('$aluno','$codigo','$data','$data_ate')";
	

	
		$objDb = new db();
        $link = $objDb->conecta_mysql();
        $resultado_id = mysqli_query($link,$sql);

        if($resultado_id){
            echo "<script>alert('Enviado com sucesso!');document.location='aluno_professor.php';</script>";
            
          }else{
            echo "<script>alert('Erro ao Salvar!');document.location='aluno_professor.php';</script>";
            
          }

?>