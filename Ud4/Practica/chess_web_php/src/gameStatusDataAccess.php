<?php

class GameStatusDataAccess
{
	
	function __construct()
    {
    }

	function get($idGame)
	{
        
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');

		 $sanitized_categoria_id = mysqli_real_escape_string($conexion,$idGame);
		$query = mysqli_prepare($conexion, "select ID,board from chess_game.T_Board_Status where IDGame = ?");
		$query->bind_param('s', $sanitized_categoria_id);
        $query->execute();
        $result = $query->get_result();

		$history =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($history,$myrow);
        }
		
		return $history;
	}
}
