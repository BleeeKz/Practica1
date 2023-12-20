<?php
require_once 'matchesService.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game List</title>
    <link rel="stylesheet" href="gameListView.css">
    <script src="date.js" defer></script>
</head>
<body>

    <header>
        <h1>Game List</h1>
    </header>

    <nav>
        <a href="new_gameView.php">New Game</a>
        <a href="gameListView.php">Game List</a>
    </nav>

    <div class="content">
        <form action="gameListView.php" method="get">
            <label for="order">Order:</label>
            <select name="order" id="order">
                <option value="startDate">Start Date</option>
                <option value="endDate">End Date</option>
            </select>

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="In progress">In progress</option>
                <option value="Checkmate">Checkmate</option>
                <option value="Draw">Draw</option>
                <option value="Finished">Finished</option>
            </select>

            <input type="submit" value="Filter">
        </form>

        <ul>
            <?php
            $order = isset($_GET['order']) ? $_GET['order'] : 'startDate';
            $status = isset($_GET['status']) ? $_GET['status'] : '';

            $matchesService = new MatchesService();
            $matches = $matchesService->getFilteredMatches($order, $status);

            foreach ($matches as $match) {
                echo "<li><a href='boardView.php?gameID={$match['ID']}'>{$match['title']} - {$match['startDate']}</a></li>";
            }
            ?>
        </ul>
    </div>

    <footer>
        <p>&copy; <span id="currentYear"></span> ScaKz all rights reserved </p>
    </footer>

</body>
</html>


