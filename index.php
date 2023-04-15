<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Pocetna</title>
</head>
<body class="indexBody">
   

    <?php include"includes/header.inc.php";?>
    <?php if(isset($_SESSION['id'])){?>

        <div class="row igre">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Programiranje Kviz</h5>
                <a href="igre/kviz/index.php"><img class="card-img-top" src="img/kviz1.jpg" alt="Iks-Oks igra" width="200px"
                        height="200px"></a>
            </div>
        </div>
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Zmija</h5>
                <a href="./igre/zmija/index.html"><img class="card-img-top" src="img/kviz.webp" alt="Card image cap" width="200px"
                        height="200px"></a>
            </div>
        </div>
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Trka</h5>
                <a href="#"><img class="card-img-top" src="img/racegame.webp" alt="Card image cap" width="200px"
                        height="200px"></a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Programiranje Kviz</h5>
                <a href="igre/kviz/index.php"><img class="card-img-top" src="img/kviz1.jpg" alt="Iks-Oks igra" width="200px"
                        height="200px"></a>
            </div>
        </div>
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Geografija Kviz</h5>
                <a href="#"><img class="card-img-top" src="img/kviz.webp" alt="Card image cap" width="200px"
                        height="200px"></a>
            </div>
        </div>
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Trka</h5>
                <a href="#"><img class="card-img-top" src="img/racegame.webp" alt="Card image cap" width="200px"
                        height="200px"></a>
            </div>
        </div>
    </div>
   
    

    <?php } else { echo "<h3 class='text-center'>Morate biti prijavljeni da biste igrali igre</h3>";} ?>
   
    <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>

  
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>