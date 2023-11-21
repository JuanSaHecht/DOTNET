<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo de formualario</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <form action="procesa.php" method="POST">
            <label for="id_campo_1">Etiqueta para el campo 1</label><br>
            <input id="id_campo_1" name="nombre_campo_1" type="text"><br>
            <input id="id_campo_2" name="nombre_campo_2" type="hidden" value="1"><br>
            <input type="submit" value="Aceptar"><br>
        </form>
    </body>
</html>