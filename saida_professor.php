<?php
session_start();
require_once("db.class.php");
$codigo = $_SESSION['usuario'];

$obj = new db();
$link = $obj->conecta_mysql();
$sql=("SELECT * FROM `saida` WHERE Codigo = '$codigo'");
$query = mysqli_query($link,$sql);

if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}


?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<meta charset="UTF-8">

	<title>Saída professor</title>

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


	<!-- bootstrap - link cdn -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="imagens/logo.png" />

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="segurança.js"></script>
	<script>

	</script>

	<style type="text/css">

	</style>

</head>

<body>

    	<img class="img-responsive  rounded slideDown" style="margin: 10px auto 10px auto; border-radius: 7px;background-color: rgb(255, 255, 255);
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	border-top-color: rgb(239, 176, 19);
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	border-top-style: solid;
	border-top-width: 5px;
	box-shadow: rgb(206, 207, 212) 0px 2px 12px 0px;
	box-sizing: border-box;" src="imagens/fotos/<?php echo $_SESSION['usuario'];?>.JPG" height="230px" width="180px">
		<p class="" style="text-align: center;font-size: 23px">
			<?php 
			$nome = $_SESSION['nome'];
			echo $nome;
			
			?>
		</p>
		<p style="text-align: center;font-size: 23px">
			<?php 
			$turma = $_SESSION['turma'];
			echo $turma;
			?>
		</p>

        <p style="text-align: center;font-size: 30px">
			<?php 
			
			echo 'SAÍDA';
			?>
		</p>

	<div class="container">

		<div class="col-md-12">
			<div class="table-responsive">

				<table class="table" style="width: 500px; margin: 50px auto 50px auto">

					<thead>

						<th class="text-center">Dia</th>
						<th class="text-center">Horas</th>
					
						


					</thead>


					<tbody>
						<?php while ($rows = mysqli_fetch_assoc($query)) {?>


						<tr>
							<td style="text-align:center;padding-bottom:5px;">
                                <?php 
                               $data = $rows['Dia'];

                               echo date('d/m/Y',strtotime($data));
                                ?>
							</td>
							<td style="text-align:center;padding-bottom:5px;">
								<?php echo $rows['Horas']?>
							</td>
						
							

							

						</tr>



						<!-- Button trigger modal -->


						<!-- Modal -->
						

						<?php }?>
					</tbody>

				</table>
			</div>
		</div>
		<div class="row">

			<div class="col-md-4">

			</div>

			<div class="col-md-4">
				<div style="text-align: center">
					<style>
						.botao {
							border-radius: 5px;
							padding: 15px 25px;
							font-size: 22px;
							text-decoration: none;
							margin: 20px;
							color: #fff;
							position: relative;
							display: inline-block;
							float: right;
						}

						.red {
							background-color: #e74c3c;
							box-shadow: 0px 5px 0px 0px #CE3323;
						}

						.red:hover {
							background-color: #FF6656;
						}

					</style>
					<a href="aluno_professor.php" class="botao red">Sair</a>
				</div>

			</div>

			<div class="col-md-4"></div>


		</div>

	</div>

</body>

</html>
