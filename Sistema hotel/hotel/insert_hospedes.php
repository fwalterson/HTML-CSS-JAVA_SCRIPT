<!doctype html>
<html lang="pt">
  <head>
  	<title>Cadastrar Hóspedes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
<style>
	.botao{
display: inline;
	}

</style>
	</head>
	<body>
		

	<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">HOTEL TROPICAL</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5">
									<h3 class="mb-4">CONTATO</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>ENDERECO:</span>Av. Coronel Teixeira, 1320, Ponta Negra, Manaus - AM, </p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>TELEFONE:</span> <a href="tel://1234567920">92 30421017</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">recepcao@tropicalexecutive.com.br </a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Website</span> <a href="#">tropicalhotel.com</a></p>
					          </div>
				          </div>
			          </div>
							</div>
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">HÓSPEDES</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form  action="insert_hospedes.php" method="POST" >
										<div class="row">
										<?php
										
										if( isset($_POST) && $_POST ){
										   require_once 'conexao.php';
										   $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);        
										   $dados = array('nome' => $_POST['nome'], 'telefone' => $_POST['telefone'], 'cpf' => $_POST['cpf'],'email' => $_POST['email']);        
										   $insert = $conexao->insert('hospedis', $dados);        
										   if($insert == true){
											  echo ' Cadastrado com sucesso!<br>';
										   } else {
											   echo 'Erro ao inserir!';
										   }
										}
									?>
       
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="nome"  placeholder="Nome">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="text" class="form-control" name="telefone" placeholder="Telefone">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="cpf"   placeholder="Cpf">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input name="email" class="form-control"  placeholder="E-mail">
												</div>
											</div>
											<div class="botao">
								
													<input type="submit" value="Cadastrar" class="btn btn-primary">
												
													<a   href="../index.html">Voltar</a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>
 
	</body>
</html>

