<?php
require_once "CLASSES/usuarios.php";
$u = new Usuario;
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bench Hidros</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body style="background-color:#E5E5E5">
    <div class="geral">
        <div class="image">
            <img src="img/image1.png">
        </div>
        <div class="image2">
            <img src="img/image2.png">
        </div>
        <div class="image3">
            <img src="img/image3.png">
        </div>
        <div class="container" method="POST" action="login.php">
            <div class="contentfirst-content">
                <form method= "POST" class="form" name= "login">
                    <label class="email" for="">
                        <input type="msg" placeholder="E-mail" name= "email">
                    </label>
                    <label class="password" for="">
                        <input type="password" placeholder="Senha" name= "senha">
                    </label>
                    <div class="forgot">
                        <a href="./senha.php" style="text-decoration: none;">Esqueceu a senha?</a>
                    </div>
                    <div class="conta">
                        <p>Não possui uma conta?</p>
                    </div>
                    <div class="cadastro">
                        <a
                            href="./cadastro.php" style="text-decoration: none;">cadastre-se</a>
                    </div>
                    <button class="botao">Entrar</button>
                </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST["email"])){
    $email=addslashes($_POST["email"]);
    $senha=addslashes($_POST["senha"]);

    if (!empty($email) && !empty($senha)){
        $u->conectar("bench_hidros", "localhost", "root", "");;

        if($u->msgError ==""){
            if($u->logar($email, $senha)){
                header("location: coments.php");
            }else{
                echo "Email e/ou senha incorretos! ou usuário não cadastrado, cadastre-se.";
            }
        }else{
            echo "Erro:".$u->msgErro;
        }


    }else{
        echo "Preencha todos os campos";
    }
}
?>
</body>

</html>