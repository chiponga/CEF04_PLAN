<?php
	session_start();
	require_once("db.class.php");
							  
	$sql = "INSERT INTO `entrada`(`Codigo`,Dia,Entrada,Horas) VALUES ('2234',NOW(),'NOP',NOW())";
	
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$resultado_id = mysqli_query($link,$sql);

?>
