namespace ChessAPI.Model
{
    public class Board
    {
        private Piece[,] _boardPieces;
        //+Borrame
        private string dummy_board; //Cadena de prueba para verificar la longitud de la cadena recibida.
        //-Borrame

        public Board(string board)
        {
            //+TODO Inicializa _boardPieces con la información de board
            
            //-

            //+Borrame
            this.dummy_board = board;
            //-Borrame

        } 

        //TODO Cambiar este método que devuelva el objeto requerido en la práctica 
        public BoardScore GetScore()
        {
            return new BoardScore(dummy_board.Length +"_" +this.dummy_board);
        }
    }
}