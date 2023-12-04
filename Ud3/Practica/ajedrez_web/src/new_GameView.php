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
                <li><a href="gamesListView.php" class="horizotal-menu-link">GAMES LIST</a></li>
            </ul>
        </div>
    </header>
    
    <nav>
        <h2>NEW GAME</h2>

        <div class="player-election">
            <p>PLAYER 1</p>
            
                    
                    <?php
                        require("playersBusinessLogic.php");    
                        $playersBL = new PlayersBusinessLogic();
                        $playersData = $playersBL->get();


                       echo "<form action=\"boardView.php?function=1\" method=\"post\">";
                        echo "<select name=\"player1\" id=\"player1\">"; 

                        foreach ($playersData as $player)
                        {
                            echo "<option value=\"{$player->getID()},{$player->getName()}\">{$player->getName()}</option>";
                        }

                        echo "</select>";
                    ?>
                
            
            <br>
            <br>
            <br>
            <p>PLAYER 2</p>
           
                <select name="player2" id="player2">
                    <?php           
                            $playersBL = new PlayersBusinessLogic();
                            $playersData = $playersBL->get();
        
        
                            foreach ($playersData as $player)
                            {
                                echo "<option value=\"{$player->getID()},{$player->getName()}\">{$player->getName()}</option>";
                            }
                    ?>
                </select>
                     


             <br>   
            <br>
             <label for="game-name">GAME NAME</label>
             <br>
            <input type="text" id="game-name" name="game-name"required>
             
            <br>
            <button onclick="location.href = 'boardView.php?function=20\">PLAY</button>
            </form> 

            

        </div>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>