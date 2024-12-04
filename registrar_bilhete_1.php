<?PHP

		session_start();
		require_once("db.class.php");
date_default_timezone_set('America/Sao_Paulo');
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}


$obj = new db();
$link = $obj->conecta_mysql();
$escola = $obj->nome;
$sql=("SELECT DISTINCT Turma from cadastro WHERE Escola = '$escola' ORDER BY Turma");
$query = mysqli_query($link,$sql);


if (isset($_POST['titulo'])){
$titulo = $_POST['titulo'];
$data = date ("Y-m-d");
$texto = $_POST['texto'];
$nome_arquivo = $_POST['arquivo'];


 if(!isset($_POST['ativo'])){
	echo "<script>alert('Selecione as turmas!');document.location='registrar_bilhete_1.php';</script>";
 }

	if ($_POST && isset($_POST['ativo'])){
			$ativo = $_POST['ativo'];

			foreach($ativo as $valor){
				$sql = "INSERT INTO `registro`(`Imagem`,`Assunto`, `Data`, `Mensagem`, `Turma`, `Escola`) VALUES ('$nome_arquivo','$titulo','$data','$texto','".$valor."','$escola')";
				$resultado_id = mysqli_query($link,$sql);
				
				/*$sql=("SELECT * FROM `token` WHERE (Escola = 'CEF04' and Turma = '$valor')");
				
				
								$query = mysqli_query($link,$sql);

									while ($rows = mysqli_fetch_assoc($query)) {
									define( 'API_ACCESS_KEY', 'AAAAHwEWeZ0:APA91bEddRhGT8AwUuEI3LHzlcyLbJGm2-AeyQh6O1baXUfThJGurQeCQ7n9pXo0nvsuHCBcymJiStaUwu_xyX8vIjWYRpeLCtgBhpfTTnZ2BIKtPVYCeh1LFGg9owtOuAY9sJ3Ay5CS' );

										$singleID = $rows['Token'];
									
										$fcmMsg = array(
										'body' => 'Novo bilhete para a turma '.$valor.' (CEF04)',
										'largeIcon'	=> 'imagens/bell.png',
										//'title' => 'Acesso à escola',
										'sound' => "default",
										'color' => "#49d676"
										);
										$fcmFields = array(
										'to' => $singleID,
										'priority' => 'high',
										'notification' => $fcmMsg
										);
										$headers = array(
										'Authorization: key=' . API_ACCESS_KEY,
										'Content-Type: application/json'
										);
										$ch = curl_init();
										curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
										curl_setopt( $ch,CURLOPT_POST, true );
										curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
										curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
										curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
										curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
										$result = curl_exec($ch );
										curl_close( $ch );

									}*/
			}
		}

		if($resultado_id){
			echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

		}else{
			echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

	}
}

?>
<!DOCTYPE html>
<html lang="en">



<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<title>Registrar Bilhete </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imagens/logo.png" />

	<link rel="stylesheet" type="text/css" href="dist_provisorio/css1/main.css">


</head>

<body>


	<div class="container-contact100" style="background-image: url('imagens/fundo_ocorrencias.jpg');">
		<div class="wrap-contact100">
			<form method="post" action="" class="contact100-form validate-form" enctype="multipart/form-data" name="bilhete">


				<span class="contact100-form-title">
               Registrar Bilhete
				</span>

				<div class="wrap-input100 validate-input" data-validate="Digite o titulo">
                <span class="label-input100" style="font-size:18px"><b>Título</b></span>
					<input class="input100" type='text' name="titulo" placeholder="Digite o titulo">
				</div>

				<div class="wrap-input100 validate-input" data-validate="Digite o Bilhete">
                <span class="label-input100" style="font-size:20px"><b>Bilhete</b></span>
					<textarea class="input100" name="texto" placeholder="Digite o Bilhete"></textarea>
				</div>

				<input type="file" value="Selecionar imagem(opicional)" id="fileButton" />
				<progress value="0" max="100" id="uploader">0%</progress><br><br>
				<input type="hidden" id="arquivo" name="arquivo">


				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Selecione a turma">
					<span class="label-input100" style="font-size:20px"><b>Turmas</b></span><br>
					<div class="form-group" id="expiration-date">




						<?php
						$n = 0;
						while ($rows = mysqli_fetch_assoc($query)) {
							if($n == 4){
								echo '<br>';
								echo '<br>';
								$n = 0;
							}
							?>






					<input type='checkbox' name="ativo[]" value="<?php echo $rows['Turma']?>" ><strong style='padding:5px'><?php echo $rows['Turma']?></strong>





						<?php $n++; }?>




					</div>
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
							<span class="label-input100" style="font-size:18px"><b>Enviar para:</b></span>
							<BR>
							<button class="btn blue" type="submit">Turmas Selecionadas</button>
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



						.btna {
							border-radius: 5px;
							padding: 15px 25px;
							font-size: 22px;
							text-decoration: none;
							margin: 20px;
							color: #fff;
							position: relative;
							display: inline-block;
						}

						.btna:active {
							transform: translate(0px, 5px);
							-webkit-transform: translate(0px, 5px);
							box-shadow: 0px 1px 0px 0px;
						}

						.red {
							background-color: #f45341;
							box-shadow: 0px 5px 0px 0px #e88378;
						}

						.red:hover {
							background-color:#f47142;
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


					<BR>
							<a class="btn red" href="alunos_professor.php">Voltar</a>
						</div>
					</div>


				</div>


			</form>
			<!--<form method="post" action="validar_bilhete.php">
					<input type='hidden' name="todas" value='sim'>
					<button class="btn blue" type="submit">Todas Turmas</button>

					</form>-->
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
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-storage.js"></script>
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
	 var uploader = document.getElementById('uploader');
	 var fileButton = document.getElementById('fileButton');
	 var btn = document.getElementById('LINK');
	 var dNow = new Date();
 var localdate = dNow.getDate() + '_' + (dNow.getMonth()+1) + '_' + dNow.getFullYear() + '_' + dNow.getHours() + '_' + dNow.getMinutes()+ "_"+dNow.getSeconds();


	 var nome_arquivo = localdate;


	 fileButton.addEventListener('change', function(e){


			 var file = e.target.files[0];
			 var nome = file.name;
			  nome_arquivo = localdate+"."+nome.split('.').pop();




			 var storageRef = firebase.storage().ref('avisos/'+nome_arquivo);
			 console.log(nome_arquivo);

			 var task = storageRef.put(file);


			 	$("#arquivo").val(nome_arquivo);


	 });

	 btn.addEventListener('click',function(){
		 var imgRef = firebase.storage().ref('avisos/'+nome_arquivo);
		imgRef.getDownloadURL().then(function(url){
			console.log("LINK DOWNLOAD");
			console.log(url);
		})
	 })







	</script>


</body>

</html>
