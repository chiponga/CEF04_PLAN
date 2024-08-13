<?php
	session_start();
	require_once("db.class.php");
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$ano = $_POST['ano'];

	$dia_ate = $_POST['dia_ate'];
	$mes_ate = $_POST['mes_ate'];
	$ano_ate = $_POST['ano_ate'];

	$turma = $_POST['turmas'];
	
	
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$escola = $objDb->nome;
	$data = "$ano-$mes-$dia";

	if($dia_ate == 'Nenhum'){
		$data_ate = $data;
	}else{
		$data_ate = "$ano_ate-$mes_ate-$dia_ate";
	}
	
	if($turma == 'Nenhum'){
		$sql = "select * from entrada where Entrada = 'NAO' And Escola = '$escola'AND Dia between('$data') and ('$data_ate')";
	}else{
		$sql = "select * from entrada where Entrada = 'NAO' And Escola = '$escola' AND Turma='$turma' AND Dia between('$data') and ('$data_ate')";
	}
	

	
	$resultado_id = mysqli_query($link,$sql);
	

	if($resultado_id){
		$dados_usuario = mysqli_fetch_assoc($resultado_id);



	}else{
		
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}
?>
