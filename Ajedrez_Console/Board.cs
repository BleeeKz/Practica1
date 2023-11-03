using System.Text;
using ChessAPI.Model;

namespace ChessAPI
{
    internal class Board
    {
        public Piece[,] board;

        public Board()
        {
            board = new Piece[8, 8];

            for (int column = 0; column < 8; column++)
            {
                board[1, column] = new Pawn(Piece.ColorEnum.BLACK);
            }

            for (int column = 0; column < 8; column++)
            {
                board[6, column] = new Pawn(Piece.ColorEnum.WHITE);
            }

            board[0, 0] = new Rook(Piece.ColorEnum.BLACK);
            board[0, 7] = new Rook(Piece.ColorEnum.BLACK);
            board[7, 0] = new Rook(Piece.ColorEnum.WHITE);
            board[7, 7] = new Rook(Piece.ColorEnum.WHITE);

            board[0, 1] = new Knight(Piece.ColorEnum.BLACK);
            board[0, 6] = new Knight(Piece.ColorEnum.BLACK);
            board[7, 1] = new Knight(Piece.ColorEnum.WHITE);
            board[7, 6] = new Knight(Piece.ColorEnum.WHITE);

            board[0, 2] = new Bishop(Piece.ColorEnum.BLACK);
            board[0, 5] = new Bishop(Piece.ColorEnum.BLACK);
            board[7, 2] = new Bishop(Piece.ColorEnum.WHITE);
            board[7, 5] = new Bishop(Piece.ColorEnum.WHITE);

            board[0, 3] = new Queen(Piece.ColorEnum.BLACK);
            board[7, 3] = new Queen(Piece.ColorEnum.WHITE);

            board[0, 4] = new King(Piece.ColorEnum.BLACK);
            board[7, 4] = new King(Piece.ColorEnum.WHITE);
        }
        public Piece GetPiece(int row, int column)
        {
            return board[row, column];
        }


        
        public void Move(Movement movement)
        {
            if (movement.IsValid())
            {
                _Move(movement);
            }
        }

        private void _Move(Movement movement)
        {
            BoardPosition fromPosition = movement.GetFromBoardPosition();
            BoardPosition toPosition = movement.GetToBoardPosition();

            Piece piece = board[fromPosition.Row, fromPosition.Column];
            board[toPosition.Row, toPosition.Column] = piece;
            board[fromPosition.Row, fromPosition.Column] = null;
        }


        public void Draw()
        {
            Console.WriteLine();

            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    bool isWhiteBackground = (row + column) % 2 == 0;
                    string background = isWhiteBackground ? "0000" : "####";

                    Piece piece = board[row, column];

                    if (piece == null)
                    {
                        Console.Write($"|{background}|");
                    }
                    else
                    {
                        string pieceCode = GetPieceCode(piece);
                        Console.Write($"|{pieceCode}|");
                    }
                }
                Console.WriteLine();
            }

            Console.WriteLine();
        }

        private string GetPieceCode(Piece piece)
        {
            string pieceName = piece.GetType().Name;
            string colorName = piece._color.ToString();
            return $"{pieceName.Substring(0, 2).ToUpper()}{colorName.Substring(0, 2).ToUpper()}";
        }
        
        public string GetBoardState()
        {
            StringBuilder boardState = new StringBuilder(64);

            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    Piece piece = board[row, column];
                    if (piece != null)
                    {
                        if (piece._color == Piece.ColorEnum.WHITE)
                        {
                            boardState.Append(BoardCode(piece));
                        }
                        else
                        {
                            boardState.Append(BoardCode(piece).ToLower());
                        }
                    }
                    else
                    {
                        boardState.Append("0");
                    }
                }
            }

            return boardState.ToString();
        }

        private string BoardCode(Piece piece)
        {
            if (piece == null)
            {
                return "0";
            }

            string pieceCode;

            if (piece.GetType() == typeof(Pawn))
            {
                pieceCode = "P";
            }
            else if (piece.GetType() == typeof(Knight))
            {
                pieceCode = "N";
            }
            else if (piece.GetType() == typeof(Bishop))
            {
                pieceCode = "B";
            }
            else if (piece.GetType() == typeof(Rook))
            {
                pieceCode = "R";
            }
            else if (piece.GetType() == typeof(Queen))
            {
                pieceCode = "Q";
            }
            else if (piece.GetType() == typeof(King))
            {
                pieceCode = "K";
            }
            else
            {
                pieceCode = "0";
            }

            return piece._color == Piece.ColorEnum.WHITE ? pieceCode.ToUpper() : pieceCode.ToLower();
        }

    }
}
