<?php


class ispis{
    
    public function ispis(){
    include "../classes/dbh.php";
    
    $sql="SELECT * FROM forum ORDER BY vremeObjave DESC";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    global $idAutora;
    global $idVesti;
 
foreach($stmt as $row){
    $idAutora=$row['idAutora']; 
    $idVesti=$row['idObjave'];
    echo "<div class='objava'>". "<p class='ime'>Objavio: " .  ispis::dajIme(). "</p>" . 
    "<h4 class='naslov'>"  . $row['naslov'] ."</h4>"   . "<p class='vreme'>" . ispis::dajVreme() ."</p>".  "</div>";
    
 
    
}
    }
    private function dajIme(){
        include "../classes/dbh.php";
       global $idAutora;
        $sql="SELECT ime FROM igrac WHERE id=:idAutora";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':idAutora',$id);
        $id=$idAutora;
        $stmt->execute();
        $result=$stmt->fetchAll();
        return $result[0]['ime'];
        
    }
    private function dajVreme(){
        include "../classes/dbh.php";
        global $idVesti;
        $sql="SELECT vremeObjave FROM forum WHERE idObjave=:idObjave";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":idObjave",$id);
        $id=$idVesti;
        $stmt->execute();
        $result=$stmt->fetchAll();
        $timestamp=$result[0]['vremeObjave'];
        $dateTime=new DateTime("$timestamp");
        return $dateTime->format('d-m-Y H:i');
    }


}
$i=new ispis();
      $i->ispis();
