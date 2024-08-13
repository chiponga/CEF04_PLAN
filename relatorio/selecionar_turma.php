<?php
	session_start();
	require_once("../db.class.php");
    $origem =	$_SESSION['origem'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

    $sql=("SELECT DISTINCT Turma from cadastro Where Escola = '$escola' ORDER BY Turma");
    
    $query = mysqli_query($link,$sql);

    $bike = (bool) 0 ? "checked" : null;
    $car  = (bool) 0 ? "checked" : null;
?>
<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="../config.js"></script>
        <meta charset="utf-8">
        <link href="../imagens/logo.png" rel="shortcut icon">

        <title></title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');

        .font-nome{
            font-family: 'Fjalla One', sans-serif;
        }
        .background{
            background-image: url("fundo_btn.png");
            background-size: 180px 180px;
            width: 180px;
            height: 180px;
            margin-top: 20px;
        }
        .div {
        display: flex;
        justify-content: center;
        }
        .div-column{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center
        }
        .texto{
             color: white;
        }
        </style>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="../dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
          <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img  class="w-6" src="../imagens/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                    <?php if($origem !="Dir"){?>
                    <li>
                        <a href="../alunos_professor.php" class="menu">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Estudantes </div>
                        </a>
                    </li>
                   
                    <li>
                        <a href='../conselho/conselho_professor.php' class="menu "">
                            <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='../carometro/selecionar_turma.php' class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="menu__title"> Carômetro </div>
                        </a>
                    </li>

					<?php }?>
					
					<?php if($origem =="Dir"){?>
					<li>
                        <a href="../alunos_professor.php" class="menu">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Estudantes </div>
                        </a>
                    </li>
                   
                    <li>
                        <a href='../conselho/conselho_professor.php' class="menu "">
                            <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='../carometro/selecionar_turma.php' class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="menu__title"> Carômetro </div>
                        </a>
                    </li>
					
					<li>
                        <a href='../selecionar_pre_conselho.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
					
					<li>
                        <a href='../liberar_professor.php'class="menu">
                            <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                            <div class="menu__title"> Cadastro </div>
                        </a>
                    </li>
                    <li>
                        <a href='../registrar_senha.php' class="menu">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Senha </div>
                        </a>
                    </li>
                    <li>
                        <a href='../config.php' class="menu">
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
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="../imagens/logo.png">
                    <span class="hidden xl:block text-white text-lg ml-3"> <?php echo $escola?> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
				<?php if($origem !="Dir"){?>
                    <li>
                        <a href="../alunos_professor.php" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Estudantes </div>
                        </a>
                    </li>
                    

                    <li>
                        <a href='../conselho/conselho_professor.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='../carometro/selecionar_turma.php' class="side-menu  side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Carômetro </div>
                        </a>
                    </li>

					<?php }?>
					<?php if($origem =="Dir"){?>
                    <li>
                        <a href="../alunos_professor.php" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Estudantes </div>
                        </a>
                    </li>
                    <li>
                        <a href='../conselho/conselho_professor.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Conselho</div>
                        </a>
                    </li>
                    <li>
                        <a href='../carometro/selecionar_turma.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Carômetro </div>
                        </a>
                    </li>
					<li>
                        <a href='../selecionar_pre_conselho.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Pré-Conselho </div>
                        </a>
                    </li>
					<li>
                        <a href='../liberar_professor.php'class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                            <div class="side-menu__title"> Cadastro </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href='../registrar_senha.php' class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Senha </div>
                        </a>
                    </li>
					<li>
                        <a href='../config.php' class="side-menu">
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
                                <a href='../registrar_bilhete_1.php' class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="side-menu__title"> Bilhete </div>
                                </a>
                            </li>
                            <li>
                                <a href='../registrar_aviso.php' class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="side-menu__title"> Aviso </div>
                                </a>
                            </li>
                            <li>
                                <a href='#' class="side-menu  side-menu--active">
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
            <!-- BEGIN: Content -->
            <div class="content" style="display:flex;align-items: center;align-content: center;flex-wrap: nowrap;justify-content: flex-start;flex-direction: column;">
            <!-- BEGIN: Vertical Form -->
            <div class="intro-y box" style="width: 70%; margin-top: 50px">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Relatórios
                                </h2>
                            </div>
                            <div class="p-5" id="vertical-form">
                            <div class="div">
                            <div class="mt-2"> 
                            <form method="post" action="envio.php">

                            <p>
                                <label>Inicio: </label>
                                <input type="date" name="PrimeiraData" class="input input--lg border mr-2"><br><br>
                            </p>
                            <p>
                                <label>Final: </label>
                                <input type="date" name="SegundaData" class="input input--lg border mr-2" ><br><br>
                            </p>
                            <p>
                                <label>Turmas: </label>
                                <select name="turma" style="width:300px; font-size: 14px"class="input input--lg border mr-2">
                                    <option value="<?php echo "Todos"?>"><?php echo "Todos"?></option>
                                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                                        <option value="<?php echo $rows['Turma']?>"><?php echo $rows['Turma']?></option>
                                    <?php } ?>
                                </select><br><br>
                            </p>
                            <p>
                                <label>Turnos: </label>
                                <select name="turno" style="width:300px; font-size: 14px"class="input input--lg border mr-2">
                                    <option value="<?php echo "Todos"?>"><?php echo "Todos"?></option>
                                    <option value="<?php echo "M"?>"><?php echo "Matutino"?></option>
                                    <option value="<?php echo "V"?>"><?php echo "Vespertino"?></option>
                                    <option value="<?php echo "N"?>"><?php echo "Noturno"?></option>
                                    
                                </select><br><br>
                            </p>
                            <p>
                                <input type="checkbox" name="Primeiro" value="off" style="font-size: 14px"> Alunos Faltosos
                            </p>
                            
                            <p>
                                <input type="checkbox" name="Terceiro" value="off" style="font-size: 14px" > Alunos Presentes
                            </p>
                            <p>
                                <input type="checkbox" name="Quarta" value="off" style="font-size: 14px" > Alunos Presentes(QTD)
                            </p>

                            <p>
                                <input type="checkbox" name="Quinto" value="off" style="font-size: 14px" > Quantidade de Atrasos
                            </p>
                        
                        </div>
                                
                             </div>
                             <div class="div div-column">
                             <button type="submit" style="width:300px; font-size:20px;margin-top:50px"class="button w-24 mr-1 mb-2 bg-theme-1 text-white">Gerar Relatório</button>
                             <a href="../alunos_professor.php"style="width:300px; font-size:20px;margin-top:20px"class="button w-24 mr-1 mb-2 bg-theme-6 text-white">Voltar</a>
                             </div>
							 <form>
                             </div>
                        </div>
                        <!-- END: Vertical Form -->

            <!-- END: Content -->
        </div>
    </body>
    <script src="../dist_provisorio/js/app.js"></script>
</html>