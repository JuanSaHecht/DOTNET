<?php

class FichaPeliculaAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_pelicula)
	{
		
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');

		$sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_pelicula);
		
		$consulta = mysqli_prepare($conexion, "SELECT TP.ID,titulo,año,duracion,sinopsis,imagen,votos,TD.nombre FROM T_Peliculas TP join T_Directores TD on TD.ID =  TP.id_director WHERE TP.ID = ?");

		$consulta->bind_param('s', $sanitized_categoria_id);

        $consulta->execute();
        $result = $consulta->get_result();

		$result = $result->fetch_assoc();
		return $result;
	}
}




















