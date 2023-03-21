<?php 
if($_POST['uploadSubmit'] =="Dodaj"){
    include "../../classes/dbh.php";
    $slika=file_get_contents($_FILES['slika'] ['tmp_name']); //Putanja do fajla
    $sql="INSERT INTO avatar(avatar) VALUES(:slika)";
    $stmt=$dbh->prepare($sql);
    $allowed_ext=array('gif','png','jpg','jpeg','webp');
    $filename=$_FILES['slika']['name']; //Potpuno ime fajla
    $file_ext=pathinfo($filename,PATHINFO_EXTENSION); //Selektovanje ekstenzije fajla
    
    if(!in_array($file_ext,$allowed_ext)){
        header("location: ../adminPanel.php?error=FormatSlike");
        exit();
    }
    $stmt->bindParam(":slika",$slika,PDO::PARAM_LOB);
    if($stmt->execute()){
        header("location: ../adminPanel.php?error=none");
        exit();
    }

   
  
}
   

else {
    echo "ne radi submit";
}