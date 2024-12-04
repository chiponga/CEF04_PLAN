<?php
	require_once("db.class.php");
	session_start();

	if(!isset ($_SESSION['logado_p'])){
			header('Location: login_professor.php');
	}
	date_default_timezone_set('America/Sao_Paulo');
  $objDb = new db();
  $escola = $objDb->nome;



  $link = $objDb->conecta_mysql();

			$data = date ("Y-m-d");


  $sql = "select Turma,count(Nome) as Alunos from entrada WHERE Escola = '$escola' And Dia = '$data' GROUP BY Turma ORDER BY Turma DESC";
    $resultado = mysqli_query($link,$sql);



    $sql_turno = "select Turno,count(Nome) as Alunos from entrada  WHERE Escola = '$escola' And Dia = '$data' GROUP BY Turno ORDER BY Turno DESC";
      $resultado_turno = mysqli_query($link,$sql_turno);



      $sql_total = "select Turma,count(Aluno) as Alunos from cadastro Escola = '$escola' GROUP BY Turma ORDER BY Turma DESC";
      $resultado_total  = mysqli_query($link,$sql_total );
  
  
  
      $sql_turno_total = "select Turno,count(Aluno) as Alunos from cadastro Escola = '$escola' GROUP BY Turno ORDER BY Turno DESC";
        $resultado_turno_total  = mysqli_query($link,$sql_turno_total );














?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Numero Alunos</title>
  <!-- Custom fonts for this template-->
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link rel="icon" type="image/png" href="imagens/logo.png" />


  <style>
  body{
    color: #67676b;
  }
  </style>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

  </head>

<body id="page-top">

  <!-- Page Wrapper -->

              <div class="col-lg-4 mb-2" style="margin: 20px auto 0 auto">
								<div class="panel-heading">
                <a href="alunos_professor.php"><button type="button" class="btn btn-danger">Voltar</button></a>

                <h2 class="panel-title" style="font-size: 23px; margin-top: 10px">Listagem de Alunos (Dia: <?php $date = date ("d-m-Y"); echo $date; ?> )</h2>

								</div>
       
              <div class="card shadow mb-4" style="margin-top: 10px">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Turmas e Turnos</h6>
                </div>
                <div class="card-body">




                  <?php

									while ($dados_turno = mysqli_fetch_assoc($resultado_turno)) {

										echo '<h6  class="large font-weight-bold" style="padding-top: 10px;font-family: monospace;font-size: 20px">  Turno: '.$dados_turno['Turno'].' -- '.$dados_turno['Alunos'].'</h6>';




                  }








                  while ($dados = mysqli_fetch_assoc($resultado)) {



  									  echo '<h6  class="large font-weight-bold" style="padding-top: 10px;font-family: monospace;font-size: 20px"> '.$dados['Turma'].' -- '.$dados['Alunos'].'</h6>';



                  }


                    ?>


                </div>
              </div>










              </div>

              

              <div class="col-lg-4 mb-2" style="margin: 20px auto 0 auto">
								<div class="panel-heading">
									<h2 class="panel-title">Listagem Total de Alunos</h2>

								</div>

              <div class="card shadow mb-4" style="margin-top: 10px">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Turmas e Turnos</h6>
                </div>
                <div class="card-body">




                  <?php

									while ($dados_turno_total = mysqli_fetch_assoc($resultado_turno_total)) {

										echo '<h6  class="large font-weight-bold" style="padding-top: 10px;font-family: monospace;font-size: 20px"> Turno: '.$dados_turno_total['Turno'].' -- '.$dados_turno_total['Alunos'].'</h6>';




                  }








                  while ($dados = mysqli_fetch_assoc($resultado_total)) {



  									  echo '<h6  class="large font-weight-bold" style="padding-top: 10px;font-family: monospace;font-size: 20px"> '.$dados['Turma'].' -- '.$dados['Alunos'].'</h6>';



                  }


                    ?>


                </div>
              </div>










              </div>

            


</body>

</html>
