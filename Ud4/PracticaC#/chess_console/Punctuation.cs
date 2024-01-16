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

        public string getDistanceMessage()
        {
            return _distanceMessage;
        }

        public int getMaterialValueWhitePieces()
        {
            return _materialValueWhitePieces;
        }

        public int getMaterialValueBlackPieces()
        {
            return _materialValueBlackPieces;
        }


        

        // public static void createDistanceMessage()
        // {

            
        //  if(_materialValueBlackPieces > _materialValueWhitePieces)
        //  {
        //     _distanceMessage =  "The black pieces are winning with a distance of "+(_materialValueBlackPieces - _materialValueWhitePieces);
        //  }  
        //  else if(_materialValueWhitePieces > _materialValueBlackPieces)
        //  {
        //     _distanceMessage = "The white pieces are winning with a distance of "+( _materialValueWhitePieces - _materialValueBlackPieces);
        //  }
        //  else if(_materialValueWhitePieces == _materialValueBlackPieces)
        //  {
        //     _distanceMessage = "Both have the same points";
        //  }
        //  else {
        //     _distanceMessage = "ERROR";
        //  }
         
        // }

        // public static Punctuation obtainPunctuation(string boardStatus)
        // {
        //     calculateMaterialValue(boardStatus);
            
        //     createDistanceMessage();

        //     Punctuation puntuacion = new Punctuation (_materialValueWhitePieces,_materialValueBlackPieces,_distanceMessage);

        //     return puntuacion;

        // }


        

    }

    
}