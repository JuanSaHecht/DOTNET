<?php

class UserDataAccess
{
	
	function __construct()
    {
    }

	function insertar($usuario,$perfil,$clave,$email)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$consulta = mysqli_prepare($conexion, "INSERT INTO chess_game.T_Players(name,password,profileType,email) values (?,?,?,?);");
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $consulta->bind_param("ssss", $usuario,$hash,$perfil,$email);
        $res = $consulta->execute();
        
        echo $usuario.$perfil.$clave;

        
		return $res;
	}

    function verificar($usuario,$clave)
    {
        $conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
        $consulta = mysqli_prepare($conexion, "select name,password,profileType from T_Players where name = ?;");
        $sanitized_usuario = mysqli_real_escape_string($conexion, $usuario);       
        $consulta->bind_param("s", $sanitized_usuario);
        $consulta->execute();
        $res = $consulta->get_result();


        if ($res->num_rows==0)
        {
            return 'NOT_FOUND';
        }

        if ($res->num_rows>1) //El nombre de usuario debería ser único.
        {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($clave, $x))
        {
            return $myrow['profileType'];
        } 
        else 
        {
            return 'NOT_FOUND';
        }
    }
}




















