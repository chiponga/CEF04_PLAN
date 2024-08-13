<!DOCTYPE html>
<html lang="en">
	<?php
	session_start();
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
?>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<title>Registrar Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
	<link rel="stylesheet" type="text/css" href="css1/select.css">
	<script src="segurança.js"></script>
	<!--===============================================================================================-->
</head>

<body>


	<div class="container-contact100" style="background-image: url('imagens/fundo_ocorrencias.jpg');">
		<div class="wrap-contact100">
			<form method="post" action="validar_ocorrencia.php" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Registrar ocorrência
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Selecione o tipo">
					<span class="label-input100">Tipo</span>
					<div class="form-group" id="expiration-date">


						<select class="select" name="tipo" style="padding: 8px">
							<option value="P">Pedagógico</option>
							<option value="D">Disciplinar</option>


						</select>


					</div>
				</div>


				<div class="wrap-input100 validate-input" data-validate="Digite a ocorrência">
					<span class="label-input100">Ocorrência</span>
					<textarea class="input100" name="ocorrencia" placeholder="Digite a ocorrência"></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<style>
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

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<style>
								.contact100-form-bgbtn{
									background: #fff;
								}
							
							</style>


							<button class="btn blue" type="submit">Enviar</button>
							<br>

							<a class="btn blue" href='aluno_professor.php'>Voltar</a>
						</div>
					</div>


				</div>


			</form>
		</div>


	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/bootstrap/js/popper.js"></script>
	<script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor1/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js1/ocorrencia.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');

	</script>

</body>

</html>
