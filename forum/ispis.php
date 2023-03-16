<?php


class ispis{
    
    public function ispis(){
    include "../classes/dbh.php";
    
    $sql="SELECT * FROM forum ORDER BY vremeObjave DESC";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    global $idAutora;
    global $idObjave;

foreach($stmt as $row){
    $idAutora=$row['idAutora']; 
    $idObjave=$row['idObjave'];
    echo "<div class='table-row'>"  . "<div class='subjects'>" .
    "<a href=''>".$row['naslov'] . "</a>" . "<br>". "<div class='avatar'>" . "</div>" . "<span>Objavio " . ispis::dajIme() . "<div class='replies'> 0 <br> 2 views". "</div>" . "<div class='last-reply'>" . ispis::dajVreme() . "</div>" . "</b>" ."</span>" . "</div>"  
     . "</div>" ;
     
    
 
    
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
        global $idObjave;
        $sql="SELECT vremeObjave FROM forum WHERE idObjave=:idObjave";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":idObjave",$id);
        $id=$idObjave;
        $stmt->execute();
        $result=$stmt->fetchAll();
        $timestamp=$result[0]['vremeObjave'];
        $dateTime=new DateTime("$timestamp");
        return $dateTime->format('d-m-Y H:i');
    }


}
$i=new ispis();
      $i->ispis();
