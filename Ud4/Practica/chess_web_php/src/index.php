<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJEDREZ</title>
    <link rel="stylesheet" type="text/css"  href="../style.css">
</head>



<body>
    <header>
        <h1><a href="index.php">CHESS</a></h1> 
        <?php 
                    session_start(); // reanudamos la sesión
                    if (!isset($_SESSION['clave']))
                    {
                        echo "<span class=\"login\"><a href=\"login.php\">Log In</a></span>";
                    }else{
                        if ($_SESSION['profile']==="gold"||$_SESSION['profile']==="silver") {
                            echo "<span class=\"login\"><p>".$_SESSION['username']."</p><a href=\"logout.php\">Log Out</a></span> ";
                        }
                    }


                    ?>

        <!-- <span class="login"><a href="login.php">Log In</a></span> -->
        <p>GAME</p>
        <div class="horizontal-menu">
            <ul>
                <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li>

                <?php 
                session_start(); // reanudamos la sesión
                    if (!isset($_SESSION['clave']))
                    {
                        header("Location: login.php");
                    }else{
                        if ($_SESSION['profile']==="gold") {
                            echo "<li><a href=\"gamesListView.php\" class=\"horizotal-menu-link\">GAMES LIST</a></li> ";
                        }else {
                            
                        }
                    }


                    ?>
                
            </ul>
        </div>
    </header>
    
    <nav>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum laudantium minima reiciendis vitae debitis. Dolorem laborum repudiandae voluptatem nesciunt natus asperiores facere ducimus facilis beatae eos. Velit totam voluptate minus?</p>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>