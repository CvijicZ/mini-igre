<?php
include "../../classes/dbh.php";
$sql="SELECT * FROM rezultatikviz ORDER BY rezultat DESC LIMIT 10;";
$stmt=$dbh->prepare($sql);
$stmt->execute();

echo "<table>" . "<tr> <th>Mesto</th> <th>Ime</th> <th>Skor</th></tr>";
$pozicija=1;
foreach($stmt as $row){
    echo "<tr>" . "<td>" . $pozicija++ . "</td>"  . "<td>" . $row['imeIgraca'] . "</td>" . "<td>" . $row['rezultat'] . "</td>" . "</tr>";
}

echo "</table>";

