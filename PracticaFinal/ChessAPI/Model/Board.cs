namespace ChessAPI.Model
{
    public class Board
    {
        public Piece[,] board {get;set;}
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


        public Piece this[int index1,int index2]
    {
        get { return board[index1,index2]; }
        set { board[index1,index2] = value; }
    }

// AÑADIDO
        public void Move(Movement movement)
        {
            if (movement.IsValid())
            {
                _Move(movement);
            }
        }
       
        private void _Move(Movement movement)
        {
            int fromRow = movement.fromRow;
            int fromColumn = movement.fromColumn;
            int toRow = movement.toRow;
            int toColumn = movement.toColumn;

            board[toRow,toColumn] = board[fromRow,fromColumn];
            
            board[fromRow,fromColumn] = null;
        }


        public string GetBoardState()
        {
            string result = String.Empty;
            
            
            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    
                     if (this.board[row,column] != null)
                    {
                        result = result + this.board[row,column].GetCode();
                    }else
                    {if ((row + column) % 2 != 0)
                        {
                            result = result + "0000";
                        }else
                        {
                            result = result + "0000";
                        }
                    }

                    if (row != 7 || column != 7) // Adds "," to the end of each piece
                        {
                        result += ",";
                        }
                    }
            }

            return result;

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