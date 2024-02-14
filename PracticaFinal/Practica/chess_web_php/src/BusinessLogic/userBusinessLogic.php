<?php

require("../DataAccess/userDataAccess.php");

class UserBussinessLogic
{

	function __construct()
    {
    }
    function verificar($usuario, $clave)
    {
        $usuariosDAL = new UserDataAccess();
        $res = $usuariosDAL->verificar($usuario,$clave);
        
        return $res;
        
    }
}

