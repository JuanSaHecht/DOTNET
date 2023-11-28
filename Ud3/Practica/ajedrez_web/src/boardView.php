<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>
</head>

<link rel="stylesheet" href="../chess_game_styles.css">

<body>
    <?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("addGameBusinessLogic.php");
        $player1 = $_POST['player1'];
        $player2 = $_POST['player2'];
        $gameName = $_POST['game-name'];
        $addGameBL = new AddGameBusinessLogic();
        $addGameBL->get($player1,$player2,$gameName);

        
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
            if (array_key_exists($key, $maxPiecesAlive) && substr($key, 2) == "WH") {
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
            if (array_key_exists($key,$maxPiecesAlive) && substr($key,2) == "BL" && $maxPiecesAlive [$key] - $alivePieces[$key] == 0) {
                $deadPieces[$key] = 0;
            }elseif (array_key_exists($key, $maxPiecesAlive) && substr($key, 2) == "BL") {
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

            if (array_key_exists($text[$i], $piecesAlive)) {
                $piecesAlive[$text[$i]]++;
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
            for ($i = 0; $i < $value; $i++) {
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
                    echo "<img src=\"../Icons/" . $piecesArray[$positionPiecesShown] . ".png\" >";
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
            for ($i = 0; $i < $value; $i++) {
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
                    echo "<img src=\"../Icons/" . $piecesArray[$positionPiecesShown] . ".png\" >";
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
                    echo "<img src=\"../Icons/" . $boardArray[$i][$y] . ".png\" >";

                }

                echo "</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    }


    function DrawChessGame($board) //Recieves a string
    {    
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

    

    $board = "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL";

    echo "<div class=\"board\">";
    DrawChessGame($board);
    echo "</div>";

    ?>
</body>

</html>