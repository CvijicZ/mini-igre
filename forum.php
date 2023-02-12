<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Forum</title>
</head>
<body>

 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand " href="#">Forum</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav f ">
            <a class="nav-link" href="index.php">Pocetna </a>
              <a class="nav-link" href="forum.php">Nova tema</a>
              <a class="nav-link" href="pitanja.html">Sva pitanja</a>
              <a class="nav-link" href="#">Prijavi bug</a>
            </div>
          </div>      
      </nav>

      <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100 noviPost">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Nova tema</h2>

              <form action="forum/unos.php" method="post" id="form">

                <div class="form-outline mb-4">
                  <label class="form-label" for="naslov">Naslov</label>
                  <input type="text" id="naslov" name="naslov" class="form-control form-control-lg" />
                  
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="sadrzaj">Sadrzaj</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sadrzaj"></textarea>
                  
                </div>
                <div class="form-outline mb-4">
                <small>*Morate biti prijavljeni da biste mogli da objavite post!</small>
                  
                </div>
                
                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Objavi</button>
                </div>

               

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
</body>
</html>