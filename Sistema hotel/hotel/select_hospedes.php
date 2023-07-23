<!doctype html>
<html lang="pt">
  <head>
  	<title>Listar Hóspedes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

<style>
.box7{
width:30%;
margin-left: 35%;
}
</style>
	</head>
	<body>
	<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">

					<h1 style="text-align:center; color:white;">HOTEL TROPICAL</h1>

					<div class="box7">
								<div class="contact-wrap w-100 p-md-5 p-4">
								<h3 style="text-align:center;" >LISTA DE HÓSPEDES</h3>
									
				      		<div  class="mb-4">
				      		</div>

									<form  action="insert_usuario.php" method="POST" >
										<div class="row">
										<?php
        require_once 'conexao.php';
        $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
        $select = $conexao->select('hospedis');        
        echo 'Lista de Hospedes<br><br>';
        foreach ($select as $hospedes) {
            echo '================'.'</br>';
            echo 'Id = '.$hospedes['idHospedis'].'</br>';
            echo 'Nome = '.$hospedes['nome'].'</br>';
            echo 'Telefone = '.$hospedes['telefone'].'</br>';
            echo 'Cpf = '.$hospedes['cpf'].'</br>';
            echo 'E-mail = '.$hospedes['email'].'</br>';
            
            echo '================'.'</br>';
        }
        ?>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Voltar" class="btn btn-primary">
													<a href="../index.html">Voltar</a>
													<div class="submitting"></div>
										
	</section>
	</body>
</html>

