<?php
	require_once("db.class.php");
	$objDb = new db();
    $escola = $objDb->nome;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics
<script async src="config.js"></script> -->

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">


    <link rel="stylesheet" href="home/animate.css">
    
    <link rel="stylesheet" href="home/owl.carousel.min.css">
    <link rel="stylesheet" href="home/flaticon.css">
    <link rel="stylesheet" href="home/icomoon.css">
	<link rel="stylesheet" href="home/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css	">
  </head>
  <body>
	  <div class="py-2 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
			    		<div class="col-md-5 pr-4 d-flex topper align-items-center">
			    			<div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text">Endereço</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Email</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text"> Telefone</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div style="padding: 10px;"class="container d-flex align-items-center">
	    	<a style="color: #000"class="navbar-brand" style="font-size: 50px;" href="index.html">
				<?php echo $escola;?>
			</a> <img src="imagens/logo.png" width="80px" height="80px">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.html" class="nav-link pl-0"></a></li>
	        	<!--<li class="nav-item"><a href="login_email.html" class="nav-link">Estudantes</a></li>-->
				<li class="nav-item"><a href="login.php" class="nav-link">Estudantes</a></li>
	        	<li class="nav-item"><a href="login_professor.php" class="nav-link">Escola</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div  class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">O FUTURO <span>COMEÇA AQUI</span></h1>
			<!--<p><a href="login_email.html" class="btn btn-primary px-4 py-3 mt-3">Painel Estudantes</a></p>-->
			<p><a href="login.php" class="btn btn-primary px-4 py-3 mt-3">Painel Estudantes</a></p>
			<p><a href="login_professor.php" class="btn btn-secondary px-4 py-3 mt-3">Painel Professores</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/slide.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">ENSINO<span> DE QUALIDADE</span></h1>
			<!--<p><a href="login_email.html" class="btn btn-primary px-4 py-3 mt-3">Painel Estudantes</a></p>-->
			<p><a href="login.php" class="btn btn-primary px-4 py-3 mt-3">Painel Estudantes</a></p>
			<p><a href="login_professor.php" class="btn btn-secondary px-4 py-3 mt-3">Painel Professores</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
					<span><img width="50px" height="50px" src="images/name.png"></span>
					
              </div>
              <div class="media-body p-2 mt-3">
				<h3 class="heading">Acesso</h3>
				
                <p style="font-size: 20px;">Sistema de acesso informatizado atendendo a Lei Distrital 6.648 de 26 de agosto de 2020. 
</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
				<h3 class="heading">Nossa Tecnologia</h3>
				<!--Nossa escola oferece servições tecnologicos exclusivos para pais, alunos e professores. que facilitam o acesso a informações acadêmicas, tais como: App disponivel para celulares Android, Site da escola com relatório de acesso do aluno, boletim virtual, bilhetes, registros disciplinares, etc...-->
                <p style="font-size: 20px;">Nossa tecnologia oferece sites modernos e aplicativos simples e intuitivos para acesso da direção, coordenação, professores, pais e estudantes.


</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Carteirinha </h3>
                <p style="font-size: 20px;">Moderna e personalizada para cada escola. Permite acesso à escola bem como informa os pais de toda a vida escola do estudante, inclusive o acesso ao boletim. A carteirinha também dá o direito de pagamento de meia entrada em eventos como cinema por exemplo.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Avisos</h3>
                <p style="font-size: 20px;">O sistema permite uma comunicação eletrônica entre escola, pais e estudante. A vida moderna exige a facilidade que a tecnologia pode oferecer. Bilhetes, agendas, boletins e tudo sobre a vida estudantil com apenas alguns clicks. 
