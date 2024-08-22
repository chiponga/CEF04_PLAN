<?php
session_start();
	require_once("db.class.php");
 /* if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
}*/
$objDb = new db();
$link = $objDb->conecta_mysql();
$senha = $objDb->senha;
$user = $objDb->usuario;
$database = $objDb->database;
$escola = $objDb->nome;
$nome = $_SESSION['nome'];
$turma = $_SESSION['turma'];
$codigo = $_SESSION['codigo'];

$pdo = new \PDO( "mysql:host=135.148.160.173;dbname=$database;charset=utf8" , "$user" , "$senha" );
$stmt = $pdo-> prepare( "select * from notas WHERE Codigo = '$codigo'" );

?>

<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">

        <title>Nota Aluno</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

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
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

    </head>
	<caption>
				<?php 
					
					

					$sql_entrada = "SELECT * FROM `notas` WHERE Codigo = '$codigo'";
					$resultado_entrada = mysqli_query($link,$sql_entrada);
					$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

					$sql_liberar = "SELECT * FROM `liberar` Where Escola ='$escola'";
					$resultado_liberar  = mysqli_query($link,$sql_liberar );
					$dados_liberar  = mysqli_fetch_assoc($resultado_liberar );
					

					$sql_faltas = "SELECT * FROM `faltas` Where Codigo = '$codigo'";
					$resultado_faltas = mysqli_query($link,$sql_faltas);
					$dados_faltas = mysqli_fetch_assoc($resultado_faltas);
				
					$bim1 = $dados_liberar['bim1'];
					$bim2 = $dados_liberar['bim2'];
					$bim3 = $dados_liberar['bim3'];
					$bim4 = $dados_liberar['bim4'];

					if($bim1 == "NAO" && $bim2 == "NAO" && $bim3 == "NAO" && $bim4 == "NAO"){
						$nadaLiberado = "SIM";
					}else{
						$nadaLiberado = "NAO";
					}
					$faltas = $dados_liberar['Faltas'];
					$ranking = $dados_liberar['Ranking'];
					if(isset($dados_liberar['Ranking']) And $dados_liberar['Ranking'] == "SIM"){
						$ranking_aluno = "Média Geral: ".$dados_entrada['RANKING'];
					}else{
						$ranking_aluno = "";
					}


											
				?>
			</caption>
    <!-- END: Head -->
    <body class="app">
       
            <!-- BEGIN: Content -->
            <div style="background: #fff;"class="content">
            <div style=" display: flex;justify-content: center;margin-top: 50px">
              <!-- BEGIN: Profile Info -->
			  <div style="background: #fff;width: 80%;padding: 20px"class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                <img class="rounded-md intro-y" src="https://admbv.com.br/Fotos/<?php echo $codigo;?>.JPG" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
                            </div>
                            <div class="ml-5">
                                <div style="font-size: 17px;font-weight: 700;" class="w-24 sm:w-40 truncate sm:whitespace-normal font-large text-lg"><?php echo $nome;?></div>
                                <div class="text-gray-600"><?php echo $turma;?></div>
                            </div>
                           
                        </div>
												<div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div style="font-size: 17px;font-weight: 700;" class="truncate ls:whitespace-normal flex items-center"> <?php echo $ranking_aluno;?> </div>
														
                        </div>
						
                    </div>
                    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">  </div>
                </div>
                
                </div>
                <!-- END: Profile Info -->
                <div style=" display: flex;justify-content: center;margin-top: 50px">
				<?php if($nadaLiberado == 'SIM'){?> 
				<div style="display: flex;width:100%;justify-content: center;">
				<div style="Color:white;height: 200px;display: flex;font-weight: bold;border-radius: 20px;width: 80%;font-size: 30px;background-color:#ff2626;align-content: flex-end;justify-content: center;align-items: center;">As notas ainda não foram liberadas</div>
				<div>
				<?php }?>
                        
                <table style="width: 80%; font-size: 18px"  class="responsive-table">
			

			
			<thead>
				<tr>


					<th scope="col">Disciplina</th>
					<?php if(true){echo "<th scope='col'>1° Bimestre</th>";}?>
					<?php if(true){echo "<th scope='col'>2° Bimestre</th>";}?>
					<?php if(true){echo "<th scope='col'>3° Bimestre</th>";}?>
					<?php if(true){echo "<th scope='col'>4° Bimestre</th>";}?>

						
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

									if(isset($dados_liberar['Faltas']) And $dados_liberar['Faltas'] == "SIM"){
													
									}else{
										$dados_faltas[$field] = "";
									}
									$ultima = substr($field, -1);
									$under = substr($field, -2, 1);
									$cinco = substr($field, 0, 5);
									$nome_materia = substr($field,0,-2);
									if($value != "" &&  $ultima == 1  && $under == "_" && $bim1 == 'SIM'){
										if((int)$value >= 5){

											

											echo "
											<tr>
												<th scope='row'>$nome_materia</th>
												<td style='font-size:20px;'data-title='Bimestre 1'>
												$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
												</td>
											";
										}else{
										echo "
										<tr>
											<th scope='row'>$nome_materia</th>
											<td style='font-size:20px;color: red'data-title='Bimestre 1'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}
										
									}
									
									

									if($value != "" && $ultima == 2 && $under == "_" && $bim2 == 'SIM'){
										
										if((int)$value >= 5){
											echo "

											<td style='font-size:20px' data-title='Bimestre 2'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}else{
											echo "

											<td style='font-size:20px;color: red' data-title='Bimestre 2'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}
										
									}

									if($value != "" && $ultima == 3 &&  $under == "_"&& $bim3 == 'SIM'){
									

										if((int)$value >= 5){
											echo "

											<td style='font-size:20px' data-title='Bimestre 3'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}else{
											echo "

											<td style='font-size:20px;color: red' data-title='Bimestre 3'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span> 
											</td>
										";
										}
									}

									if($value != "" && $ultima == 4 &&  $under == "_"&& $bim4 == 'SIM'){
										
										if((int)$value >= 5){
											echo "

											<td style='font-size:20px' data-title='Bimestre 4'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}else{
											echo "

											<td style='font-size:20px;color: red' data-title='Bimestre 4'>
											$value <span style='font-size: 15px; padding: 5px;color:orange'>".$dados_faltas[$field]."</span>
											</td>
										";
										}
									}

									/*if($value != "" && $nadaLiberado =="NAO" && $cinco == "MEDIA"){
										echo"média° $field : $value<br>";
										echo "
											<td style='font-size:20px' data-title='Media'>
												$value
											</td>
											<tr>
										";
									}*/

							}
						}
				}
				?>

			</tbody>
		</table>
        </div>
            
            
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
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
		<a href="aluno.php" class="btn blue">Voltar</a>
        <script src="dist_provisorio/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>