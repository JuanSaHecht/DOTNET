<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title>
</head>

<body>
    <p>
        <?php
            // var_dump($x);

            $x = validarParametro("name");

            $edad = validarParametro("age");


            function validarParametro($param_name)
            {
                $res = "-";
                $name = htmlspecialchars($_GET[$param_name]);

                if (isset($name))
                    $res = $name;

                return $res;
            }

            function esVocalConCondiciones($x)
            {
                if(($x=='a') || ($x=='e') || ($x=='i') || ($x=='o') || ($x=='u'))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

            if(esVocalConCondiciones($x)== true)
            {
                echo "Es vocal";
            }
            else
            {
                echo "Es consonante";
            }

        ?>
    </p>
</body>

</html>