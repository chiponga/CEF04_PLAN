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
<script>

</script>
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



        <div class="wrap-input100 validate-input" data-validate="Digite o Registro">

					<span class="label-input100">Data</span>
					
					<input id="date" class="input100" name="date"type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Digite a ocorrência"></input>

          <br>
				<span class="label-input100">Registro</span>
		  <br>
          <select class="select" name="ocorrencia" style="padding: 8px">

			  <option value="Aluno dormindo na hora da aula.">Aluno dormindo na hora da aula.</option>

			  <option value="Ausentando-se da sala em horário de aula.">Ausentando-se da sala em horário de aula</option>

              <option value="Chegando atrasado após o horário de educação física.">Chegando atrasado após o horário de educação física.</option>

              <option value="Chegando atrasado após o intervalo.">Chegando atrasado após o intervalo.</option>

              <option value="Chegando atrasado no primeiro horário.">Chegando atrasado no primeiro horário.</option>

              <option value="Compareceu à escola sob efeito de substâncias lícitas ou ilícitas.">Compareceu à escola sob efeito de substâncias lícitas ou ilícitas.</option>

              <option value="Consumindo alimentos, balas, doces durante a aula.">Consumindo alimentos, balas, doces durante a aula.</option>

              <option value="Consumindo ou portando bebidas alcoólicas no ambiente escolar.">Consumindo ou portando bebidas alcoólicas no ambiente escolar.</option>

              <option value="Danificou ou alterou documentos ou equipamentos escolares.">Danificou ou alterou documentos ou equipamentos escolares.</option>

              <option value="Deixou de entregar atividade avaliativa.">Deixou de entregar atividade avaliativa.</option>

              <option value="Desrespeitando, desacatando ou afrontando profissionais da escola.">Desrespeitando, desacatando ou afrontando profissionais da escola.</option>

              <option value="Esqueceu, livro, caderno ou outro material de uso em sala.">Esqueceu, livro, caderno ou outro material de uso em sala.</option>

              <option value="Falta de cuidado ou manutenção com o livro didático.">Falta de cuidado ou manutenção com o livro didático.</option>

              <option value="Faltou no dia da realização de atividade avaliativa.">Faltou no dia da realização de atividade avaliativa.</option>

              <option value="Fazendo uso de objetos ou equipamentos sem autorização.">Fazendo uso de objetos ou equipamentos sem autorização.</option>

              <option value="Fez uso de celular e ou fone de ouvido, sem a devida autorização.">Fez uso de celular e ou fone de ouvido, sem a devida autorização.</option>

			  <option value="Fora do mapeamento.">Fora do mapeamento.</option>

              <option value="Frequentando aula que não está matriculado naquele horário.">Frequentando aula que não está matriculado naquele horário.</option>

              <option value="Frequentando o ambiente escolar sem uniforme.">Frequentando o ambiente escolar sem uniforme.</option>

              <option value="Jogando lixo em local não apropriado.">Jogando lixo em local não apropriado.</option>

              <option value="Manifestando conduta agressiva ou incentivando tal conduta.">Manifestando conduta agressiva ou incentivando tal conduta.</option>

              <option value="Não concluiu atividade avaliativa.">Não concluiu atividade avaliativa.</option>

              <option value="Não está realizando a atividade proposta pelo(a) professor(a).">Não está realizando a atividade proposta pelo(a) professor(a).</option>

              <option value="Pegou, repassou ou portou material alheio.">Pegou, repassou ou portou material alheio.</option>

              <option value="Perturbando a aula com conversa ou outro barulho.">Perturbando a aula com conversa ou outro barulho.</option>

              <option value="Pinchando ou rabiscando paredes ou material escolar">Pinchando ou rabiscando paredes ou material escolar</option>

              <option value="Portando ou exibindo material de apologia ou de censura restrita.">Portando ou exibindo material de apologia ou de censura restrita.</option>

              <option value="Realizando atividade diferente da que foi proposta pelo professor.">Realizando atividade diferente da que foi proposta pelo professor.</option>

              <option value="Saindo da escola sem previa autorização ou liberação.">Saindo da escola sem previa autorização ou liberação.</option>

              <option value="Saindo das aulas sem previa autorização.">Saindo das aulas sem previa autorização.</option>

              <option value="Teve acesso ou permaneceu em locais restritos para estudantes.">Teve acesso ou permaneceu em locais restritos para estudantes.</option>

              <option value="Utilizando roupas inadequadas para o ambiente escolar.">Utilizando roupas inadequadas para o ambiente escolar.</option>

              <option value="Usando ou portando cigarro (mesmo que eletrônico).">Usando ou portando cigarro (mesmo que eletrônico).</option>
			  
			  

		  </select>

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

