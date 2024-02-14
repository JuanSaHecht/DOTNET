<?php

require("../DataAccess/addBoardStatusGameDataAccess.php");

class AddBoardStatusGameBusinessLogic
{
    private $_BoardStatus;

	function __construct()
    {
    }

    function init($boardStatus)
    {
        $this->_BoardStatus = $boardStatus;
    }


    function getBoardStatus()
    {
        return $this->_BoardStatus;
    }



    function get($boardStatus)
    {
        $addGameDAL = new AddBoardStatusGameDataAccess();
       $addGameDAL->get($boardStatus);
        
            $oAddGameBusinessLogic = new AddBoardStatusGameBusinessLogic();
            $oAddGameBusinessLogic->init($boardStatus);
    }
}