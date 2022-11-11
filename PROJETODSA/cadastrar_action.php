<?php
require 'config.php';

//Obtém uma variável externa específica por nome e, opcionalmente, a filtra 'filter_input'
$nome =  filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email ){

    //verificando se existe emails cadastrados anteriormente
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    //se não tiver, adiciona no banco o novo email 
    if($sql->rowCount()===0){
        //Associa um valor a um espaço reservado nomeado 'bindValue'
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        header("Location: index.php");
        exit;
    }else{
        header("cadastrar.php");
    }

}else{
    header("Location: cadastrar.php");
    exit;
}
