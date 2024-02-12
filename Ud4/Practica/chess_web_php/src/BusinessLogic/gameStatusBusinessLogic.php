<?php

require("../DataAccess/gameStatusDataAccess.php");
class GameStatusBusinessLogic
{
    private $_ID;
    private $_Board;

	function __construct()
    {
    }

    function init($board)
    {
        $this->_Board = $board;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getBoard()
    {
        return $this->_Board;
    }


    function get($idGame)
    {
        $gameDAL = new GameStatusDataAccess();
        $rs = $gameDAL->get($idGame);
		$movementsList =  array();
        foreach ($rs as $status)
        {
            $oGameStatusBusinessLogic = new GameStatusBusinessLogic();
            $oGameStatusBusinessLogic->Init($status['board']);
            array_push($movementsList,$oGameStatusBusinessLogic->getBoard());
        }
        return $movementsList;
    }
}