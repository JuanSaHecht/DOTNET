<?php

require ("userBusinessLogic.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

    if ($perfil==="administrador" || $perfil==="jugador")
    {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: tournamentView.php");
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
    <link rel="stylesheet" type="text/css"  href="../style.css">
</head>



<body>

    <header>
        <h1><a href="index.php">CHESS</a></h1> 
        <!-- <span class="login"><a href="login.php">Log In</a></span> -->
        <p>GAME</p>
        <!-- <div class="horizontal-menu">
            <ul>
                <li><a href="new_GameView.php" class="horizotal-menu-link">NEW GAME</a></li>
                <li><a href="gamesListView.php" class="horizotal-menu-link">GAMES LIST</a></li>
            </ul>
        </div> -->
    </header>
    
    <nav>
        <p><form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for = "usuario"> Usuario: </label>
        <input id="usuario" name = "usuario" type = "text">
        <br><br>
        <label for = "usuario"> Contraseña: </label>
        <input id = "clave" name = "clave" type = "password">
        <br><br>
        <input type = "submit"></p>
    </nav>

    <footer><b>&#169 CHESS GAME</b></footer>

</body>

</html>