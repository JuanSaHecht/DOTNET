<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

$cadenaPrueba = "el sapo no se lava el pie";

function esVocal($letra)
{
    $letra = strtolower($letra);
    if (($letra == "a") || ($letra == "e") || ($letra == "i") || ($letra == "o") || ($letra == "u")) {
        return true;
    } else
        return false;
}

function cambiarVocales($cadena, $vocal)
{ // cambia las vocales de la cadena
    $tamañoCadena = strlen($cadena);
    for ($posicion = 0; $posicion < $tamañoCadena; $posicion++) {
        $letraCadena = substr($cadena, $posicion, 1);
        if (esVocal($letraCadena)) // mira si la letra es vocal, si es vocal la cambia por la vocal que le pasamos como parametro al metodo
        {
            $parteAnterior = substr($cadena, 0, $posicion);

            $partePosterior = substr($cadena, $posicion + 1);

            $cadena = $parteAnterior . $vocal . $partePosterior;
        }
    }
    return $cadena;
}

function cambiarTodasVocales($cadena)
{
    $vocales = array("a", "e", "i", "o", "u");
    $cadenasArray = array(count($vocales) - 1);
    for ($posicionArray = 0; $posicionArray < count($vocales); $posicionArray++) { // Recorre el array de vocales y llama al metodo para cambiar las vocales de la cadena 

        $cadenasArray[$posicionArray] = cambiarVocales($cadena, $vocales[$posicionArray]);
    }

    return $cadenasArray;
}

function mostrarArray($array)
{
    for ($posicion = 0; $posicion < count($array); $posicion++) {
        echo $array[$posicion];
        echo "<br>";
    }
}

function test_cambiarTodasVocales($array)
{
    echo "<br>";
    echo "TEST METODO cambiarTodasVocales:";
    echo "<br>";

    $resultadoEsperado = array(
        "al sapa na sa lava al paa",
        "el sepe ne se leve el pee",
        "il sipi ni si livi il pii",
        "ol sopo no so lovo ol poo",
        "ul supu nu su luvu ul puu"
    );

    for ($posicion=0; $posicion < count($resultadoEsperado); $posicion++) 
    { 
        if (strtolower($array[$posicion]) == strtolower($resultadoEsperado[$posicion])) 
        {
            echo "fila ".$posicion." es correcta";
        }
        else 
        {
            echo "fila ".$posicion." no es correcta";
        }
        echo "<br>";
    }
}

$arrayCadenas = cambiarTodasVocales($cadenaPrueba);
echo mostrarArray($arrayCadenas);
echo test_cambiarTodasVocales($arrayCadenas);


?>