<?php
	require_once("db.class.php");
	session_start();
	$objDb = new db();
    $escola = $objDb->nome;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="imagens/logo.png">
  <title>
   Login Alunos
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="dist_provisorio/assets_aluno/css/nucleo-icons.css" rel="stylesheet" />
  <link href="dist_provisorio/assets_aluno/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="dist_provisorio/assets_aluno/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="dist_provisorio/assets_aluno/css/soft-ui-dashboard.css?v=1.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container">
      
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link me-2" href="index.php">
              <i class="fa fa-user opacity-6  me-1"></i>
              Voltar
            </a>
          </li>

        </ul>
       
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <section class="h-100-vh mb-8">
    <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('dist_provisorio/assets_aluno/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Painel do(a) Estudante</h1>
            <p class="text-lead text-white">Use o código da carteirinha para acessar o site</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Acessar</h5>
            </div>
			<?php if ($_SESSION['msg'] == "SIM"){ ?>
            <div style="justify-content: center; background-color: red"class="row px-xl-5 px-sm-4 px-3">
              <div class="col-12 px-1">
               <div style="color:white;padding: 15px">Usuario ou senha incorretos</div>
              </div>
            </div>
			<?php }?>
            <div class="card-body">
              <form role="form text-left" method="post" action="validar_acesso.php">
                <div class="mb-3">
                  <input type="text" name="usuario" class="form-control" placeholder="Código" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" name="senha" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    Mantenha-me conectado
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Acessar</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="dist_provisorio/assets_aluno/js/core/popper.min.js"></script>
  <script src="dist_provisorio/assets_aluno/js/core/bootstrap.min.js"></script>
  <script src="dist_provisorio/assets_aluno/js/plugins/smooth-scrollbar.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="dist_provisorio/assets_aluno/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>