
 <header>
 <?php if(isset($_SESSION['ime'])){ ?>
                
                <div class="row">
                
                <nav class="navbar sticky-top bg-transparent navbar-expand-lg navbar-dark bg-dark p-md3">
                             <a class="navbar-brand" href="#">MINI-IGRE</a>
                             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                     
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav ms-auto ">
                                <li class="nav-item">
                                 <a class="nav-link" href="/mini-igre/index.php">Pocetna</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="/mini-igre/forum/sveTeme.php">Forum</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="https://videoigrepsihologija3.wordpress.com" target="_blank" >Blog(WordPress)</a>
                             </li>
                            </ul>
                            <ul class="navbar-nav ms-auto ">
                             <li class="nav-but">
                                 <a class="btn btn-outline-light" href="/mini-igre/izmenaNaloga.php"><?php echo $_SESSION['ime']; ?></a>
                             </li>
                             <?php if($_SESSION['admin']==true){?>
                             <li class="nav-but">                             
                                <a href="/mini-igre/admin/adminLoginPage.php" target="_blank" class="btn btn-outline-light">Admin-Panel</a>
                             </li>
                             <?php } ?>
                             <li class="nav-but">
                             <a class="btn btn-outline-light" href="/mini-igre/classes/logout.php">Odjavi se</a>
                            </li>
                         </ul>
                            </div>
                            </nav>
                
                </div>
                        
                            
                                <?php } 
                                else { ?>
                           
                           <nav class="navbar sticky-top bg-transparent navbar-expand-lg navbar-dark bg-dark p-md3">
                         <a class="navbar-brand" href="#">MINI-IGRE</a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav ms-auto text-center">
                                 <li class="nav-item">
                                 <a class="nav-link" href="/mini-igre/index.php">Pocetna</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="/mini-igre/forum/sveTeme.php">Forum</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#">Blog</a>
                             </li>
                                </ul>
                                  <ul class="navbar-nav ms-auto text-center ">
                             <li class="nav-but">
                                 <a class="btn btn-outline-light" href="/mini-igre/prijava.php">Prijavi se</a>
                             </li>
                             <li class="nav-but">
                                 <a class="btn btn-outline-light" href="/mini-igre/register.php">Registruj se</a>
                             </li>
                         </ul>
                     </div>
                 </nav>                                                                         
                <?php
                } 
                ?>
 </header>
 
           
             
       