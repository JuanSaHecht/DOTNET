<?php

require("../DataAccess/userDataAcces.php");

class UserBussinessLogic
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

