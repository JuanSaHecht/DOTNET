<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>

<body>
    <h1> Marcador del Ajedrez Web </h1>
    <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);
        define("DIMENSION",8);

        function PintarMarcador($valorMaterialB,$valorMaterialN)
        {
            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo  "Valor material para las piezas blancas";
            echo "</td>";
            echo "<td>";
            echo  "Valor material para las piezas negras";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo  $valorMaterialB;
            echo "</td>";
            echo "<td>";
            echo  $valorMaterialN;
            echo "</td>";
            echo "</table>";
        }

        function ObtenerDistancia($valorMaterialB,
                                  $valorMaterialN)
        {
            $distancia = $valorMaterialB - $valorMaterialN;
            if ($distancia<0) //revisamos el valor absoluto.
            {
                $distancia = $distancia * -1;
            }

            return $distancia;

        }

        function PintarMensajeDinamico($distancia,$valorMaterialB,$valorMaterialN)
        {
            if ($distancia>0)
            {
                $auxGanadorTemporal = "";
                if ($valorMaterialB>$valorMaterialN)
                {
                    $auxGanadorTemporal="BLANCAS";
                }
                else
                {
                    $auxGanadorTemporal="NEGRAS";
                }
                $palabraPuntos = "";
                if ($distancia>1)
                {
                    $palabraPuntos = "puntos";
                }
                else
                {
                    $palabraPuntos = "punto";
                }
                echo "Mensaje:van ganando las piezas ".$auxGanadorTemporal." por una distancia de ".$distancia." ".$palabraPuntos.".";
            }
        }

        function SolucionEjercicioCuatro($tablero)
        {
            
            $valorMaterialPiezasBlancas = 0;
            $valorMaterialPiezasNegras = 0;
            $piezasBlancas = array("PE", "CA", "AL", "TO","RE","RY");
            $tablaValorPiezasBlancas = array("PE"=>1, "CA"=>3, "AL"=>3,"TO"=>5,"RE"=>9);
            $tablaValorPiezasNegras = array("pe"=>1, "ca"=>3, "al"=>3,"to"=>5,"re"=>9);

            for ($fila = 0; $fila < DIMENSION; $fila++ )
            {
                for ($columna = 0; $columna < DIMENSION; $columna++ ) 
                {
                    $valor = $tablero[$fila][$columna]; 
                    if ($valor!="vacio" && $valor!="RY" && $valor!="ry") 
                    {   
                        if (in_array($valor, $piezasBlancas))
                        {
                            $valorMaterialPiezasBlancas+=$tablaValorPiezasBlancas[$valor];
                        }
                        else
                        {
                            $valorMaterialPiezasNegras+=$tablaValorPiezasNegras[$valor];
                        }
                    }
                }
            }
            PintarMarcador($valorMaterialPiezasBlancas,$valorMaterialPiezasNegras); 
            $distancia = ObtenerDistancia($valorMaterialPiezasBlancas,$valorMaterialPiezasNegras); 
            PintarMensajeDinamico($distancia,$valorMaterialPiezasBlancas,$valorMaterialPiezasNegras); 
        }
    ?>

    <?php

        $matriz = array (
            array("to","ca","al","re","ry","al","ca","to"),
            array("pe","pe","pe","pe","pe","pe","pe","pe"),
            array("vacio","vacio","vacio","vacio","vacio","vacio","vacio","vacio"),
            array("vacio","vacio","vacio","vacio","vacio","vacio","vacio","vacio"),
            array("vacio","vacio","vacio","vacio","vacio","vacio","vacio","vacio"),
            array("vacio","vacio","vacio","vacio","vacio","vacio","vacio","vacio"),
            array("PE","vacio","PE","PE","PE","PE","PE","PE"),
            array("TO","CA","AL","RE","RY","AL","CA","TO"),

        );

    SolucionEjercicioCuatro($matriz);

    ?>
</body>

</html>