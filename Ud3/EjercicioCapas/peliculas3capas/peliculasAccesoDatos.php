<?php

class PeliculasAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($categoria)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');
		$consulta = mysqli_prepare($conexion, "select ID,titulo from T_Peliculas WHERE ID = $categoria");
        $consulta->execute();
        $result = $consulta->get_result();

		$peliculas =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($peliculas,$myrow);

        }
		return $peliculas;
	}
}




















