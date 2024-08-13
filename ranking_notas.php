<?php
session_start();
	require_once("db.class.php");
	date_default_timezone_set('America/Sao_Paulo');
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$escola = $objDb->nome;

$pdo = new \PDO( 'mysql:host=mysql.moodlecef04.com.br;dbname='.$objDb->database.';charset=utf8' , ''.$objDb->usuario.'' , ''.$objDb->senha.'' );
if($_POST['radio'] == 'turma'){
	$turma = $_POST['turma'];
	$sql = ( "select * from notas WHERE Turma = '$turma' and Escola='$escola' GROUP BY Aluno ORDER BY `notas`.`Ranking`  DESC" );
	echo $sql;
}else if ($_POST['radio'] == 'turno') {

		$turno = $_POST['turno'];
		$sql = ( "select * from notas WHERE Turno = '$turno'and Escola='$escola' GROUP BY Aluno ORDER BY `notas`.`Ranking`  DESC" );
		
}else if ($_POST['radio'] == 'serie') {

		$serie = $_POST['serie'];
		$sql = ( "select * from notas WHERE Serie = '$serie' and Escola='$escola'GROUP BY Aluno ORDER BY `notas`.`Ranking`  DESC" );

}

$query_ranking = mysqli_query($link, $sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ranking Notas</title>

  <!-- Custom fonts for this template-->
  <link href="vendor_dash/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="imagens/logo.png" />



</head>

<body id="page-top">

	<style>
	/* Smaller than standard 960 (devices and browsers) */
	@media only screen and (max-width: 959px) {
	    .fonte{
	        font-size: 10px;
	    }
	}

	/* Tablet Portrait size to standard 960 (devices and browsers) */
	@media only screen and (min-width: 768px) and (max-width: 959px) {
	    .fonte{
	        font-size: 12px;
	    }
	}

	/* All Mobile Sizes (devices and browser) */
	@media only screen and (max-width: 767px) {
	    .fonte{
	        font-size: 14px;
	    }
	}

	/* Mobile Landscape Size to Tablet Portrait (devices and browsers) */
	@media only screen and (min-width: 480px) and (max-width: 767px) {
	    .fonte{
	        font-size: 9px;
	    }
	}

	/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
	@media only screen and (max-width: 479px) {
	    .fonte{
	        font-size: 7px;
	    }
	}
	</style>

  <!-- Page Wrapper -->




              <div class="col-lg-5 mb-3" style="margin: 20px auto 0 auto">
								<div class="panel-heading">
									<h2 class="panel-title">Ranking de Notas</h2>

								</div>
              <a href="selecionar_turma_ranking.php"><button type="button" class="btn btn-danger">Voltar</button></a>
              <div class="card shadow mb-4" style="margin-top: 10px">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ranking <?php echo $turma?></h6>
                </div>
                <div class="card-body">




                  <?php
                    $contador = 1;
                    while($rows_notas = mysqli_fetch_assoc($query_ranking)){
                       // echo $rows_notas["Aluno"] .'<br>'. $rows_notas["total"];
 										 $media  = $novoValor = number_format($rows_notas["MEDIA"],2);
                        echo '<h6 class="large font-weight-bold fonte" style="padding-top: 10px;"> '.$contador.'° '.$rows_notas["Aluno"].': '.$media.'<span style="float: right;">'.$rows_notas["Turma"].'</span></h6>';

                        $contador++;
                    }
                    ?>


                </div>
              </div>










              </div>

              </div>









            </div>


          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->



</body>

</html>
