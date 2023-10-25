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
    
        function deadPiecesWhite($board) // recieves a string with state of board
        {
            $alivePieces = countPieces($board);

            $maxPiecesAlive = array(
                "ROWH" => 2,
                "KNWH" => 2,
                "BIWH" => 2,
                "QUWH" => 1,
                "KIWH" => 1,
                "PAWH" => 8,
            );

            $deadPieces = array();

            foreach ($alivePieces as $key => $value) {
                if (array_key_exists($key,$maxPiecesAlive) && substr($key,2) == "WH") {
                    $diference = $maxPiecesAlive[$key] - $value;
                    if ($diference != 0) {
                        $deadPieces[$key] = $diference;
                    }
                }
            }

            return $deadPieces;
        }

        function deadPiecesBlack($board) // recieves a string with state of board
        {
            $alivePieces = countPieces($board);

            $maxPiecesAlive = array(
                "ROBL" => 2,
                "KNBL" => 2,
                "BIBL" => 2,
                "QUBL" => 1,
                "KIBL" => 1,
                "PABL" => 8,
            );

            $deadPieces = array();

            foreach ($alivePieces as $key => $value) {
                if (array_key_exists($key,$maxPiecesAlive) && substr($key,2) == "WH") {
                    $diference = $maxPiecesAlive[$key] - $value;
                    if ($diference != 0) {
                        $deadPieces[$key] = $diference;
                    }
                }
            }

            return $deadPieces;
        }


    function countPieces($board) // recieves a string
    {  
        $text = explode(",", $board);
        $piecesAlive = array();

        for ($i = 0; $i < count($text); $i++) {

            if (array_key_exists($text[$i], $piecesAlive)) {
                $piecesAlive[$text[$i]]++;
            } else {
                $piecesAlive[$text[$i]] = 1;
            }
        }

        return $piecesAlive;
    }


    function deadTableWhite($board) // recieves a string with state of board
    {
        $deadPieces = deadPiecesWhite($board);
        // show dead white pieces table 
        echo "<table \"dead\">";
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";

                foreach ($deadPieces as $key => $value) {
                    echo "<img src=\"Icons/" . $key . ".png\" >";
                }

                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    }

    function deadTableBlack($board) // recieves a string with state of board
    {
        // show dead white pieces table 
        echo "<table \"dead\">";
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";
                deadPiecesBlack($board);
                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    }

    function inGameBoard($boardArray) // recieves a matrix with board state
    {
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
    }


    function DrawChessGame($board) //Recieves a string
    {
        // $initialPieces = array("ROBL", "KNBL", "BIBL", "QUBL", "KIBL", "PABL", "ROBL", "KNBL", "BIBL", "ROWH", "KNWH", "BIWH", "QUWH", "KIWH", "ROWH", "KNWH", "BIWH", "PAWH");
    
        // Converts string into an array and then the array into a matrix
        $text = explode(",", $board);
        $position = 0;
        for ($i = 0; $i < 8; $i++) {
            for ($y = 0; $y < 8; $y++) {
                $boardArray[$i][$y] = $text[$position];
                $position++;
            }
        }

        deadTableWhite($board);

        inGameBoard($boardArray);

        deadTableBlack($board);
    }
    $board = "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL";

    echo "<div class=\"board\">";
    DrawChessGame($board);
    echo "</div>";


    var_dump(deadPiecesWhite($board));
    echo "<br>";
    var_dump(deadPiecesBlack($board));
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