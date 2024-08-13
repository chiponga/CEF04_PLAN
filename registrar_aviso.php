<?PHP

session_start();
require_once("db.class.php");
date_default_timezone_set('America/Sao_Paulo');
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}

if(isset($_POST['titulo'])){
	
$titulo = $_POST['titulo'];
$data = date ("Y-m-d");
$texto = $_POST['texto'];



$nome_arquivo = $_POST['arquivo'];


					$obj = new db();
					$link = $obj->conecta_mysql();
					$escola = $obj->nome;
					echo $escola;

									$sql = "INSERT INTO `avisos`(`Imagem`,`Assunto`, `Data`, `Mensagem`, `Turma`, `Escola`) VALUES ('$nome_arquivo','$titulo','$data','$texto','0','$escola')";
									$resultado_aviso = mysqli_query($link, $sql);

									

							if($resultado_aviso){
								/*$sql=("SELECT * FROM `token` WHERE Escola = '$escola'");
								$query = mysqli_query($link,$sql);

									while ($rows = mysqli_fetch_assoc($query)) {
									define( 'API_ACCESS_KEY', 'AAAAHwEWeZ0:APA91bEddRhGT8AwUuEI3LHzlcyLbJGm2-AeyQh6O1baXUfThJGurQeCQ7n9pXo0nvsuHCBcymJiStaUwu_xyX8vIjWYRpeLCtgBhpfTTnZ2BIKtPVYCeh1LFGg9owtOuAY9sJ3Ay5CS' );

										$singleID = $rows['Token'];

										$fcmMsg = array(
										'body' => 'Novo aviso registrado ('.$escola.')',
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
									
											
								echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";

							}else{
								echo "<script>alert('Erro ao Salvar!');document.location='alunos_professor.php';</script>";

							}
							}
						?>
						<!DOCTYPE html>
						<html lang="en">

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

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<title>Registrar Aviso </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imagens/logo.png" />

	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="dist_provisorio/css1/main.css">


	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<style>
		body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
	</style>
	
	<script >
	
	function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

	</script>
	

</head>

<body>


	<div class="container-contact100" style="background-image: url('imagens/fundo_ocorrencias.jpg');">
		<div class="wrap-contact100">
			<form method="post" action="" class="contact100-form validate-form" enctype="multipart/form-data">


				<span class="contact100-form-title">
               Registrar Aviso
				</span>

				<div class="wrap-input100 validate-input" data-validate="Digite o titulo">
                <span class="label-input100" style="font-size:18px"><b>Título</b></span>
					<input class="input100" type='text' name="titulo" placeholder="Digite o titulo">
				</div>

				<div class="wrap-input100 validate-input" data-validate="Digite o Aviso">
                <span class="label-input100" style="font-size:20px"><b>Aviso</b></span>
					<textarea class="input100" name="texto" placeholder="Digite o Aviso"></textarea>
				</div>




				<div class="container-contact100-form-btn">

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<style>
								.contact100-form-bgbtn{
									background: #fff;
								}

							</style>


							
							
							<div class="file-upload">
							<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">ADICIONAR IMAGEM</button>

							<div class="image-upload-wrap">
								<input class="file-upload-input" type='file' id="fileButton" onchange="readURL(this);" accept="image/*" />
								<input type="hidden" id="arquivo" name="arquivo">
								<div class="drag-text">
								<h3>ARRASTE OU SELECIONE UMA IMAGEM</h3>
								</div>
							</div>
							<div class="file-upload-content">
								<img class="file-upload-image" src="#" alt="your image" />
								<div class="image-title-wrap">
								<button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">imagem selecionada</span></button>
								</div>
							</div>
							</div>
							
							<BR>
							<BR>
							<BR>
							<span style="padding: 25px; font-size: 25px" class="label-input100"><b>Enviar para:</b></span>

							<BR>
							<button style="padding: 25px; font-size: 25px" class="btn blue" type="submit">Todas Turmas</button>

							<br>
							


					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<style>
								.contact100-form-bgbtn{
									background: #fff;
								}

							</style>
							<BR>
							<BR>
			<a style="padding: 25px; font-size: 25px" class="btn red" href="alunos_professor.php">Voltar</a>

					
							
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
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');

	</script>

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
