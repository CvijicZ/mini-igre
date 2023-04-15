<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Zmija|Mini-igre</title>
</head>
<body>
    <div class="wrapper">
        <div class="game-details">
            <span class="score">Rezultat: 0</span>
            <span class="high-score">Najbolji rezultat: <?php include "playerTopScore.php" ?></span>
        </div>
        <div class="play-board"></div>
    </div>
    <script src="script.js" defer></script>
</body>
</html>