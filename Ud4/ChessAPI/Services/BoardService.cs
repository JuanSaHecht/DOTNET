using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore GetScore(string boardStatus)
    {
        Board b  = new Board(boardStatus);
        var score = b.GetScore();

        return score;
    }
}