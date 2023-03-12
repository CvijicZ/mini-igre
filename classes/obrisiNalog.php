<?php 
session_start();
if($_POST['action']=='obrisiNalog'){
    include "dbh.php";
    $sql="DELETE FROM igrac WHERE id=:id";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":id", $id);
    $id=$_SESSION['id'];
    if($stmt->execute()){
        session_destroy();
        header("location: /mini-igre/index.php");
        exit();
    }
}
else {
    echo "zajebo si nesto";
}