<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../style/style.css">
    <title>Pikaz teme|Mini-igre</title>
</head>
<body>
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
    
    <div class="container mt-5">

  <div class="d-flex justify-content-center row">
    <div class="col-md-8">
      <div class="bg-white p-2">
        <div class="d-flex flex-row user-info">
          <?php include "./prikaziTemuIspis.php"; getUserInfo(); ?>

          <!-- <img src="../img/kviz.webp" alt="" width="60" height="60" class="rounded-circle">
          <div class="d-flex flex-column justify-content-start ml-2 cnt">
            <span class="d-block name">Zoran CvijicZoran CvijicZoran CvijicZoran CvijicZoran CvijicZoran Cvijic</span>
            <span class="date text-black-50">13.04.2023 13:52</span>
            <span class="date text-black-50">Korisnik: Zoran</span>

          </div>

        </div>
        <div class="mt-2">
          <p class="comment-text">Woww! This really workWoww! This really worksWoww! This really worksWoww! This really worksWoww! This really workss</p>
        </div> -->

      </div>
      <div class="bg-white">
        <div class="d-flex flex-row fs-12">
          <div class="like p-2 cursor">
           <button><i class="fa-regular fa-thumbs-up"></i>  <span class="ml-1">Like</span></button> 
          </div>

          <div class="like p-2 cursor">
         
          <button type="button" id="komentar"><i class="fa-regular fa-comment"></i>  <span class="ml-1">Komentarisi</span></button>
          </div>
          <div class="like p-2 cursor">   
           <button type="button" id="podeli"><i class="fa-regular fa-share"></i> <span class="ml-1">Podeli</span></button> 
          </div>
        </div>
      </div>
      <div class="bg-light p-2" id="noviKomentar">
        <div class="d-flex flex-row align-items-start">
          <img src="../img/kviz.webp" alt="" class="rounded-circle" width="40">
          <textarea class="form-control ml-1 shadow-none textarea" id="sadrzajKomentara"></textarea>
        </div>
        <div class="mt-2 text-right">
          <button class="btn btn-success btn-sm shadow-none" type="button" id="noviKomentarBtn">Komentarisi</button>
          <button class="btn btn-outline-danger btn-sm ml-1 shadow-none" type="button" id="odustani">Odustani</button>
        </div>
      </div><hr>
      <div class="bg-light p-2" id="stariKomentar">
        <div class="d-flex flex-row align-items-start">
          <img src="../img/kviz.webp" alt="" class="rounded-circle" width="40">
          
          <div class="form-control ml-1 shadow-none textarea">Ovo je komentarOvo je komentarOvo je komentarOvo je komentarOvo je komentarje komentarOvo je komentarOvo je komentarOvo je komentje komentarOvo je komentarOvo je komentarOvo je koment</div>
  
      </div>
      <div class="d-flex flex-column justify-content-start ml-2 cnt">
            
            <span class="date text-black-50">13.04.2023 13:52</span>
            <span class="date text-black-50">Korisnik: Zoran</span>
          </div>


    </div>

  </div>
       
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      
   $('#noviKomentarBtn').click(function() {
      var comment = $('#sadrzajKomentara').val();
      var queryString = window.location.search;
      var urlParams = new URLSearchParams(queryString);
      var id = urlParams.get('id');

      $.ajax({
         type: 'GET',
         url: 'noviKomentar.php',
         data: { comment: comment, idObjave:id },
         success: function(response) {
            alert("Pa ovo radi");
         }
      });
   });
});
  
    // $("#noviKomentar").hide();
    $("#komentar").click(function(){
      $("#noviKomentar").show();
    });
    $("#odustani").click(function(){
      $("#noviKomentar").hide();
    });
  </script>
</body>
</html>