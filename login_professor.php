<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="config.js"></script>


  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="dist_provisorio/assets_aluno/img/apple-icon.png">
  <link rel="icon" type="image/png" href="imagens/logo.png">
  <title>
    Login Professores
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

<body class="g-sidenav-show   bg-white">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">

      </div>
    </div>
  </div>
  <section>
    <div class="page-header section-height-75">
      <div class="container" style="margin:0">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Bem-Vindo(a) !</h3>
                <p class="mb-0">Digite o Usuário e a Senha para acessar</p>
              </div>
              <?php if (isset($_SESSION['msg_professor']) and $_SESSION['msg_professor'] != "NAO"){ ?>
                    <div style="justify-content: center; background-color: red"class="row px-xl-5 px-sm-4 px-3">
                      <div class="col-12 px-1">
                       <div style="color:white;padding: 15px"><?php echo $_SESSION['msg_professor'];?></div>
                      </div>
                    </div>
              <?php }else{ ;
				  }?>
			  
              </div>
              <div class="card-body">
                <form  method="post" action="validar_acesso_professor.php" role="form text-left">
                  
                  <label>Usuário</label>
                  <div class="mb-3">
                    <input type="text" name="usuario" class="form-control" placeholder="usuario" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <label>Senha</label>
                  <div class="mb-3">
                    <input class="form-control" type="password" name="senha" placeholder="Senha" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Continuar conectado</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Acessar</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Ainda não tem uma conta?
                  <a href="senha.php" class="text-info text-gradient font-weight-bold">Cadastrar</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('dist_provisorio/assets_aluno/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
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