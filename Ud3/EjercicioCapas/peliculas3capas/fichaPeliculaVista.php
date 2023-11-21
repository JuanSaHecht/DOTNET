<!doctype html>
<html>
<head>

</head>

<body>
    
    <?php
        

        require("fichaPeliculaReglasNegocio.php");
        $id_pelicula = $_GET['id_pelicula'];
        $peliculasBL = new FichaPeliculaReglasNegocio();
        $fichaPelicula = $peliculasBL->obtener($id_pelicula);
        
        echo "<h1>Informacion de ".$fichaPelicula->getTitulo()."</h1>";


            echo "<div>";
            print($fichaPelicula->getID());
            echo "<br>";
            print($fichaPelicula->getTitulo());
            echo "<br>";
            print($fichaPelicula->getAño());
            echo "<br>";
            print($fichaPelicula->getDuracion());
            echo "<br>";
            print($fichaPelicula->getSinopsis());
            echo "<br>";
            print($fichaPelicula->getImagen());
            echo "<br>";
            print($fichaPelicula->getVotos());
            echo "<br>";
            print($fichaPelicula->getNombreDirector());
            echo "<br>";
            echo "</div>";
        
        
    ?> 
</body>

</html>