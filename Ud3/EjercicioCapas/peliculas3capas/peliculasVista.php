<!doctype html>
<html>
<head>

</head>

<body>
    <h1> Listado de peliculas </h1>

    
    <?php


        require("peliculasReglasNegocio.php");
        $categoria = $_POST['id_categoria'];
        $peliculasBL = new PeliculasReglasNegocio();
        $datosPeliculas = $peliculasBL->obtener($categoria);
        
        
        foreach ($datosPeliculas as $pelicula)
        {
            echo "<div>";
            print($pelicula->getID());
            print($pelicula->getTitulo());
            echo "<a href=\"fichaPeliculaVista.php?id_pelicula=".$pelicula->getID()."\">INFORMACIÓN PELICULA</a>";
            echo "</div>";
        }
        
    ?>
</body>

</html>