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
        background-color: #714500;

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
    
    // counts how many dead white pieces are
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

        // counts how many dead black pieces are
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
                if (array_key_exists($key,$maxPiecesAlive) && substr($key,2) == "BL") {
                    $diference = $maxPiecesAlive[$key] - $value;
                    if ($diference != 0) {
                        $deadPieces[$key] = $diference;
                    }
                }
            }

            return $deadPieces;
        }

        // Counts all the pieces on the board
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

    // show dead white pieces table 
    function deadTableWhite($board) // recieves a string with state of board
    {
        $deadPieces = deadPiecesWhite($board);

        $piecesArray = array();

        foreach ($deadPieces as $key => $value) {
            for ($i=0; $i < $value; $i++) { 
                array_push($piecesArray, $key);
            }
        }


        $positionPiecesShown = 0;

        echo "<table \"dead\">";
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";

                    if (!empty($piecesArray) && count($piecesArray) > $positionPiecesShown) {
                        echo "<img src=\"Icons/" . $piecesArray[$positionPiecesShown]. ".png\" >";
                        $positionPiecesShown++;
                }

                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    }

    // show dead black pieces table 
    function deadTableBlack($board) // recieves a string with state of board
    { 
        $deadPieces = deadPiecesBlack($board);

        $piecesArray = array();

        foreach ($deadPieces as $key => $value) {
            for ($i=0; $i < $value; $i++) { 
                array_push($piecesArray, $key);
            }
        }


        $positionPiecesShown = 0;

        echo "<table \"dead\">";
        for ($i = 0; $i < 2; $i++) {

            echo "<tr>";

            for ($y = 0; $y < 8; $y++) {
                echo "<td class=\"dead\">";

                    if (!empty($piecesArray) && count($piecesArray) > $positionPiecesShown) {
                        echo "<img src=\"Icons/" . $piecesArray[$positionPiecesShown]. ".png\" >";
                        $positionPiecesShown++;
                }

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
    $board = "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,0000,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,0000,####,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,0000,PABL,ROBL,KNBL,BIBL,0000,KIBL,BIBL,KNBL,ROBL";

    echo "<div class=\"board\">";
    DrawChessGame($board);
    echo "</div>";


    var_dump(deadPiecesWhite($board));
    echo "<br>";
    var_dump(deadPiecesBlack($board));
    echo "<br>";
    echo "<br>";
    echo "<br>";
    var_dump(deadPiecesWhite($board));
    ?>
</body>

</html>



