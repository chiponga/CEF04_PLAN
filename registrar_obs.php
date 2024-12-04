<?php
	session_start();

	require_once("db.class.php");


	$objDb = new db();
	$escola = $objDb->nome;
	$link = $objDb->conecta_mysql();

	$turma = $_POST['turma'];
	$_SESSION['turma_pdf'] = $turma;
	$result_cursos = "SELECT * FROM cadastro WHERE Turma = '$turma' And Escola = '$escola' ORDER BY Aluno";
	$resultado_cursos = mysqli_query($link, $result_cursos);

	$total = mysqli_num_rows($resultado_cursos);

?>
<!DOCTYPE html>

<html lang="PT-BR">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<meta charset="utf-8">
	<title>Registrar Obs</title>
	<meta name="author" content="Adtile">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<style>
	.loading-spinner {
	  background: #333;
	  background: rgba(0, 0, 0, 0.8);
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  overflow: hidden;
	  display: none;
	}

	.loading-spinner.active {
	  display: block;
	}

	#hourglass { /* centraliza no meio da tela */
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  margin: -32px 0 0 -32px;
	}

		/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
		.filterable {
			margin-top: 15px;
		}

		.filterable .panel-heading .pull-right {
			margin-top: -20px;
		}

		.filterable .filters input[disabled] {
			background-color: transparent;
			border: none;
			cursor: auto;
			box-shadow: none;
			padding: 0;
			height: auto;
		}

		.filterable .filters input[disabled]::-webkit-input-placeholder {
			color: #333;
		}

		.filterable .filters input[disabled]::-moz-placeholder {
			color: #333;
		}

		.filterable .filters input[disabled]:-ms-input-placeholder {
			color: #333;
		}



* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Lato', sans-serif;
  background-color: #fff;
  color: #A2ACB0;
}

/* STYLES */
section {
  width: 300px;
  display: block;
  margin: 50px auto;
  text-align: center;
}

h1 {
  font-size: 36px;
  font-weight: 300;
  color: #343C3F;
  margin-bottom: 1em;
}

