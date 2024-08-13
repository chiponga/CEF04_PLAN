<?php
	session_start();
	$origem = $_SESSION['origem'];
	require_once("db.class.php");


	if(!isset ($_SESSION['logado_p'])){
		header('Location: login_professor.php');
	}

	if($_SESSION['origem'] != 'Dir'){
		echo "<script>alert('Sem permissão!!');document.location='aluno_professor.php';</script>";
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$escola = $objDb->nome;

	$result_cursos = "SELECT * FROM login Where Escola = '$escola' ORDER BY Nome";
	$resultado_cursos = mysqli_query($link, $result_cursos);
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Liberar Professores</title>
	<meta name="author" content="Adtile">
	<meta name="viewport" content="width=device-width,initi al-scale=1">
	<link rel="icon" type="image/png" href="imagens/logo.png" />
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
	$(document).ready(function(){
	$("#input").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#tabela tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
								
		});
	});
	});
	</script>

	  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

</head>

<body>


	<div class="container" style="margin-top: 80px">
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="corpo" class="modal-body">
        ...
      </div>

	  <form method="post" action="ver_notas.php">
	  <input id="usuario" type="hidden" name="usuario">
	  <input id="origem" type="hidden" name="origem">
	  <input id="disciplina" type="hidden" name="disciplina">
	  <input id="escola" type="hidden" name="escola">

	  <select class="custom-select d-block w-100" name="tipo" >

		<option value="Prof">Professor(a)</option>
		<option value="Coor">Coordenação</option>
		<option value="Dir">Direção</option>
		<option value="SOE">SOE</option>
	  </select>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

		<div class="row">
			<div class="panel panel-primary filterable">
				<div class="panel-heading">
					<h3 id="p1"class="panel-title">Cadastro de Acesso</h3>

				</div>

				<div class="col-md-4">
					<style>
									.btn {
										border-radius: 5px;
										padding: 15px 25px;
										font-size: 22px;
										text-decoration: none;
										margin: 20px;
										color: #fff;
										position: relative;
										display: inline-block;
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
				<form method="post" action="ver_notas.php">
				<input type="text" id="input"style="width: 500px;margin-bottom: 30px;margin-top: 30px"class="form-control" placeholder="Pesquisar">
				<table id="tabela" class="table">

					<thead>
						
						
							
						
					</thead>
					<tbody>
						<?php  $i = 0; while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>

							<tr>

								<td style="width: 100px">
									<?php echo $rows_cursos['Usuario']; ?>
								</td>

								<td>
									<?php echo $rows_cursos['Nome']; ?>
								</td>

								<td style="text-align: center;width: 100px;justify-content: center; align-items: center;">
									<?php echo $rows_cursos['Liberacao']; ?>
								</td>

								<td style="text-align: center;width: 100px">
									<?php echo $rows_cursos['Origem']; ?>
								</td>
							

								

								<td>
								<a  onclick='pegarId( "<?php echo $rows_cursos['Usuario']; ?>", "<?php echo $rows_cursos['Nome']; ?>", "<?php echo $rows_cursos['Origem'];?>"
								, "<?php echo $rows_cursos['Disciplina'];?>", "<?php echo $rows_cursos['Escola'];?>")' 
								type='button' data-toggle="modal" style="color: blue" data-target="#exampleModal">
								Liberar
								</a>

								</td>
								<td >

									<?php //echo '<button type="submit" class="btn btn-primary btn-sm" data-excluir="'.$rows_cursos['Codigo'].'" id="excluir">Ver</button>' ?>
									<?php echo "<a  style='margin-left: 50px' href='ver_notas.php?id=".$rows_cursos['Usuario']."&origem=".$rows_cursos['Origem']."&disciplina=".$rows_cursos['Disciplina']."&escola=".$rows_cursos['Escola']."' id='excluir'>Excluir</a>" ?>
								</td>

							<input name="codigo<?php echo $i?>" type="hidden" value="<?php echo $rows_cursos['Usuario']; ?>">

							</tr>




							<?php $i++;} ?>

					</tbody>
				</table>
				<div class="col-md-4">
					<style>
									.btn {
									  border-radius: 5px;
									  padding: 15px 25px;
									  font-size: 22px;
									  background-color: #55acee;
									  box-shadow: 0px 5px 0px 0px #3C93D5;
									  
									 
									}

								

									.fixedbutton {
										position: fixed;
										bottom: 50px;
										right: 50px; 
									}

								</style>
					
					<a class="fixedbutton btn" href="alunos_professor.php" class="btn blue">Voltar</a>
				</div>
				</form>
			</div>
		</div>


	</div>
	
	<script>


function pegarId(usuario, nome ,origem , disciplina, escola){

		$('#exampleModalLabel').text(usuario);
		$('#corpo').text(nome);
		$('#usuario').val(usuario);
		$('#origem').val(origem);
		$('#disciplina').val(disciplina);
		$('#escola').val(escola);
}


</script>


	
</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>