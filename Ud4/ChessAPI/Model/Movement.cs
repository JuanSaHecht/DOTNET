using System;
namespace ChessAPI.Model
{
    public class Movement
    {

        // AÑADIDOS GETTERS Y SETTERS
        public int fromColumn {get;set;}
        public int fromRow {get;set;}
        public int toColumn {get;set;}
        public int toRow {get;set;}

        public Movement(){ }

        public Movement(int fromColumn, int fromRow, int toColumn, int toRow)
        {
            this.fromColumn = fromColumn;
            this.fromRow = fromRow;
            this.toColumn = toColumn;
            this.toRow = toRow;
        }
        private bool ValidateRangeNumber(int x)
        {
            return (x >= 0 && x <= 7);
        }
        public bool IsValid()
        {
            bool x1 = ValidateRangeNumber(fromColumn);
            bool x2 = ValidateRangeNumber(fromRow);
            bool x3 = ValidateRangeNumber(toColumn);
            bool x4 = ValidateRangeNumber(toRow);

            return (x1 && x2 && x3 && x4);
        }

        public bool IsSameColumn()
        {
            return fromColumn == toColumn;
        }

        public int RowDistance()
        {
            int rowFactor = this.fromRow - this.toRow;
            return Math.Abs(rowFactor);
        }
    }
}
