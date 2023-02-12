<?php
if(isset($_POST['submit'])){
    $mejl=$_POST['mejl'];
    $ime=$_POST['ime'];
    $sifra=$_POST['sifra'];
    $sifra2=$_POST['sifra2'];
    
    // $korisnik=new ProveriKorisnika($mejl,$ime,$sifra,$sifra2);
    
class ProveriKorisnika{  
    protected $mejl;
    protected $ime;
    protected $sifra;
    protected $sifra2;

   public function __construct($mejl,$ime,$sifra,$sifra2) {
        $this->mejl = $mejl;
        $this->ime=$ime;
        $this->sifra=$sifra;
        $this->sifra2=$sifra2;
      }

      public function PraznoPolje(){
      if(empty($this->mejl) || empty($this->ime) || empty($this->sifra) || empty($this->sifra2)){
        return false;
      }
      else {
        return true;
      }
    }
  public   function SifraGreska(){
        if($this->sifra!==$this->sifra2){
          return false;
        }
        else {
            return true;
        }
      }
    public function FormatIme(){
        if(ctype_alnum($this->ime)){   //CTYPE
            return true;
        }
        else {
            return false;
        }
     } 
     public function FormatMejla(){
        if(filter_var($this->mejl, FILTER_VALIDATE_EMAIL)){  
            return true;
        }
        else {
            return false;
        }
     }
     public function FormatSifre(){
        // Min 8 chars, upper, lowwer, number
        $rgx="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";
        if(preg_match($rgx,$this->sifra)) {
            return true;
        }
        else {
            return false;
        }
     }
     public function ZauzetoIme(){
        include "dbh.php";
        $sql="SELECT ime FROM igrac WHERE ime= :ime"; 
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":ime", $this->ime, PDO::PARAM_STR,20);
        $stmt->execute();

        if($stmt->rowCount()>0){
            return false;      
            exit();
        }
        else {
            return true;
            $stmt=null;
        }
     }
     public function ZauzetEmail(){
        include "dbh.php";
        $sql="SELECT email FROM igrac WHERE email= :email"; 
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":email", $this->mejl, PDO::PARAM_STR,320);
        $stmt->execute();

        if($stmt->rowCount()>0){
            return false;      
            exit();
        }
        else {
            return true;
            $stmt=null;
        }
     }

}
class RegistrujKorisnika extends ProveriKorisnika{  
    public function RegistracijaKorisnika(){
        
    if($this->PraznoPolje()==false)
    {
        header("location: ../register.html?error=PraznoPolje");
        exit();
    }
    if($this->SifraGreska()==false)
    {
        header("location: ../register.html?error=LozinkeSeNePoklapaju");
        exit();
    }
    if($this->FormatIme()==false){
        header("location: ../register.html?error=FormatImena");
        exit();
    }
    if($this->FormatMejla()==false){
        header ("location: ../register.html?error=FormatEmaila");
        exit();
    }
    if($this->FormatSifre()==false){
        header ("location: ../register.html?error=FormatSifre");
        exit();
    }
    if($this->ZauzetoIme()==false){
        header("location: ../register.html?error=ZauzetoIme");
        exit();
    }
 
    if($this->ZauzetEmail()==false){
        header("location: ../register.html?error=ZauzetMejl");
        exit();
    }

    include "dbh.php";
    $sql="INSERT INTO igrac(email,ime,sifra) VALUES(:mejl,:ime,:sifra)";  // INSERT UPIT
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":mejl", $this->mejl, PDO::PARAM_STR,320);
    $stmt->bindParam(":ime", $this->ime, PDO::PARAM_STR,20);
    $stmt->bindParam(":sifra", $this->sifra, PDO::PARAM_STR,50);
    if($stmt->execute()){
        header("location: ../prijava.html");
        
    }
    else {
        echo "Neuspesan query";
    }
 
}
}
$korisnik= new RegistrujKorisnika($mejl,$ime,$sifra,$sifra2);
$korisnik->RegistracijaKorisnika();
}