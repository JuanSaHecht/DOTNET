<?php

require("../DataAccess/playersDataAccess.php");

class PlayersBusinessLogic
{
    private $_ID;
    private $_Name;

	function __construct()
    {
    }

    function init($id,$name)
    {
        $this->_ID = $id;
        $this->_Name = $name;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getName()
    {
        return $this->_Name;
    }


    function get()
    {
        $playersDAL = new PlayersDataAccess();
        $rs = $playersDAL->get();
		$playerList =  array();
        foreach ($rs as $player)
        {
            $oPlayersBusinessLogic = new PlayersBusinessLogic();
            $oPlayersBusinessLogic->Init($player['ID'],$player['name']);
            array_push($playerList,$oPlayersBusinessLogic);
        }
        
        return $playerList;
    }
}