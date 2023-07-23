<?php
session_start();
ob_start();
include_once './conexao.php';
?>
<html lang="pt">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(img10.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Cadastro </h2>
				</div>


       
        <?php
		
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['login'])) {
            //var_dump($dados);

            $empty_input = false;

            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
            }

            if (!$empty_input) {
                $query_usuario = "INSERT INTO login (usuario, email,senha) VALUES (:usuario, :email, :senha) ";
                $cad_usuario = $conn->prepare($query_usuario);
                $cad_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
				$cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
                $cad_usuario->execute();
                if ($cad_usuario->rowCount()) {
                    unset($dados);
                    $_SESSION['msg'] =  "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                    header("Location: cadastrar.php");
                } else {
                    echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
                }
            }
        }
        ?>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		     

		      	<form action="cadastrar.php"  class="signin-form" name="login" method="post">

					
					
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
		      		</div>

					  <div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="E-mail" required>
					</div>

	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="senha" placeholder="Senha" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>


	            <div class="form-group">
	            	<input type="submit" class="form-control btn btn-primary submit px-3" name="login" >
	            </div>
	            
								
									<a href="index.html" style="color: #fff">Voltar</a>
								
	            </div>
	          </form>
	          
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

