namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {
        }

         public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            var valid = MovementType.InvalidNormalMovement;
           
            if(movement.fromRow == movement.toRow || movement.fromColumn == movement.toColumn)
            {
                valid = MovementType.InvalidNormalMovement;
            }
                


            int difMovColumn = Math.Abs(movement.fromColumn - movement.toColumn);
            int difMovRow = Math.Abs(movement.fromRow - movement.toRow);

            if((difMovColumn == 1 && difMovRow == 2)|| (difMovColumn == 2 && difMovRow == 1)){
                valid = MovementType.ValidNormalMovement;
            }

            return valid;
        }

        public override int GetScore()
        {
            return Config.KnightPieceValue;
        }
    }
}
