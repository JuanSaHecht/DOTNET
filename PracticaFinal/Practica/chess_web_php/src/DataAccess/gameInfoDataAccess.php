<?php

class GameInfoDataAccess
{
	
	function __construct()
    {
    }

	function get($gameSelected)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'chess_game');

        $sanitized_game_selected = mysqli_real_escape_string($conexion,$gameSelected);

		$consult = mysqli_prepare($conexion, "SELECT 
        TM.ID,
        title,
        DATE(startDate) AS StartDate,
        TIME(startDate) AS StartHour,
        state,
        winner,
        DATE(endDate) AS EndDate,
        TIME(endDate) AS EndHour,
        TPW.name White,
        TPB.name Black
    FROM
        T_Matches TM
            JOIN
        T_Players TPW ON TPW.ID = TM.white
            JOIN
        T_Players TPB ON TPB.ID = TM.black
        having TM.ID = ?");

        $consult->bind_param('s', $sanitized_game_selected);

        $consult->execute();
        $result = $consult->get_result();


        $columns =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($columns,$myrow);
            

        }

		return $columns;
	}


    
}
