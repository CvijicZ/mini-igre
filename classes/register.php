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
        if(filter_var($this->mejl, FILTER_VALIDATE_EMAIL)){  //FILTER_VAR
            return true;
        }
        else {
            return false;
        }
     }
    //  public function ZauzetoIme(){
    //     include "mysqli.php";
    //     $sqlI="SELECT ime FROM korisnik WHERE ime= ?"; // SELECT UPIT
    //     $stmt=$mysqli->prepare($sqlI);
    //     $stmt->bind_param("s", $this->ime);
    //     $stmt->execute();
    //     $stmt->store_result();
    //     if($stmt->num_rows()>0){
    //         return false;
            
    //         exit();
    //     }
    //     else {
    //         return true;
    //         $stmt=null;
    //     }
    //  }

}
class RegistrujKorisnika extends ProveriKorisnika{  // DRUGA KLASA
    public function RegistracijaKorisnika(){
        
    if($this->PraznoPolje()==false)
    {
        header("location: ../register.html?error=PraznoPolje");
        exit();
    }
    if($this->SifraGreska()==false)
    {
        header("location: ../register.html?error=GreskaSifra");
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
    // if($this->ZauzetoIme()==false){
    //     header("location: ../register.html?error=ZauzetoIme");
    //     exit();
    // }
 
    // include "mysqli.php";
    // $sql="INSERT INTO korisnik(mejl,ime,sifra) VALUES(?,?,?)";  // INSERT UPIT
    // $stmt=$mysqli->prepare($sql);
    // $stmt->bind_param("ssss",$this->mejl,$this->ime,$this->sifra);
    // if($stmt->execute()){
    //     echo "Uspesno uneto";
    // }
    // else {
    //     echo "Neuspesan query";
    // }
 
}
}
$korisnik= new RegistrujKorisnika($mejl,$ime,$sifra,$sifra2);
$korisnik->RegistracijaKorisnika();
}