<?php
	session_start();

	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
	}	
	$codigo_master = $_POST['codigo_aluno'];
	$_SESSION['usuario'] = $codigo_master;

	$nome = $_POST['nome'];
	$_SESSION['nome'] = $nome;

	$turma = $_POST['turma'];
	$_SESSION['turma'] = $turma;


	$turno = $_POST['turno'];
	$_SESSION['turno'] = $turno;

	header('Location: aluno_professor.php');



?>
