<?php

require("../DataAccess/gamesListDataAccess.php");

class GamesListBusinessLogic
{
    private $_ID;
    private $_GameName;

    private $_NamePlayerWhite;
    private $_NamePlayerBlack;

    private $_StartDate;
    private $_StartHour;
    private $_EndDate;
    private $_EndHour;
    private $_State;
    private $_Winner;




	function __construct()
    {
    }

    function init($id,$gameName,$startDate,$startHour,$state,$winner,$endDate,$endHour,$namePlayerWhite,$namePlayerBlack)
    {
        $this->_ID = $id;
        $this->_GameName = $gameName;
        $this->_StartDate = $startDate;
        $this->_StartHour = $startHour;
        $this->_State = $state;
        $this->_Winner = $winner;
        $this->_EndDate = $endDate;
        $this->_EndHour = $endHour;
        $this->_NamePlayerWhite = $namePlayerWhite;
        $this->_NamePlayerBlack = $namePlayerBlack;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getnamePlayerWhite()
    {
        return $this->_NamePlayerWhite;
    }

    function getNamePlayerBlack()
    {
        return $this->_NamePlayerBlack;
    }

    function getGameName()
    {
        return $this->_GameName;
    }

    public function getStartDate() {
        return $this->_StartDate;
    }

    public function getStartHour() {
        return $this->_StartHour;
    }

    public function getEndDate() {
        return $this->_EndDate;
    }

    public function getEndHour() {
        return $this->_EndHour;
    }

    public function getState() {
        return $this->_State;
    }

    public function getWinner() {
        return $this->_Winner;
    }


    function get($filter)
    {
        $gamesDAL = new GamesListDataAccess();
        $rs = $gamesDAL->get($filter);
		$gamesList =  array();
        foreach ($rs as $game)
        {
            $oGamesBusinessLogic = new GamesListBusinessLogic();
            $oGamesBusinessLogic->Init($game['ID'],$game['title'],$game['StartDate'],$game['StartHour'],$game['state'],$game['winner'],$game['EndDate'],$game['EndHour'],$game['White'],$game['Black']);
            array_push($gamesList,$oGamesBusinessLogic);
        }
        
        return $gamesList;
    }
}