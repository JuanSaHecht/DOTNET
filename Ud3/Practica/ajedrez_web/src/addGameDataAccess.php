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
		$query = mysqli_prepare($conexion, "INSERT INTO chess_game.T_Matches
		(ID,title,white,black,startDate,endDate,winner,state)
		VALUES
		(default,\"$gameName\",$IdPlayer1,$IdPlayer2,now(),null,null,default);");
        $query->execute();
        $result = $query->get_result();


        
		

	}
}
