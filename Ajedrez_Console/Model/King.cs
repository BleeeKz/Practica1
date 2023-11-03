namespace ChessAPI.Model
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return Config.KingPieceValue;
        }
    }
}