<?php
include "dbh.php";
$sql="SELECT * FROM avatar";
$stmt=$dbh->prepare($sql);
$stmt->execute();
echo "<form id='promenaAvatara' method='post' action='classes/promeniAvatar.php'>";
foreach($stmt as $row){   
    echo "<input type='radio' id=" . $row['id'] ." name=" . "a" ." value=" . $row['id'] .  ">" . "<label class='klikabilan' for=" .$row['id'] . ">" . '<img src="data:image;base64,' .base64_encode ($row['avatar']) . '" alt="img" width="100px" height="100px"> ' ."</label>"; 
}
echo "</form>";