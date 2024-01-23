public class BoardScore
{
    // private string _test_dummy;
    // public BoardScore(string test_dummy)
    // {
    //     this.Test_dummy = test_dummy;
    // }

    // public string Test_dummy { get => _test_dummy; set => _test_dummy = value; }


        public  int _materialValueWhitePieces {get;set;}
        public  int _materialValueBlackPieces {get;set;}
        public  string _distanceMessage {get;set;}

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