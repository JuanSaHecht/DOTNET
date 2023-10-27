namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");
            ChessGame chess = new ChessGame();
            Board board = new Board();
            chess.DrawBoard();
            chess.TryToMove();
            chess.DrawBoard();
            // var code = chess.GetBoardAsStringToChessWeb();
            // Console.WriteLine(code);
            Console.WriteLine("End. Chess Console Test...");
            // Console.WriteLine(board.GetBoardState());
        }
    }
}