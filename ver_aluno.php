<?php	

	
	require_once("db.class.php");
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$escola = $objDb->nome;
	$html = '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
	
	$html= "
	
	<style>
	html { margin: 0px;font-family: 'Open Sans', sans-serif} 
	label{
		font-family: 'Open Sans', sans-serif;
		
	}


	</style>";	

	$result_livros ="SELECT * FROM `biblioteca` WHERE DEVOLVIDO = 'NAO' And Escola = '$escola'";
	$resultado_livros = mysqli_query($link, $result_livros);
	while($rows_livros = mysqli_fetch_assoc($resultado_livros)){
		


	}


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	
	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	
	// Carrega seu HTML
	$dompdf->load_html('
	<img style="margin-left:100px;float:left" width="100px" src="imagens/logo.png" alt="">
	<label style="font-size:20px;margin-top:15px">Alunos(a) Faltantes</label>
	<br>
	<label style="font-size:15px;margin-top:15px">Pompilio</label>

			'.$html.'
			<HTML lang="pt-BR">

			<head>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<meta charset="utf-8">
			</head>
		 
			
		<body>
			<div class="container" style="margin-top:60px;margin-left:20px;margin-right:20px;">
		 
			
		   
			
					  <div class="col-md-8" style="border: 1px solid #b7b1ae;height: 50px;padding-top: 12px;">
						<span style="margin-top: 10px;font-size: 16px"> Nome: DOUGLAS SOEIRO LOBATO SANTOS PEREIRA DA SILVA JUNIOR </span>
					  </div>
				   
					  <div class="col-md-2" style="border: 1px solid #b7b1ae;height: 50px;padding-top: 12px;">
							<span style="margin-top: 10px;font-size: 16px">Turma: 9°Ano B</span>
					  </div>
					  <div class="col-md-2" style="border: 1px solid #b7b1ae;height: 50px;padding-top: 12px;">
							<span style="margin-top: 10px;font-size: 16px">Codigo: 448065</span>
					  </div>
		
					  <div class="col-md-12" style="border: 1px solid #b7b1ae;padding: 16px;">
							<span style="font-size: 17px"><b>Observações: </b></span> <span style="margin-top: 10px;font-size: 16px"> Lorem ipsum 
								dolor sit amet, consectetur adipiscing elit. 
								Vestibulum viverra pharetra fermentum. Mauris n
								ec blandit dolor. Aliquam dignissim et dolor vitae
								 porta. Aliquam erat volutpat. Curabitur mollis sem
								  turpis. Curabitur dapibus sit amet sem ac sodales. 
								  Aenean ex urna, maximus eu velit sit amet, varius 
								  hendrerit turpis. Nullam feugiat neque eu hendrerit 
								  tristique. In fermentum egestas semper. Aliquam feugiat 
								  quam dui, quis pulvinar magna dictum tincidunt
									Aenean eleifend tortor vel
									 turpis sodales, at lacinia tellus congue.
									  Ut a nunc eu erat viverra lacinia. Proin
									   velit odio, lobortis eget lectus a, 
									   fringilla tristique massa. Praesent
										ultricies tellus id risus facilisis
										 viverra. Integer tempus bibendum tellus,
										  ut rhoncus erat tincidunt ut. Vivamus 
										  eleifend urna nec aliquam sagittis. Nullam pulvinar 
										  et purus ac sodales. Quisque in pulvinar massa. In hac h
										  abitass
										  e platea dictumst. Nullam blandit ac sem eu tempus.</span>
					  </div>
					</div>
		</body>
		
		</HTML>
		');
		$dompdf->setPaper('A4', 'landscape');
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"livros_nao_devolvidos.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>