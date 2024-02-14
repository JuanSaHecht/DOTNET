<?php

require("../DataAccess/movementApiDataAccess.php");

class MovementApiBusinessLogic
{
    private $_boardStatus;
    private $_fromCol;

    private $_fromRow;

    private $_toCol;
    private $_toRow;


	function __construct()
    {
    }

    function init($boardStatus,$fromCol,$fromRow,$toCol,$toRow)
    {
        $this->_boardStatus = $boardStatus;
        $this->_fromCol = $fromCol;
        $this->_fromRow = $fromRow;
        $this->_toCol = $toCol;
        $this->_toRow = $toRow;
    }

   
    public function getBoardStatus() {
        return $this->_boardStatus;
    }

    public function getFromCol() {
        return $this->_fromCol;
    }

    public function getFromRow() {
        return $this->_fromRow;
    }

    public function getToCol() {
        return $this->_toCol;
    }

    public function getToRow() {
        return $this->_toRow;
    }

    function get($boardStatus,$fromCol,$fromRow,$toCol,$toRow)
    {
        $movementApiDAL = new MovementApiDataAccess();
        $rs = $movementApiDAL->get($boardStatus,$fromCol,$fromRow,$toCol,$toRow);
        
            $oMovementApiBusinessLogic = new MovementApiBusinessLogic();
            $oMovementApiBusinessLogic->init($boardStatus,$fromCol,$fromRow,$toCol,$toRow);
        
            $oMovementApiBusinessLogic;

            return $rs;
    }
}