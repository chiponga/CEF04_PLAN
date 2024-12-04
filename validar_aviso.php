<?php
	session_start();
	require_once("db.class.php");

  if(!isset ($_SESSION['logado_p'])){
    header('Location: login_professor.php');
  }

  $titulo = $_POST['titulo'];
  $data = date ("Y-m-d");
  $texto = $_POST['texto'];
	$foto = $_FILES['foto'];



	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

					          $sql = "INSERT INTO `aviso`(`Imagem`,`Titulo`, `Dia`, `Texto`, `Turma`, 'Escola') VALUES ('$nome_imagem','$titulo','$data','$texto','ALL','$escola')";
					          $resultado_aviso = mysqli_query($link,$sql);

					      if($resultado_aviso){
					        echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

					      }else{
					        echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

					      }






?>
