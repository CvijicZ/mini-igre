<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
  <?php include"header.php";?>
  <body class="bodyReg" onload="ScrollToTarget(); proveriDostupnost();">

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Uslovi koristenja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Korisnik je u duznosti da NE ostavlja licne podatke prilikom registracije!</li>
            <li>Korisnik je duzan da osmisli  jedinstvenu sifru za ovaj sajt, ne koristiti iste sifre!</li>
            <li>Sajt Mini-Igre kao ni autor sajta nije odgovoran za vase podatke</li>
          </ul>
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Razumem</button>
        </div>
      </div>
    </div>
  </div>

  
  <section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      
 
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Napravi nalog</h2>

              <form action="classes/register.php" onkeyup="return proveriRegistraciju()" method="post" id="form">

                
                <div class="form-outline mb-4 input-control">
                
                <label class="form-label" for="ime">Ime</label>
                  <input type="text" id="ime" name="ime" class="form-control form-control-lg" />               
                  <div class="error"></div>
                </div>
               
                
                <div class="form-outline mb-4">
                <div class="input-control">
                <label class="form-label" for="mejl">E-mail</label>
                  <input type="text" id="mejl" name="mejl" class="form-control form-control-lg" />
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
                
                <div class="form-outline mb-4">
                <div class="input-control">
                <label class="form-label" for="sifra2">Ponovi šifru</label>
                  <input type="password" id="sifra2" name="sifra2" class="form-control form-control-lg" />
                  <div class="error"></div>
                  </div>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required />
                  <label class="form-check-label" for="form2Example3g">
                    Prihvatam pravila korišćenja <a   data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><u class="pravilaK">Pravila korišćenja</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button name="submit" type="submit"  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registruj se</button>
         
                </div>

                <p class="text-center text-muted mt-5 mb-0">Već imaš nalog? <a href="prijava.php"
                    class="fw-bold text-body"><u>Prijavi se</u></a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
   
</section>


 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="script/registerValidation.js"></script>
<script>function ScrollToTarget()
  {
       document.getElementById("form").scrollIntoView(true);
       
  }</script>
</body>
</html>