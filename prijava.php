<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Prijavi se|Mini-Igre</title>
</head>
<body class="bodyReg" onload="ScrollToTarget(); proveriKorisnika();">

<?php include"header.php";?>

    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Prijava </h2>

              <form action="classes/login.php" method="post" id="form" onsubmit="return proveriPrijavu()">

                <div class="form-outline mb-4">
                  <div class="input-control">
                  <label class="form-label" for="ime">Ime ili e-mail</label>
                  <input type="text" id="ime" name="ime" class="form-control form-control-lg" />
                  <div class="error"></div>
                  </div>            
                </div>

                <div class="form-outline mb-4">
                  <div class="input-control">
                  <label class="form-label" for="sifra">Šifra</label>
                  <input type="password" id="sifra" name="sifra" class="form-control form-control-lg" />
                  <div class="error"></div>
                  </div>    
                </div>
                
                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Prijavi se</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Nemaš nalog? <a href="register.php"
                    class="fw-bold text-body"><u>Registruj se</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    

<script src="script/registerValidation.js"></script>
<script>function ScrollToTarget()
    {
         document.getElementById("form").scrollIntoView(true);
         
    }</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>