<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kvi|Mini-igre</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div id="home" class="flex-column flex-center">
            <h1>Cao, <?php echo $_SESSION['ime']?></h1>
            <a href="game.html" class="btn">Igraj</a>
            <a href="najboljiRezultati.php" id="highscores-btn" class="btn">Najbolji rezultati <i class="fas fa-crown"></i></a>
        </div>
    </div>
    
</body>
</html>