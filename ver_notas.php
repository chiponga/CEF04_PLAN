<?php
session_start();
require_once("db.class.php");
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];


if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
$usuario = $_POST['usuario'];
$origem = $_POST['origem'];
$disciplina = $_POST['disciplina'];
$escola = $_POST['escola'];
if(isset($_POST['usuario'])){

		$sql = "UPDATE `login` SET `Liberacao`='S',`Origem` = '$tipo'  WHERE Usuario = '$usuario' and Origem = '$origem' and Disciplina = '$disciplina' and Escola = '$escola'";
		//echo $sql;

			$objDb = new db();
			$link = $objDb->conecta_mysql();
			$resultado_id = mysqli_query($link,$sql);

			if($resultado_id){

				echo "<script>alert('Salvo com sucesso!');document.location='liberar_professor.php';</script>";

			}else{

				echo "<script>alert('Erro ao salvar!');document.location='liberar_professor.php';</script>";
			}

}
if(isset($_GET['id'])){

	$excluir = $_GET['id'];
	$usuario = $_GET['usuario'];
	$origem = $_GET['origem'];
	$disciplina = $_GET['disciplina'];
	$escola = $_GET['escola'];

	$sql = "DELETE FROM `login` WHERE Usuario = '$excluir' and Origem ='$origem' and Disciplina ='$disciplina' and Escola = '$escola'";
	//echo $sql;
			$objDb = new db();
			$link = $objDb->conecta_mysql();
			$resultado_id = mysqli_query($link,$sql);

			if($resultado_id){


				echo "<script>alert('Excluído com sucesso!');document.location='liberar_professor.php';</script>";

			}else{

				echo "<script>alert('Erro ao Excluir!');document.location='liberar_professor.php';</script>";
			}
}

?>
