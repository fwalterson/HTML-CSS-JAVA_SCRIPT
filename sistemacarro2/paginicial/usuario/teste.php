<?php
include_once '../../conexao.php';
$sql = "SELECT * FROM usuario ORDER BY id DESC";

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
            width: auto;
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

    <div class="box">
        <form action="cadproduto.php" method="post">
            <fieldset>
           
               
            <h2>Configuração de Conta</h2>
    
    
    <table classe="tabela">
    <thead>
      <tr>
        <th>Nome </th>
        <th>Idade</th>
        <th>E-mail</th>
        <th>Sexo</th>
       
        <th>...</th>
         
        
         </tr>
         <thead>
       <tbody>
          <?php
          while ($user_data = mysql_fetch_assoc($result))
          {
   
           echo "<tr>";
            echo "<td>".$user_data['nome']."</td>";
            echo "<td>".$user_data['idade']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>".$user_data['sexo']."</td>";
            echo "<td>
            <a  href='edit.php?id=$user_data[id]'>
            
          <img  class='img' src='img/editar3.png'>
          </a>
        
          
           <a class='botdeletar' href='deletar.php?id=$user_data[id]'>
          <img  src='img/excluir.png'>
           </a>
            </td>";
         
           
          }
          ?>
     </tbody>
       </table>
        
      </tr>
      <thead>
    <tbody>
    </tbody>
    </table> 

                <br><br>
                <input type="submit" name="submit" id="submit">
                <br> <br>
                <a href="../index.html">Voltar
            </fieldset>
           
        </form>
    </div>
</body>
</html>