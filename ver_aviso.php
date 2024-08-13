<!DOCTYPE html>
<html lang="en">

<head>
	<title>Aviso</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	

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
    $aviso = $_POST['Aviso'];
    //SELECT * FROM `registro` WHERE Reg = '754'
    $sql_entrada = "SELECT * FROM `avisos` WHERE Id = '$aviso'";
	$obj = new db();
	if(!isset ($_SESSION['logado'])){
		header('Location: login.php');
	}
	$link = $obj->conecta_mysql();
    $resultado_entrada = mysqli_query($link,$sql_entrada);
    if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

    }


?>


	<div class="container-contact100" style="background-image: url('dist_provisorio/fundo_ocorrencias2.jpg');">
		<div class="wrap-contact100">
			<form method="post" action="validar_ocorrencia.php" class="contact100-form validate-form">
				<span class="contact100-form-title">

				</span>


                <span class="contact100-form-title">
					Aviso : <?php echo $dados_entrada['Assunto']; ?>
				</span>
                    <br>
                    <br>
                    <div class="wrap-input100 validate-input" >

					<label class="label-input100" style="font-size: 20px"> <?php echo $dados_entrada['Mensagem']; ?></label>
                    <br>
                    <br>




                    <label class="label-input100" style="font-size: 15px"> Data: <?php echo date('d/m/Y', strtotime($dados_entrada['Data']))?></label>
                    <br>

										<input type='hidden' id="nome_foto" value="<?php echo $dados_entrada['Imagem']; ?>">

										<img id="imgFoto">




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


							<a class="btn blue" href="tabela_avisos.php">Voltar</a>
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
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-storage.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');

	</script>

	<script>
	var firebaseConfig = {
	   apiKey: "AIzaSyCt_LW25KJf25965N_ko5WtiyZpMg8sIrU",
	   authDomain: "sistemas-c4107.firebaseapp.com",
	   databaseURL: "https://sistemas-c4107.firebaseio.com",
	   projectId: "sistemas-c4107",
	   storageBucket: "sistemas-c4107.appspot.com",
	   messagingSenderId: "133162236317",
	   appId: "1:133162236317:web:9a47b5d68c98bff0"
	 };
	 // Initialize Firebase
	 firebase.initializeApp(firebaseConfig);
	 var img = document.getElementById('imgFoto');
	 var nome_imagem = document.getElementById("nome_foto").value;


	var imgRef = firebase.storage().ref('avisos/'+nome_imagem);
	imgRef.getDownloadURL().then(function(url){
	 console.log("LINK DOWNLOAD");
	 console.log(url);
	 img.src = url;
	 document.getElementById("linkFoto").href=url
})
	</script>

</body>

</html>
