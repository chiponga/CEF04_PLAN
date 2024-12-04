
<?php
session_start();

require_once("db.class.php");

	$objDb = new db();
	$link = $objDb->conecta_mysql();
  $escola = $objDb->nome;
	$sql_entrada = "SELECT Senha FROM `senha` where Escola = '$escola'";
	$resultado_entrada = mysqli_query($link,$sql_entrada);

	if($resultado_entrada){
		$dados_entrada = mysqli_fetch_assoc($resultado_entrada);

    }

    $senha_b = $dados_entrada['Senha'];

if(isset ($_POST['senha'])){
$senha = $_POST['senha'];

if($senha == $senha_b){
    echo "<script>document.location='cadastro_professor.php';</script>";
}else{
    echo "<script>alert('Senha incorreta! Procure a direção ou coordenação de sua escola.');</script>";
}
}

?>

<!doctype html>
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Senha</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">



  </div>

  <div class="row">

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Senha para cadastro dos docentes:</h4>
      <form class="needs-validation" novalidate method="post" action="">







          <div class="col-md-6 mb-3">
            <label for="lastName">Digite a senha para realizar o cadastro: </label>
            <input type="text" class="form-control" name="senha" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite a senha:
            </div>
          </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
        <a class="btn btn-danger btn-lg btn-block" href="login_professor.php" type="submit">Voltar</a>
      </form>
    </div>
  </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script >// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())</script></body>
</html>
