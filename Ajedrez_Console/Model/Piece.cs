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

        public abstract int GetScore();

        public Piece(ColorEnum color)
        {
            _color = color;
        }

        

        
    }
}



