<?php

class UsuarioAccesoDatos
{
	
	function __construct()
    {
    }

	function insertar($usuario,$perfil,$clave,$correo)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'chess_game');
		$consulta = mysqli_prepare($conexion, "INSERT INTO chess_game.T_Players(name,email,profileType,password) VALUES (?,?,?,?);");
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $consulta->bind_param("ssss", $usuario,$correo,$perfil,$hash);
        $res = $consulta->execute();
        
		return $res;
	}

    function verificar($usuario,$clave)
    {
        $conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'chess_game');
        $consulta = mysqli_prepare($conexion, "SELECT `T_Players`.`ID`,
        `T_Players`.`name`,
        `T_Players`.`email`,
        `T_Players`.`profileType`,
        `T_Players`.`password`
    FROM `chess_game`.`T_Players` where name = ?;");
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




















