<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kvi|Mini-igre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<!-- The Modal -->
<div id="najRezultati" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="najRezultati"></div>
  </div>
</div>



    <div class="container">
        <div id="home" class="flex-column flex-center">
            <h1>Cao, <?php echo $_SESSION['ime']?></h1>
            <a href="game.html" class="btn">Igraj</a>
            <a href="../../index.php" class="btn">Pocetna</a>
            <button type="button" id="highscores-btn" class="btn" data-bs-toggle="modal" data-bs-target="#najRezultati">Najbolji rezultati <i class="fas fa-crown"></i></button>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script>
var modal = document.getElementById("najRezultati");
var btn = document.getElementById("highscores-btn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    <script>
    $(document).ready(function(){  
        $(document).on('click', '#highscores-btn', function()  
    {  
        $.ajax({  
            url:"najboljiRezultati.php",  
            method:"POST",  
            success:function(data){  
			$('.najRezultati').html(data);  
            }            
        });  
    });
  }); 
  </script>
</body>
</html>