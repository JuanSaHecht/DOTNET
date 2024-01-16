namespace ChessAPI.Model
{
    public abstract class Piece
    {
        public enum ColorEnum { WHITE, BLACK }
        public readonly ColorEnum _color;
        public virtual String GetCode()
        {
            string code = this.GetType().Name.Substring(0,2).ToUpper();
            string color = this._color.ToString().Substring(0,2).ToUpper();
            return $"|{code}{color}|";
        }

        public virtual String GetFenCode()
        {
            string code = String.Empty;

            if (this.GetType().Name == "KNIGHT" && this._color == Piece.ColorEnum.BLACK )
            {
                code = "n";
            }else if (this.GetType().Name.ToUpper() == "KNIGHT" && this._color == Piece.ColorEnum.WHITE)
            {
                code = "N";
            }else if (this._color == Piece.ColorEnum.BLACK) 
            {
                code = this.GetType().Name.Substring(0,1).ToLower();
            }else
            {
                code = this.GetType().Name.Substring(0,1).ToUpper();
            }

            return $"|{code}|";
        }

        public abstract int GetScore();

        public Piece(ColorEnum color)
        {
            _color = color;
        }
    }
}



