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
                        <th><a href="gamesListView.php?filter=3">ID</a></th>
                        <th>Description</th>
                        <th><a href="gamesListView.php?filter=1">Start date</a></th>
                        <th>Start Hour</th>
                        <th>Status</th>
                        <th>Winner</th>
                        <th><a href="gamesListView.php?filter=2">End date</a></th>
                        <th>End Hour</th>
                        <th>White Pieces</th>
                        <th>Black Pieces</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    require_once("gamesListBusinessLogic.php");

                    $filter = $_GET['filter'];   
                             
                    $gamesBL = new GamesListBusinessLogic();
                    $gamesData = $gamesBL->get($filter);


                    foreach ($gamesData as $game) {
                        echo "<tr>";
                        echo "<td>" . $game->getID() . "</td>";
                        echo "<td><a href=\"boardView.php?function=2&game=".$game->getID()."&movement=0\">" . $game->getGameName() . "</a></td>";
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