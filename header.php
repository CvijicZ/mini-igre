<?php session_start(); ?>


 <header></header>
 
            <?php if(isset($_SESSION['ime'])){ ?>
                

        <nav class="navbar fixed-top bg-transparent navbar-expand-lg navbar-dark bg-dark p-md3">
             <a class="navbar-brand" href="#">MINI-IGRE</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                 <a class="nav-link" href="index.php">Pocetna</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="forum.php">Forum</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="https://videoigrepsihologija3.wordpress.com" target="_blank" >Blog(WordPress)</a>
             </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
             <li class="nav-item">
                 <a class="nav-link" href="#"><?php echo $_SESSION['ime']; ?></a>
             </li>
             <li class="nav-but">
             <a class="btn btn-outline-light" href="classes/logout.php">Odjavi se</a>
            </li>
         </ul>
            </div>
            </nav>
            
                <?php } 
                else { ?>
           
         <nav class="navbar fixed-top bg-transparent navbar-expand-lg navbar-dark bg-dark p-md3">
         <a class="navbar-brand" href="#">MINI-IGRE</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto ">
                 <li class="nav-item">
                 <a class="nav-link" href="index.php">Pocetna</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="forum.php">Forum</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Blog</a>
             </li>
                </ul>
                  <ul class="navbar-nav ms-auto ">
             <li class="nav-but">
                 <a class="btn btn-outline-light" href="prijava.php">Prijavi se</a>
             </li>
             <li class="nav-but">
                 <a class="btn btn-outline-light" href="register.php">Registruj se</a>
             </li>
         </ul>
     </div>
 </nav>
                
<?php
} 
?>
             
       