<?php

require("userDataAcces.php");

class UsuarioReglasNegocio
{

	function __construct()
    {
    }
    function verificar($usuario, $clave)
    {
        $usuariosDAL = new UserDataAcces();
        $res = $usuariosDAL->verificar($usuario,$clave);
        
        return $res;
        
    }
}

