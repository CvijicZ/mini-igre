<?php


class ispis{
    
    public function ispis(){
    include "classes/dbh.php";
    
    $sql="SELECT * FROM forum";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    global $idAutora;
 
foreach($stmt as $row){
    $idAutora=$row['idAutora']; 
    echo "<div class='objava'>" . "<h1>" . $row['naslov'] ."</h1>" . "Sadrzaj: " . $row['sadrzaj'] . "Autor:".  ispis::dajIme() .  "</div>" . '<br>';
    
 
    
}
    }
    private function dajIme(){
        include "classes/dbh.php";
       global $idAutora;
        $sql="SELECT ime FROM igrac WHERE id=:idAutora";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':idAutora',$id);
        $id=$idAutora;
        $stmt->execute();
        $result=$stmt->fetchAll();
        return $result[0]['ime'];
        
    }


}
