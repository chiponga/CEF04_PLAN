<?php
 session_start();
 $origem = $_SESSION['origem'];
 require_once("db.class.php");
 $usuario = $_SESSION['usuario'];

 if(!isset ($_SESSION['logado_p'])){
   header('Location: login_professor.php');
 }

 if($_SESSION['origem'] != 'Dir'){
   if($_SESSION['origem'] != 'Coor'){
   echo "<script>alert('Sem permissão!!');document.location='aluno_professor.php';</script>";
   }
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


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>


  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img src="http://147.135.119.222/api_web/0xasljkdfhsjkfhssdfsfsfasfewrqwr/<?php echo $usuario;?>.JPG" style="margin: 40px;margin-top:10px;text-aling:center" height="120px" width="100px" onerror="this.onerror=null; this.src='imagens/semFoto.png'">

    <h2>Advertência</h2>

  </div>

  <div class="row">

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Motivos</h4>
      <form class="needs-validation" novalidate method="post" action="pdf_advertencia.php">


        <div class="row">



        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="a" name="a" value="Conversa Excessiva">
          <label class="custom-control-label" for="a">Conversa Excessiva</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="b" name="b" value="Chegou atrasado (a) em sala na mudança de horário">
          <label class="custom-control-label" for="b">Chegou atrasado (a) em sala na mudança de horário</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="c" name="c" value="Não realizou as atividades propostas em classe ou extraclasse">
          <label class="custom-control-label" for="c">Não realizou as atividades propostas em classe ou extraclasse</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input"id="d" name="d" value="Ocupando-se de outra atividade em sala de aula">
          <label class="custom-control-label"for="d">Ocupando-se de outra atividade em sala de aula</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="e" name="e" value="Não trouxe material essencial para atividades na aula">
          <label class="custom-control-label" for="e">Não trouxe material essencial para atividades na aula</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="f" name="f" value="Saiu da sala sem autorização">
          <label class="custom-control-label" for="f">Saiu da sala sem autorização</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="g" name="g" value="Uso do celular em sala de aula ou Aparelho eletrônico">
          <label class="custom-control-label" for="g">Uso do celular em sala de aula ou Aparelho eletrônico</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="h" name="h" value="Desobediência ao professor">
          <label class="custom-control-label" for="h">Desobediência ao professor</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="i" name="i" value="Sem uniforme de Educação Física">
          <label class="custom-control-label" for="i">Sem uniforme de Educação Física</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="j" name="j" value="Agressão Verbal">
          <label class="custom-control-label" for="j">Agressão Verbal</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="k" name="k" value="Agressão Física">
          <label class="custom-control-label" for="k">Agressão Física</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="l" name="l" value="Desrespeito ou agressão verbal ao professor">
          <label class="custom-control-label" for="l">Desrespeito ou agressão verbal ao professor</label>
        </div>


        <hr class="mb-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="exampleFormControlTextarea1">Outro:</label>
            <textarea style="width: 400px" class="form-control" id="exampleFormControlTextarea1" name="m" rows="8"></textarea>


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
            <label for="lastName">Coodenador(a) responsável: </label>
            <input type="text" class="form-control" name="coo" placeholder="" value="" required>
            <div class="invalid-feedback">
              Digite o coordenador:
            </div>
            <div style="margin-top: 20px; padding: 10px 0;"class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="p" name="p" value="Solicitar">
          <label style="font-size: 20px"class="custom-control-label" for="p">Solicitar presença do responsável</label>
        </div>
          </div>



        <label for="lastName">Comparecer até o dia: </label>
        <div class="col-10">
        <br>
        

          <input class="form-control" name="data" type="date" format="dd/mm/yyyy" id="example-date-input">
        </div>


        <div class="col-md-6 mb-3">
            <label for="lastName">Procurar: </label>
            <input type="text" class="form-control" name="procurar" placeholder="" value="" required>
            
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
        <script src="form-validation.js"></script></body>
</html>
