<?php session_start();
if(!isset($_SESSION['id'])){
    header("location: /mini-igre/index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Izmena Naloga|Mini-Igre</title>
</head>
<body>
    <?php include "includes/header.inc.php";?>  


<!-- Modal -->
<div class="modal fade" id="deleteAcc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brisanje naloga!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/mini-igre/classes/obrisiNalog.php" method="POST">       
            <p>Brisanje naloga je trajno! Ukoliko pritisnete na dugme "Obrisi nalog" vise necete moci da opozovete ovu promenu!</p> 
      </div>
      <div class="modal-footer">
      <button type="submit" name="action" value="obrisiNalog" class="btn btn-danger">Obrisi nalog</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Izmeni nalog</h2>

              <form action="/mini-igre/classes/izmenaNaloga.class.php" method="post" id="form" onsubmit="return proveriIzmenuIme()" onkeyup="return proveriIzmenuIme()">
                 <hr>
                <div class="form-outline mb-4">
                  <div class="input-control">
                    <h3>Promeni ime</h3>
                  <label class="form-label" for="ime">Ime</label>
                  <input type="text" id="ime" name="ime" class="form-control form-control-lg" placeholder="Unesi novo ime" />
                  <div class="error"></div>
                  </div> <br> 
                  <div class="d-flex justify-content-center">
                  <button type="submit" name="action" value="promeniIme" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Potvrdi</button>
                </div>
                </div>
</form>
                <hr>

                <form action="/mini-igre/classes/izmenaNaloga.class.php" method="post"  onsubmit="return proveriIzmenuSifra()" onkeyup="return proveriIzmenuSifra()">
                <div class="form-outline mb-4">
                 
                    <h3>Promeni sifru</h3>
                    <div class="input-control">
                  <label class="form-label" for="staraSifra">Stara sifra</label>
                  <input type="password" id="staraSifra" name="staraSifra" class="form-control form-control-lg" placeholder="Unesi staru sifru" />
                  <div class="error"></div><br>
                  </div>
                  <div class="input-control">
                  <label class="form-label" for="sifra">Nova sifra</label>
                  <input type="password" id="sifra" name="sifra" class="form-control form-control-lg" placeholder="Unesi novu sifru"/>
                  <div class="error"></div><br>
                  </div>
                  <div class="input-control">
                  <label class="form-label" for="sifra2">Ponovite novu sifru</label>
                  <input type="password" id="sifra2" name="sifra2" class="form-control form-control-lg" placeholder="Ponovi novu sifru"/>
                  <div class="error"></div><br>
                  </div> 
                  <div class="d-flex justify-content-center">
                  <button type="submit" name="action" value="promeniSifru" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Potvrdi</button>
                </div>
                 
                     
                </div>
                <hr>
                </form>

                <div class="form-outline mb-4">
                    <h3>Obrisi nalog</h3>
                    <p style="color:red;">* Brisanjem naloga trajno se brisu svi vasi podaci, ukljucujuci i rekorde koje ste ostvarili u raznim igrama!</p>
                <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAcc">Obrisi nalog</button>
                  
                 
                  
                     
                </div>
        
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
        <script src="/mini-igre/script/registerValidation.js"></script>
</body>
</html>