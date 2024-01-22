using System.IO.Pipes;
using System.Runtime.InteropServices;
using ChessAPI.Model;

namespace ChessAPI
{
    internal class Board
    {
        private Piece[,] board;

        public Board()
        {
            board = new Piece[8, 8];
            //TODO Practica 02_7
            // Este constructor colocará las piezas en el tablero
            board[0,0] = new Rook(Piece.ColorEnum.BLACK);
            board[0,1] = new Knight(Piece.ColorEnum.BLACK);
            board[0,2] = new Bishop(Piece.ColorEnum.BLACK);
            board[0,3] = new Queen(Piece.ColorEnum.BLACK);
            board[0,4] = new King(Piece.ColorEnum.BLACK);
            board[0,5] = new Bishop(Piece.ColorEnum.BLACK);
            board[0,6] = new Knight(Piece.ColorEnum.BLACK);
            board[0,7] = new Rook(Piece.ColorEnum.BLACK);

            for (int i = 0; i < 8; i++)
            {
                board[1,i] = new Pawn(Piece.ColorEnum.BLACK);
            }

            for (int i = 0; i < 8; i++)
            {
                board[6,i] = new Pawn(Piece.ColorEnum.WHITE);
            }

            board[7,0] = new Rook(Piece.ColorEnum.WHITE);
            board[7,1] = new Knight(Piece.ColorEnum.WHITE);
            board[7,2] = new Bishop(Piece.ColorEnum.WHITE);
            board[7,3] = new Queen(Piece.ColorEnum.WHITE);
            board[7,4] = new King(Piece.ColorEnum.WHITE);
            board[7,5] = new Bishop(Piece.ColorEnum.WHITE);
            board[7,6] = new Knight(Piece.ColorEnum.WHITE);
            board[7,7] = new Rook(Piece.ColorEnum.WHITE);
        }

        public Board(string boardStatus)
        {
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
        }


        public Piece GetPiece(int row, int column)
        {
            return board[row, column];
        }


        
        public void Move(Movement movement)
        {
            if (movement.IsValid())
            {
                _Move(movement);
            }
        }
        // TODO Practica 02_3
        //Implementar el método _move, que no realizará ninguna validación
        //simplemente moverá en la matriz la pieza. Realiza modificaciones
        //en otras clases si lo consideras necesario...
        private void _Move(Movement movement)
        {
            int fromRow = movement.GetFromBoardPositionRow();
            int fromColumn = movement.GetFromBoardPositionColumn();
            int toRow = movement.GetToBoardPositionRow();
            int toColumn = movement.GetToBoardPositionColumn();

            board[toRow,toColumn] = board[fromRow,fromColumn];
            
            board[fromRow,fromColumn] = null;
        }

        // TODO Practica 02_4
        //Este método escribira por consola el tablero,
        //haciendo un salto de línea después de cada fila.
        //Para ver el formato del pintado, leer enunciado de la práctica
        public void Draw()
        {
            Console.WriteLine("Dibujando...");
            for (int row = 0; row < 8; row++)
            {
                
                for (int column = 0; column < 8; column++)
                {
                    
                    if (board[row,column] != null)
                    {
                        Console.Write(board[row, column].GetCode());
                    }else
                    {
                        if ((row + column) % 2 != 0)
                        {
                            Console.Write("|0000|");
                        }else
                        {
                            Console.Write("|####|");
                        }
                    }
                   
                }
                Console.WriteLine();
            }

        }
        // TODO Practica 02_5
        //Este método devuelve una cadena con el estado del tablero. Dicha cadena,
        //ha de tener el formato esperado por la parte Web para poder procesarse
        //y pintarse.
        public string GetBoardState()
        {
            string result = String.Empty;
            
            
            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    
                     if (board[row,column] != null)
                    {
                        result = result + board[row,column].GetCode().Substring(1,4);
                    }else
                    {if ((row + column) % 2 != 0)
                        {
                            result = result + "0000";
                        }else
                        {
                            result = result + "####";
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


         public BoardScore GetScore(Dictionary<string,int> materialValue)
        {
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

         BoardScore puntuacion = new BoardScore(materialValue["WHITE"],materialValue["BLACK"],distanceMessage);

         return puntuacion;
         
        }



    }
}