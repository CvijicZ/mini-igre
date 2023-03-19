<?php
 session_start();
 if(!isset($_SESSION['adminId'])){
    header("location: adminLoginPage.php");
    exit();
 }
 else { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Panel</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AdminPanel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Pocetna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forum.php">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mini-igre/classes/logout.php">Odjavi se</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <h1 class="text-center">AdminPanel</h1>
    <form action="/mini-igre/admin/adminClasses/adminRadnje.php" method="POST">
    
  <div class="container">
  <h4>Dodaj novi avatar</h4>
    
    <div class="mb-3">
  <label for="formFileMultiple" class="form-label">Multiple files input example</label>
  <input class="form-control" type="file" id="formFileMultiple" multiple>
</div>
<hr>
</form>

<h4>Svi korisnici</h4>
<button type="button" id="btn_add" class="btn-primary">Prikazi sve korisnike</button>
<div id="live_data"></div>


  </div>
 
 <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
   <script>
    
    $(document).ready(function(){  
        $(document).on('click', '#btn_add', function()  
    {  
        $.ajax({  
            url:"/mini-igre/admin/adminClasses/prikaziKorisnike.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    });
    
  });     
  $(document).on('click', '.obrisi', function(){  
        var id=$(this).data("id");   
        if(confirm("Da li ste sigurni da zelite da obrisete korisnicki nalog ciji je ID:" +id))  
        {  
            $.ajax({  
                url:"adminClasses/obrisiKorisnika.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    $.ajax({  
            url:"/mini-igre/admin/adminClasses/prikaziKorisnike.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });                                   
                }  
            });  
        }  
    });  

    $(document).on('click', '.dajAdmina', function(){  
        var id=$(this).data("id");   
        if(confirm("Da li ste sigurni da zelite da dodelite admina korisniku ciji je ID: " +id))  
        {  
            $.ajax({  
                url:"adminClasses/dajAdmina.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    $.ajax({  
            url:"/mini-igre/admin/adminClasses/prikaziKorisnike.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });                                   
                }  
            });  
        }  
    }); 

    $(document).on('click', '.oduzmiAdmina', function(){  
        var id=$(this).data("id");   
        if(confirm("Da li ste sigurni da zelite da oduzmete admina korisniku ciji je ID: " +id))  
        {  
            $.ajax({  
                url:"adminClasses/oduzmiAdmina.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    $.ajax({  
            url:"/mini-igre/admin/adminClasses/prikaziKorisnike.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });                                   
                }  
            });  
        }  
    }); 



   </script>
 

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>


