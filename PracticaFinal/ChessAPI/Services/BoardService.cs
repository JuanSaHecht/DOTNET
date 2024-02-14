using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore GetScore(string boardStatus)
    {
        Board b  = new Board(boardStatus);
        var score = b.GetScore();

        return score;
    }

   public object[] GetMovementValidation(string boardStatus, int fromCol , int fromRow, int toCol, int toRow)
   {
        Movement movement = new Movement(fromCol, fromRow, toCol, toRow);
        Board b  = new Board(boardStatus);
        Piece.MovementType type = b[fromRow,fromCol].Validate(movement,b.board);;

        bool boolType;
        string boardStatusMoved = boardStatus;

        if((int)type == 0)
        {
            b.Move(movement);
            boardStatusMoved = b.GetBoardState();
            boolType = true;
        }else 
        {
            boolType = false;
        }

        object[] resultArray = new object[]
        {
            boolType,
            boardStatusMoved
        };

        return resultArray;

   }
}

