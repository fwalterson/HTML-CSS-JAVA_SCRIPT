<?php
session_start();
ob_start();
include_once '../../conexao.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        a{
            text-decoration:none;
            color:white;
        }
    </style>
</head>
<body>
<?php
		
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['submit'])) {
            $empty_input = false;

            $dados = array_map('trim', $dados);
         

            if (!$empty_input) {
                $query_usuario = "INSERT INTO produto (marca, modelo, ano, preco ) VALUES (:marca,
                 :modelo, :ano, :preco) ";
                $cad_usuario = $conn->prepare($query_usuario);
                $cad_usuario->bindParam(':marca', $dados['marca'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':modelo', $dados['modelo'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':ano', $dados['ano'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
            
                $cad_usuario->execute();
                if ($cad_usuario->rowCount()) {
                    unset($dados);
                    $_SESSION['msg'] =  "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                    header("Location: cadproduto.php");
                } else {
                    echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
                }
            }
        }
        ?>
    <div class="box">
        <form action="cadproduto.php" method="post">
            <fieldset>
                <legend><b>Cadastrar Produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="marca" id="marca" class="inputUser" required>
                    <label for="marca" class="labelInput">Marca </label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="modelo" id="modelo" class="inputUser" required>
                    <label for="modelo" class="labelInput">Modelo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="ano" id="ano" class="inputUser" required>
                    <label for="ano" class="labelInput">Ano</label>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="preco" id="preco" class="inputUser" required>
                    <label for="preco" class="labelInput">Preço</label>
                </div>
                
               
               

                <br><br>
                <input type="submit" name="submit" id="submit">
                <br> <br>
                <a href="../index.html">Voltar
            </fieldset>
           
        </form>
    </div>
</body>
</html>