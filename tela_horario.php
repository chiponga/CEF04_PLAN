<?php
	session_start();
	$nome_professor = $_SESSION['nome_professor'];
	require_once("db.class.php");
	

	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

	$result_cursos = "SELECT * FROM cadastro Where Escola = '$escola'";
	$resultado_cursos = mysqli_query($link, $result_cursos);
?>
<!DOCTYPE html>

<html lang="en">

<head>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-82GQZNGZ9B');
</script>
	<meta charset="utf-8">
	<title>Horário</title>
	<meta name="author" content="Adtile">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">


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
		
		@charset "UTF-8";
/* OPTIONS */
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

	<header>
		<a href="#home" style="margin-left: 20px" data-scroll><img src="imagens/logo.png" width="70px" height="70px"></a>
		<nav class="nav-collapse">
			<ul>
				<li class="menu-item  "><a style="margin-top: 10px" href="alunos_professor.php" data-scroll>Alunos</a></li>
				<li class="menu-item"><a style="margin-top: 10px" href="turma_notas.php" data-scroll>Notas</a></li>
				<li class="menu-item" style="margin-top: 10px"><a href="conselho_professor.php" data-scroll>Coneselho</a></li>
				<li class="menu-item" style="margin-right: 250px;margin-top: 10px"><a href="acesso_turmas.php" data-scroll>Acesso</a></li>
				<li style="color:#fff;text-align: center;margin-top: 15px;margin-right: 15px;vertical-align: middle">Olá,
					<?php echo $nome_professor?> <img style="vertical-align: middle" src="imagens/user._prof.png" width="24px"></li>



			</ul>
		</nav>
	</header>



	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="panel panel-primary filterable">
				<div class="panel-heading">
					<h3 class="panel-title">Entrada</h3>

				</div>
				<div class="container">

					<div class="creditCardForm">
						<div class="heading">

						</div>
						<div class="payment">
							<form method="post" action="professor_conselho.php">

								<div class="form-group" id="expiration-date">
									<label>Seleciona a Turma</label>

									<select class="select" name="turma">
										<option value="6º Ano A">6º Ano A</option>
										<option value="6º Ano B">6º Ano B</option>
										<option value="6º Ano C">6º Ano C</option>
										<option value="6º Ano D">6º Ano D</option>
										<option value="6º Ano E">6º Ano E</option>
										<option value="6º Ano F">6º Ano F</option>
										<option value="6º Ano G">6º Ano G</option>
										<option value="6º Ano H">6º Ano H</option>
										<option value="6º Ano I">6º Ano I</option>
										<option value="6º Ano J">6º Ano J</option>
										<option value="7º Ano A">7º Ano A</option>
										<option value="7º Ano B">7º Ano B</option>
										<option value="7º Ano C">7º Ano C</option>
										<option value="7º Ano D">7º Ano D</option>
										<option value="7º Ano E">7º Ano E</option>
										<option value="7º Ano F">7º Ano F</option>
										<option value="7º Ano G">7º Ano G</option>
										<option value="7º Ano H">7º Ano H</option>
										<option value="7º Ano I">7º Ano I</option>
										<option value="8º Ano A">8º Ano A</option>
										<option value="8º Ano B">8º Ano B</option>
										<option value="8º Ano C">8º Ano C</option>
										<option value="8º Ano D">8º Ano D</option>
										<option value="8º Ano E">8º Ano E</option>
										<option value="8º Ano F">8º Ano F</option>
										<option value="8º Ano G">8º Ano G</option>
										<option value="8º Ano H">8º Ano H</option>
										<option value="8º Ano I">8º Ano I</option>
										<option value="8º Ano J">8º Ano J</option>
										<option value="9º Ano A">9º Ano A</option>
										<option value="9º Ano B">9º Ano B</option>
										<option value="9º Ano C">9º Ano C</option>
										<option value="9º Ano D">9º Ano D</option>
										<option value="9º Ano E">9º Ano E</option>
										<option value="9º Ano F">9º Ano F</option>

									</select>


								</div>
								<div class="form-group" id="credit_cards">

								</div>
								<div class="form-group" id="pay-now">
									<button type="submit" class="btn btn-default">Confirmar</button>
								</div>


							</form>


						</div>
					</div>



				</div>

			</div>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



	<script src="js/index.js"></script>


	<script src="js/fastclick.js"></script>
	<script src="js/scroll.js"></script>
	<script src="js/fixed-responsive-nav.js"></script>
</body>

</html>
