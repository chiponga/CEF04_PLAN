<?php
	if (!isset($_SESSION)){
		session_start();
   }
	require_once("../db.class.php");
	/*if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
	}*/
	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;
	$turma = $_POST['turma'];
	$result_cursos = "SELECT * FROM cadastro WHERE Turma = '$turma'and Escola = '$escola' ORDER BY Aluno";
    $resultado_cursos = mysqli_query($link, $result_cursos);


?>
<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="../imagens/logo.png" rel="shortcut icon">
        <title>Conselho</title>
        <!-- BEGIN: CSS Assets-->
        <style>
						.botao {
							border-radius: 5px;
							padding: 15px 25px;
							font-size: 22px;
							text-decoration: none;
							margin: 20px;
							color: #fff;
                            position: fixed;
                            bottom: 15px;
                            right: 15px; 
						}

						.red {
							background-color: #e74c3c;
							box-shadow: 0px 5px 0px 0px #CE3323;
						}

						.red:hover {
							background-color: #FF6656;
						}

					</style>
        <link rel="stylesheet" href="../dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="../config.js"></script>
    </head>
    <!-- END: Head -->
    <body class="app">
        
            <!-- BEGIN: Content -->
            <div class="content">
            <a href="conselho_professor.php" class="botao red">Outra turma</a>
                <div class="intro-y flex items-center mt-8">

                    <h2 class="text-lg font-medium mr-auto">
                        Conselho
                    </h2>
                    
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Single File Upload -->
                      <div class="intro-y box">
                      <div style=" display: flex;justify-content: center;" class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                      <table style="width: 95%" class="table table-report sm:mt-2">
                      <thead>
                          <tr >
                              <th class="text-center whitespace-no-wrap">Código</th>
                              <th class="text-center whitespace-no-wrap">Aluno</th>
                              <th class="text-center whitespace-no-wrap">Turma</th>
                              <th class="text-center whitespace-no-wrap">Foto</th>
                    
                              
                          </tr>
                      </thead>
                      <tbody>
                      <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>
						<form method="post" action="">
                          <tr class="intro-x">
                              <td class="w-40">
                              <?php echo $rows_cursos['Codigo']; ?>
                              </td>
                              <td class="text-center">
                                  <span style="font-size: 17px;font-weight: 700;"><?php echo $rows_cursos['Aluno']; ?></span>
                              </td>
                              <td class="text-center"><span style="font-size: 15px;font-weight: 600;">
                              <?php echo $rows_cursos['Turma']; ?></span>
                              
                              </td>
                              <td class="text-center">
							  <img class="rounded-md intro-y" src="https://admbv.com.br/Fotos/<?php echo $rows_cursos['Codigo'];?>.JPG" height="80px" width="80px" onerror="this.onerror=null; this.src='imagens/semFoto.png'">

							    </td>
                                <td>
                                <?php echo '<button type="submit" class="button w-24 mr-1 mb-2 bg-theme-1 text-white" data-codigo_aluno="'.$rows_cursos['Codigo'].'" id="ver">Ver</button>' ?>
								</td>
                                <!--Codigo-->
								<input name="codigo_aluno" type="hidden" value="<?php echo $rows_cursos['Codigo']; ?>">
								<!--Turno-->
								<input name="turno" type="hidden" value="<?php echo $rows_cursos['Turno']; ?>">
								<!--Nome-->
								<input name="nome" type="hidden" value="<?php echo $rows_cursos['Aluno']; ?>">
								<!--Turma-->
								<input name="turma" type="hidden" value="<?php echo $rows_cursos['Turma']; ?>">
								<!--Mencao-->
                          </tr>
                         
                          </tr>
						</form>
						<?php } ?>
                      </tbody>
                  </table>
                  </div>
                  </div>
                        <!-- END: Single File Upload -->
                        
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: File Type Validation -->
                        <div class="intro-y box">
                            <div class="flex flex-col  items-center p-5 border-b border-gray-200 dark:border-dark-5">        
                            <?php
                            if(isset($_POST['codigo_aluno'])){
                            $codigo = $_POST['codigo_aluno'];
                            $nome = $_POST['nome'];
                            $result_marc = "select Marcacao, count(*) as c FROM Marcacoes Where Aluno = '$nome' GROUP BY Marcacao ";
                            $resultado_marc = mysqli_query($link, $result_marc);
                            $marc = array();
                            while($rows_marc = mysqli_fetch_assoc($resultado_marc)){
                                $nome_marc = $rows_marc["Marcacao"];
                                $c_marc = $rows_marc["c"];
                                $item = "$nome_marc : $c_marc";
                                array_push($marc, $item);
              
                            } 
                            ?>
							<img src="https://admbv.com.br/Fotos/<?php echo $codigo;?>.JPG" style="margin: 40px;margin-left:85px;margin-top:10px;text-aling:center" height="460px" width="400px" onerror="this.onerror=null; this.src='imagens/semFoto.png'">


                            <?php
                            foreach ($marc as $value){?>
                                <p class="" style="text-align: center;font-size: 23px">
                                <?php
                                    echo $value;
                                ?>
                                </p>    
                            <?php } ?>	
                            <?php } ?>


                            
                            </div>
                            
                        </div>
                        <!-- END: File Type Validation -->
                    </div>
                    
                </div>
                
                
            </div>
            <!-- END: Content -->
            
        </div>
        <a href="conselho_professor.php" style="z-index: 50" class="botao red">Outra turma</a>
    </body>
</html>
