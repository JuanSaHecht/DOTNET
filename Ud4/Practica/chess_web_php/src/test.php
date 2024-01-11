
<?php

require("userDataAcces.php");

ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

function test_alta_usuario()
{
    $u = new UserDataAcces();
    return $u->insertar('ruben','silver','ruben1');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'silver';
    $u = new UserDataAcces();
    $perfil = $u->verificar('ruben','ruben1');
    return $perfil === $perfil_esperado;
}

var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());