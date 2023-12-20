<?php
require_once 'matchesService.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whitePlayerID = $_POST["whitePlayer"];
    $blackPlayerID = $_POST["blackPlayer"];
    $gameTitle = $_POST["gameTitle"];

    $matchesService = new MatchesService();

    $newGameID = $matchesService->createNewGame($whitePlayerID, $blackPlayerID, $gameTitle);

    if ($newGameID === false) {
        echo "Error, game was not created.";
    }
}

$gameInfo = $matchesService->getGameInfo($newGameID);

$capturedPieces = array('white' => array(), 'black' => array());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="boardView.css">
    <script src="date.js" defer></script>
</head>

    <header>
        <div class="game-info">
            <?php
            if ($newGameID !== false) {
                echo "<p>Match nº: {$gameInfo['ID']} | Player1: {$gameInfo['white']} | Player2: {$gameInfo['black']} | Match Name: {$gameInfo['title']} | Status: {$gameInfo['state']}</p>";
            }
            ?>
        </div>
    </header>


<body>

    <nav>
        <a href="new_gameView.php">New Game</a>
        <a href="gameListView.php">Game List</a>
    </nav>

    <div class="content">
        <div class="chess-board-container">
            <?php
            require_once 'classView.php';
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; <span id="currentYear"></span> ScaKz all right reserved </p>
    </footer>

</body>
</html>

