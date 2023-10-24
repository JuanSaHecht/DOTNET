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
        position: relative;
        left: 30%;
        width: 600px;
        height: 900px;
    }

    table.dead {
        position: relative;
        width: 100%;
        border-collapse: collapse;

    }

    table.board {
        position: static;
        border: 10px solid #513100;
        width: 100px;
        height: 400px;
        border-collapse: collapse;
    }

    td {
        padding: 0;
        text-align: center;
        width: 70px;
        height: 70px;
    }

    /*WHITE SQUARE*/
    td.white {
        background-color: #ffdba2;
    }

    /*BLACK SQUARE*/
    td.black {
        background-color: #714500;
        /*1b1b1b*/
    }

    td.dead {
        background-color: #513100;

        width: 70px;
        height: 70px;
    }

    td img {
        width: 70px;
        height: 70px;
    }
</style>

<body>
    <?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);


    // function CreateEmptyBoard()
    // {
    //     $rows = 8;
    //     $columns = 8;
    
    //     $board = array();
    //     $position = 0;
    
    //     $text = "";
    
    //     for ($row = $rows - 1; $row >= 0; $row--) {
    
    //         for ($column = 0; $column < $columns; $column++) {
    //             if ((($row + $column) % 2) != 0) {
    //                 $text += "0000";
    
    //             } else {
    //                 $text += "####,";
    //             }
    
    //         }
    //     }
    
    //     return $text;
    // }
    
    // function ArrayToString($array)
    // {
    //     $string = "";
    
    //     for( $i = 0; $i < count($array); $i++ )
    //     {
    //        for ($y=0; $y < count($array[0]); $y++) { 
    //         $string += $array[$i][$y];
    //        } 
    //     }
    
    //     return $string;
    // }
    
    // function tableroInicio()
    // {
    //     // CREAR TABLERO$initialPiecesWhite =
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
    


    function countPieces($board) // recieves a string
    {
        // array asociado(claves) con contadores de piezas 
        $whitePawns = 8;
        $whiteRooks = 2;
        $whiteKnights = 2;
        $whiteBishops = 2;
        $whiteQueen = 1;
        $whiteKing = 1;

        $blackPawns = 8;
        $blackRooks = 2;
        $blackKnights = 2;
        $blackBishops = 2;
        $blackQueen = 1;
        $blackKing = 1;

        $text = explode(",", $board);
        $piecesAlive = array(
            "ROBL" => 0,
            "KNBL" => 0,
            "BIBL" => 0,
            "QUBL" => 0,
            "KIBL" => 0,
            "PABL" => 0,
            "ROWH" => 0,
            "KNWH" => 0,
            "BIWH" => 0,
            "QUWH" => 0,
            "KIWH" => 0,
            "PAWH" => 0,
        );

        for ($i = 0; $i < count($text); $i++) {

            if(array_key_exists($text[$i],$piecesAlive))
            {
                $piecesAlive[$text[$i]]++;
            }
        }

        return $piecesAlive;
    }


    function DrawChessGame($board) //Recieves a string
    {
        $initialPieces = array("ROBL", "KNBL", "BIBL", "QUBL", "KIBL", "PABL", "ROBL", "KNBL", "BIBL", "ROWH", "KNWH", "BIWH", "QUWH", "KIWH", "ROWH", "KNWH", "BIWH", "PAWH");




        // Converts string into an array and then the array into a matrix
        $text = explode(",", $board);
        $position = 0;
        for ($i = 0; $i < 8; $i++) {
            for ($y = 0; $y < 8; $y++) {
                $boardArray[$i][$y] = $text[$position];
                $position++;
            }
        }








        // show dead white pieces table 
        echo "<table \"dead\">";
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";
                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";




        // show board
        echo "<table class=\"board\"";

        for ($i = 0; $i < 8; $i++) {
            //rows
            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                // columns
    
                $square = $boardArray[$i][$y];

                //  White Square
                if ((($i + $y) % 2) != 0) {
                    echo "<td class=\"white\">";
                }
                // Black Square
                else {
                    echo "<td class=\"black\">";
                }

                if ($square != "0000" && $square != "####") {
                    echo "<img src=\"Icons/" . $boardArray[$i][$y] . ".png\" >";

                }

                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";



        // show dead black pieces table
        echo "<table \"dead\">";
        $shownPieces = 0;
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";

                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    }


    echo "<div class=\"board\">";
    DrawChessGame("ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH");
    echo "</div>";


    var_dump(countPieces("ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH"));

    ?>
</body>

</html>



<!-- // // Black Pieces
                // if ($square == "PABL") {
                //     echo "<img src=\"Icons/BlackPawn.png\" alt=\"Black King\">";
                    
                // } 
                // elseif ($square == "ROBL") {
                //     echo "<td class=\"negro\">";
                //     echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                //     echo "</td>";
                // } elseif ($square == "KNBL") {
                //     echo "<td class=\"negro\">";
                //     echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                //     echo "</td>";
                // } elseif ($square == "BIBL") {
                //     echo "<td class=\"negro\">";
                //     echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                //     echo "</td>";
                // } elseif ($square == "QUBL") {
                //     echo "<td class=\"negro\">";
                //     echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                //     echo "</td>";
                // } elseif ($square == "KIBL") {
                //     echo "<td class=\"negro\">";
                //     echo "<img src=\"Icons/BlackKing.png\" alt=\"Black King\">";
                //     echo "</td>";
                // }
                // White Pieces
                // elseif ($square == "ROWH") {
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                // } 
                // elseif ($square == "KNWH") {
                //     echo "<td class=\"blanco\">";
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                //     echo "</td>";
                // } elseif ($square == "BIWH") {
                //     echo "<td class=\"blanco\">";
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                //     echo "</td>";
                // } elseif ($square == "QUWH") {
                //     echo "<td class=\"blanco\">";
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                //     echo "</td>";
                // } elseif ($square == "KIWH") {
                //     echo "<td class=\"blanco\">";
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                //     echo "</td>";
                // } elseif ($square == "PAWH") {
                //     echo "<td class=\"blanco\">";
                //     echo "<img src=\"Icons/WhiteRook.png\" alt=\"White Rook\">";
                //     echo "</td>";
                // } -->



<!-- /*BLACK PIECES*/
    td.PABL {
        
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
    td.PAWH {
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
    } -->


<!-- // $alivePieces = array();
        // $numAlivePieces = 0;

        // // Counts how many dead peaces are
        // for ($i=0; $i < count($text); $i++) 
        // {   
        //     if ($text[$i] != "0000" && $text[$i] != "####") 
        //     {
        //         $numAlivePieces++;  
        //         $alivePieces = $text[$i];
        //     }
        // }
        
        // $deadPieces = array();

        // // Check if each position of array equals to initialPieces

        // if (count($alivePieces) != count($initialPieces))
        // {
        //     for ($i=0; $i < count($initialPieces); $i++) 
        // { 
        //     $isOnArray = false;
        //     for ($y=0; $y < count($alivePieces); $y++) 
        //     { 
        //         if ($initialPieces[$y] == $alivePieces[$i]) 
        //         {
        //             $isOnArray = true;
        //         }
        //     }
        //     if (!$isOnArray) 
        //     {
        //         $deadPieces = $initialPieces[$i];
        //     }
        // }
        // } -->

<!-- // Know if deadPieces are White or Black

$deadPiecesWhite = array();
$deadPiecesBlack = array();

foreach ($deadPieces as $piece) 
{
    if (substr($piece,2,4) == "WH" )
    {
        $deadPiecesWhite[] = $piece;
    }
    elseif (substr($piece,2,4) == "BL") 
    {
        $deadPiecesBlack[] = $piece;
    }
} -->