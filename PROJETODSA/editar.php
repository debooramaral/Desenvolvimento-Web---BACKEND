<link rel="stylesheet" href="estilo.css">

<?php
require 'config.php';

//variavel para guardar os registros do banco
$usuario = [];
//captura-se o dado que o usuário selecionou, pela variavel.. chegando um campo de entrada, pela url 'id'
$id = filter_input(INPUT_GET, 'id');
if($id){
    //pode-se usar a query
    //consulta no banco de dados e = ao identificador 'id' da url
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    //deu tudo certo.. vai voltar com um valor essa variavel sql, mas um valor com varias informações (id, nome e email)
    if($sql->rowCount()>0){
        //mapeamos dizendo que há informações no banco de dados sim
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        //caso um id não registrado, seja solicitado para mostrar/aparecer
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
}
?>

<h1>Editar Usuário</h1>
<form method="POST" action="editar.action.php">
    <!-- precisamos mostrar o registro em questão, da pagina anterior; usamos aquela sintaxe intrigante -->
    <input type="hidden" name="id" value="<?=$usuario['id'];?>">
    <label>Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>"></label>
    <label>E-Mail: <input type="text" name="email" value="<?=$usuario['email'];?>"></label>
    <input class="atualizar" type="submit" value="Atualizar">
</form>