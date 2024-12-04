<?php
	session_start();
	require_once("db.class.php");
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$escola = $objDb->nome;

	$sql = "SELECT * FROM login WHERE Usuario = '$usuario' AND Senha = '$senha' And Escola = '$escola'";
	
	$resultado_id = mysqli_query($link,$sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_assoc($resultado_id);

		$Nome = $dados_usuario['Nome'];
		$usuario = $dados_usuario['Usuario'];
		$origem = $dados_usuario['Origem'];


		$_SESSION['origem'] = $origem;
		$_SESSION['usuario_professor'] = $usuario;
		$_SESSION['logado_p'] = true;
		$primeiroNome = explode(" ", $Nome);





		$_SESSION['nome_professor'] = $primeiroNome[0];
		$_SESSION['nome_professor_normal'] = $Nome;
		$_SESSION['materia'] = $dados_usuario['Disciplina'];;

		if(isset($dados_usuario['Usuario'])){
			if($dados_usuario['Liberacao'] == 'N'){

				$_SESSION['msg_professor'] = "Sem permissão! Procure a direção";	

			}else{

				$_SESSION['msg_professor'] = "NAO";
				header("Location: alunos_professor.php");
			}

		}else{
			$_SESSION['msg_professor'] = "Usuario ou senha incorretos";

			header('Location: login_professor.php');
		}

	}else{

		$_SESSION['msg_professor'] = "Erro na execução , favor entrar em contato com admin do site";
	}






?>
