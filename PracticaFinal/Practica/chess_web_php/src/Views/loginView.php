<?php

require ("../BusinessLogic/userBusinessLogic.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $usuarioBL = new UserBussinessLogic();
    $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

    if ($perfil==="gold" || $perfil==="silver")
    {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['clave'] = $_POST['clave']; // password
        $_SESSION['username']=$_POST['usuario']; // username
        $_SESSION['profile']=$perfil; // profile type
        $_SESSION['insertedMatch']=false; // The new game has been inserted to the database
        $_SESSION['board']=null; // value of the board
        header("Location: index.php");
    }
    else
    {
        $error = true;
    }
}
?>
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
        <!-- <span class="login"><a href="login.php">Log In</a></span> -->
        <p>GAME</p>
        <div class="horizontal-menu">
            <ul>
                <!-- <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li> -->
                <!-- <li><a href="gamesListView.php" class="horizotal-menu-link">GAMES LIST</a></li> -->
            </ul>
        </div>
    </header>
    
    <nav>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input id="usuario" name="usuario" type="text" placeholder="username"/>
                <input id = "clave" name="clave" type="password" placeholder="password"/>
                <button type = "submit" >Login</button>
                <a href="signupView.php">Sign Up</a>
            </form>
        </div>
    </div>

    <?php
        if (isset($error))
        {
            print("<div> No tienes acceso </div>");
        }
    ?>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>



