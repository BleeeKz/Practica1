<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Game</title>
    <link rel="stylesheet" href="new_gameView.css">
    <script src="date.js" defer></script>
</head>
<body>
    <header>
        <h1>New Game</h1>
    </header>
    <nav>
        <a href="new_gameView.php">New Game</a>
        <a href="gameListView.php">Game List</a>
    </nav>
    <div class="content">
        <?php
            require_once 'matchesService.php';

            $matchesService = new MatchesService();
            $players = $matchesService->getAllPlayers();
        ?>
        <form action="boardView.php" method="post">
            <label for="whitePlayer">Player 1:</label>
            <select name="whitePlayer" id="whitePlayer">
                <?php
                    foreach ($players as $player) {
                        echo "<option value='{$player['ID']}'>{$player['name']}</option>";
                    }
                ?>
            </select>

            <label for="blackPlayer">Player 2:</label>
            <select name="blackPlayer" id="blackPlayer">
                <?php
                    foreach ($players as $player) {
                        echo "<option value='{$player['ID']}'>{$player['name']}</option>";
                    }
                ?>
            </select>

            <label for="gameTitle">Game Title:</label>
            <input type="text" name="gameTitle" id="gameTitle" required placeholder="Game name required">

            <input type="submit" value="Start">
        </form>
    </div>
    <footer>
        <p>&copy; <span id="currentYear"></span> ScaKz all right reserved <p>
    </footer>
</body>
</html>
