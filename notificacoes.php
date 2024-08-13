<?php
    include "conexao.php";

    $codigo = $_POST['codigo'];
    $turma = $_POST['turma'];
    //$codigo = '2234';
   // $turma = '3º ANO A';

    $resultado = array();
    $registros = $PDO->prepare("SELECT * FROM `registro` WHERE Codigo = '$codigo'  AND Lido = 'NAO'");
    $registros->execute();

    $count_registros = $registros->rowCount();

    $aviso = $PDO->prepare("SELECT * FROM `aviso` WHERE Turma = '$turma' OR Turma = 'ALL'");
    $aviso->execute();

    $count_aviso = $aviso->rowCount();

    $not = $count_aviso + $count_registros;

    $resultado[] = array("Not"=>$not,"Avisos"=>$count_aviso,"Registros"=>$count_registros);

    echo json_encode($resultado);
?>