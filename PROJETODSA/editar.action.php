<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//SE HÁ OS 3 DADOS CERTINHO LA NO BANCO, ATUALIZAMOS
if($id && $nome && $email){
    //atualize a tabela de usuário, atribuindo a coluna nome e email, um valor/dado que chegou pra gente
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    //a ordem não interfere, pois usamos o bindValue
    //passamos as informações para as variaveis sql
    $sql->execute();
    header("Location: index.php");
    exit;
}else{
    echo"aqui";
    // header("Location: index.php");
    // exit;
}