namespace ChessAPI
{
    public class Movement
    {
        private BoardPosition _fromBoardPosition;
        private BoardPosition _toBoardPosition;

        public Movement(BoardPosition fromBoardPosition, BoardPosition toBoardPosition)
        {
            _fromBoardPosition = fromBoardPosition;
            _toBoardPosition = toBoardPosition;
        }

        public bool IsValid()
        {
            int fromRow = _fromBoardPosition.Row;
            int fromColumn = _fromBoardPosition.Column;
            int toRow = _toBoardPosition.Row;
            int toColumn = _toBoardPosition.Column;


            bool isValid = (fromRow >= 0 && fromRow <= 7 && fromColumn >= 0 && fromColumn <= 7)
                && (toRow >= 0 && toRow <= 7 && toColumn >= 0 && toColumn <= 7);

            return isValid;
        }

        public BoardPosition GetFromBoardPosition()
        {
            return _fromBoardPosition;
        }

        public BoardPosition GetToBoardPosition()
        {
            return _toBoardPosition;
        }
    }
}
