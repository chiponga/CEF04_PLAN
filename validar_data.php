<?php
	session_start();
	require_once("db.class.php");
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$ano = $_POST['ano'];
	$_SESSION['dia'] = $dia;
	$_SESSION['mes'] = $mes;
	$_SESSION['ano'] = $ano;
	//$usuario = "263171";
	$usuario = $_SESSION['codigo'];


	$data = "$ano-$mes-$dia";



	$sql = "SELECT * FROM `entrada` WHERE Codigo = '$usuario' AND Dia = '$data'";




	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$resultado_id = mysqli_query($link,$sql);


	if($resultado_id){
		$dados_usuario = mysqli_fetch_assoc($resultado_id);

		if(isset($dados_usuario['Codigo'])){
			header('Location: outra_data.php');





		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Usuario ou senha incorretos</div>";



		}

	}else{

		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}






?>
