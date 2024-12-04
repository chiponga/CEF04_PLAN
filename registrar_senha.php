<?php
	session_start();
	$nome_professor = $_SESSION['nome_professor'];
	require_once("db.class.php");
	$origem =	$_SESSION['origem'];
	if(!isset ($_SESSION['logado_p'])){
			header('Location: login_professor.php');
    }
    
if($origem == 'Dir'){
	
}else{
  echo "<script>alert('Sem permissão!');document.location='alunos_professor.php';</script>";
}

	if(isset($_POST['senha'])){

        require_once("db.class.php");
          $senha = $_POST['senha'];
          $objDb = new db();
          $link = $objDb->conecta_mysql();
          $escola = $objDb->nome;

          $sql = "SELECT Senha FROM `senha` where Escola = '$escola'";
          $resultado = mysqli_query($link,$sql);
          if($resultado){
            $dados = mysqli_fetch_assoc($resultado);
        
          }
          echo $dados['Senha'];
          if($dados['Senha'] != null){
              $sql = "UPDATE `senha` SET `Senha`='$senha' where Escola = '$escola'";  
              $resultado_id = mysqli_query($link,$sql);
              if($resultado_id){
                  echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";
              }else{
                  echo "<script>alert('Erro ao Enviar!');document.location='alunos_professor.php';</script>";
              }
            }else{
              $sql = "INSERT INTO `senha`(`Senha`, `Escola`) VALUES ('$senha','$escola')";  
              echo $sql;
              $resultado_id = mysqli_query($link,$sql);
              if($resultado_id){
                  echo "<script>alert('Enviado com sucesso!');document.location='alunos_professor.php';</script>";
              }else{
                  echo "<script>alert('Erro ao Enviar!');document.location='alunos_professor.php';</script>";
              }
            }
        
      
      }
?>

<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!doctype html>
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Registrar Senha</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="">
    <div class="container">
  <div class="py-5 text-center">
    
 

  </div>

  <div class="row">
    
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Cadastro</h4>
      <form class="needs-validation" novalidate method="post" action="">
      
        

          <div class="col-md-6 mb-3">
            <label for="lastName">Senha: </label>
            <input type="text" class="form-control" name="senha" maxlength="50" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite a senha:
            </div>
          </div>



          <!--<a href="pdf_senha.php">PDF COM SENHA</a>-->
  
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
        <a href="alunos_professor.php" class="btn btn-danger btn-lg btn-block">Voltar</a>
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

