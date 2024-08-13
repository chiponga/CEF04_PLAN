<!DOCTYPE html>
<html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>


	<title>Selecionar Aluno</title>
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

<body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<div class="container">

		<div class="creditCardForm">
			<div class="heading">

			</div>
			<div class="payment">
				<form method="post" action="pdf_faltas.php">

					<div class="form-group" id="expiration-date">
						<label>Turma</label>

						<select class="select" name="turma">
					 
						</select>

					<label>Aluno</label>
						<select class="select" name="aluno">
					
						</select>




					</div>
					<div class="form-group" id="credit_cards">

					</div>
					<div class="form-group" id="pay-now">
						<button type="submit" class="btn btn-default">Confirmar</button>
					</div>
				</form>
			</div>
		</div>



	</div>
	
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	//window.document.getElementById("turmas").value = 'Nenhum';
 

</body>

</html>
