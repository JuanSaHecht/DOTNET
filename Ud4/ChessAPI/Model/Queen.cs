namespace ChessAPI.Model
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            Rook rook = new Rook(ColorEnum.WHITE);
            Bishop bishop = new Bishop(ColorEnum.WHITE);


            if (bishop.ValidateSpecificRulesForMovement(movement,board) == MovementType.ValidNormalMovement | rook.ValidateSpecificRulesForMovement(movement,board) == MovementType.ValidNormalMovement)
            {
                return MovementType.ValidNormalMovement;
            }else
            {
                return MovementType.InvalidNormalMovement;
            }
        
        }

        public override int GetScore()
        {
            return Config.QueenValue;
        }
    }
}
