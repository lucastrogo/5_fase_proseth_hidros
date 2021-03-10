<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $msgErro;
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
            $msgErro=$e->getMessage();
        }
    }
    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        global $msgErro;
        $sql=$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount()>0){
            return false;
        } else{
            $sql=$pdo->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (:n, :e, :t)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":t",md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;
        $sql=$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :t");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":t",md5($senha));
        $sql->execute();
        if($sql->rowCount()>0){
            $dado=$sql->fetch();
            session_start();
            $_SESSION["id_usuario"]=$dado["id_usuario"];
            return true;
        }else{
            return false;
        }
    }

    public function deslogar(){
        header("location:index.php");
        exit;
    }

    public function isEmailCad($u, $nome, $senha, $email) {
        $email = trim($email); // in case there's any whitespace

        if((mb_substr($email, -10) == '@gmail.com') == True ){
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
        }else{
                echo "Email não se encaixa no padrão gmail";
            }
        }
}

