using System.IO.Pipes;
using System.Runtime.InteropServices;
using ChessAPI.Model;

namespace ChessAPI
{
    internal class Board
    {
        public Piece[,] board;

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


    }
}