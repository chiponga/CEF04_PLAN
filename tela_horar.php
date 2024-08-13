<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();


require_once("db.class.php");
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
$objDb = new db();
$link = $objDb->conecta_mysql();
$data = date ("Y-m-d");

	$i = 1;

  $horario = $_POST['select_'.$i];
	while($i <= 60 && $horario != ''){
	$turma = $_POST['turma_'.$i];
	$horario = $_POST['select_'.$i];




    $sql_ja_existe = "SELECT * FROM horario Where Turma = '$turma' and Dia = '$data'";
    $resultado_ja_existe = mysqli_query($link,$sql_ja_existe);
		if($horario_ja_existe = mysqli_fetch_assoc($resultado_ja_existe)){


			if($horario != 0){

		$sql = "INSERT INTO `liberacao`(`Codigo`,Nome,Dia,Turma,Horas) (SELECT Codigo,Aluno,NOW(),Turma,'$horario' from cadastro WHERE Turma = '$turma')";
		$resultado_id = mysqli_query($link,$sql);
	}


    }else{
      $horario_ja_existe = mysqli_fetch_assoc($resultado_ja_existe);
      $horario_para_turma = $horario_ja_existe['Horario'];
      $turma_horario = $horario_ja_existe['Turma'];
      $sql = "DELETE From liberacao where Turma ='$turma' and Dia = '$data'";
      $resultado_id = mysqli_query($link,$sql);

			  if($horario != 0){

      $sql = "INSERT INTO `liberacao`(`Codigo`,Nome,Dia,Turma,Horas) (SELECT Codigo,Aluno,NOW(),Turma,'$horario' from cadastro WHERE Turma = '$turma')";
      $resultado_id = mysqli_query($link,$sql);
		}

    }




 $i++;
}

echo "<script>alert('Enviado com sucesso!');document.location='tela_horario.php';</script>";

 ?>
