<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>
    <link rel="stylesheet" type="text/css"  href="../style.css">
</head>



<body>

    <header>
    <h1><a href="index.php">CHESS</a></h1> <p>GAME</p>
        <div class="horizontal-menu">
            <ul>
                <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li>
                <li><a href="gamesList.php" class="horizotal-menu-link">GAMES LIST</a></li>
            </ul>
        </div>
    </header>
    
    <nav>
        <h2>NEW GAME</h2>

        <div class="player-election">
            <p>PLAYER 1</p>
            <select name="player1"> 
                
                <?php
                    require("playersBusinessLogic.php");    
                    $playersBL = new PlayersBusinessLogic();
                    $playersData = $playersBL->get();


                    foreach ($playersData as $player)
                    {
                        echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                    }
                ?>
            </select>
            <br>
            <br>
            <br>
            <p>PLAYER 2</p>
            <select name="player2">
                <?php           
                        $playersBL = new PlayersBusinessLogic();
                        $playersData = $playersBL->get();
    
    
                        foreach ($playersData as $player)
                        {
                            echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                        }
                ?>
            </select>



             <br>   
            <br>
             <label for="game-name">GAME NAME</label>
             <br>
            <input type="text" id="game-name">
            <br>
            <button onclick="runScript">PLAY</button>

            <?php
        require_once("addGameBusinessLogic.php");
        $player1 = $_POST['player1'];
        $player2 = $_POST['player2'];
        $gameName = $_POST['game-name'];
        // $addGameBL = new AddGameBusinessLogic();
        // $addGameBL->get($player1,$player2,$gameName);
        
        echo "<p>".$player1,$player2,$gameName."fasdfasd</p>";
      
        
    ?>

        </div>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>