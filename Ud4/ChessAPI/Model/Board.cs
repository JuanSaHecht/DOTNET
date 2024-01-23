namespace ChessAPI.Model
{
    public class Board
    {
        private Piece[,] board;
        //+Borrame
        private string dummy_board; //Cadena de prueba para verificar la longitud de la cadena recibida.
        //-Borrame

        public Board(string boardStatus)
        {
            //+TODO Inicializa _boardPieces con la información de board
             
            string [] boardStatusArray = boardStatus.Split(",");
            
            board = new Piece[8, 8];

            int arrayPosition = 0;

            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int j = 0; j < board.GetLength(1); j++)
                {
                    if (boardStatusArray[arrayPosition].Substring(2).ToUpper()== "WH")
                    {
                        if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "PA")
                        {
                            board[i,j] = new Pawn(Piece.ColorEnum.WHITE);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "RO")
                        {
                            board[i,j] = new Rook(Piece.ColorEnum.WHITE);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "KN")
                        {
                            board[i,j] = new Knight(Piece.ColorEnum.WHITE);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "BI")
                        {
                            board[i,j] = new Bishop(Piece.ColorEnum.WHITE);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "KI")
                        {
                            board[i,j] = new King(Piece.ColorEnum.WHITE);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "QU")
                        {
                            board[i,j] = new Queen(Piece.ColorEnum.WHITE);
                        }
                    }
                    else if (boardStatusArray[arrayPosition].Substring(2).ToUpper()== "BL")
                    {
                         if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "PA")
                        {
                            board[i,j] = new Pawn(Piece.ColorEnum.BLACK);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "RO")
                        {
                            board[i,j] = new Rook(Piece.ColorEnum.BLACK);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "KN")
                        {
                            board[i,j] = new Knight(Piece.ColorEnum.BLACK);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "BI")
                        {
                            board[i,j] = new Bishop(Piece.ColorEnum.BLACK);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "KI")
                        {
                            board[i,j] = new King(Piece.ColorEnum.BLACK);
                        } 
                        else if (boardStatusArray[arrayPosition].Substring(0,2).ToUpper()== "QU")
                        {
                            board[i,j] = new Queen(Piece.ColorEnum.BLACK);
                        }
                    }               
                    arrayPosition++;
                }
            }
        
            //-

            //+Borrame
            this.dummy_board = boardStatus;
            this.board = board;
            //-Borrame

        } 

        //TODO Cambiar este método que devuelva el objeto requerido en la práctica 
        public Dictionary<string,int> CalculateMaterialValue()
        {
            Dictionary<string,int> materialValue = new Dictionary<string,int>();
            int whitePiecesValue = 0;
            int blackPiecesValue = 0;


            for (int i = 0; i < this.board.GetLength(0); i++)
            {
                for (int j = 0; j < this.board.GetLength(1); j++)
                {
                    
                    if (this.board[i,j] != null && this.board[i,j].GetType().Name.ToUpper() != "KING")
                    {
                        if (this.board[i,j]._color == Piece.ColorEnum.WHITE)
                        {
                            whitePiecesValue+=this.board[i,j].GetScore();
                        }
                        else if (this.board[i,j]._color == Piece.ColorEnum.BLACK)
                        {
                            blackPiecesValue+=this.board[i,j].GetScore();
                        }

                    }

               
                }
               
            }

            materialValue.Add("BLACK",blackPiecesValue);
            materialValue.Add("WHITE",whitePiecesValue);
            

            return materialValue;

        }


         public BoardScore GetScore()
        {   

            Dictionary<string,int> materialValue = CalculateMaterialValue();
            string distanceMessage;
            
         if(materialValue["BLACK"] > materialValue["WHITE"])
         {
            distanceMessage =  "The black pieces are winning with a distance of "+(materialValue["BLACK"] - materialValue["WHITE"]);
         }  
         else if(materialValue["WHITE"] > materialValue["BLACK"])
         {
            distanceMessage = "The white pieces are winning with a distance of "+( materialValue["WHITE"] - materialValue["BLACK"]);
         }
         else if(materialValue["WHITE"] == materialValue["BLACK"])
         {
            distanceMessage = "Both have the same points";
         }
         else {
            distanceMessage = "ERROR";
         }

         BoardScore boardScore = new BoardScore(materialValue["WHITE"],materialValue["BLACK"],distanceMessage);

         return boardScore;
         
        }
    }
}