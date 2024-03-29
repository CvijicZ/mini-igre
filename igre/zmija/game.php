<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Zmija|Mini-igre</title>
</head>
<body>
    <div class="wrapper">
        <div class="game-details">
            <span class="score">Rezultat: 0</span>
            <span class="high-score">Najbolji rezultat: <?php include "playerTopScore.php" ?></span>
        </div>
        <div class="play-board"></div>
        <div class="controls">
            <i data-key="ArrowLeft"  class="fa-solid fa-arrow-left-long"></i>
            <i data-key="ArrowUp"    class="fa-solid fa-arrow-up-long"></i>
            <i data-key="ArrowRight" class="fa-solid fa-arrow-right-long"></i>
            <i data-key="ArrowDown"  class="fa-solid fa-arrow-down-long"></i>

        </div>
    </div>
    <script src="script.js" defer></script>
</body>
</html>