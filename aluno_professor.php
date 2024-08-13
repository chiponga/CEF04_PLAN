<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require_once("db.class.php");
    $origem = $_SESSION['origem'];
	//$usuario = "263171";
	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
	}
    
	$usuario = $_SESSION['usuario'];
   
	$data = date("Y/m/d");

	$turno = $_SESSION['turno'];


	$sql_entrada = "SELECT * FROM `entrada` WHERE Codigo = '$usuario' AND `Dia` = '$data'";

	$sql_saida = "SELECT * FROM `saida` WHERE Codigo = '$usuario' AND `Dia` = '$data'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;
	$resultado_entrada = mysqli_query($link,$sql_entrada);
	$resultado_saida = mysqli_query($link,$sql_saida);
	if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}

	if($resultado_saida){
		$dados_saida = mysqli_fetch_assoc($resultado_saida);

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro na execução , favor entrar em contato com admin do site</div>";
	}

						if(isset($dados_entrada['Horas'])){

						}else{
							$entrada="NÃO";

						}



						if(isset($dados_saida['Horas'])){
							$saida = $dados_saida['Horas'];
						}else{


								$saida = "NÃO";


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
        <title>Aluno Professor</title>
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
       
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img  class="w-6" src="imagens/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
			<?php if($origem !="Dir"){?>
            <li>
                        <a href="#" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Estudantes </div>
                        </a>
                    </li>
                   

                    <li>
                        <a href='conselho/conselho_professor.php' class="menu">
                            <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='carometro/selecionar_turma.php' class="menu">
                            <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="menu__title"> Carômetro </div>
                        </a>
                    </li>
					
					 <li>
                        <a href='selecionar_pre_conselho.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
					<?php }?>
					
					<?php if($origem =="Dir"){?>
					<li>
                        <a href="#" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Estudantes </div>
                        </a>
                    </li>
                   

                    <li>
                        <a href='conselho/conselho_professor.php' class="menu">
                            <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='carometro/selecionar_turma.php' class="menu">
                            <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="menu__title"> Carômetro </div>
                        </a>
                    </li>
					
					 <li>
                        <a href='selecionar_pre_conselho.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
                    <li>
                        <a href='liberar_professor.php'class="menu">
                            <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                            <div class="menu__title"> Cadastro </div>
                        </a>
                    </li>
                    <li>
                        <a href='registrar_senha.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Senha </div>
                        </a>
                    </li>
                    <li>
                        <a href='config.php' class="menu">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Configuração </div>
                        </a>
                    </li>
                    <li>
                        <a href='registrar_bilhete_1.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Bilhete </div>
                        </a>
                    </li>
                    <li>
                        <a href='registrar_aviso.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Aviso </div>
                        </a>
                    </li>
                    <?php }?>
                   <?php /*?>
                    <li>
                        <a href='selecionar_turma_ranking.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Ranking </div>
                        </a>
                    </li>
                   
                    

                    <li>
                        <a href='numero_alunos.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Número de alunos </div>
                        </a>
                    </li>
                    

                    <li>
                        <a href='selecionar_pre_conselho.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Pré-Conselho </div>
                        </a>
                    </li>

                      
                    <li>
                        <a href='../selecionar_turma_ata.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Ata de conselho </div>
                        </a>
                    </li>
                    
                    <?php if($origem =="Dir"){?>
                    <li>
                        <a href='tela_horario.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Horário</div>
                        </a>
                    </li>
                    <?php }?>





                    <?php /*?>    
                   
                    
                   <li>
                               <a href="javascript:;" class="side-menu">
                                   <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                   <div class="side-menu__title"> Relatórios <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                               </a>
                               <ul class="">
                                   <li>
                                       <a href="../selecionar_digitado.php" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Alunos sem Carteirinha</div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="#" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Alunos sem uniforme</div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="../selecionar_atrasos.php" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Atrasos</div>
                                       </a>
                                   </li>
                               </ul>
                           </li>  
                           <?php */?> 
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="imagens/logo.png">
                    <span class="hidden xl:block text-white text-lg ml-3"> <?php echo $escola?> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
				<?php if($origem !="Dir"){?>
                    <li>
                        <a href="#" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Estudantes </div>
                        </a>
                    </li>
                    

                    <li>
                        <a href='conselho/conselho_professor.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='carometro/selecionar_turma.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Carômetro </div>
                        </a>
                    </li>
					                    <li>
                        <a href='selecionar_pre_conselho.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
					<?php }?>
					
					
					<?php if($origem =="Dir"){?>
                    <li>
                        <a href="#" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Estudantes </div>
                        </a>
                    </li>
                    

                    <li>
                        <a href='conselho/conselho_professor.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='carometro/selecionar_turma.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Carômetro </div>
                        </a>
                    </li>
					                    <li>
                        <a href='selecionar_pre_conselho.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
                    <li>
                        <a href='liberar_professor.php'class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                            <div class="side-menu__title"> Cadastro </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href='registrar_senha.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Senha </div>
                        </a>
                    </li>
					<li>
                        <a href='config.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="side-menu__title"> Configuração </div>
                        </a>
                    </li>
					<?php }?>
					<?php ?>
                    <!-- dir-->
                    <?php if($origem =="Dir"){?>
                   
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href='registrar_bilhete_1.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Bilhete </div>
                        </a>
                    </li>
                    <li>
                        <a href='registrar_aviso.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Aviso </div>
                        </a>
                    </li>
                    <?php }?>
                    <?php ?>
                   <?php /*?>
                    <li>
                        <a href='selecionar_turma_ranking.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Ranking </div>
                        </a>
                    </li>
                   
                    

                    <li>
                        <a href='numero_alunos.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Número de alunos </div>
                        </a>
                    </li>
                    

                    <li>
                        <a href='selecionar_pre_conselho.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Pré-Conselho </div>
                        </a>
                    </li>

                      
                    <li>
                        <a href='../selecionar_turma_ata.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Ata de conselho </div>
                        </a>
                    </li>
                    
                    <?php if($origem =="Dir"){?>
                    <li>
                        <a href='tela_horario.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Horário</div>
                        </a>
                    </li>
                    <?php }?>





                    <?php /*?>     
                   
                    
                   <li>
                               <a href="javascript:;" class="side-menu">
                                   <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                   <div class="side-menu__title"> Relatórios <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                               </a>
                               <ul class="">
                                   <li>
                                       <a href="../selecionar_digitado.php" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Alunos sem Carteirinha</div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="#" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Alunos sem uniforme</div>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="../selecionar_atrasos.php" class="side-menu">
                                           <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                           <div class="side-menu__title">Atrasos</div>
                                       </a>
                                   </li>
                               </ul>
                           </li>  
                           <?php */?>     
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content" style="position:relative;">
          
            <div class="intro-y box  " style="padding-top: 30px;">
                    <!-- BEGIN: Blog Layout -->
                    <div class="box rounded-md relative p-3  zoom-in" style="width: 300px;margin-left: auto;margin-right: auto;">
					<img class="rounded-md intro-y" src="https://cef4.com.br/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $usuario;?>.JPG" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
															
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
                            echo'<div style="border-bottom: 6px solid red; "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }else{
                            echo'<div style="border-bottom: 6px solid #2ce6a1; "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
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
                            echo'<div style="border-bottom: 6px solid red; "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
                        }else{
                            echo'<div style="border-bottom: 6px solid #2ce6a1; "class="col-span-6 sm:col-span-6 xxl:col-span-6 box p-5 cursor-pointer zoom-in">';
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
                        
                            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-12 " >
                                <a href="ocorrencias_professor.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">REGISTROS</h1>
                                </a>
                                <a href="nota_aluno_professor.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">NOTAS</h1>
                                </a>
                                <?php if($origem =="Dir"){?>
                                <a href="AcessosEscola.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">ACESSO</h1>
                                </a>
                                <?php }?>
								                                
                                <?php if($origem =="Dir"){?>
                                    <a href='registrar_ocorrencia.php' style="align-items: center" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                        <h1 class="texto text-3xl font-extrabold" style="">NOVO <Br> REGISTRO</h1>
                                    </a>
                                <?php }else{?>
                                    <a href='registrar_ocorrencia_professor.php' style="align-items: center" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                        <h1 class="texto text-3xl font-extrabold" style="">NOVO <Br> REGISTRO</h1>
                                    </a>
                                <?php }?>

                                <?php if($origem =="Dir"){?>
                                <a href="motivos_advertencia.php" class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-2xl font-extrabold" style="">ADVERTÊNCIA</h1>
                                </a>
                                
                                <a href="motivo.php" style="margin-bottom: 100px;"class="background box rounded-md zoom-in flex items-center justify-center col-span-12  md:col-span-6 lg:col-span-4 xxl:col-span-4">
                                    <h1 class="texto text-3xl font-extrabold" style="">SUSPENSÃO</h1>
                                </a>
                                <?php }?>
                                

                            </div>

                        </div>
            
                         </div>
                       
                     </div>
                   
            
                    <!-- END: Blog Layout -->
                </div>
            </div>
            <!-- END: Content -->
            <a href="alunos_professor.php" style="z-index: 50" class="botao red">Voltar</a>
        </div>
        <!-- BEGIN: JS Assets-->
       
        <script src="dist_provisorio/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>