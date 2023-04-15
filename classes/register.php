<?php
if(isset($_POST['submit'])){
    $mejl=$_POST['mejl'];
    $ime=$_POST['ime'];
    $sifra=$_POST['sifra'];
    $sifra2=$_POST['sifra2'];
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
        else if(strlen($this->sifra)>50){
            return false;
        }
        else {
            return true;
        }
      }
    public function FormatIme(){
        if(ctype_alnum($this->ime)){   
            return true;
        }
        else if(strlen($this->ime)>20){
            return false;
        }
        else {
            return false;
        }
     } 
     public function FormatMejla(){
        if(filter_var($this->mejl, FILTER_VALIDATE_EMAIL)){  
            return true;
        }
        else if(strlen($this->mejl)>254){
            return false;
        }
        else {
            return false;
        }
     }
     public function FormatSifre(){
        $rgx="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\w\W]{8,}$/";
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
    protected function nasumicanAvatar(){
        include "dbh.php";
        $sql="SELECT id FROM avatar ORDER BY RAND() LIMIT 1";
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchColumn();
        $stmt->closeCursor();
        return $result;
    }
    public function RegistracijaKorisnika(){       
    if($this->PraznoPolje()==false)
    {
        header("location: ../register.php?error=PraznoPolje");
        exit();
    }
    if($this->SifraGreska()==false)
    {
        header("location: ../register.php?error=LozinkeSeNePoklapaju");
        exit();
    }
    if($this->FormatIme()==false){
        header("location: ../register.php?error=FormatImena");
        exit();
    }
    if($this->FormatMejla()==false){
        header ("location: ../register.php?error=FormatEmaila");
        exit();
    }
    if($this->FormatSifre()==false){
        header ("location: ../register.php?error=FormatSifre");
        exit();
    }
    if($this->ZauzetoIme()==false){
        header("location: ../register.php?error=ZauzetoIme");
        exit();
    }
 
    if($this->ZauzetEmail()==false){
        header("location: ../register.php?error=ZauzetMejl");
        exit();
    }

    include "dbh.php";
    $sql="INSERT INTO igrac(email,ime,sifra,avatarId) VALUES(:mejl,:ime,:sifra,:avatar)";  
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":mejl", $this->mejl, PDO::PARAM_STR,254);
    $stmt->bindParam(":ime", $this->ime, PDO::PARAM_STR,20);
    $stmt->bindParam(":sifra", $hashedPassword, PDO::PARAM_STR,50);
    $hashedPassword=password_hash($this->sifra, PASSWORD_DEFAULT); 
    $stmt->bindParam(":avatar", $this->nasumicanAvatar(), PDO::PARAM_INT,3);
    
    if($stmt->execute()){
        header("location: ../includes/regSucces.inc.php");
        exit();   
    }
    else {
        echo "Neuspesan query";
    }
}
}
$korisnik= new RegistrujKorisnika($mejl,$ime,$sifra,$sifra2);
$korisnik->RegistracijaKorisnika();
}