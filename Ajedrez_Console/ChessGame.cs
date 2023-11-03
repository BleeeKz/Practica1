namespace ChessAPI
{
    internal class ChessGame
    {
        private Board board;


        public ChessGame()
        {
            board = new Board();
        }

        public void DrawBoard()
        {
            this.board.Draw();
        }

        public void TryToMove(BoardPosition fromPosition, BoardPosition toPosition)
            {
                Movement testMovement = new Movement(fromPosition, toPosition);

                if (testMovement.IsValid())
                {
                    board.Move(testMovement);
                }
                else
                {
                    Console.WriteLine("Wrong movement");
                }
            }

        public string GetBoardAsStringToChessWeb()
        {
            return board.GetBoardState();
        }

    }
}
