<?php

class PlayersDataAccess
{
	
	function __construct()
    {
    }

	function get($IdPlayer1,$Idlayer2,$gameName)
	{
        
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$query = mysqli_prepare($conexion, "SELECT ID,name FROM T_Players");
        $query->execute();
        $result = $query->get_result();

		$players =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($players,$myrow);
        }
		
		return $players;
	}
}
