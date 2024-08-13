<!DOCTYPE html>
<?php
	require_once("db.class.php");
	$objDb = new db();
	$link = $objDb->conecta_mysql();
    $escola = $objDb->nome;
	echo $link
	$result_config = "SELECT * FROM config Where Escola = '$escola'";
	$resultado_config = mysqli_query($link, $result_config);

    $sql_faltas = "SELECT * FROM `liberar` Where Escola ='$escola'";
    $resultado_faltas = mysqli_query($link,$sql_faltas);
    $dados_faltas = mysqli_fetch_assoc($resultado_faltas);
?>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

        <meta charset="utf-8">
        <link href="imagens/logo.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Config</title>
        <!-- BEGIN: CSS Assets-->
        
        <link rel="stylesheet" href="dist_provisorio/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
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
    <!-- END: Head -->
    <body class="app">
       
           
            <!-- BEGIN: Content -->
            <div class="content">
             
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-5">
                        <!-- BEGIN: Input -->
                        <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Liberar notas
                                    </h2>
                                </div>
                        <div class="intro-y box" style="padding: 50px">
                       
                                <form action="validar_liberar_notas.php" id="form_notas" method="POST">
                                <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                           
                                            <div class="ml-4 mr-auto">
                                                <div class="font-black text-lg">1° Bimestre</div>
                                        
                                                <div class="mt-3">
                                                    <div class="mt-2"> <input name="bim1" type="checkbox" <?php if(isset($dados_faltas['bim1']) and $dados_faltas['bim1'] == 'SIM'){echo 'checked';}else{echo"";}?> class="input input--switch border"> </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                           
                                            <div class="ml-4 mr-auto">
                                                <div class="font-black text-lg">2° Bimestre</div>
                                        
                                                <div class="mt-3">
                                                    <div class="mt-2"> <input name="bim2" type="checkbox" <?php if(isset($dados_faltas['bim2']) and $dados_faltas['bim2'] == 'SIM'){echo 'checked';}else{echo"";}?> class="input input--switch border"> </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                           
                                            <div class="ml-4 mr-auto">
                                                <div class="font-black text-lg">3° Bimestre</div>
                                        
                                                <div class="mt-3">
                                                <div class="mt-2"> <input name="bim3" type="checkbox" <?php if(isset($dados_faltas['bim3']) and $dados_faltas['bim3'] == 'SIM'){echo 'checked';}else{echo"";}?> class="input input--switch border"> </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                           
                                            <div class="ml-4 mr-auto">
                                                <div class="font-black text-lg">4° Bimestre</div>
                                        
                                                <div class="mt-3">
                                                <div class="mt-2"> <input name="bim4" type="checkbox" <?php if(isset($dados_faltas['bim4']) and $dados_faltas['bim4'] == 'SIM'){echo 'checked';}else{echo"";}?> class="input input--switch border"> </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    
                                     <button  id="bnt_send"class="button w-24 rounded-full shadow-md mr-1 mb-2 bg-theme-1 text-white">Salvar</button>

                        </form>
                        </div>
                        <!-- END: Input -->
                        
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-7">
                        <!-- BEGIN: Vertical Form -->
                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
                                   <form id="form" action="validar_config.php" method="POST">
                                    <div class="mt-3">
                                        <label style="font-size: 25px;font-weight: 600;" class="mt-2" >Motivos para Pré-Conselho</label>
                                        <input name="motivo" id="motivo" type="text" class="input w-full rounded-full border mt-2" placeholder="Digite aqui">
                                    </div>
                                </div>
                                <button type="submit" style="margin-top: 50px" class="button w-24 shadow-md mr-1 mb-2 bg-theme-1 text-white">Adicionar</button>
                               
                                </form>
                            </div>
                            <div class="atuais" style="margin-top: 40px">
                            <label style="font-size: 20px;font-weight: 600;margin-left: 10px" >Itens atuais</label>
                        <style>
                        .atuais{
                            
                            padding: 15px;
                            background-color: white;

                        }
                        .itens {
                        padding-left: 1em; 
                        font-size: 20px;
                        padding: 5px;
                        font-weight: 400;
                        }
                        .itens::before {
                        content: "• ";
                        color: #346eeb /* or whatever color you prefer */
                        }
                        </style>
                        <ul id="ul">
                        <?php while($rows_config = mysqli_fetch_assoc($resultado_config)){?>
                            <li class="itens"><?php echo $rows_config['Texto'];?> </li>
                           
                            <?php }?>
                            </ul>
                        <div>
                        </div>
                        <!-- END: Vertical Form -->
                       
                    </div>
                </div>
            </div>
            <a href="alunos_professor.php" style="z-index: 50" class="botao red">Voltar</a>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="dist_provisorio/js/app.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                });
                swal({
                    icon: "success",
                    title: "Salvo com sucesso!!",
                    button: "Fechar"
                    });
            });
         }); 

        </script>

        <script>
        $(".atuais").on('click','li',function (){
            var texto = $(this).text();
            Swal.fire({
            title: 'Deseja excluir o item: '+texto+'?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Sim`,
            denyButtonText: `Não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            $.ajax({
			type: "POST",
		    url: "validar_config.php",
			data: {type: 'delete', motivo: texto},
			dataType: "json",
			success: function(data){
                window.location.reload(true);
               
			
			},
			error: function (request, error) {
            console.log(arguments);
            console.log(" Can't do because: " + error);
            },
			});
            } else if (result.isDenied) {
                
            }
            })
          //    alert($(this).text());
          
          
        }); 
        $(function(){
			var form = $("#form");
			form.submit(function (e){
				$(this).attr("disabled","disabled");
				e.preventDefault();
                var texto = $("#motivo").val();

				$.ajax({
					type: "POST",
		        	url: "validar_config.php",
					data: {type: 'add', "motivo": texto},
					dataType: "json",
					success: function(data){
                        
                        window.location.reload(true);
                       
					},
					error: function (request, error) {
                    console.log(arguments);
                    console.log(" Can't do because: " + error);
                },
				});
			});	
        });	
	</script>
    

   
        <!-- END: JS Assets-->
    </body>
</html>