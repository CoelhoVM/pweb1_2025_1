<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $nome = "Vitórya";

        echo "<br>Hello world PHP, $nome";

        $idade = 18;

        if($idade < 18){

            echo "<br>$nome, é menor de idade";

        } else {

            echo "<br>$nome, é maior de idade";
        }
            
        $notas = [7, 6, 5, 8, 9];

        for ($i = 0; $i < count($notas); $i++){

            if($notas[$i] > 6){

                echo "<br>$notas[$i]";
    
            }
           
        }

        $alunos = ["Vitórya", "flavia", "jackson", "alisson", "lucas"];

        
        for ($i = 0; $i < count($alunos); $i++){

            if($i == 0 || $i == 4){

                echo "<br>$alunos[$i]";
    
            }
           
        }


    ?>


</body>
</html>