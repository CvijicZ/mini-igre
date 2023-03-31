<?php


class ispis{
    public function ispisMetoda(){
    include "../classes/dbh.php";  
    $sql="SELECT * FROM forum ORDER BY vremeObjave DESC";
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    global $idAutora;
    global $idObjave;
foreach($stmt as $row){
    
    $idAutora=$row['idAutora']; 
    $idObjave=$row['idObjave'];
    echo "<div class='table-row'>". "<div class='avatar'>" . ispis::dajAvatar() . "</div>"   . "<div class='naslov'>" .
    "<a href='prikaziTemu.php?id=" .$row['idObjave'] . "'>".$row['naslov'] . "</a>" . "<br>". "</div>". "<span>" . ispis::dajIme() . "<div class='replies'> 2 odgovora". "</div>" . "<div class='last-reply'>" . ispis::dajVreme() . "</div>" . "</b>" ."</span>" . "</div>"  
     ;  
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
    private function dajAvatar(){
        include "../classes/dbh.php";
        global $idAutora;
        $sql="SELECT avatarId FROM igrac WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $idAutora);
        $stmt->execute();
        $idAvatar=$stmt->fetchColumn();
        $stmt->closeCursor();

        $sql="SELECT avatar FROM avatar WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $idAvatar);
        $stmt->execute();
        $avatar=$stmt->fetchColumn();
    
        
        return '<img class="avatar" src="data:image;base64,' .base64_encode ($avatar) . '" > ';
        
    }


}
$i=new ispis();
      $i->ispisMetoda();
