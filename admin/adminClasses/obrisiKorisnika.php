<?php 
session_start();
if(isset($_SESSION['adminId'])){
      include "../../classes/dbh.php";
      $sql="DELETE FROM igrac WHERE id=:id";
      $stmt=$dbh->prepare($sql);
      $stmt->bindParam(":id", $_POST['id']);
      if($stmt->execute()){
            echo "Korisnik uspesno obrisan!";
      }
      else {
            echo "Nastala je greska, pokusajte kasnije ili se obratite korisnickoj podrsci";
      }
    

}