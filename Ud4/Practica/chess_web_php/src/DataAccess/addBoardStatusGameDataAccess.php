<?php

class AddBoardStatusGameDataAccess
{
	
	function __construct()
    {
    }

	function get($boardStatus)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');

		$query = mysqli_prepare($conexion, "INSERT INTO chess_game.T_Board_Status
		(IDGame,board)
		VALUES ((select ID from chess_game.T_Matches order by ID desc limit 1),?) ;");
		$query->bind_param('s', $boardStatus);
        $query->execute();

		


	}
}