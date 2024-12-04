<?php
session_start();
	require_once("db.class.php");
 /* if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}*/
$objDb = new db();
$senha = $objDb->senha;
$user = $objDb->usuario;
$database = $objDb->database;
$nome = $_SESSION['nome'];
$turma = $_SESSION['turma'];
$codigo = $_SESSION['usuario'];

$pdo = new \PDO( "mysql:host=mysql.moodlecef04.com.br;dbname=$database;charset=utf8" , "$user" , "$senha" );
$stmt = $pdo-> prepare( "select * from notas WHERE Codigo = '$codigo'" );

?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

	<meta charset="UTF-8">

	
	<link rel="stylesheet" href="dist_provisorio/css/app.css" />
	<meta name="viewport" content="width=device-width">

	<style>
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');

        .font-nome{
            font-family: 'Fjalla One', sans-serif;
        }
        .background{
            background-image: url("fundo_btn.png");
            background-size: 200px 200px;
            width: 200px;
            height: 200px;
            
            margin-top: 20px;

           
           
        
        
      
        }
        
        .div {

        display: flex;
        justify-content: center;
        }

        .texto{
           
            
             color: white;

   
        }

     
        </style>
        <style>
		/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		*:before,
		*:after {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		body {
			font-family: "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
			color: #5e5d52;
		}

		a {
			color: #337aa8;
		}

		a:hover,
		a:focus {
			color: #4b8ab2;
		}

		.container {
			margin: 5% 3%;
		}

		@media (min-width: 48em) {
			.container {
				margin: 2%;
			}
		}

		@media (min-width: 75em) {
			.container {
				margin: 2em auto;
				max-width: 75em;
			}
		}

		.responsive-table {
			width: 100%;
			margin-bottom: 1.5em;
			border-spacing: 0;
		}

		@media (min-width: 48em) {
			.responsive-table {
				font-size: .9em;
			}
		}

		@media (min-width: 62em) {
			.responsive-table {
				font-size: 1em;
			}
		}

		.responsive-table thead {
			position: absolute;
			clip: rect(1px 1px 1px 1px);

			padding: 0;
			border: 0;
			height: 1px;
			width: 1px;
			overflow: hidden;
		}

		@media (min-width: 48em) {
			.responsive-table thead {
				position: relative;
				clip: auto;
				height: auto;
				width: auto;
				overflow: auto;
			}
		}

		.responsive-table thead th {
			background-color: #1D63DC;
			border: 1px solid #1D63DC;
			font-weight: normal;
			text-align: center;
			color: white;
		}

		.responsive-table thead th:first-of-type {
			text-align: left;
		}

		.responsive-table tbody,
		.responsive-table tr,
		.responsive-table th,
		.responsive-table td {
			display: block;
			padding: 0;
			text-align: left;
			white-space: normal;
		}

		@media (min-width: 48em) {
			.responsive-table tr {
				display: table-row;
			}
		}

		.responsive-table th,
		.responsive-table td {
			padding: .5em;
			vertical-align: middle;
		}

		@media (min-width: 30em) {

			.responsive-table th,
			.responsive-table td {
				padding: .75em .5em;
			}
		}

		@media (min-width: 48em) {

			.responsive-table th,
			.responsive-table td {
				display: table-cell;
				padding: .5em;
			}
		}

		@media (min-width: 62em) {

			.responsive-table th,
			.responsive-table td {
				padding: .75em .5em;
			}
		}

		@media (min-width: 75em) {

			.responsive-table th,
			.responsive-table td {
				padding: .75em;
			}
		}

		.responsive-table caption {
			margin-bottom: 1em;
			font-size: 1em;
			font-weight: bold;
			text-align: center;
		}

		@media (min-width: 48em) {
			.responsive-table caption {
				font-size: 1.5em;
			}
		}

		.responsive-table tfoot {
			font-size: .8em;
			font-style: italic;
		}

		@media (min-width: 62em) {
			.responsive-table tfoot {
				font-size: .9em;
			}
		}

		@media (min-width: 48em) {
			.responsive-table tbody {
				display: table-row-group;
			}
		}

		.responsive-table tbody tr {
			margin-bottom: 1em;
		}

		@media (min-width: 48em) {
			.responsive-table tbody tr {
				display: table-row;
				border-width: 1px;
			}
		}

		.responsive-table tbody tr:last-of-type {
			margin-bottom: 0;
		}

		@media (min-width: 48em) {
			.responsive-table tbody tr:nth-of-type(even) {
				background-color: rgba(94, 93, 82, 0.1);
			}
		}

		.responsive-table tbody th[scope="row"] {
			background-color: #1D63DC;
			color: white;
		}

		@media (min-width: 30em) {
			.responsive-table tbody th[scope="row"] {
				border-left: 1px solid #1D63DC;
				border-bottom: 1px solid #1D63DC;
			}
		}

		@media (min-width: 48em) {
			.responsive-table tbody th[scope="row"] {
				background-color: transparent;
				color: #5e5d52;
				text-align: left;
			}
		}

		.responsive-table tbody td {
			text-align: right;
		}

		@media (min-width: 48em) {
			.responsive-table tbody td {
				border-left: 1px solid #1D63DC;
				border-bottom: 1px solid #1D63DC;
				text-align: center;
			}
		}

		@media (min-width: 48em) {
			.responsive-table tbody td:last-of-type {
				border-right: 1px solid #1D63DC;
			}
		}

		.responsive-table tbody td[data-type=currency] {
			text-align: right;
		}

		.responsive-table tbody td[data-title]:before {
			content: attr(data-title);
			float: left;
			font-size: .8em;
			color: rgba(94, 93, 82, 0.75);
		}

		@media (min-width: 30em) {
			.responsive-table tbody td[data-title]:before {
				font-size: .9em;
			}
		}

		@media (min-width: 48em) {
			.responsive-table tbody td[data-title]:before {
				content: none;
			}
		}

	</style>

</head>
<caption>
				<?php //echo $nome;
					$sql_entrada = "SELECT * FROM `notas` WHERE Codigo = '$codigo'";
				
					$objDb = new db();
					$link = $objDb->conecta_mysql();
					
					$resultado_entrada = mysqli_query($link,$sql_entrada);
					$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

					$media = $dados_entrada['RANKING'];
					
				
					
				
					$sql = "SELECT * FROM `liberar`";

					$objDb = new db();
					$link = $objDb->conecta_mysql();
					$resultado = mysqli_query($link,$sql);
					$dados = mysqli_fetch_assoc($resultado);

					$bim1 = $dados['bim1'];
					$bim2 = $dados['bim2'];
					$bim3 = $dados['bim3'];
					$bim4 = $dados['bim4'];
					if(isset($dados['RANKING'])){
						$ranking = $dados['RANKING'];
					}else{
						$ranking = "";
					}							
				?>
			</caption>
			<body class="app">
       
            <!-- BEGIN: Content -->
            <div style="background: #fff;"class="content">
            <div style=" display: flex;justify-content: center;margin-top: 50px">
             <!-- BEGIN: Profile Info -->
             <div style="background: #fff;width: 80%;padding: 20px"class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="imagens/fotos/<?php echo $_SESSION['usuario'];?>.JPG" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
                                <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div>
                            </div>
                            <div class="ml-5">
                                <div style="font-size: 17px;font-weight: 700;" class="w-24 sm:w-40 truncate sm:whitespace-normal font-large text-lg"><?php echo $nome;?></div>
                                <div class="text-gray-600"><?php echo $turma;?></div>
                            </div>
                           
                        </div>
                        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div style="font-size: 17px;font-weight: 700;" class="truncate ls:whitespace-normal flex items-center">  <?php echo $ranking;?> </div>
                           
                        </div>
                       
                        
                    </div>
                    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">  </div>
                </div>
                
                </div>
                <!-- END: Profile Info -->
        <div style=" display: flex;justify-content: center;margin-top: 50px">

		<table class="responsive-table" style="font-size: 18px" >
				
			<thead>
				<tr>


					<th scope="col">Disciplina</th>
					<?php if(/*$bim1 == 'SIM'*/true){echo "<th scope='col'>1° Bimestre</th>";}?>
					<?php if(/*$bim2 == 'SIM'*/true){echo "<th scope='col'>2° Bimestre</th>";}?>
					<?php if(/*$bim3 == 'SIM'*/true){echo "<th scope='col'>3° Bimestre</th>";}?>
					<?php if(/*$bim4 == 'SIM'*/true){echo "<th scope='col'>4° Bimestre</th>";}?>
					<th scope="col">Média</th>
						
				</tr>
			</thead>

			<tbody>
				<?php
				if( $stmt-> execute() )
				{
						while( $row = $stmt-> fetch( \PDO::FETCH_ASSOC ) )
						{
								foreach( $row as $field => $value )
								{
										$ultima = substr($field, -1);
										$under = substr($field, -2, 1);
										$cinco = substr($field, 0, 5);
										$nome_materia = substr($field,0,-2);
										if($value != "" && $ultima == 1  && $under == "_"){
											if((int)$value >= 5){
												echo "
												<tr>
													<th scope='row'>$nome_materia</th>
													<td data-title='Bimestre 1'>
														$value
													</td>
												";
											}else{
											echo "
											<tr>
												<th scope='row'>$nome_materia</th>
												<td style='color: red'data-title='Bimestre 1'>
													$value
												</td>
											";
											}
											
										}
										
										

										if($value != "" && $ultima == 2 && $under == "_" ){
											if((int)$value >= 5){
												echo "

												<td data-title='Bimestre 2'>
													$value 
												</td>
											";
											}else{
												echo "

												<td style='color: red' data-title='Bimestre 2'>
													$value 
												</td>
											";
											}
											
										}

										if($value != "" && $ultima == 3 &&  $under == "_"){

											if((int)$value >= 5){
												echo "

												<td data-title='Bimestre 2'>
													$value 
												</td>
											";
											}else{
												echo "

												<td style='color: red' data-title='Bimestre 2'>
													$value 
												</td>
											";
											}
										}

										if($value != "" && $ultima == 4 &&  $under == "_"){
											if((int)$value >= 5){
												echo "

												<td data-title='Bimestre 2'>
													$value 
												</td>
											";
											}else{
												echo "

												<td style='color: red' data-title='Bimestre 2'>
													$value 
												</td>
											";
											}
										}

										if( $cinco == "MEDIA"){
											echo "
												<td data-title='Media'>
													$value
												</td>
												<tr>
											";
										}

								}
						}
				}
				?>

			</tbody>
		</table>
		<style>
			/* start da css for da buttons */
			.btn {
				border-radius: 5px;
				padding: 15px 25px;
				font-size: 22px;
				text-decoration: none;
				margin: 20px;
				color: #fff;
				position: fixed;
				right: 20px;
				bottom: 10px

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

		</div>
		
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
</body>

</html>
