<?php 
if($_POST['uploadSubmit'] =="Dodaj"){
    include "../../classes/dbh.php";
    $slika=addslashes(file_get_contents($_FILES['slika'] ['tmp_name']));
   
    $sql="INSERT INTO avatar(avatar) VALUES($slika)";
    if($dbh->query($sql)){
        echo "slika uspesno dodata";
    }
    else {
        echo "imamo problem";
    }
}
else {
    echo "ne radi submit";
}