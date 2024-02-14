<?php

require("../DataAccess/addGameDataAccess.php");

class AddGameBusinessLogic
{
    private $_IdPlayer1;
    private $_IdPlayer2;
    private $_GameName;

	function __construct()
    {
    }

    function init($IdPlayer1,$IdPlayer2,$gameName)
    {

        $this->_IdPlayer1 = $IdPlayer1;
        $this->_IdPlayer2 = $IdPlayer2;
        $this->_GameName = $gameName;
    }

    function getIdPlayer1()
    {
        return $this->_IdPlayer1;
    }

    function getIdPlayer2()
    {
        return $this->_IdPlayer2;
    }

    function getGameName()
    {
        return $this->_GameName;
    }


    function get($IdPlayer1,$IdPlayer2,$gameName)
    {
        $addGameDAL = new AddGameDataAccess();
       $addGameDAL->get($IdPlayer1,$IdPlayer2,$gameName);
        
            $oAddGameBusinessLogic = new AddGameBusinessLogic();
            $oAddGameBusinessLogic->Init($IdPlayer1,$IdPlayer2,$gameName);
    }
}