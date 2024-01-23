using ChessAPI.Model;

public interface IBoardService
{      
    BoardScore GetScore(string boardStatus); 
    // BoardScore GetScore(Dictionary<string,int> materialValue); 
    // Dictionary<string,int> CalculateMaterialValue();
}