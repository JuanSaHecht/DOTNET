<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>

</head>

<link rel="stylesheet" href="../style.css">

<body>
    <?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    $function=$_GET['function']; 

    if ($function == 1) // Show a new game
    {
        require_once("addGameBusinessLogic.php");
        $flag = $_POST['flag'];
        $player1 = $_POST['player1'];
        $player2 = $_POST['player2'];
        $gameName = $_POST['game-name'];

        
        
        $addGameBL = new AddGameBusinessLogic();
        
            $addGameBL->get($player1,$player2,$gameName);//Insert to database
        
        
        $board = "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,0000,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $flag == 0) {
            
            $fromCol = $_POST['fromCol'];//7
            $fromRow = $_POST['fromRow'];//0
            $toCol = $_POST['toCol'];//7
            $toRow = $_POST['toRow'];//4
            $board = movePiece($board,$fromCol,$fromRow,$toCol,$toRow);
        } 
        


        echo "<div class=\"game-info\">";

        drawNewGameInfo($player1,$player2,$gameName,$board);
        getBoardApi($board);
        echo "</div>";

        
        echo "<div class=\"board\">";
        DrawChessGame($board);
        echo "</div>";

       
        echo "<div class=\"menu-movement\">";
        echo "<form  method=\"post\" action=\"\">";
        echo "<input type=\"hidden\" name=\"game-name\" id=\"game-name\" value=".$gameName.">";
        echo "<input type=\"hidden\" name=\"player1\" id=\"player1\" value=".$player1.">";
        echo "<input type=\"hidden\" name=\"player2\" id=\"player2\" value=".$player2.">";
        echo "<input class=\"numbers\" type=\"number\" id=\"fromCol\" name=\"fromCol\" min=\"0\" max=\"7\" placeholder=\"From Column\" required>";
        echo "<br>";
        echo "<input class=\"numbers\" type=\"number\" id=\"fromRow\" name=\"fromRow\" min=\"0\" max=\"7\" placeholder=\"From Row\" required>";
        echo "<br>";
        echo "<input class=\"numbers\" type=\"number\" id=\"toCol\" name=\"toCol\" min=\"0\" max=\"7\" placeholder=\"To Column\" required>";
        echo "<br>";
        echo "<input class=\"numbers\" type=\"number\" id=\"toRow\" name=\"toRow\" min=\"0\" max=\"7\" placeholder=\"To Row\" required>";
        echo "<br>";
        echo "<input type=\"hidden\" name=\"flag\" id=\"flag\" value=0>";
        echo "<br><br>";
        echo "<input class=\"boton\" type=\"submit\"  value=\"MOVE\">";
        echo "</form>";
        echo "</div>";

             
       
    
    

    



    }else if ($function == 2) // Show a played game
    {
        require_once("gameInfoBusinessLogic.php");
        $game=$_GET['game'];
        $movement=$_GET['movement'];
        $history= getGameHistory($game);
        $board = getBoardStatus($game,$movement,$history);

        echo "<div class=\"game-info\">";

        drawGameInfo();
        drawMoveButtons($history);
        
        echo "</div>";


        echo "<div class=\"board\">";
        DrawChessGame($board);
        echo "</div>";
    }
    

         

        function getInitalBoard(){
            return "ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL";
        }
        

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

        echo "<table class=\"dead\">";
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

        echo "<table class=\"dead\">";
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

    function drawGameInfo(){
        $gameSelected = $_GET['game'];
        $movement = $_GET['movement'];
        $gamesBL = new GameInfoBusinessLogic();
        $gamesData = $gamesBL->get($gameSelected);

       

        foreach ($gamesData as $game) {
            echo "<p>Game ID: " . $game->getID() . "</p>";
            echo "<p>Game name: " . $game->getGameName() . "</p>";
            echo "<p>Start date: " . $game->getStartDate() . "</p>";
            echo "<p>Start hour: " . $game->getStartHour() . "</p>";
            echo "<p>State: " . $game->getState() . "</p>";
            echo "<p>Winner: " . $game->getWinner() . "</p>";
            echo "<p>End date: " . $game->getEndDate() . "</p>";
            echo "<p>End hour: " . $game->getEndHour() . "</p>";
            echo "<p>White. " . $game->getnamePlayerWhite() . "</p>";
            echo "<p>Black: " . $game->getNamePlayerBlack() . "</p>";
            echo "<p>Movement: " . $movement . "</p>";
        }
    }
    
    function drawNewGameInfo($player1,$player2,$gameName,$board){
        

            $dayHour= new DateTime();
            // echo "<p>Game ID: " . $game->getID() . "</p>";
            echo "<p>Game name: " . $gameName. "</p>";
            echo "<p>Start date: " . $dayHour->format("Y-m-d") . "</p>";
            echo "<p>Start hour: " . $dayHour-> format("H:i:s"). "</p>";
            echo "<p>White. " . $player1 . "</p>";
            echo "<p>Black: " . $player2 . "</p>";

            

    }
    
    function drawMoveButtons($history){

        
        $movement = $_GET['movement'] ;
        
        



        if ($movement <= 0) { 
            $anterior = 0;
        }else {
            $anterior = $movement -1;
        }


        if ($movement >= count($history)-1) {
            $posterior = count($history)-1;
        }else {
            $posterior = $movement +1;
        }

        $ultima = count($history)-1;

        echo "<a href=\"boardView.php?function=".$_GET['function']."&game=".$_GET['game']."&movement=0\"><img src=\"../Icons/skip_previous.png\" class=\"movement-buttons\"></a>";
        echo "<a href=\"boardView.php?function=".$_GET['function']."&game=".$_GET['game']."&movement=".$anterior."\"><img src=\"../Icons/arrow_back.png\" class=\"movement-buttons\"></a>";
        echo "<a href=\"boardView.php?function=".$_GET['function']."&game=".$_GET['game']."&movement=".$posterior."\"><img src=\"../Icons/arrow_forward.png\" class=\"movement-buttons\"></a>";
        echo "<a href=\"boardView.php?function=".$_GET['function']."&game=".$_GET['game']."&movement=".$ultima."\"><img src=\"../Icons/skip_next.png\" class=\"movement-buttons\"></a>";

    }
    


    function getGameHistory($idGame){
        require_once("gameStatusBusinessLogic.php");
        $historyBL = new GameStatusBusinessLogic();
        $gameHistory = $historyBL->get($idGame);

        $history = array();

        array_push($history,getInitalBoard());// The position 0 of the array it's the initial board

        foreach ($gameHistory as $movement) {
            array_push($history,$movement);
        }


        return $history;
    }


    function getBoardStatus($idGame,$movement,$history){
            return $history[$movement];
    }

    function getBoardApi($boardStatus){
        require_once("boardStatusApiBusinessLogic.php");
        $boardStatusApiBL = new BoardStatusApiBusinessLogic();
        $gamesData = $boardStatusApiBL->get($boardStatus);
        echo "<p>White Value: " . $gamesData->getMaterialValueWhitePieces(). "</p>";
        echo "<p>Black Value: " . $gamesData->getMaterialValueBlackPieces(). "</p>";
        echo "<p>Message: " . $gamesData->getDistanceMessage(). "</p>";
 
    }  

    function movePiece($boardStatus,$fromCol,$fromRow,$toCol,$toRow)
    {
        require_once("movementApiBusinessLogic.php");
        $movementBL = new MovementApiBusinessLogic();
       $movement = $movementBL->get($boardStatus,$fromCol,$fromRow,$toCol,$toRow);

       if ($movement[0] == false) {
        echo '<script>alert("Invalid Movement!");</script>';
        return $movement[1];
       }else 
       {
        return $movement[1];
       }

       
    }

    ?>
</body>

</html>