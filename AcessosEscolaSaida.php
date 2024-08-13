<?php
session_start();
require_once("db.class.php");
$codigo = $_SESSION['usuario'];

$obj = new db();
$link = $obj->conecta_mysql();
$sql=("SELECT * FROM `saida` WHERE Codigo = '$codigo'");
$sql2=("SELECT * FROM `saida` WHERE Codigo = '$codigo'");
$query = mysqli_query($link,$sql);
$query2 = mysqli_query($link,$sql2);
$nome = $_SESSION['nome'];
$turma = $_SESSION['turma'];
$sql_count=("SELECT COUNT(*) FROM `saida` WHERE Codigo = '$codigo'");
$query_count = mysqli_query($link,$sql_count);
if ($rows_count = mysqli_fetch_assoc($query_count)) {
    $num = $rows_count['COUNT(*)'];
}

if(!isset ($_SESSION['logado_p'])){
	header('Location: login.php');
}

?>
<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

        <meta charset="utf-8">
        <link href="/imagens/logo.png" rel="shortcut icon">

        <title>Registros Professor</title>
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
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
            <!-- BEGIN: Content -->
            <div class="content">
            <div style=" display: flex;justify-content: center;margin-top: 50px">
             <!-- BEGIN: Profile Info -->
             <div style="width: 90%;padding: 20px"class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">

								<img class="rounded-md intro-y" src="https://cef4.com.br/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $_SESSION['usuario'];?>.JPG" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
                                                            </div>
                            <div class="ml-5">
                                <div style="font-size: 17px;font-weight: 700;" class="w-24 sm:w-40 truncate sm:whitespace-normal font-large text-lg"><?php echo $nome;?></div>
                                <div class="text-gray-600"><?php echo $turma; ?></div>
                            </div>
                        </div>
                        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div style="font-size: 17px;font-weight: 700;" class="truncate ls:whitespace-normal flex items-center">  Total de registros: <?php echo $num?> </div>
                           
                        </div>
						<div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div style="font-size: 17px;font-weight: 700;" class="truncate ls:whitespace-normal flex items-center"><a href="AcessosEscola.php" class="btn2 blue">Entrada</a></div>
                           
                        </div>
                       
                        <a href="aluno_professor.php" class="btn blue">Voltar</a>
						
                    </div>
                    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">  </div>
                </div>
                
                </div>
                <!-- END: Profile Info -->
            
             <!-- BEGIN: Weekly Top Products -->
             <div class="col-span-12">
                          
              <div style=" display: flex;justify-content: center;" class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                  <table style="width: 90%" class="table table-report sm:mt-2">
                      <thead>
                          <tr >

                              <th class="text-center whitespace-no-wrap">Data</th>
                              <th class="text-center whitespace-no-wrap">Saida</th>

                              
                          </tr>
                      </thead>
                      <tbody>
					  
                      <?php while ($rows = mysqli_fetch_assoc($query)) {?>
                          <tr class="intro-x">
                              <td class="w-40">
                                  <div class="flex">
                                      <div class="text-center"><span style="font-size: 15px;font-weight: 600;">
                                      <?php if(true){?>
                                          <?php echo $rows['Dia'];?>
                                       <?php }?>
                                       </span></div>
                                      
                                  </div>
                              </td>
                              <td class="text-center">
                                  <span style="font-size: 17px;font-weight: 700;"><?php echo $rows['Horas'];?></span>
                              </td>

                              
                          </tr>
                        <?php }?>
                      </tbody>
                  </table>
              </div>
                            
                        </div>
                        <!-- END: Weekly Top Products -->
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
				right: 40px;
				bottom: 40px

			}

			.btn:active {
				transform: translate(0px, 5px);
				-webkit-transform: translate(0px, 5px);
				box-shadow: 0px 1px 0px 0px;
			}
			
			.btn2 {
				border-radius: 5px;
				padding: 15px 25px;
				font-size: 22px;
				text-decoration: none;
				color: #fff;


			}

			.btn2:active {
				transform: translate(0px, 5px);
				-webkit-transform: translate(0px, 5px);
				box-shadow: 0px 1px 0px 0px;
			}

			.blue {
				background-color: #ff351f;
				box-shadow: 0px 5px 0px 0px #3C93D5;
			}

			.blue:hover {
				background-color: #6FC6FF;
			}

		</style>
		
          
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
       
        <script src="dist_provisorio/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>