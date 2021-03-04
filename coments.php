<?php
    session_start();
    if(!isset($_SESSION["id_usuario"])){
        header("location: index.php");
        exit;
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem-Vindo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="css/style_com.css">
</head>
<body style="background-color:#E5E5E5">
    <div class="image">
        <img src="img/image1.png">
    </div>
    <div class="image3">
        <img src="img/image3.png">
    </div>
    <form class="form">
        <div>
            <label class="text" for="">
                <input type="text" placeholder="Escreva um comentário...">
            </label>
        </div>
        <a class="botao_fin" href="exit.php">Finalizar</a>
        <button class="botao_env">Enviar</button>
        <div class= "usuario"> Bem vindo, </div>
        <div id = "user" class="user"></div>
    </form>
    <div class="frase">
        <p>Sua empresa ainda não é referência? Sem problemas, estamos aqui para ajudar.</p>
    </div>
    <div class = "click">
        <a href= "https://www.hidrosconsultoria.com.br/">Clique aqui</a>
    </div>
</body>
</html>