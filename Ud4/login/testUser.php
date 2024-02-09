
<?php

require("./AccesoDatos/usuarioAccesoDatos.php");

ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

function test_alta_usuario()
{
    $u = new UsuarioAccesoDatos();
    return $u->insertar('carlosSilver','silver','carlosSilver','carlosSilver@prueba.com');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'gold';
    $u = new UsuarioAccesoDatos();
    $perfil = $u->verificar('carlosGold','carlosGold');
    return $perfil === $perfil_esperado;
}

var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());