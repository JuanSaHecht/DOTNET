<?php

require("gameStatusDataAccess.php");

class GameStatusBusinessLogic
{
    private $_ID;
    private $_Board;

	function __construct()
    {
    }

    function init($id,$board)
    {
        $this->_ID = $id;
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
            $oGameStatusBusinessLogic->Init($status['ID'],$status['board']);
            array_push($movementsList,$oGameStatusBusinessLogic);
        }
        
        return $movementsList;
    }
}