<?php
    session_start();
    if(!isset($_SESSION["id_usuario"])){
        header("location: index.php");
        exit;
    } else{
        require_once "CLASSES/usuarios.php";
        $u = new Usuario;
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem-Vindo, envie seu bench.</title>
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
    <form class="form" method="POST">
        <div>
            <label class="text" for="">
                <input name = "comentario" type="text" placeholder="Escreva um comentário...">
            </label>
        </div>
        <button  class="botao_env">Enviar</button>
        <div class= "usuario"> Bem vindo</div>
        <div id = "user" class="user"></div>
    </form>
    <button onclick="location.href='index.php'" class="botao_fin" >Finalizar</button>
    <div class="frase">
        <p>Sua empresa ainda não é referência? Sem problemas, estamos aqui para ajudar.</p>
    </div>
    <div class = "click">
        <a href= "https://www.hidrosconsultoria.com.br/">Clique aqui</a>
    </div>
<?php
    if (isset($_POST["comentario"])){
        $comentario=addslashes($_POST["comentario"]);

        if (!empty($comentario)){
            if ($u->msgErro == ""){
                    $receiver = "troodita@gmail.com";
                    $subject = "O seguinte Bench foi pedido:";
                    $sender = "De: Lucas Trogo";
                    if(mail($receiver, $subject, $comentario, $sender)){
                        echo "Bench enviado. Em breve será respondido, obrigado pelo contato.";
                    }else{
                        echo "Bench não enviado";
                    }
            } else{
                ?>
                <div class= "error">
                 <?php echo "Erro: ".$u->msgErro;?>
                </div>
                <?php
            }
        }else{
            ?>
            <div class= "msg-preencher">Preencha o campo!</div>
            <?php
        }
    }
?>
</body>
</html>
