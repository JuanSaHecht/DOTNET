<!doctype html>
<html>
<head>

</head>

<body>
    <h1> Listado de peliculas</h1>
    <?php
        require("categoriasReglasNegocio.php");
        $categoriasBL = new categoriasReglasNegocio();
        $datosCategorias = $categoriasBL->obtener();
    
        echo "hola";
        foreach ($datosCategorias as $categoria)
        {
            echo "<div>";
            print($categoria->getID());
            print($categoria->getTitulo());
            echo "</div>";
        }
        
    ?>
</body>

</html>