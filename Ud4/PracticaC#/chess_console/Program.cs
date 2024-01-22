﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            // Console.WriteLine("Begin Chess Console Test...");
            // ChessGame chess = new ChessGame();
            // Board board = new Board();
            // chess.DrawBoard();
            // chess.TryToMove();
            // chess.DrawBoard();
            // var code = chess.GetBoardAsStringToChessWeb();
            // Console.WriteLine(code);
            // Console.WriteLine("End. Chess Console Test...");
            // Console.WriteLine(board.GetBoardState());

            // Punctuation puntuacion = new Punctuation();

            Board board = new Board("ROWH,KNWH,0000,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL");

           BoardScore puntuacion = board.GetScore(board.CalculateMaterialValue());
            
            Console.WriteLine(puntuacion.GetMaterialValueWhitePieces());
            Console.WriteLine(puntuacion.GetMaterialValueBlackPieces());
            Console.WriteLine(puntuacion.GetDistanceMessage());


            // Punctuation prueba = Punctuation.obtainPunctuation("ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL");

            // Punctuation prueba2 = Punctuation.obtainPunctuation("0000,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,0000,####,0000,####,0000,####,0000,####,####,0000,####,0000,####,0000,####,0000,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,0000,####,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL");

            // Console.WriteLine(prueba.getDistanceMessage());
            // Console.WriteLine(prueba2.getDistanceMessage());
        }
    }
}