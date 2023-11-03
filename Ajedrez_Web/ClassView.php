<?php

function DrawChessGame($board) {
    
    $pieceNames = array(
        'r' => 'Rook_B',
        'n' => 'Knight_B',
        'b' => 'Bishop_B',
        'q' => 'Queen_B',
        'k' => 'King_B',
        'p' => 'Pawn_B',
        'R' => 'Rook_W',
        'N' => 'Knight_W',
        'B' => 'Bishop_W',
        'Q' => 'Queen_W',
        'K' => 'King_W',
        'P' => 'Pawn_W',
    );

    
    $pieces = str_split($board);

    echo '<table class="chess-board">';
    for ($row = 0; $row < 8; $row++) {
        echo '<tr>';
        for ($col = 0; $col < 8; $col++) {
            $pieceCode = $pieces[$row * 8 + $col];
            $isWhiteBackground = ($row + $col) % 2 == 0;
            $cellClass = $isWhiteBackground ? 'white' : 'black';
            echo '<td class="' . $cellClass . '">';

            if ($pieceCode != '0') {
                $pieceName = $pieceNames[$pieceCode];
                echo '<img src="img/' . $pieceName . '.png" alt="' . $pieceName . '">';
            }

            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

$boardState = "rnbqkbnrpppppppp0000000000000000P0000000000000000PPPPPPPRNBQKBNR";

$captured_pieces['white'][] = 'Pawn_W';
$captured_pieces['black'][] = 'Knight_B';

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Chess_game_styles.css">
</head>
<body>

    <div class="white-captured">
            <ul>
                <?php
                foreach ($captured_pieces['white'] as $piece) {
                    echo "<li><img src='img/$piece.png' alt='$piece'></li>";
                }
                ?>
            </ul>
    </div>

    <?php
    
    DrawChessGame($boardState);
    ?>

    <div class="black-captured">
            <ul>
                <?php
                foreach ($captured_pieces['black'] as $piece) {
                    echo "<li><img src='img/$piece.png' alt='$piece'></li>";
                }
                ?>
            </ul>
    </div>
</body>
</html>