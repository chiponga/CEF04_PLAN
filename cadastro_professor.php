
<?php
require_once("db.class.php");
session_start();
$objDb = new db();

$escola = $objDb->nome;

/*if(!isset ($_SESSION['logado_p'])){
	header('Location: login_professor.php');
}
*/
if(isset ($_POST['Nome'])){

    $nome = $_POST['Nome'];
    $usuario =  $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];
   // $senha = substr($usuario, 0, 3);
    $disciplina = $_POST['disciplina'];

  if($senha == $confirmar){

 
    $sql = "INSERT INTO `login`(`Usuario`, `Nome`, `Senha`, `Origem`, `Liberacao`, `Disciplina`, `Escola`) VALUES ($usuario,'$nome','$senha','Prof', 'N', '$disciplina', '$escola')";
			
    $link = $objDb->conecta_mysql();
    $resultado_id = mysqli_query($link,$sql);
			if($resultado_id){
				echo "<script>alert('Enviado com sucesso!');document.location='index.php';</script>";
			}else{
             

    echo "Ocorreu o seguinte erro";
			}
    }else{
      echo "<script>alert('As senhas não são iguais');</script>";
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

<!doctype html>
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Cadastro professor</title>

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

  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">



  </div>

  <div class="row">

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Cadastro</h4>
      <form class="needs-validation" novalidate method="post" action="">








        <div class="col-md-6 mb-3">
            <label >Número da matrícula ou CPF: </label>
            <input type="text" class="form-control" name="usuario" placeholder="" value="" required>
            <small>Usar esse campo como seu usuário</small>
            <div class="invalid-feedback">
              Digite o número da matrícula ou CPF:
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label >Nome Completo: </label>
            <input type="text" class="form-control" name="Nome" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite o Nome:
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label> Crie uma senha: </label>
            <input type="text" class="form-control" name="senha" maxlength="50" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite a senha:
            </div>
          </div>
          
          <div class="col-md-6 mb-3">
            <label >Confirmar senha: </label>
            <input type="text" class="form-control" name="confirmar" maxlength="50" placeholder="" value="" required>
            <div class="invalid-feedback">
             Confirme a senha:
            </div>
          </div>

          <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Disciplina / Função</label>
            <select class="custom-select d-block w-100" name="disciplina" id="country" required>
              <option>Apoio</option>
              <option>Artes</option>
              <option>BD1</option>
              <option>BD2</option>
              <option>Biologia</option>
              <option>Ciências</option>
              <option>Coordenador</option>
              <option>Diretor</option>
              <option>Disciplinador</option>
              <option>DTW</option>
              <option>Ed. Física</option>
              <option>ELI</option>
              <option>EMP</option>
              <option>EMPA</option>
              <option>EMPM</option>
              <option>Ens. Religioso</option>
              <option>Ens. Religioso</option>
              <option>Espanhol</option>
              <option>Filosofia</option>
              <option>Física</option>
              <option>Geografia</option>
              <option>História</option>
              <option>INC</option>
              <option>Inglês</option>
              <option>LP1</option>
              <option>LP2</option>
              <option>LP3</option>
              <option>Matemática</option>
              <option>MC</option>
              <option>Merendeira</option>
              <option>Monitor</option>
              <option>OPM</option>
              <option>PD</option>
              <option>PD1</option>
              <option>PD2</option>
              <option>PD3</option>
              <option>Portaria</option>
              <option>Português</option>
              <option>PW</option>
              <option>Química</option>
              <option>RC</option>
              <option>ROB</option>
              <option>Servidor</option>
              <option>Sociologia</option>
              <option>Supervisor</option>
              <option>Vice-Diretor</option>
              <option>Vigilante</option>
       
            </select>
            <div class="invalid-feedback">
              Selecione a Disciplina.
            </div>
          </div>




          <div class="col-md-6 mb-3">
          <label for="lastName">Data de Nascimento: </label>
          <input type="text" class="form-control" name="data" placeholder="Ex: 00/00/000" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
            <div class="invalid-feedback">
              Digite a Data:
            </div>
          </div>




        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
        <a href="index.php" class="btn btn-primary btn-lg btn-block" type="submit">Voltar</a>
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
