<?php
	require_once("db.class.php");
  header("Content-type:application/json;charset=utf-8");

  $motivo = $_POST['motivo'];
  $type = $_POST['type'];

  if($type == "delete"){
    $sql = "DELETE FROM `config` WHERE Texto = '$motivo'";

  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $resultado_id = mysqli_query($link,$sql);
  $data['response'] = "success";
  echo json_encode($data); 
  }else{


  //echo "<script>console.log('$motivo')</script>";
  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $escola = $objDb->nome;

  $sql = "INSERT INTO `config`(`Escola`, `Texto`) VALUES ('$escola','$motivo')";


  $resultado_id = mysqli_query($link,$sql);

  $data['response'] = "success";
  echo json_encode($data); 
}
  
 
