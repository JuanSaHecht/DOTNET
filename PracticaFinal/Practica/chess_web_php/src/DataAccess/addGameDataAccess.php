<?php
class AddGameDataAccess
{
	
	function __construct()
    {
    }

	function get($IdPlayer1,$IdPlayer2,$gameName)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error conecting to MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');

		 $sanitized_game_name = mysqli_real_escape_string($conexion,$gameName);

		$query = mysqli_prepare($conexion, "INSERT INTO chess_game.T_Matches
		(title,white,black,startDate)
		VALUES
		(?,?,?,now());");

		$query->bind_param('sii', $sanitized_game_name,$IdPlayer1,$IdPlayer2);
        $query->execute();

	}
}
