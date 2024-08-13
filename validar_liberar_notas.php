<?php
	require_once("db.class.php");
  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $escola = $objDb->nome;

$i = 1;

$sql_libera = "Select * from `liberar` Where Escola = '$escola'";
$resultado_id = mysqli_query($link,$sql_libera);
$dados = mysqli_fetch_assoc($resultado_id);
if($dados['Escola'] != null){

}else{
  $sql_libera = "INSERT INTO `liberar`(`bim1`, `bim2`, `bim3`, `bim4`, `Escola`) VALUES ('SIM','SIM','SIM','SIM','$escola')";
  $resultado_id = mysqli_query($link,$sql_libera);
}

while($i <= 4){

if(isset($_POST['bim'.$i])){

  $liberado = $_POST['bim'.$i];
  $sql_libera = "UPDATE `liberar` SET `bim$i`='SIM' WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);

}else{
  $sql_libera = "UPDATE `liberar` SET `bim$i`='NAO'WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);
}

$i++;

}

if(isset($_POST['ranking'])){

  $sql_libera = "UPDATE `liberar` SET `RANKING`='SIM'WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);



}else{
  $sql_libera = "UPDATE `liberar` SET `RANKING`='NAO'WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);



}
if(isset($_POST['faltas'])){

  $sql_libera = "UPDATE `liberar` SET `Faltas`='SIM'WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);



}else{
  $sql_libera = "UPDATE `liberar` SET `Faltas`='NAO'WHERE Escola='$escola'";
  $resultado_id = mysqli_query($link,$sql_libera);



}

//echo "<script>alert('Notas atualizadas com sucesso!');document.location='alunos_professor.php';</script>";

?>
