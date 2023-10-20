<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<style>
    table {
        border: 1px solid ;
        width: 100px;
        background-color: red;
        border-collapse: collapse;
    }

    td {
        border: 1px solid;
        text-align: center;
    }

</style>

<body>

    

    <?php

        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        $matriz = array(
            array("x","o","x"),
            array("x","o","x"),
            array("x","o","x"),
        );

        echo "<table>";

        for ($i=0; $i < 3; $i++) 
        { 
            //FILAS
            echo "<tr>";
            
                for ($y=0; $y < 3; $y++) { 
                    // COLUMNAS
                    echo "<td>";
                    echo $matriz[$i][$y];
                    echo "</td>";
                }

            echo "</tr>";   
            }

        echo "</table>";
    ?>

    
</body>
</html>