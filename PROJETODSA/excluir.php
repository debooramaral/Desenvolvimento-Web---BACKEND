<?php
require 'config.php';

//quando clicar no link de excluir, será passado o id do registro que será excluido
//coletamos o id
$id= filter_input(INPUT_GET, 'id');

//testar se o id de fato possui registro
if($id){
    //abrir a lógica e colocar a regra de exclusão
    $sql = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
    //ai é um conteudo variavel, não chamamos ainda o id referenciado acima
    //função que vai chamar o valor que recebemos acima
    $sql->bindValue(':id', $id);
    //fez a troca
    //agora executa
    $sql->execute();
}
header("Location: index.php");
?>