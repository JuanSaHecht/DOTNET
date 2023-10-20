<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .board {
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

    /*WHITE SQUARE*/
    td.white {
        background-color: white;
    }

    /*BLACK SQUARE*/
    td.black {
        background-color: black;
    }

    /*BLACK PIECES*/
    td.PABL {
        background-color: green;
    }

    td.ROBL {
        background-color: green;
    }

    td.KNBL {
        background-color: green;
    }

    td.BIBL {
        background-color: green;
    }

    td.QUBL {
        background-color: green;
    }

    td.KIBL {
        background-color: green;
    }




    /*WHITE PIECES*/
    0 td.PAWH {
        background-color: red;
    }

    td.ROWH {
        background-color: red;
    }

    td.KNWH {
        background-color: red;
    }

    td.BIWH {
        background-color: red;
    }

    td.QUWH {
        background-color: red;
    }

    td.KIWH {
        background-color: red;
    }
</style>

<body>
    <?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);


    function CreateEmptyBoard()
    {
        $rows = 8;
        $columns = 8;

        $board = array([$rows], [$columns]);


        for ($row = $rows - 1; $row >= 0; $row--) {

            for ($column = 0; $column < $columns; $column++) {
                if ((($row + $column) % 2) != 0) {
                    $board[$row][$column] = "0000";

                } else {
                    $board[$row][$column] = "####";
                }
            }
        }

        return $board;
    }

    // function tableroInicio()
    // {
    //     // CREAR TABLERO
    //     $rows = 8;
    //     $columns = 8;

    //     $tablero = array([$rows], [$columns]);

        
    //         for ($row = $columns - 1; $row >= 0; $row--) 
    //         {

    //             if ($row != 0 && $row != 1 && $row != 6 && $row != 7) 
    //             {
    //                 for ($column = 0; $column < $columns; $column++) 
    //                 {
    //                     if ((($row + $column) % 2) != 0) {
    //                         $tablero[$row][$column] = "0000";

    //                     } else {
    //                         $tablero[$row][$column] = "####";
    //                     }
    //                 }  
    //             } 
    //             elseif ($row == 0) 
    //             {
    //                 $tablero[$row]="ROBL", "KNBL", "BIBL", "QUBL", "KIBL", "BIBL", "KNBL", "ROBL";
    //             } 
    //             elseif ($row == 1) 
    //             {
    //                     for ($column = 0; $column < $columns; $column++) {
    //                         $tablero[$row][$column] = "PABL";
    //                     }
    //             } 
    //             elseif ($row == 6) 
    //             {
    //                     for ($column = 0; $column < $columns; $column++) {
    //                         $tablero[$row][$column] = "PAWH";
    //                     }
    //             } 
    //             elseif ($row == 7) 
    //                 {
    //                     array("ROWH", "KNWH", "BIWH", "QUWH", "KIWH", "BIWH", "KNWH", "ROWH");
    //                 }
    //         }
            
       



    //     }

        
    



    function DrawChessGame($board)
    {
        echo "<table>";

        for ($i = 0; $i < 8; $i++) {
            //rows
            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                // columns
    
                $square = $board[$i][$y];

                //  White Square
                if ($square == "0000") {
                    echo "<td class=\"white\">";
                    echo "</td>";
                }
                // Black Square
                elseif ($square == "####") {
                    echo "<td class=\"black\">";
                    echo "</td>";
                }

                // Piezas Negras
                elseif ($square == "PABL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                } elseif ($square == "ROBL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                } elseif ($square == "KNBL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                } elseif ($square == "BIBL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                } elseif ($square == "QUBL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                } elseif ($square == "KIBL") {
                    echo "<td class=\"negro\">";
                    echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                    echo "</td>";
                }
                // White Pieces
                elseif ($square == "ROWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                } elseif ($square == "KNWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                } elseif ($square == "BIWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                } elseif ($square == "QUWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                } elseif ($square == "KIWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                } elseif ($square == "PAWH") {
                    echo "<td class=\"blanco\">";
                    echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                    echo "</td>";
                }


            }

            echo "</tr>";

        }
        echo "</table>";
    }

    $emptyBoard = CreateEmptyBoard();
    echo "<div class=\"board\">";
    DrawChessGame($emptyBoard);
    echo "</div>";
    ?>
</body>

</html>