<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>

    <style> 
    *
    {
        margin: 0;
        padding: 0;
    }
    .tablero
    {
        width: 800px;
        height: 800px;
    }

    table {
        border: 1px solid green;
        width: 100%;
        height: 100%;
        border-collapse: collapse;
    }
    
    td {
        border: 1px solid green;
        text-align: center;
    }

    /*CASILLA BLANCA*/
    td.blanco
    {
        background-color: white;    
    }

    /*CASILLA NEGRA*/
    td.negro
    {
        background-color: black;
    }

    /*PIEZAS NEGRAS*/
    td.PABL
    {
        background-color: green;
    }

    td.ROBL
    {
        background-color: green;
    }
    td.KNBL
    {
        background-color: green;
    }
    td.BIBL
    {
        background-color: green;
    }
    td.QUBL
    {
        background-color: green;
    }
    td.KIBL
    {
        background-color: green;
    }
    



    /*PIEZAS BLANCAS*/
    td.PAWH
    {
        background-color: red;
    }

    td.ROWH
    {
        background-color: red;
    }

    td.KNWH
    {
        background-color: red;
    }

    td.BIWH
    {
        background-color: red;
    }

    td.QUWH
    {
        background-color: red;
    }

    td.KIWH
    {
        background-color: red;
    }

    </style>

    <body>
            <?php

            ini_set('display_errors', 'On');
            ini_set('html_errors', 0);


            function tableroVacio()
            {
                // CREAR TABLERO
                $filas = 8;
                $columnas = 8;

                $tablero = array([$filas],[$columnas]);


                for ($fila=$filas -1; $fila >= 0 ; $fila--) { 
                    
                    for ($columna=0; $columna < $columnas; $columna++) { 
                        if ((($fila + $columna) % 2) != 0) 
                        {
                            $tablero[$fila][$columna] = "0000";
                            
                        }
                        else 
                        {
                            $tablero[$fila][$columna] = "####";
                        }
                    }
                }

                return $tablero;
            }    

            function tableroInicio()
            {
                 // CREAR TABLERO
                 $filas = 8;
                 $columnas = 8;
 
                 $tablero = array([$filas],[$columnas]);
 
 
                 for ($fila=$columnas - 1; $fila >= 0 ; $fila--) { 
                     
                    if ($fila == 0) 
                    {
                        array("ROBL","KNBL","BIBL","QUBL","KIBL","BIBL","KNBL","ROBL");
                    }
                    elseif ($fila == 1) 
                    {
                        for ($columna=0; $columna < $columnas; $columna++) { 
                            $tablero[$fila][$columna] = "PABL";
                        }
                    }
                    elseif ($fila == 6) 
                    {
                        for ($columna=0; $columna < $columnas; $columna++) { 
                            $tablero[$fila][$columna] = "PAWH";
                        }
                    }
                    elseif ($fila == 7)
                    {
                        array("ROWH","KNWH","BIWH","QUWH","KIWH","BIWH","KNWH","ROWH");
                    }
                    else 
                    {
                        for ($columna=0; $columna < $columnas; $columna++) 
                     { 
                         if ((($fila + $columna) % 2) != 0) 
                         {
                             $tablero[$fila][$columna] = "0000";
                             
                         }
                         else 
                         {
                             $tablero[$fila][$columna] = "####";
                         }
                     }
                    }

                     
                 }
 
                 return $tablero;
            }
            


            function pintarTablero($tablero)
            {
                // PINTAR TABLERO
            echo "<table>";

            for ($i=0; $i < 8; $i++) 
            { 
                //FILAS
                echo "<tr>";
                
                    for ($y=0; $y < 8; $y++) { 
                        // COLUMNAS
                        
                        $casilla = $tablero[$i][$y];

                        // Casilla Blanca
                        if ($casilla == "0000") 
                        {
                            echo "<td class=\"blanco\">";
                            echo "</td>";
                        }
                        // Casilla Negra
                        elseif ($casilla == "####")
                        {
                            echo "<td class=\"negro\">";
                            echo "</td>";
                        }

                        // Piezas Negras
                        elseif ($casilla == "PABL") 
                        {
                            echo "<td class=\"PABL\">";
                            echo "</td>";
                        }
                        elseif ($casilla == "ROBL") 
                        {
                            # code...
                        }
                        elseif ($casilla == "KNBL") 
                        {
                            # code...
                        }
                        elseif ($casilla == "BIBL") 
                        {
                            # code...
                        }
                        elseif ($casilla == "QUBL") 
                        {
                            # code...
                        }
                        elseif ($casilla == "KIBL") 
                        {
                            # code...
                        }
                        // Piezas Blancas
                        elseif ($casilla == "ROWH") 
                        {
                            # code...
                        }
                        elseif ($casilla == "KNWH") 
                        {
                            # code...
                        }
                        elseif ($casilla == "BIWH") 
                        {
                            # code...
                        }
                        elseif ($casilla == "QUWH") 
                        {
                            # code...
                        }
                        elseif ($casilla == "KIWH") 
                        {
                            # code...
                        }
                        elseif ($casilla == "PAWH") 
                        {
                            echo "<td class=\"PAWH\">";
                            echo "</td>";
                        }

                        
                    }

                echo "</tr>";   
                
                }
                echo "</table>";
            }
            

            $tablero = tableroInicio();
            echo "<div class=\"tablero\">";
            pintarTablero($tablero);

            echo "</div>";
            ?>
    </body>
</html>