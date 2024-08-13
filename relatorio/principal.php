<?php
	if (!isset($_SESSION)){
		session_start();


   }
	 $_SERVER['HTTPS'] = false;

	 if(isset($_POST['codigo_aluno'])){

		 $codigo = $_POST['codigo_aluno'];
		  echo $codigo;
	 }
	require_once("../db.class.php");
	/*if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
	}*/
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$turma = $_POST['turma'];
	$escola = $objDb->nome;
	$result_cursos = "SELECT * FROM cadastro WHERE Turma = '$turma' and Escola = '$escola' ORDER BY Aluno";
	$resultado_cursos = mysqli_query($link, $result_cursos);




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<title>Conselho</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

	<link rel="icon" type="image/png" href="../imagens/logo.png" />
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="../config.js"></script>

</head>

<body>

	<div class="container theme-showcase" role="main">

		<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			
      	<img id="img_modal" src="https://cef4.com.br/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $rows_cursos['Codigo']; ?>.JPG" height="80%"  width="90%"  onerror="this.onerror=null; this.src='/imagens/semFoto.png'">
				<h5 style="text-align: center; vertical-align: middle;margin-top: 20px"><span id="nomeModal">Nome</span></h5>
				<h5 style="text-align: center; vertical-align: middle;margin-top: 20px"><span id="codigoModal">Código</span></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>


		<div class="row">
		<a href="selecionar_turma.php" class="botao red">Outra turma</a>


					<form action="" method="post">
						<?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>

								
									<img  onclick="pegarId(<?php echo $rows_cursos['Codigo']; ?>)"  class="img" data-toggle="modal" data-target="#exampleModal" id="<?php echo $rows_cursos['Aluno']; ?>" src="https://cef4.com.br/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $rows_cursos['Codigo']; ?>.JPG"height="140px" style="margin: 20px" width="120px" onerror="this.onerror=null; this.src='/imagens/semFoto.png'">
							

						<?php } ?>

					</form>
					
			</div>
		</div>

		<div class="row">

			<div class="col-md-4"></div>

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
					<a href="selecionar_turma.php" class="botao red">Outra turma</a>
				</div>
				<br>

			</div>

			<div class="col-md-4"></div>


		</div>

	</div>





<script>

var codigo;
function pegarId(codigo){
/*	var foto = document.getElementById(id);*/


$('#img_modal').attr('src','https://cef4.com.br/0xasljkdfhsjkfhssdfsfsfasfewrqwr/'+codigo+'.JPG')


	this.codigo = codigo;

}
//nomeModal
$('.img').click(function(){
       var id = $(this).attr('id');
       var valor = $(this).val();

			 $('#nomeModal').text(id);
			 $('#codigoModal').text(codigo);
});

</script>

</body>

</html>