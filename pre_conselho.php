<?php
	session_start();

	require_once("db.class.php");
	if(!isset ($_SESSION['logado_p'])){
	//	header('Location: login_professor.php');
	}
	$turma = $_POST['turma'];
	$materia = $_SESSION['materia'];


	$objDb = new db();
	$escola = $objDb->nome;
	$link = $objDb->conecta_mysql();

	$result_cursos = "SELECT * FROM cadastro WHERE Escola = '$escola' and Turma = '$turma' ORDER BY Aluno";
	$resultado_cursos = mysqli_query($link, $result_cursos);



?>
<!DOCTYPE html>

<html lang="PT-BR">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<meta charset="utf-8">
	<title>Pré Conselho</title>
	<meta name="author" content="Adtile">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<!--<script src="js/responsive-nav.js"></script>
	<script src="segurança.js"></script>-->
	<script>

		function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla>43 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
 </script>
 <style>
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
	
	 <!-- loader  
	 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	-->
	<div class="container-fliud" style="margin: 80px">
		<h1>Turma:
			<?php echo $turma?>
		</h1>
		<h1>Materia:
			<?php echo $materia?>
		</h1>
	

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
					<a href="selecionar_pre_conselho.php" class="btn blue">Voltar</a>

		<form method="post" action="validar_pre.php">
			<div class="row">
				<!--<div class="panel panel-primary filterable">-->

				<table class="table" style="border:5px solid #3C93D5;color:#000">

					<tbody>


						<?php  $i = 0; while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){
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
						<img src="http://135.148.160.173/5s6d4f56sdf1s56a1f3s2f1s32af1s32df1s32df1ds561f/<?php echo $rows_cursos['Codigo']; ?>.JPG" style="margin: 40px;margin-left:85px;margin-top:10px;text-aling:center" height="120px" width="100px"   onerror="this.onerror=null; this.src='/imagens/semFoto.png'">>
						</td>

						<td style='vertical-align: middle;'>
            <?php 
                $result_config = "SELECT * FROM config WHERE Escola = '$escola'";
                $resultado_config = mysqli_query($link, $result_config);
                 $aluno = $rows_cursos['Aluno'];
                $aluno = str_replace(' ', '_', $aluno); ?>
								
							</td>

							<td style='vertical-align: middle;'>
              

              
                <?php while($rows_cofig = mysqli_fetch_assoc($resultado_config)){?>

				<?php
				$usuario_professor = $_SESSION['usuario_professor'];
				$codigo = $rows_cursos['Codigo'];
				$texto = $rows_cofig['Texto'];
				$result_check = "SELECT * FROM Marcacoes WHERE Codigo = $codigo and Marcacao = '$texto' and Professor='$usuario_professor'";
				
				$resultado_check = mysqli_query($link, $result_check);
				$dados_check = mysqli_fetch_assoc($resultado_check);
				if(isset($dados_check['Marcacao'])){
					$existe = "SIM";
				}
				else{
					$existe = "NAO";
				}
				//echo "$result_check  $existe";
				?>
				<input type="checkbox" class="custom-control-input" name="<?php echo $aluno; ?>[]"  <?php if($existe == "SIM"){echo "checked";}else{echo "";}?> value="<?php  echo $rows_cofig['Texto']?>" >
                <label class="custom-control-label" ><?php  echo $rows_cofig['Texto']?></label><br>

				<?php }?>

						

							<?php
									/*$cod = $rows_cursos['Codigo'];
									$result_mencao = "SELECT * FROM conselho WHERE Codigo = '$cod'";
									$resultado_mencao = mysqli_query($link, $result_mencao);

									$dados_mencao = mysqli_fetch_assoc($resultado_mencao);*/

											?>
							<input name="turma" type="hidden" value="<?php echo $rows_cursos['Turma']; ?>">
              				<input name="materia" type="hidden" value="<?php echo $materia; ?>">

						</tr>
						<?php $i++;} ?>


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
					<input type="submit" class="btn blue" value="Salvar">
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
					<a href="selecionar_pre_conselho.php" class="btn blue">Sair</a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</form>

 
	</div>




	
	 <script src="js/index.js"></script>
	
	<script>
		/*$(window).on('load',function(){
		  $("#ftco-loader").fadeOut(1000);
		  $("#ftco-loader").removeClass("show");
		  $(".container-fliud").fadeIn(1000);
		});*/
	</script>
	<script src="js/fastclick.js"></script>
	<script src="js/scroll.js"></script>
	
	<script src="js/fixed-responsive-nav.js"></script>
</body>

</html>
