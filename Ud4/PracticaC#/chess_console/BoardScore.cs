namespace ChessAPI
{
    public class BoardScore
    {
        private  int _materialValueWhitePieces;
        private  int _materialValueBlackPieces;
        private  string _distanceMessage;

        public BoardScore ()
        {
           
        }

        public BoardScore (int materialValueWhitePieces, int materialValueBlackPieces, string distanceMessage)
        {
            _materialValueWhitePieces = materialValueWhitePieces;
            _materialValueBlackPieces = materialValueBlackPieces;
            _distanceMessage = distanceMessage;
        }

        public string GetDistanceMessage()
        {
            return _distanceMessage;
        }

        public int GetMaterialValueWhitePieces()
        {
            return _materialValueWhitePieces;
        }

        public int GetMaterialValueBlackPieces()
        {
            return _materialValueBlackPieces;
        }


        

       


        

    }

    
}