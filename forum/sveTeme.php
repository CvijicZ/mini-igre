<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="../style/style.css">
    <title>Pitanja</title>
</head>
<body class="sveTemeBody">

<!-- Modal for adding new post -->
<div class="modal fade" id="novaObjava" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:green;">Objavi novu temu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         
      <div class="form-outline mb-4">
      <div class="input-control">
       
                <form action="unos.php" method="post" id="form" onsubmit=" return proveriObjavu()">   
                <label class="form-label" for="naslov">Naslov</label>
                <input type="text" id="naslov" name="naslov" class="form-control form-control-lg" />
                <div class="error"></div>
</div>
                
              </div>
              
              <div class="form-outline mb-4">
              <div class="input-control">
                <label class="form-label" for="sadrzaj">Sadrzaj</label>
                <textarea class="form-control" id="sadrzaj" rows="3" name="sadrzaj"></textarea>
                <div class="error"></div>
                </div>
              </div>             
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Objavi</button>
              </div>
            </form>
    </div>
  </div>
</div>
</div>

      


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand " href="#">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
          <div class="navbar-nav f ">
          <a class="nav-link" href="../index.php">Pocetna</a>
            <?php if(isset($_SESSION['id'])){?><a class="nav-link"  data-bs-toggle="modal" data-bs-target="#novaObjava" href="#novaObjava">Nova tema</a> <?php } ?>
            <a class="nav-link" href="sveTeme.php">Sva pitanja</a>
            <a class="nav-link" href="#">Prijavi bug</a>
          </div>
        </div>      
    </nav>
   
    <div class="containerForum">
            
    <?php include"ispis.php";?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
      <script src="/mini-igre/script/registerValidation.js"></script>
</body>
</html>