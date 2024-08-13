
<?php 
session_start();
require_once("db.class.php");
$origem =	$_SESSION['origem'];
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}

$objDb = new db();
$escola = $objDb->nome;
$link = $objDb->conecta_mysql();
$sql=("SELECT DISTINCT Turma from cadastro Where Escola = '$escola'ORDER BY Turma");
$query = mysqli_query($link,$sql);
if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
?>
<!DOCTYPE html>
<html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

<title>Selecionar Atraso<title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="icon" type="image/png" href="imagens/logo.png" />
    <script type="text/javascript">
            $(document).ready(function() {
                $("#apenas").click(dia_ate);
               // $("#dia_ate").val( $('option:contains("02")').val() );
                });
 
            function dia_ate(){
                if($("#dia_ate").is(":visible")){
                $("#dia_ate").hide();
                $("#mes_ate").hide();
                $("#ano_ate").hide();
                $("#apenas").text("Determinar Prazo");
                $("#ate").text("");
				$("#dia_ate").val( $('option:contains("Nenhum")').val() );
				$("#mes_ate").val( $('option:contains("Nenhum")').val() );
				$("#ano_ate").val( $('option:contains("Nenhum")').val() );
               // window.document.getElementById("#dia_ate").value = 'Nenhum';
               // window.document.getElementById("#dia_mes").value = 'Nenhum';
               // window.document.getElementById("#dia_ano").value = 'Nenhum';
                }else{
                $("#dia_ate").show();
                $("#mes_ate").show();
                $("#ano_ate").show();
                $("#ate").text("Até");
                $("#apenas").text("Apenas 1 Dia");
                $("#dia_ate").val( $('option:contains("01")').val() );
				$("#mes_ate").val( $('option:contains("01")').val() );
				$("#ano_ate").val( $('option:contains("2021")').val() );
                }

            }
           
        </script>

</head>
<style>
	body{
		background-color: #fff;
	}
	</style>

<body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<div class="container">

		<div class="creditCardForm">
			<div class="heading">

			</div>
			<div class="payment">
				<form method="post" action="pdf_atrasos.php">

					<div class="form-group" id="expiration-date">
						<label>De</label>

						<select class="select" name="dia">
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>


						<select class="select" name="mes">
							<option value="01">Janeiro</option>
							<option value="02">Fevereiro</option>
							<option value="03">Março</option>
							<option value="04">Abril</option>
							<option value="05">Maio</option>
							<option value="06">Junho</option>
							<option value="07">Julho</option>
							<option value="08">Agosto</option>
							<option value="09">Setembro</option>
							<option value="10">Outubro</option>
							<option value="11">Novembro</option>
							<option value="12">Dezembro</option>
						</select>



						<select class="select" name="ano">

							<option value="2021"> 2021</option>

                        </select>
                        
                        <label id="ate" style="font-family: 'Open Sans', sans-serif;margin-top:30px">Até</label>

						<select class="select" name="dia_ate" id="dia_ate">
                            
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
                            <option value="31">31</option>
                            <option value="Nenhum">Nenhum</option>
						</select>


						<select class="select" name="mes_ate" id="mes_ate">
                           
							<option value="01">Janeiro</option>
							<option value="02">Fevereiro</option>
							<option value="03">Março</option>
							<option value="04">Abril</option>
							<option value="05">Maio</option>
							<option value="06">Junho</option>
							<option value="07">Julho</option>
							<option value="08">Agosto</option>
							<option value="09">Setembro</option>
							<option value="10">Outubro</option>
							<option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                            <option value="Nenhum">Nenhum</option>
						</select>


						<select class="select" name="ano_ate" id="ano_ate">

                            
                            <option value="2021"> 2021</option>
                            <option value="Nenhum">Nenhum</option>
							
                        </select><a id="apenas" style="line-height: 2.5;">Apenas 1 Dia</a>
                    
                        <label style="font-family: 'Open Sans', sans-serif;margin-top:30px">Turmas</label>

			
						<select class="select" name="turmas" id="turmas">
						
						<?php while ($rows = mysqli_fetch_assoc($query)) { ?>
						
										<option value="<?php echo $rows['Turma']?>"><?php echo $rows['Turma']?></option>
										
										<?php }?>

                                        
							
						</select>



					</div>
					<div class="form-group" id="credit_cards">

					</div>
					<div class="form-group" id="pay-now">
						<button type="submit" class="btn btn-default">Confirmar</button>
					</div>

					<div class="form-group" id="pay-now">
                    <a href='alunos_professor.php' class="btn btn-default">Voltar</a>
					</div>
				</form>
			</div>
		</div>



	</div>
	
    <script type="text/javascript">
	//window.document.getElementById("turmas").value = 'Nenhum';
 

</body>

</html>
