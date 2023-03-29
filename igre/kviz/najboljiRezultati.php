<?php
include "../../classes/dbh.php";
$sql="SELECT * FROM rezultatikviz ORDER BY rezultat DESC LIMIT 10;";
$stmt=$dbh->prepare($sql);
$stmt->execute();

echo "<table>" . "<tr> <th>Ime</th> <th>Skor</th></tr>" . "<tr>";
foreach($stmt as $row){
    echo "<td>" . $row['idIgraca'] . $row['rezultat'] . "</td>" . "<br>";
}

echo "</tr>" . "</table>";