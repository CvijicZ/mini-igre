<?php

include "dbh.php";


$sql="SELECT * FROM avatar";
$stmt=$dbh->prepare($sql);
$stmt->execute();
echo "<form id='promenaAvatara' method='post' action='/mini-igre/classes/promeniAvatar.php'>";
foreach($stmt as $row){
     
    echo "<input type='radio' id=" . $row['id'] ." name=" . "a" ." value=" . $row['id'] .  ">" . "<label for=" .$row['id'] . ">" . '<img src="data:image;base64,' .base64_encode ($row['avatar']) . '" alt="img" width="100px" height="100px"> ' ."</label>";
    
    
}


echo "</form>";

//   <input type="radio" id="slika1" name="slika" value="slika1">
//   <label for="slika1"><img src="putanja/do/slike1.jpg" alt="Slika 1"></label>

//   <input type="radio" id="slika2" name="slika" value="slika2">
//   <label for="slika2"><img src="putanja/do/slike2.jpg" alt="Slika 2"></label>

//   <input type="radio" id="slika3" name="slika" value="slika3">
//   <label for="slika3"><img src="putanja/do/slike3.jpg" alt="Slika 3"></label>

//   <input type="submit" value="Submit">

// '<img src="data:image;base64,' .base64_encode ($row['avatar']) . '" alt="img" width="100px" height="100px"> ';