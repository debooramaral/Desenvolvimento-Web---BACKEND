<?php
    require 'config.php';

    
    $lista = [];
    $sql = $pdo->query("SELECT * FROM usuario");
    //faz uma consulta no banco, utiliza a query e diga de que tabela

    //verificou se há usuarios, na linha, sendo maior que 0
    if($sql->rowCount()>0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

?>

<link rel="stylesheet" href="estilo.css">

<h1 class="titulo">Listagem de Usuário'S</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <!-- mostrar, fazer aparecer os dados do banco de dados -->
    <!-- para toda informação que constar na lista, cada um dos registros da variavel lista, linha a linha vamos jogar na variavel usuário -->
    <?php foreach($lista as $usuario):?>
        <tr>
            <!-- sintaxe que faz aparecer os dados na tabela . . intrigada com a maneira de escrever '< ? php = $ . . . ' -->
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td>
                <!-- definição do id de cada registro no navegador..  -->
                <a class="editar" href="editar.php?id=<?=$usuario['id'];?>">[ EDITAR ]</a>
                <a class="excluir" href="excluir.php?id=<?=$usuario['id'];?>">[ EXCLUIR ]</a>
            </td>
        </tr>
    <?php endforeach;?>
</table><br>
<a class="cadastre" href="cadastrar.php">Cadastrar Usuário</a>




    