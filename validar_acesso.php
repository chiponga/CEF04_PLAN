<?php
	session_start();
	require_once("db.class.php");
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$_SESSION['codigo'] = $usuario;
	$_SESSION['senha'] = $senha;

	$sql = "SELECT * FROM cadastro WHERE Codigo = '$usuario' AND Senha = '$senha'";
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$resultado_id = mysqli_query($link,$sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_assoc($resultado_id);
		$_SESSION['turno'] = $dados_usuario['Turno'];
		$_SESSION['turma'] = $dados_usuario['Turma'];
		$_SESSION['nome'] = $dados_usuario['Aluno'];
		$_SESSION['logado'] = true;



		if(isset($dados_usuario['Codigo'])){

			$_SESSION['codigo'] = $dados_usuario['Codigo'];
			$_SESSION['msg'] = "NAO";
				header("Location: aluno.php");


		}else{
			$_SESSION['msg'] = "SIM";
			header('Location: login.php');
		}

	}else{

		$_SESSION['msg'] = "SIM";
	}






?>
