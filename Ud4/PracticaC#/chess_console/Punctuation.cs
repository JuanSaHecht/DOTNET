namespace ChessAPI
{
    public class Punctuation
    {
        private  int _materialValueWhitePieces;
        private  int _materialValueBlackPieces;
        private  string _distanceMessage;

        public Punctuation ()
        {
           
        }

        public Punctuation (int materialValueWhitePieces, int materialValueBlackPieces, string distanceMessage)
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