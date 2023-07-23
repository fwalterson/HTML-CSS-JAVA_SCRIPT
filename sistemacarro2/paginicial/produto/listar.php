<?php
session_start();
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
            width: 20;
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
       
    </style>
</head>
<body> 

    <div class="box">
        <form action="../index.html" method="post">
            <fieldset>
                <legend><b>Lista de Produto</b></legend>
                <br>
             
                <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        
        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        //var_dump($pagina);

        //Setar a quantidade de registros por página
        $limite_resultado = 40;

        // Calcular o inicio da visualização
        $inicio = ($limite_resultado * $pagina) - $limite_resultado;


        $query_usuarios = "SELECT id, marca,modelo, ano ,preco FROM produto ORDER BY id DESC LIMIT $inicio, $limite_resultado";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        if (($result_usuarios) AND ($result_usuarios->rowCount() != 0)) {
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                //var_dump($row_usuario);
                extract($row_usuario);
                //echo "ID: " . $row_usuario['id'] . "<br>";
               
                echo "Marca: $marca <br>";
                echo "Modelo: $modelo <br>";
                echo "Ano: $ano <br>";
                echo "Preço: $preco <br><br>";
                
                echo "<a href='editar.php?id=$id'>Editar</a><br>";
                echo "<a href='apagar.php?id=$id'>Apagar</a><br>";
                echo "<hr>";
            }

            //Contar a quantidade de registros no BD
            $query_qnt_registros = "SELECT COUNT(id) AS num_result FROM usuario";
            $result_qnt_registros = $conn->prepare($query_qnt_registros);
            $result_qnt_registros->execute();
            $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);
 //Quantidade de página
 $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);

 // Maximo de link
 $maximo_link = 2;

 echo "<a href='listar.php?page=1'>Primeira</a> ";

 for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
     if ($pagina_anterior >= 1) {
         echo "<a href='listar.php?page=$pagina_anterior'>$pagina_anterior</a> ";
     }
 }

 echo "$pagina ";

 for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
     if ($proxima_pagina <= $qnt_pagina) {
         echo "<a href='listar.php?page=$proxima_pagina'>$proxima_pagina</a> ";
     }
 }

 echo "<a href='listar.php?page=$qnt_pagina'>Última</a> ";
} else {
 echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
}
        
        ?>
             
               

                <br><br>
                <input type="submit" name="submit" id="submit" value="Voltar">
            </fieldset>
        </form>
    </div>
</body>
</html>