.dropdown {
  text-align: left;
  color: #343C3F;
  border: 1px solid #A2ACB0;
}
.dropdown.closed .dropdown-menu {
  margin-top: 0px;
}
.dropdown.closed .dropdown-menu li {
  height: 0px;
}
.dropdown.closed .title {
  border-bottom: none;
}
.dropdown.closed .title:after {
  margin-top: -16px;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
}
.dropdown .title {
  width: 100%;
  position: relative;
  height: 40px;
  padding: 12px;
  cursor: pointer;
  border-bottom: 1px solid #D9E1E4;
}
.dropdown .title:after {
  display: block;
  content: "▾";
  position: absolute;
  right: 14px;
  margin-top: -16px;
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.dropdown .dropdown-menu {
  position: relative;
  overflow: hidden;
  max-height: 200px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
  -webkit-box-sizing: "border-box";
  -moz-box-sizing: "border-box";
  box-sizing: "border-box";
}
.dropdown ul {
  position: absolute;
  top: 0;
  width: 100%;
}
.dropdown ul li {
  width: 100%;
  height: 40px;
  line-height: 40px;
  border-bottom: 1px solid #D9E1E4;
  padding: 0 12px;
  vertical-align: top;
  overflow: hidden;
  cursor: pointer;
  -webkit-transition: margin-top 0.5s, height 0.5s;
  -moz-transition: margin-top 0.5s, height 0.5s;
  transition: margin-top 0.5s, height 0.5s;
}
.dropdown ul li:hover {
  background-color: #D9E1E4;
  color: #343C3F;
}


	</style>

</head>

<body>






	<div class="container-fliud" style="margin: 80px">


		<style>
						/* start da css for da buttons */
						.btn {
							border-radius: 5px;
							padding: 15px 25px;
							font-size: 22px;
							text-decoration: none;
							margin: 20px;
							color: #fff;
							position: relative;
							display: inline-block;
						}

						.btn:active {
							transform: translate(0px, 5px);
							-webkit-transform: translate(0px, 5px);
							box-shadow: 0px 1px 0px 0px;
						}

						.blue {
							background-color: #55acee;
							box-shadow: 0px 5px 0px 0px #3C93D5;
						}

						.blue:hover {
							background-color: #6FC6FF;
						}


					</style>
	
		<form method="post" action="pdf_conselho.php">
			<div class="row">

				<div class="col-md-6 mb-3">
					<label for="lastName">Professor Conselheiro: </label>
					<input type="text" class="form-control" name="prof_conse"  placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite o Professor Conselheiro:
					</div>
				</div>

				<div class="col-md-6 mb-3">
					<label for="lastName">Coordenador: </label>
					<input type="text" class="form-control" name="coordenador"  placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite o Coordenador:
					</div>
				</div>

				<div class="col-md-6 mb-3">
					<label for="lastName">Aluno Respresentante: </label>
					<input type="text" class="form-control" name="aluno_representante"  placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite o Aluno Respresentante:
					</div>
				</div>

				<div class="col-md-6 mb-3">
					<label for="lastName">Vice Respresentante: </label>
					<input type="text" class="form-control" name="vice_representante"  placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite o Vice Respresentante:
					</div>
				</div>

				<!--

				<div class="col-md-6 mb-3">
					<label for="lastName">Professores: </label>
					<input type="text" class="form-control" name="Professores" placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite os Professores:
					</div>
				</div>


				<div class="col-md-6 mb-3">
					<label for="lastName">Direção: </label>
					<input type="text" class="form-control" name="direcao"  placeholder="" value="" required>
					<div class="invalid-feedback">
						Digite a Direção:
					</div>
				</div>-->





				<!--<div class="panel panel-primary filterable">-->

				<table class="table" style="border:5px solid #3C93D5;color:#000">

					<tbody>


						<?php  $i = 1; while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){
							 ?>
						<tr>

							<td style='vertical-align: middle;'>
								<?php echo $rows_cursos['Codigo']; ?>
							</td>

							<td style='vertical-align: middle;'>
								<?php echo $rows_cursos['Aluno']; ?>
							</td>
						<!--	<td>
								<?php //echo $rows_cursos['Turma']; ?>
							</td> onkeypress='return SomenteNumero(event)'-->

						<td>
						<img src="imagens/fotos/<?php echo $rows_cursos['Codigo'] ?>.JPG" style="margin: 40px;margin-left:85px;margin-top:10px;text-aling:center" height="120px" width="100px">
						</td>

						<td style='vertical-align: middle;'>
								<input style="color:#000;border:1px solid #000;width: 300px" id="" name="mencao<?php echo $i?>" type="text" maxlength="60" placeholder="">
							</td>





							<?php
									$cod = $rows_cursos['Codigo'];
									$result_mencao = "SELECT * FROM conselho WHERE Codigo = '$cod'";
									$resultado_mencao = mysqli_query($link, $result_mencao);

									$dados_mencao = mysqli_fetch_assoc($resultado_mencao);


											?>
											<!--<td style='padding-right:100px;vertical-align: middle;'>Menção atual: <?php //echo $dados_mencao[$materia]?></td>-->






							<!--Codigo-->
							<input name="codigo_aluno<?php echo $i?>" type="hidden" value="<?php echo $rows_cursos['Codigo']; ?>">
							<!--Turno-->

							<!--Nome-->
							<input name="nome<?php echo $i?>" type="hidden" value="<?php echo $rows_cursos['Aluno']; ?>">
							<!--Turma-->
							<input name="turma<?php echo $i?>" type="hidden" value="<?php echo $rows_cursos['Turma']; ?>">





						</tr>
						<?php $i++;} ?>
							<input name="turma_ow" type="hidden" value="<?php $_SESSION['turma_ow']?>">
							<input onclick="hidePleaseWait" name="Alunos" type="hidden" value="<?php echo $total ?>">


					</tbody>
				</table>


				<!--</div>-->
			</div>

			<div class="row">
				<div class="col-md-4">
					<style>
						/* start da css for da buttons */
									.btn {
									  border-radius: 5px;
									  padding: 15px 25px;
									  font-size: 22px;
									  text-decoration: none;
									  margin: 20px;
									  color: #fff;
									  position: relative;
									  display: inline-block;
									}

									.btn:active {
									  transform: translate(0px, 5px);
									  -webkit-transform: translate(0px, 5px);
									  box-shadow: 0px 1px 0px 0px;
									}

									.blue {
									  background-color: #55acee;
									  box-shadow: 0px 5px 0px 0px #3C93D5;
									}

									.blue:hover {
									  background-color: #6FC6FF;
									}



								</style>


												<div class="col-md-6 mb-3">
													<label for="lastName">Alunos Destaques: </label>
													<input type="text" class="form-control" name="destaques"  placeholder="" value="" required>
													<div class="invalid-feedback">
														Digite os Alunos Destaques:
													</div>
												</div>

												<div class="col-md-6 mb-3">
													<label for="lastName">Alunos Elogios: </label>
													<input type="text" class="form-control" name="elogios"  placeholder="" value="" required>
													<div class="invalid-feedback">
														Digite os Alunos Elogios:
													</div>
												</div>

												<!--<div class="col-md-6 mb-3">
													<label for="lastName">Providencias: </label>
													<input type="text" class="form-control" name="providencias"  placeholder="" value="" required>
													<div class="invalid-feedback">
														Digite as Providencias:
													</div>
												</div>-->



					<input type="submit" onclick="carregando" class="btn blue" value="Salvar">
				</div>
				<div class="col-md-4">
					<style>
						/* start da css for da buttons */
						.btn {
							border-radius: 5px;
							padding: 15px 25px;
							font-size: 22px;
							text-decoration: none;
							margin: 20px;
							color: #fff;
							position: relative;
							display: inline-block;
						}

						.btn:active {
							transform: translate(0px, 5px);
							-webkit-transform: translate(0px, 5px);
							box-shadow: 0px 1px 0px 0px;
						}

						.blue {
							background-color: #55acee;
							box-shadow: 0px 5px 0px 0px #3C93D5;
						}

						.blue:hover {
							background-color: #6FC6FF;
						}

					</style>
					<a href="alunos_professor.php" class="btn blue">Sair</a>


				<div class="col-md-4"></div>


			</div>
		</form>


	</div>




	<script src="js/index.js"></script>


	<script src="js/fastclick.js"></script>
	<script src="js/scroll.js"></script>
	<script src="js/fixed-responsive-nav.js"></script>
</body>

</html>
