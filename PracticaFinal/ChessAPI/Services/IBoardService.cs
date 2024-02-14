using ChessAPI.Model;

public interface IBoardService
{      
    BoardScore GetScore(string boardStatus); 
    object[] GetMovementValidation(string boardStatus, int fromCol , int fromRow, int toCol, int toRow);
}