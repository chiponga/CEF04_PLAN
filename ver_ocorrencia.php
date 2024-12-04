<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
	<title>Ocorrência</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imagens/logo.png" />

	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
	<link rel="stylesheet" type="text/css" href="css1/select.css">
	<!--===============================================================================================-->
</head>

<body>
<?php
	session_start();
	require_once("db.class.php");
	$codigo = $_SESSION['codigo'];
    $reg = $_POST['reg'];

$sql_entrada = "SELECT * FROM `registro` WHERE Id = '$reg'"; 
    $objDb = new db();
	$link = $objDb->conecta_mysql();
	if(!isset ($_SESSION['logado'])){
		header('Location: login.php');
	}
    $resultado_entrada = mysqli_query($link,$sql_entrada);
    if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);
		
    }
    
    $sql = "UPDATE `registro` SET `Lido`='SIM' WHERE Reg = '$reg'";
   
    $link = $objDb->conecta_mysql();
    $resultado_id = mysqli_query($link,$sql);
?>


	<div class="container-contact100" style="background-image: url('dist_provisorio/fundo_ocorrencias2.jpg');">
		<div class="wrap-contact100">
			<form method="post" action="validar_ocorrencia.php" class="contact100-form validate-form">
				<span class="contact100-form-title">
					
				</span>


                <span class="contact100-form-title">
					Registro 
				</span>
                    <br>
                    <br>
                    <div class="wrap-input100 validate-input" >
					
					<label class="label-input100" style="font-size: 20px"> <?php echo $dados_entrada['Mensagem']; ?></label>
                    <br>
                    <br>
                    
				
                   
                    
                    <label class="label-input100" style="font-size: 15px"> Data: <?php echo date('d/m/Y', strtotime($dados_entrada['Data']))?></label>
                    <br>
                    
                    <label class="label-input100" style="font-size: 15px"> Lido: <?php echo $dados_entrada['Leitura']; ?></label>
                    
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
							background-color: #ff351f;
							box-shadow: 0px 5px 0px 0px #cc1804;
						}

						.blue:hover {
							background-color: #ff6c5c;
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


							<a class="btn blue" href="tabela_ocorrencias.php">Voltar</a>
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
