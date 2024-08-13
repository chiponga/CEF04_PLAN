<?php
	session_start();
    $nome_professor = $_SESSION['nome_professor'];
    
	require_once("db.class.php");
	$origem =	$_SESSION['origem'];
	if(!isset ($_SESSION['logado_p'])){
			header('Location: login_professor.php');
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

	$result_alunos = "SELECT * FROM cadastro Where Escola = '$escola' ORDER BY Aluno  ";
	$resultado_alunos = mysqli_query($link, $result_alunos);

    $result_liberar = "SELECT COUNT(*) FROM `login` WHERE liberacao = 'N' and escola = '$escola' ORDER BY `Liberacao`";
	$resultado_liberar = mysqli_query($link, $result_liberar);
    $dados_liberar = mysqli_fetch_assoc($resultado_liberar);
		

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
        <title>Alunos Professor</title>
        <!-- BEGIN: CSS Assets-->
         
        <link rel="stylesheet" href="dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
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
                    <li>
                        <a href='relatorio/selecionar_turma.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Relatório </div>
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
    <body class="app">
       
            <!-- BEGIN: Content -->
            <div class="content">

                <div class="grid grid-cols-12 gap-6">
                
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                  
                       
                        <!-- BEGIN: Weekly Top Products -->
                        <div class="col-span-12 mt-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                   Alunos
                                </h2>
                                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                   <!-- <button class="button box flex items-center text-gray-700 dark:text-gray-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                                    <button class="ml-3 button box flex items-center text-gray-700 dark:text-gray-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                                -->
                                </div>
                            </div>
                        <!-- BEGIN: Profile Info -->
                        <?php if($origem == 'Dir' && $dados_liberar['COUNT(*)'] != 0){?>
                        <div style="background: #fff;width: 50%;padding: 20px"class="intro-y box px-5 pt-5 mt-5">
                        <a href="liberar_professor.php">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-center">
                                        <div class="w-20 h-20 sm:w-24 sm:h-24 ">
                                            <img style="width: 80px"class="rounded-full" src="imagens/bell.png" onerror="this.onerror=null; this.src='imagens/semFoto.png'">
                                        
                                        </div>
                                        <div class="ml-5">
                                            <div style="font-size: 17px;font-weight: 700;" class="w-24 sm:w-40 truncate sm:whitespace-normal font-large text-lg"><?php echo $dados_liberar['COUNT(*)']; if($dados_liberar['COUNT(*)'] > 1){echo ' Novos cadastros para serem liberados!!';}else{echo ' Novo cadastro para ser liberado';}?></div>
                                            <div class="text-gray-600">Clique aqui para acessar os cadastros</div>
                                        </div>
                                    </div>      
                                </div>
                                <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">  </div>
                            </div>
                            </a>
                            </div>
                            
                            <!-- END: Profile Info -->
                            <?php }?>
                            <div class="intro-x overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <input type="text" placeholder="Pesquisar..." id="pesquisar"style="color: black;border-radius: 10px;padding:20px;font-size:20px;width: 300px;height: 30px">
                                <table id="tabela"class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                        
                                            <th class="whitespace-no-wrap">Código</th>
                                            <th class="whitespace-no-wrap">Nome</th>
                                            <th class="text-center whitespace-no-wrap">Turma</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($rows_alunos = mysqli_fetch_assoc($resultado_alunos)){?>
                                        <form id="" method="post" action="validar_codigo_professor.php">
                                        <tr class="intro-x" >
                                            <td>
                                                <span class="font-medium whitespace-no-wrap"><?php echo $rows_alunos['Codigo'];?> <br></span> 
                                               
                                 
                                            </td>
                                            <td>
                                                <span href="" class="font-medium whitespace-no-wrap"><?php echo $rows_alunos['Aluno'];?></span> 
                                                
                                              
                                            </td>
                                            <td class="text-center"><?php echo $rows_alunos['Turma'];?></td>
                                            
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <button type="submit" <?php echo ' data-codigo_aluno="'.$rows_alunos['Codigo'].'" ' ?> id="ver"><div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Ver </div></button>                                          
                                                </div>
                                                
                                            </td>

                                        	<!--Codigo-->
                                        <input name="codigo_aluno" type="hidden" value="<?php echo $rows_alunos['Codigo']; ?>">
                                        <!--Turno-->
                                        <input name="turno" type="hidden" value="<?php echo $rows_alunos['Turno']; ?>">
                                        <!--Nome-->
                                        <input name="nome" type="hidden" value="<?php echo $rows_alunos['Aluno']; ?>">
                                        <!--Turma-->
                                        <input name="turma" type="hidden" value="<?php echo $rows_alunos['Turma']; ?>">
                                        </tr>
                                    </form>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- END: Weekly Top Products -->
                    </div>
                    <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                        <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                            <!-- BEGIN: Transactions -->
                            
                            <!-- END: Transactions -->
                           
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
       
        <!-- BEGIN: JS Assets-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
        <script src="dist_provisorio/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
         
         $(function(){
            var form = $("#form_notas");
            form.submit(function (e){
                $(this).attr("disabled","disabled");
                e.preventDefault();

                $.ajax({
                    type: form.attr("method"),
                    url: form.attr("action"),
                    data: form.serialize(),
                    dataType: "json",
                    success: function(data){
                        swal({
                        icon: "success",
                        title: "Salvo com sucesso!!",
                        button: "Fechar"
                        });
                    },
                    error: function(data){
                        swal("Error");
                    }
                });
            });
         }); 

        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
        $("#pesquisar").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabela tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>  
        <!-- END: JS Assets-->
    </body>
</html>
