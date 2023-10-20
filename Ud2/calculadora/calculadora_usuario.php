<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require ("calculadora.php");

    $matriz1 = array 
    (
        array(1,1,1),
        array(2,2,2),
        array(3,3,3)
    );
    
    $matriz2 = array 
    (
        array(1,1,1),
        array(2,2,2),
        array(3,3,3)
    );

    $matrizObj1 = new Matriz($matriz1);

    $matrizObj2 = new Matriz($matriz2);

    // $calculadora = new Calculadora();
    function test_factorial($num)
    {
        $calculadora = new Calculadora();
        $x = $calculadora->factorial($num);

        return $x;
    }

    function test_coeficienteBinomial($n,$k)
    {
        $calculadora = new Calculadora();
        $x = $calculadora->coeficienteBinomial($n,$k);

        return $x;
    }

    function test_convierteBinarioDecimal($cadenaBits)
    {
        $calculadora = new Calculadora();
        $x = $calculadora->convierteBinarioDecmial(1010);

        return $x;
    }

    function test_sumaNumerosPares($array)
    {
        $calculadora = new Calculadora();
        $x = $calculadora->sumaNumerosPares($array);

        return $x;
    }

    function test_esPalindromo($cadena)
    {
        $calculadora = new Calculadora();
        $x = $calculadora->esPalindromo($cadena);

        if ($x == true)
        {
            return "True";
        }
        else {
            return "False";
        }
    }

    echo "factorial: ".test_factorial(9)."<br>";

    echo "Coeficiente Binomial: ".test_coeficienteBinomial(9,3)."<br>";

    echo "Binario a Decimal:".test_convierteBinarioDecimal(1010)."<br>";

    $numerosPrueba = array(1,2,3,4,5,6,7,8);

    echo "Suma de numeros pares :".test_sumaNumerosPares($numerosPrueba)."<br>";

    echo "Es palindromo: ".test_esPalindromo("ana")."<br>";



    $matrizObj1->pintarMatriz();
    echo "<br>";
    $matrizObj2->pintarMatriz();

    $matrizObj1->matrizesIguales($matrizObj2);

?>