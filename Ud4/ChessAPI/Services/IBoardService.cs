using ChessAPI.Model;

public interface IBoardService
{      
    BoardScore GetScore(string boardStatus); 
    object[] GetMovementValidation(string boardStatus, int fromCol , int fromRow, int toCol, int toRow);
    // BoardScore GetScore(Dictionary<string,int> materialValue); 
    // Dictionary<string,int> CalculateMaterialValue();
}