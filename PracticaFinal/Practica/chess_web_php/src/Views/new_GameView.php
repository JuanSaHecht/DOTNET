<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>
    <link rel="stylesheet" type="text/css"  href="../../style.css">
</head>



<body>

    <header>
    <h1><a href="index.php">CHESS</a></h1>
    <?php 
                    session_start(); // reanudamos la sesión
                    $_SESSION['board']=null; // value of the board
                    if (!isset($_SESSION['clave']))
                    {
                        echo "<span class=\"login\"><a href=\"login.php\">Log In</a></span>";
                    }else{
                        if ($_SESSION['profile']==="gold"||$_SESSION['profile']==="silver") {
                            echo "<span class=\"login\"><p>".$_SESSION['username']."</p><a href=\"logout.php\">Log Out</a></span> ";
                        }
                    }


                    ?>
    <p>GAME</p>

        <div class="horizontal-menu">
            <ul>
                <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li>
                <?php 
                session_start(); // reanudamos la sesión
                    if (!isset($_SESSION['clave']))
                    {
                        header("Location: loginView.php");
                    }else{
                        if ($_SESSION['profile']==="gold") {
                            echo "<li><a href=\"gamesListView.php\" class=\"horizotal-menu-link\">GAMES LIST</a></li> ";
                        }
                    }


                    ?>
            </ul>
        </div>
    </header>
    
    <nav class="newGame-menu">
        <h2>NEW GAME</h2>

        <div class="player-election">
            <p>PLAYER 1</p>
            
                    
                    <?php
                        require("../BusinessLogic/playersBusinessLogic.php");    
                        $playersBL = new PlayersBusinessLogic();
                        $playersData = $playersBL->get();

                       echo "<form action=\"boardView.php?function=1\" method=\"post\">";
                       echo "<input type=\"hidden\" name=\"flag\" id=\"flag\" value=1>";
                        echo "<select name=\"player1\" id=\"player1\">"; 
                        

                        foreach ($playersData as $player)
                        {
                            echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                        }

                        echo "</select>";
                    ?>
                
            <br>
            <br>
            <p>PLAYER 2</p>
           
                <select name="player2" id="player2">
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
            <input type="text" id="game-name" name="game-name"required>
             
            <br>
            <button onclick="location.href = 'boardView.php\">PLAY</button>
            </form> 

            

        </div>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>