<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require_once("db.class.php");
	//$usuario = "263171";
	if(!isset ($_SESSION['logado'])){
		header('Location: login.php');
	}
    
  $usuario = $_SESSION['codigo'];
	$data = date("Y-m-d");
	echo($data);
	$turno = $_SESSION['turno'];

	$sql_entrada = "SELECT * FROM `entrada` WHERE Codigo = '$usuario' AND `Dia` = '$data'";

	$sql_liberacao = "SELECT * FROM `liberacao` WHERE Codigo = '$usuario' AND `Dia` = '$data'";

	$sql_saida = "SELECT * FROM `saida` WHERE Codigo = '$usuario' AND `Dia` = '$data'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$resultado_entrada = mysqli_query($link,$sql_entrada);
	$resultado_liberacao = mysqli_query($link,$sql_liberacao);
	$resultado_saida = mysqli_query($link,$sql_saida);
	if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}
	if($resultado_liberacao){
		$dados_liberacao = mysqli_fetch_assoc($resultado_liberacao);

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}
	if($resultado_saida){
		$dados_saida = mysqli_fetch_assoc($resultado_saida);

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}

						if(isset($dados_entrada['Horas'])){
							$entrada=$dados_entrada['Horas'];
						}else{
							$entrada="NÃO";

						}



						if(isset($dados_saida['Horas'])){
							$saida = $dados_saida['Horas'];
						}else{


								$saida = "NÃO";


						}

						if(isset($dados_liberacao['Horas'])){
							$liberacao = $dados_liberacao['Horas'];
						}else{
							$liberacao = $saida;

						}
?>
<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

        <meta charset="utf-8">
        <link href="imagens/logo.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aluno</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

        <style>
  
						.botao {
							border-radius: 5px;
							padding: 13px 22px;
							font-size: 18px;
							margin: 20px;
							color: #fff;
                            position: fixed;
                            display:block;
                            bottom: 10%;
                            margin: auto;
                            right: 2%;
						}

						.red {
							background-color: #e74c3c;
							box-shadow: 0px 5px 0px 0px #CE3323;
						}

						.red:hover {
							background-color: #FF6656;
						}

					</style>
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
          
            <div class="intro-y box  " style="padding-top: 30px;">
                    <!-- BEGIN: Blog Layout -->
                    <div class="box rounded-md relative p-3  zoom-in" style="width: 250px;margin-left: auto;margin-right: auto;">
                    <img class="rounded-md intro-y" src="http://135.148.160.173/5s6d4f56sdf1s56a1f3s2f1s32af1s32df1s32df1ds561f/<?php echo $_SESSION['codigo'];?>.JPG" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
                    
                    </div>
                    <h2 class="text-3xl text-center m-5 font-semibold text-base"><?php
                        echo $usuario;

                        ?></h2>
                        <h2 class="text-3xl text-center m-5 font-semibold text-base"><?php
                        $nome = $_SESSION['nome'];
                        echo $nome;

                        ?></h2>
                        <h2 style="margin-bottom: 20px" class="text-3xl text-center m-5 font-semibold text-base">
                        <?php
                            $turma = $_SESSION['turma'];
                            echo $turma;
                        ?>
                        </h2>
                        <div style="margin-bottom: 50px" class="div">
                        
                        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-12 " >
                        <?PHP 
                        
                        

                        if($entrada == "NÃO"){
                            echo'<div style="border-bottom: 6px solid red;box-shadow: 5px 5px 14px 6px rgba(122,122,122,0.30) "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }else{
                            echo'<div style="border-bottom: 6px solid #2ce6a1;box-shadow: 5px 5px 14px 6px rgba(122,122,122,0.30) "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }
                       
                        ?>
                            
                       
                                <div style="text-align: center;" class="font-bold text-2xl text-base">ENTRADA</div>
                                <div  style=" text-align: center;" class="font-medium text-2xl text-base">
                                <?php
                                    if(isset($dados_entrada['Horas'])){
                                        if($dados_entrada['Horas']){

                                        }else{

                                        }
                                        echo $dados_entrada['Horas'];
                                    }else{
                                        $entrada="NÃO";
                                        echo $entrada;
                                    }
                                ?>
                                </div>
                                
                            </div>

                            <?PHP 
                        
                        if($saida == "NÃO"){
                            echo'<div style="border-bottom: 6px solid red; box-shadow: 5px 5px 14px 6px rgba(122,122,122,0.30)"class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }else{
                            echo'<div style="border-bottom: 6px solid #2ce6a1; box-shadow: 5px 5px 14px 6px rgba(122,122,122,0.30)"class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }
                       
                        ?>
                            
                            <div style=" text-align: center;" class="font-bold text-2xl text-base">SAÍDA</div>
                                <div  style=" text-align: center;" class="font-medium text-2xl text-base">
                                <?php
                                echo $saida;
                                      ?>
                                </div>
                            </div>

                            </div>
                            </div>
                        <div class="div">
                        
                            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-12 " style="margin-bottom: 80px">
                                <a href="nota_aluno.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">NOTAS</h1>
                                </a>
                                <a href="tabela_ocorrencias.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">REGISTROS</h1>
                                </a>
                                <a href='tabela_avisos.php' class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">AVISOS</h1>
                                </a>


                               <!-- <a href="" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">NOTAS</h1>
                                </a>
                                <a href="" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-2xl font-extrabold" style="">ADVERTÊNCIA</h1>
                                </a>
                                <a href="" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">SUSPENSÃO</h1>
                                </a>-->
  


                            </div>

                        </div>
                           
                            
                         </div>
                       
                     </div>
                   
              

                    <!-- END: Blog Layout -->
                </div>
                <a href="index.php" style="z-index: 50" class="botao red">Sair</a>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
       
        <script src="dist_provisorio/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>