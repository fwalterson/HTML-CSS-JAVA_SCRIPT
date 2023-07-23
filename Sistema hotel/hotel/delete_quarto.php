<!doctype html>
<html lang="pt">
  <head>
  	<title>Deletar Quarto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
<style>
	.box5{

		width: 25%;
	margin-left:37%;
	}
	h1{
		color:white; 
		text-align:center;
	}
</style>
	</head>
	<body>
	<?php
        if( isset($_POST) && $_POST ){
        require_once 'conexao.php';
        $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);        
        
        $delete = $conexao->delete('quartos', 'idQuartos', $_POST['idQuartos']);        
        if($delete == true){
            if(mysql_affected_rows()){
                echo 'Quarto excluido com sucesso!';
            } else {
                echo 'Quarto não Registrado!';
            }
        } else {
                echo 'Erro ao tentar excluir o Quarto!';
        }   
    }
    ?>
		

	<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
		
					<h1>HOTEL TROPICAL</h1>

					<div class="wrapper">
						<div class="row no-gutters justify-content-between"></div>
						<div class="col-lg-6 d-flex align-items-stretch"> </div>
						

					<div class="box5">
						<div class="contact-wrap w-100 p-md-5 p-4">
						<h2 style="text-align:center;">QUARTOS</h2>
        
    <form action="delete_quarto.php" method="post">
    <fieldset>
	<legend>Excluir Quarto</legend>
        <div >
            Id: <input type="text" name="idQuarto" /><br><br>
            <input type="submit" value="Excluir" />
			<a   href="../index.html">Voltar</a>
        </div>
    </fieldset>
											<div class="col-md-12">
												<div class="form-group">
													
													<div class="submitting"></div>
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

