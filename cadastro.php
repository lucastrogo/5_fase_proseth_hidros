<?php
    require_once "CLASSES/usuarios.php";
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.58">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Bench Hidros</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="css/style_cads.css">
</head>
<body>
    <div class="geral">
        <div class="image">
            <img src="img/image1.png">
        </div>
        <div class="image3">
            <img src="img/image3.png">
        </div>
        <form class="form" name= "cadastro" method="POST">
            <label class="name" for="">
                <input type="name" placeholder="Nome" name = "nome" maxlength="30">
            </label>
            <label class="email" for="">
                <input type="email" placeholder="E-mail" name= "email" maxlength="40">
            </label>
            <label class="senha" for="" >
                <input type="password" placeholder="Senha" name= "senha" maxlength="32">
            </label>
                <input type="submit" value = "Cadastrar" class = "botao">
            <div class="cadastrar">
                <p>Cadastre-se</p>
            </div>
        </form>
    </div>

<?php

 if (isset($_POST["nome"])){
    $nome=addslashes($_POST["nome"]);
    $email=addslashes($_POST["email"]);
    $senha=addslashes($_POST["senha"]);

    if (!empty($nome) && !empty($email) && !empty($senha)){
        $u -> conectar("bench_hidros", "localhost", "root", "");

        if ($u->msgErro == ""){

            if($u->cadastrar($nome, $email, $senha)){
                ?>
                <div class= "msg-sucesso">
                Cadastrado com sucesso! Acesse para entrar!
                </div>
                <?php
            } else{
                ?>
                <div class= "msg-email">
                Email já cadastrado!
                </div>
                <?php
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
        <div class= "msg-preencher">Preencha todos os campos!</div>
        <?php
    }
}

?>
</body>
</html>