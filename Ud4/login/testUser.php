
<?php

require("./AccesoDatos/usuarioAccesoDatos.php");

ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

function test_alta_usuario()
{
    $u = new UsuarioAccesoDatos();
    return $u->insertar('juanSilver','silver','juanSilver','juanSilver@prueba.com');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'silver';
    $u = new UsuarioAccesoDatos();
    $perfil = $u->verificar('juanSilver','juanSilver');
    return $perfil === $perfil_esperado;
}

var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());