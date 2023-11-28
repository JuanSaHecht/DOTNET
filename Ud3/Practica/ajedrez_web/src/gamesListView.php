<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>



<body>

    <header>
        <h1><a href="index.php">CHESS</a></h1>
        <p>GAME</p>
        <div class="horizontal-menu">
            <ul>
                <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li>
                <li><a href="gamesListView.php" class="horizotal-menu-link">GAMES LIST</a></li>
            </ul>
        </div>
    </header>

    <nav>
        <div class="games-list">
            <h2>GAMES LIST</h2>
            <div class="scrolling-table">
                <table>
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Start date</th>
                        <th>Start Hour</th>
                        <th>Status</th>
                        <th>Winner</th>
                        <th>End date</th>
                        <th>End Hour</th>
                        <th>White Pieces</th>
                        <th>Black Pieces</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    require_once("gamesListBusinessLogic.php");
                    // $categoria = $_POST['id_categoria'];
                    
                    $gamesBL = new GamesListBusinessLogic();
                    $gamesData = $gamesBL->get();


                    foreach ($gamesData as $game) {
                        echo "<tr>";
                        echo "<td>" . $game->getID() . "</td>";
                        echo "<td>" . $game->getGameName() . "</td>";
                        echo "<td>" . $game->getStartDate() . "</td>";
                        echo "<td>" . $game->getStartHour() . "</td>";
                        echo "<td>" . $game->getState() . "</td>";
                        echo "<td>" . $game->getWinner() . "</td>";
                        echo "<td>" . $game->getEndDate() . "</td>";
                        echo "<td>" . $game->getEndHour() . "</td>";
                        echo "<td>" . $game->getnamePlayerWhite() . "</td>";
                        echo "<td>" . $game->getNamePlayerBlack() . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>