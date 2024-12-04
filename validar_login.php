<?php
	session_start();
	require_once("db.class.geral.php");

	$nome = $_POST['nome'];
	$senha = $_POST['senha'];

	$nome = strtoupper($nome);
	function tirarAcentos($nome){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$nome);
	}
	$nome = tirarAcentos($nome);

	$sql = "SELECT * FROM email WHERE Nome = '$nome' AND Senha = '$senha'";
	$obj_geral = new db_geral();
	$link_geral = $obj_geral->conecta_mysql_geral();
	$resultado_id = mysqli_query($link_geral,$sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_assoc($resultado_id);

		if(isset($dados_usuario['Nome'])){
            
				$_SESSION['email'] =  $dados_usuario['Email'];
				$_SESSION['nome_email'] =  $nome;
				$_SESSION['senha_email'] =  $senha;
				header("Location: email_aluno.php");

		}else{
			echo "<script>alert('Nome ou senha incorretos!');document.location='login_email.html';</script>";
			//header('Location: login.html');
		}

	}else{

		echo "<script>alert('Erro');document.location='login_email.html';</script>";
	}






?>
