<?php

    $nota = []; //iniciar o vetor
    $nota[1] = 3;
    $nota[2] = 8;
    $nota[3] = 5;
    $nota[4] = 9;

    echo "A nota é = $nota[1] <br>";

    $media = ($nota[1]+$nota[2]+$nota[3]+$nota[4]) / 4;

    echo "A média é ".$media."<br>";

    $situacao = $media >= 6 ? "Aprovado" : "Reprovado";

    echo "Situação ~> ".$situacao."<br>";

    echo"<hr>";

    //percorre o array e pegou o primeiro valor armazenado.. ou seja, ele mostra o valor de dentro do array, a partir de um parametro informado/declarado
    echo"Para testar o ~ foreach ~ <br>";    
    foreach ($nota as $n){
        echo $n."<br";
    }
    echo "<br><hr>";

    // para ver os valores dentro do array
    echo"Para ver os valores e posições dentro do array  ~ print_r ~<br>";
    print_r($nota);

?>