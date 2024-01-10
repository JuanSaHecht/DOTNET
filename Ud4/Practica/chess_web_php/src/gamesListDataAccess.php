<?php

class GamesListDataAccess
{
	
	function __construct()
    {
    }

	function get($filter)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'chess_game');

        $gamesDAL = new GamesListDataAccess();
		$consult = $gamesDAL->consultWanted($conexion,$filter);

        

        $consult->execute();
        $result = $consult->get_result();

		$games =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($games,$myrow);

        }
		return $games;
	}


    function consultWanted($conexion,$filter){

        
        if ($filter == 1) 
        {
        return mysqli_prepare($conexion, "SELECT 
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
        order by StartDate desc");
        }
        else if ($filter == 2) 
        {
            return mysqli_prepare($conexion, "SELECT 
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
            order by EndDate desc");
        }else if ($filter == 3) {
            return mysqli_prepare($conexion, "SELECT 
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
            order by ID asc");
            }else {
                return mysqli_prepare($conexion, "SELECT 
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
            order by ID asc");
            }
        
           
    }
}
