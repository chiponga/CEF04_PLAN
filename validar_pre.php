<?php
session_start();

require_once("db.class.php");
$objDb = new db();
$link = $objDb->conecta_mysql();
$escola = $objDb->nome;
$turma = $_POST['turma'];
$materia = $_POST['materia'];
$usuario_professor = $_SESSION['usuario_professor'];
$result = "SELECT * FROM cadastro WHERE Turma = '$turma' ORDER BY Aluno";
$resultado = mysqli_query($link, $result);

$sql_delete = "DELETE FROM `Marcacoes` WHERE Turma = '$turma' and Professor='$usuario_professor'";
$resultado_delete = mysqli_query($link,$sql_delete);

while($rows = mysqli_fetch_assoc($resultado)){
  $aluno = $rows['Aluno'];
  $codigo = $rows['Codigo'];
  $alunoCom = str_replace(' ', '_', $aluno);
  $array = $_POST[$alunoCom];
  $mencao = "mencao$alunoCom";

  if(isset($_POST[$mencao])){
    $valor_mencao = $_POST[$mencao];
  }else{
    $valor_mencao = '';
  }

  foreach ($array as &$value) {
    $sql = "INSERT INTO `Marcacoes`(`Aluno`, `Codigo`, `Turma`, `Marcacao`,`Escola`,`Professor`) VALUES ('$aluno','$codigo','$turma','$value','$escola','$usuario_professor')";
    echo $sql;
    $resultado_id = mysqli_query($link,$sql);
  }  

  /*$sql = "SELECT * FROM conselho WHERE Codigo = '$codigo'";

	$ver = mysqli_query($link,$sql);
	$total = mysqli_num_rows($ver);

  if($total == 0 && $valor_mencao != ''){
    echo "<br>";
	$sql = "INSERT INTO `conselho`(`Codigo`, `Aluno`, `Turma`, `$materia`,`Escola`) VALUES ('$codigo','$aluno','$turma','$valor_mencao','$escola')";
  echo $sql;
  echo "<br>";
	
  //$resultado_id = mysqli_query($link,$sql);
  $total = null;
	}else if( $valor_mencao != ''){

	$sql = "UPDATE `conselho` SET $materia = '$valor_mencao' WHERE Codigo = $codigo";
  echo $sql;
  echo "<br>";

	//$resultado_id = mysqli_query($link,$sql);

	}*/

  echo "<br>";
}

echo"<script>alert('Salvo com sucesso');document.location='selecionar_pre_conselho.php';</script>";
?>