</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		<!--
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">Nossa tecnologia</h2>
						<p style="color:black; font-size: 18px">Nossa escola oferece serviços tecnológicos exclusivos para pais, alunos e professores que facilitam o acesso a informações acadêmicas, tais como: App disponível para celulares Android, Site da escola com relatório de acesso do aluno, boletim virtual, bilhetes, registros disciplinares, etc...</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text">
										<h3>Carteirinha</h3>
										<p>Alunos novos ou alunos que precisam de uma segunda via, podem solicitar uma nova carteirinha através do site da escola. </p>
										
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text">
										<h3>Acesso</h3>
										<p>Todos os acessos e faltas dos alunos são registrados com data e hora.
</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text">
										<h3>Segurança</h3>
										<p>O sistema de acesso permite que apenas alunos liberados acessem a escola.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text">
										<h3>Praticidade</h3>
										<p>Com o sistema de avisos, os pais podem ser avisados em qualquer lugar.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text">
										<h3>Registros</h3>
										<p>Registros escolares feitos por professores podem ser visualizados no painel do aluno</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
			  <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
				<h2 class="mb-4"><span>Nossos</span> Alunos</h2>
				<p>--------------------------------------</p>
			  </div>
			</div>	
				<div class="row d-md-flex align-items-center justify-content-center">
					<div class="col-lg-10">
						<div class="row d-md-flex align-items-center">
					 
					  <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
						  <div class="text">
							<strong class="number" data-number="500">0</strong>
							<span>Ensino Fundamental</span>
						  </div>
						</div>
					  </div>
					
					  <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
						  <div class="text">
							<strong class="number" data-number="1500">0</strong>
							<span>Ensino Médio</span>
						  </div>
						</div>
					  </div>
				  </div>
			  </div>
			</div>
			</div>
		</section>

		
-->
		

   <!-- <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span></span> Says About Us</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-2.jpg)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-3.jpg)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-4.jpg)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
	<!--
	<section class="ftco-section contact-section">
		<div class="container">
		  <div class="row d-flex mb-5 contact-info">
			<div class="col-md-3 d-flex">
				<div class="bg-light align-self-stretch box p-4 text-center">
					<h3 class="mb-4">Endereço</h3>
				  <p>Planaltina setor tradicional quadra</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="bg-light align-self-stretch box p-4 text-center">
					<h3 class="mb-4">Telefone</h3>
				  <p><a href="">61998706181</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="bg-light align-self-stretch box p-4 text-center">
					<h3 class="mb-4">Email</h3>
				  <p>cef04@contato.com</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="bg-light align-self-stretch box p-4 text-center">
					<h3 class="mb-4">Site</h3>
				  <p><a href="#">cef4.com.br</a></p>
				</div>
			</div>
		  </div>
		</div>
	  </section>

    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.8">
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5 bg-primary">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	            <h2 class="mb-4">Envie uma mensagem</h2>
	           
	          </div>
	          <form action="#" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Primeiro nome">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Segundo nome">
							</div>
							
							
	    				</div>
						<div class="d-md-flex">
		    				<div class="form-group">
							<input type="text" class="form-control" placeholder="Email">
						</div>
						</div>
	    					
	    				<div class="d-md-flex">
							
	    					<div class="form-group">
		              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Mensagem"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
						<br>
		              <input type="submit" value="Enviar" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>
        </div>
    	</div>
    </section>
-->
   

		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      
    </footer>
    
  

  <!-- loader  -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>





  <script src="home/jquery.min.js"></script>
  <script src="home/jquery-migrate-3.0.1.min.js"></script>
  <script src="home/popper.min.js"></script>
  <script src="home/bootstrap.min.js"></script>
  <script src="home/jquery.easing.1.3.js"></script>
  <script src="home/jquery.waypoints.min.js"></script>
  <script src="home/jquery.stellar.min.js"></script>
  <script src="home/owl.carousel.min.js"></script>
  <script src="home/jquery.magnific-popup.min.js"></script>
  <script src="home/aos.js"></script>
  <script src="home/jquery.animateNumber.min.js"></script>
  <script src="home/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="home/google-map.js"></script>
  <script src="home/main.js"></script>
    
  </body>
</html>
