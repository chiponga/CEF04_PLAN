
<?php
session_start();
require_once("db.class.php");
$origem =	$_SESSION['origem'];
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}

$objDb = new db();
$escola = $objDb->nome;
$link = $objDb->conecta_mysql();
$sql=("SELECT DISTINCT Turma from notas Where Escola = '$escola' ORDER BY Turma");
$query = mysqli_query($link,$sql);

$sql_turno=("SELECT DISTINCT Turno from notas Where Escola = '$escola'  ORDER BY Turno");
$query_turno = mysqli_query($link,$sql_turno);

$sql_serie=("SELECT DISTINCT Serie from notas Where Escola = '$escola'  ORDER BY Serie");
$query_serie = mysqli_query($link,$sql_serie);

?>
<!DOCTYPE html>
<html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Selecionar Turma Ranking<title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="icon" type="image/png" href="imagens/logo.png" />

	<script>

	$(document).ready(function() {

		$("#turma").hide();
		$("#turma").val( $('option:contains("Selecione")').val() );

		$("#serie").hide();
		$("#serie").val( $('option:contains("Selecione")').val() );

		$("#turno").show();
			$("#turno").val($("#turno option:first").val());

			$("#radio_turma").click(turma);

			$("#radio_turno").click(turno);

			$("#radio_serie").click(serie);
		 // $("#dia_ate").val( $('option:contains("02")').val() );

		 $('input:radio[name=turma]')[0].checked = true;



			});


			function turma(){

					$("#turma").show();

					$("#turma").val($("#turma option:first").val());


					$("#serie").hide();
					$("#serie").val( $('option:contains("Selecione")').val() );

					$("#turno").hide();
					$("#turno").val( $('option:contains("Selecione")').val() );



			}

			function turno(){
				$("#turma").hide();
				$("#turma").val( $('option:contains("Selecione")').val() );

				$("#serie").hide();
				$("#serie").val( $('option:contains("Selecione")').val() );

				$("#turno").show();
					$("#turno").val($("#turno option:first").val());

			}

			function serie(){
				$("#turma").hide();
				$("#turma").val( $('option:contains("Selecione")').val() );

				$("#serie").show();
				$("#serie").val($("#serie option:first").val());


				$("#turno").hide();
				$("#turno").val( $('option:contains("Selecione")').val() );
			}

	</script>


</head>

<body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<div class="container">

		<div class="creditCardForm">
			<div class="heading">

			</div>
			<div class="payment">
				<form method="post" action="ranking_notas.php">

					<div class="form-group" id="expiration-date">

						<label style="font-family: 'Open Sans', sans-serif;margin-top:30px">Turno <input type="radio" checked="checked" name="radio" id="radio_turno" value="turno"></label>



						<label style="font-family: 'Open Sans', sans-serif;margin-top:30px">Turma 	<input type="radio" name="radio" id="radio_turma" value="turma"></label>



						<label style="font-family: 'Open Sans', sans-serif;margin-top:30px">Serie <input type="radio" name="radio" id="radio_serie" value="serie"></label>


						<br>




						<select class="select" name="turno" id="turno">



							<?php while ($rows_turno = mysqli_fetch_assoc($query_turno)) { ?>

										<option value="<?php echo $rows_turno['Turno']?>"><?php echo $rows_turno['Turno']?></option>

									<?php }?>
									<option value="Nenhum">Selecione</option>



					</select>



							<select class="select" name="turma" id="turma">


								<?php while ($rows = mysqli_fetch_assoc($query)) { ?>

											<option value="<?php echo $rows['Turma']?>"><?php echo $rows['Turma']?></option>

										<?php }?>


										<option value="Nenhum">Selecione</option>

						</select>



					<select class="select" name="serie" id="serie">


						<?php while ($rows_serie = mysqli_fetch_assoc($query_serie)) { ?>

									<option value="<?php echo $rows_serie['Serie']?>"><?php echo $rows_serie['Serie']?></option>

								<?php }?>


								<option value="Nenhum">Selecione</option>

				</select>




					</div>
					<div class="form-group" id="credit_cards">

					</div>
					<div class="form-group" id="pay-now">
						<button type="submit" class="btn btn-default">Confirmar</button>
					</div>

					<div class="form-group" id="pay-now">
					<a href="alunos_professor.php"><button type="button" class="btn btn-danger">Voltar</button></a>
					</div>
				</form>
			</div>
		</div>



	</div>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	//window.document.getElementById("turmas").value = 'Nenhum';


</body>

</html>
