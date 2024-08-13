<?php
 session_start();
 $origem = $_SESSION['origem'];
 require_once("db.class.php");
 $usuario = $_SESSION['usuario'];

 if(!isset ($_SESSION['logado_p'])){
   header('Location: login_professor.php');
 }

 if($_SESSION['origem'] != 'Dir'){
   echo "<script>alert('Sem permissão!!');document.location='aluno_professor.php';</script>";
 }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Motivos</title>

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
  <img src="http://147.135.119.222/api_web/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $usuario;?>.JPG" style="margin: 40px;margin-top:10px;text-aling:center" height="120px" width="100px" onerror="this.onerror=null; this.src='imagens/semFoto.png'">

    <h2>Suspensão</h2>

  </div>

  <div class="row">

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Motivos</h4>
      <form class="needs-validation" novalidate method="post" action="pdf_suspensao.php">


        <div class="row">



        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="a" name="a" value="após 3 advertências escritas.">
          <label class="custom-control-label" for="a">após 3 advertências escritas.</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="b" name="b" value="Sem passar pelas Advertências Escritas considerando a gravidade do Ato cometido pelo (a) mesmo (a).">
          <label class="custom-control-label" for="b">Sem passar pelas Advertências Escritas considerando a gravidade do Ato cometido pelo (a) mesmo (a).</label>
        </div>



        <hr class="mb-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="exampleFormControlTextarea1">Motivo:</label>
            <textarea style="width: 400px" class="form-control" id="exampleFormControlTextarea1" name="Motivo" rows="8" required></textarea>
            <div class="invalid-feedback">
              Digite o motivo:
            </div>

          </div>

        </div>

        <div class="col-md-6 mb-3">
            <label for="lastName">Quantidade de dias de suspensão: </label>
            <input type="text" class="form-control" name="dias" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite o numero de dias:
            </div>
          </div>


          <label for="lastName">Comparecer até o dia: </label>
          <div class="col-10">
          <br>
            <input class="form-control" name="data" type="date" format="dd/mm/yyyy" id="example-date-input">
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Responsável pelo aluno: </label>
            <input type="text" class="form-control" name="responsavel" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite o responsável pelo aluno:
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Professor(a) responsável: </label>
            <input type="text" class="form-control" name="professor" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite o professor:
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Procurar: </label>
            <input type="text" class="form-control" name="procurar" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite a quem procurar:
            </div>
          </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
        <a style="margin-bottom: 50px" href="aluno_professor.php"class="btn btn-primary btn-lg btn-block">Voltar</a>
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
