<?php
include "../../classes/dbh.php";
$sql="SELECT * FROM igrac";
$stmt=$dbh->prepare($sql);
$stmt->execute();
echo "<table>";
echo "<tr>" . "<th>ID</th>" . "<th>IME</th>" . "<th>Email</th>" . "<th>Admin</th>". "<th>Postavi za admina</th>". "<th>Obrisi nalog</th>" ."</tr>";
 foreach($stmt as $row){
    echo "<tr>" . "<td>" . $row['id'] . "</td>".
      "<td>" . $row['ime'] . "</td>" .
      "<td>" . $row['email']. "</td>".
      "<td>" . $row['admin']. "</td>" .  
      $res=$row['admin']==1 ? "<td> <button type='button' class='oduzmiAdmina' data-id=" .$row['id'] . ">Oduzmi admina </button >" ."</td> "  : "<td> <button type='button' class='dajAdmina' data-id=" .$row['id'] . ">Daj admina </button >" ."</td> " 

    
 ."<td><button type='button' style='background-color:red;' class='obrisi' data-id=" .$row['id'] . ">X</button></td>"  . "</tr>" ;
}
echo "</table>";
