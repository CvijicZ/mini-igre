<?php 
session_start();
if($_POST['action']=='promeniIme'){
    include "dbh.php";
    $ime=$_POST['ime'];

    $sql="SELECT ime FROM igrac WHERE ime=:ime";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":ime",$ime);
    $stmt->execute();

    if($stmt->rowCount()>0){
        header("location: /mini-igre/izmenaNaloga.php?error=ZauzetoIme");     
        exit();
    }
    else if(!ctype_alnum($ime)){
        header("location: /mini-igre/izmenaNaloga.php?error=FormatImena");
        exit();    
    }
    else {
        $sql="UPDATE igrac set ime=:ime WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":ime",$ime);
        $stmt->bindParam(":id",$id);
        $id=$_SESSION['id'];
        if($stmt->execute()){
            header("location: /mini-igre/izmenaNaloga.php?error=imeUspesno");
            exit();
        }
    }

    echo "stisnuo si promeniime";
}
else if ($_POST['action'] == 'promeniSifru'){
    echo "Stisnuo si promeni sifru";
}



else {
    echo "zajebo si nesto";
}