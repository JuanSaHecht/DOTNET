namespace examen
{
    public class Posicion
    {
        private int _x;
        private int _y;

        public Posicion(int x, int y)
        {
            this._x = x;
            this._y = y;
        }

        public int X
        {
            get { return _x; }
            set {_x = value;}
        }

        public int Y
        {
            get { return _y; }
            set {_y = value;}
        }
        public override string ToString()
        {
            return $"x= {this._x},y= {this._y}";
        }
    }
}