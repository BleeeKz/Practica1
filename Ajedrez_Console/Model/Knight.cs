namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return Config.KnightPieceValue;
        }
    }
}