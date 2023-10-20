<?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        class Calculadora 
    {

        function __construct()
        {

        }

        function factorial($x) 
        {
            $res = -1;
            if ($x == 0) {
                $res = 1;
            }
            else
            {
                if ($x > 0) 
                {
                    $res = $x;
                    while ($x > 1) 
                    {
                        $res = $res * ($x-1);
                        $x--;
                    }
                }
                else 
                {
                    throw new Exception("error");
                }
            }
            return $res;
        }


        function coeficienteBinomial($n,$k)
        {
            $n1 = $this->factorial($n);
            $n2 = $this->factorial($k);
            $n3 = $n-$k;

            return $n1 / ($n2 * $this->factorial($n3));
        }


        function convierteBinarioDecmial($cadenaBits)
        {
            $decimal = base_convert($cadenaBits, 2, 10);
    
            return $decimal;
        }

        function sumaNumerosPares($array)
        {
            $sumTotal = 0;

            for ($i=0; $i < count($array); $i++) 
            { 
                if ($array[$i] % 2 == 0) 
                {
                    $sumTotal = $sumTotal + $array[$i];
                }
            }
            return $sumTotal;
        }
        
        function esPalindromo($cadena)
        {
            $cadenaToLowCase = strtolower($cadena);
            $cadenaOg = $cadenaToLowCase;
            $cadenaInv = strrev($cadenaToLowCase) ;

            if ($cadenaOg == $cadenaInv) {
                return true;
            }
            else
            {
                return false;
            }      
        }  
    
        //Comprobar q las matrizes sean iguales en filas y columnas


        //Sumar matrizes
    

        // Pintar matrizes finales


        //Hacerlo orientada a objetos: clase q sea matriz, suma (matriz objeto)
    }

    class Matriz
    {
        private $matriz;

        function getFilas()
        {
            return count($this-> matriz);
        }

        function __construct($matrix_array) 
        {
            $this-> matriz = $matrix_array;
        }

        function matrizesIguales($m2)
        {
            $m1 = $this-> matriz;

            $m1Filas = count($m1);
            $m2Filas = $m2-> getFilas; 

            if ($m1Filas == $m2Filas) {

                $m1Columnas = count($m1[1]);

                $m2Columnas = count($m2[1]);

                if ($m1Columnas == $m2Columnas) {
                    return true;
                }
                else 
                {
                    return false;
                }
            }
            else 
            return false;
            
        }

        function sumarMatrizes ($m2)
        {
            $m1 = $this-> matriz;
            
            $filasTotal = count($m1);
            $columnasTotal = count($m1[1]);

            $m3 = $m1; // Matriz que recibira el valor de la suma,igual que una de las matrizes para que tengan el mismo num de filas y columnas

            for ($fila=0; $fila < $filasTotal; $fila++) 
            { 
                // Pasa por todas las filas 
                for ($columna=0; $columna < $columnasTotal; $columna++) 
                { 
                    //Pasa por todas las columnas y suma los valores
                    $sum = $m1[$fila][$columna]+ $m2[$fila][$columna];

                    $m3[$fila][$columna] = $sum;
                } 
            }
            return $m3;
        }

        function pintarMatriz()
        {
            $matriz = $this-> matriz;
            for ($fila=0; $fila < count($matriz); $fila++) { 
                for ($columna=0; $columna < count($matriz[0]); $columna++) { 
                    echo $matriz[$fila][$columna]." ";
                }
                echo "<br>";
            }
        }
    }
    


?>