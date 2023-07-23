<!doctype html>
<html lang="pt">
  <head>
  	<title>Alterar Funcionario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	<style>

.box{

	width:20%;
	margin-left:40%;
	
}
.box1{

	margin:center;
}
h1{
	text-align:center;
	color:white;
}
h3{
	text-aling:20%;
}
	</style>
	</head>
	<body>
		

	<section class="ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
		<div class="box1">
					<h1 ">HOTEL TROPICAL</h1>
			
		
					</div>
							<div class="box">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3>FUNCIONÁRIO</h3>
									
										<?php
    if( isset($_POST) && $_POST ){
        require_once 'conexao.php';
        $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);        
        $dados = array('idFuncionario' => 01, 'nome' => 'livro exemplo 03', 'telefone' => 'Livro de exemplo');        
        $insert = $conexao->update('funcionario', 'id', 1, $dados);        
        if($insert == true){
            echo 'alterado';
        }
    }
    ?>
    <form action="update2_funcionario.php" method="post">
    <fieldset>
     <h5 style="text-align:center;">Alterar Cadastro</h5>
        <div >
            <label>Id: </label>
            <input type="text" name="id" />
            <br><br>
</div>
			<input type="submit" value="Alterar" class="btn btn-primary">
			<a   href="../index.html">Voltar</a>
        </div>
    </fieldset>
											

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


 
	</body>
</html>

