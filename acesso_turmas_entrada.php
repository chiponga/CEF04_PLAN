<?php
	session_start();
	//$nome_professor = $_SESSION['nome_professor'];
    $_SESSION['nome_professor'] = "Pedro";
    $nome_professor = "Pedro";
	require_once("db.class.php");

    $objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;

	$sql=("SELECT DISTINCT Turma from cadastro Where Escola = '$escola' ORDER BY Turma");
    $query = mysqli_query($link,$sql);
?>
<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="imagens/logo.png" rel="shortcut icon">

        <title>Acesso turma entrada</title>
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
        <link rel="stylesheet" href="dist_provisorio/css/app.css" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="" class="w-6" src="imagens/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="index.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="" class="w-6" src="imagens/logo.png">
                    <span class="hidden xl:block text-white text-lg ml-3"> Cef<span class="font-medium">04</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="index.html" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content" style="display:flex;align-items: center;align-content: center;flex-wrap: nowrap;justify-content: flex-start;flex-direction: column;">
            <!-- BEGIN: Vertical Form -->
            <div class="intro-y box" style="width: 70%; margin-top: 50px">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Selecionar entrada
                                </h2>
                            </div>
                            <div class="p-5" id="vertical-form">
                            <div class="div">
                            <div class="mt-2"> 
                            <form method="post" action="professor_conselho.php">
                            <select style="width:300px; font-size: 20px"class="input input--lg border mr-2">
                            <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?php echo $rows['Turma']?>"><?php echo $rows['Turma']?></option>
                            <?php } ?>
                             </select> </div>
                                
                             </div>
                             <div class="div div-column">
                             <button style="width:300px; font-size:20px;margin-top:50px"class="button w-24 mr-1 mb-2 bg-theme-1 text-white">Acessar</button>
                             <button style="width:300px; font-size:20px;margin-top:20px"class="button w-24 mr-1 mb-2 bg-theme-6 text-white">Voltar</button>
                             <form>
                             </div>
                             </div>
                        </div>
                        <!-- END: Vertical Form -->

            <!-- END: Content -->
        </div>
    </body>
    <script src="dist_provisorio/js/app.js"></script>
</html>