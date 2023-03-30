<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kraj igre</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div id="end" class="flex-center flex-column">
            <h2 id="end-text">Rezultat:</h2>
            <h1 id="finalScore">0</h1>          
            <a href="game.html" class="btn">Igraj opet!</a>
            <a href="index.php" class="btn">Pocetna<i class="fas fa-home"></i></a>
        </div>
    </div>
    <script src="end.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
<script>
     $(document).ready(function(){
        const score=$("#finalScore").text();
  $.ajax({
    method: "GET",
    url: "scoreHandler.php",
    data: { score: score},
    success: function(data) {
      $("#end-text").html(data);
    }
  });
});</script>
</body>
</html>