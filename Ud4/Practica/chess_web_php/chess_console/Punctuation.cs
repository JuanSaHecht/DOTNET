namespace ChessAPI
{
    public class Punctuation
    {
        private int _materialValueWhitePieces;
        private int _materialValueBlackPieces;
        private string _distanceMessage;

        public Punctuation (
            // int materialValueWhitePieces, int materialValueBlackPieces, string distanceMessage
            )
        {
            // _materialValueWhitePieces = materialValueWhitePieces;
            // _materialValueBlackPieces = materialValueBlackPieces;
            // _distanceMessage = distanceMessage;
        }


        public void calculateMaterialValue (string boardStatus)
        {

            string [] boardStatusArray = boardStatus.Split(",");
            int whitePiecesValue = 0;
            int blackPiecesValue = 0;

            string [] pieces = {"PE", "CA", "AL", "TO","RE","RY"};
            tablaValorPiezasBlancas = array("PE"=>1, "CA"=>3, "AL"=>3,"TO"=>5,"RE"=>9);

            for (int i = 0; i < boardStatusArray.Count(); i++)
            {

                

                if (boardStatusArray[i].Substring(0,2).ToUpper() != "KI" || boardStatusArray[i].Substring(0,2).ToUpper() != "####" || boardStatusArray[i].Substring(0,2).ToUpper() != "0000")
                {
                    if (boardStatusArray[i].Substring(2).ToUpper() == "WH")
                    {
                        whitePiecesValue
                    }
                    else if (boardStatusArray[i].Substring(2).ToUpper() == "BL")
                    {
                        Console.WriteLine(boardStatusArray[i]);
                    }
                    else
                    {
                        Console.WriteLine(boardStatusArray[i]);
                    } 
                }

               
            }

        }

        public void createArrayBoardStatus(string boardStatus)
        {

        }

        

    }

    
}