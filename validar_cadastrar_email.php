<?php
session_start();
require_once("db.class.php");
if(!isset ($_SESSION['logado'])){
	header('Location: login.php');
}

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario = $_SESSION['codigo'];
$senha_s = $_SESSION['senha'];

$sql = "UPDATE `cadastro` SET `email`= '$email' ,`Senha`= '$senha' WHERE Codigo = '$usuario'";
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	header("Location: aluno.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução </div>";
}


?>
