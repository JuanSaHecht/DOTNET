<?php

require("../DataAccess/boardStatusApiDataAccess.php");

class BoardStatusApiBusinessLogic
{
    private $_MaterialValueWhitePieces;
    private $_MaterialValueBlackPieces;

    private $__DistanceMessage;


	function __construct()
    {
    }

    function init($materialValueWhitePieces,$materialValueBlackPieces,$distanceMessage)
    {
        $this->_MaterialValueWhitePieces = $materialValueWhitePieces;
        $this->_MaterialValueBlackPieces = $materialValueBlackPieces;
        $this->__DistanceMessage = $distanceMessage;
    }

   
    public function getMaterialValueWhitePieces() {
        return $this->_MaterialValueWhitePieces;
    }

    public function getMaterialValueBlackPieces() {
        return $this->_MaterialValueBlackPieces;
    }

    public function getDistanceMessage() {
        return $this->__DistanceMessage;
    }


    function get($boardStatus)
    {
        $boardStatusApiDAL = new BoardStatusApiDataAccess();
        $rs = $boardStatusApiDAL->get($boardStatus);
        
            $oBoardStatusApiBusinessLogic = new BoardStatusApiBusinessLogic();
            $oBoardStatusApiBusinessLogic->init($rs["_materialValueWhitePieces"],$rs["_materialValueBlackPieces"],$rs["_distanceMessage"]);
        
            $oBoardStatusApiBusinessLogic;
        return $oBoardStatusApiBusinessLogic;
    }
}