<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo de formualario</title>
        <meta charset="UTF-8">
    </head>

    <body>
    <form action="peliculasVista.php" method="post">
        <label for="id_categoria">Elige la ID de la categoría:</label><br><br>
        <select name="id_categoria" id="id_categoria">
        <?php
            echo "antes";
                require("categoriasReglasNegocio.php");    
                $categoriasBL = new CategoriasReglasNegocio();
                $datosCategorias = $categoriasBL->obtener();

                echo "despues";
               var_dump($datosCategorias);

                foreach ($datosCategorias as $categoria)
                {
                    echo "<option value=\"{$categoria->getID()}\">{$categoria->getNombre()}</option>";
                }
                echo "despues foreach";
            ?>

        </select>
        <br><br>
        <input type="submit" value="Buscar">
    </form>

    

    </body>
</html>