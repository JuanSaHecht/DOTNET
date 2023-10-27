namespace ChessAPI
{
    public class Movement
    {
        private BoardPosition _fromBoardPosition;
        private BoardPosition _toBoardPosition;

        public Movement(BoardPosition fromBoardPosition, BoardPosition toBoardPosition)
        {
            _fromBoardPosition = fromBoardPosition;
            _toBoardPosition = toBoardPosition;
        }


        /// TODO Practica 02_1
        /// Ha de validar el rango de los 2 objetos BoardPosition encapsulados
        /// en esta clase.
        public bool IsValid()
        {
            if (_fromBoardPosition.Isvalid() && _toBoardPosition.Isvalid())
            {
                    return true;
                
            }
                return false;    
        }

        public int GetFromBoardPositionRow ()
        {
           return this._fromBoardPosition.GetRow();
        }

        public int GetFromBoardPositionColumn ()
        {
            return this._fromBoardPosition.GetColumn();
        }

        public int GetToBoardPositionRow ()
        {
            return this._toBoardPosition.GetRow();
        }

        public int GetToBoardPositionColumn ()
        {
            return this._toBoardPosition.GetColumn();
        }
    }
}
