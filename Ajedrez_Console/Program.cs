namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");
            ChessGame chess = new ChessGame();
            chess.DrawBoard();

            BoardPosition fromPosition = new BoardPosition(6, 0);
            BoardPosition toPosition = new BoardPosition(4, 0);

            chess.TryToMove(fromPosition, toPosition);


            chess.DrawBoard();
            var code = chess.GetBoardAsStringToChessWeb();
            Console.WriteLine(code);
            Console.WriteLine("Chess Console Test Has Ended...");
        }
    }
}