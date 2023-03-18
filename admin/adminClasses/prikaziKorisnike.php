<?php
include "../../classes/dbh.php";
$sql="SELECT * FROM igrac";
$stmt=$dbh->prepare($sql);
$stmt->execute();
echo "<table>";
echo "<tr>" . "<th>ID</th>" . "<th>IME</th>" . "<th>Email</th>". "<th>Avatar</th>". "<th>Admin</th>". "<th>Postavi za admina</th>". "<th>Obrisi nalog</th>" ."</tr>";
 foreach($stmt as $row){
    echo "<tr>" . "<td>" . $row['id'] . "</td>" . "<td>" . $row['ime'] . "</td>" . "<td>" . $row['email']. "</td>". "<td>" . $row['avatar']. "</td>"."<td>" . $row['admin']. "</td>" ."<td> <button>Daj admina </button >" ."</td>". "<td><button type='button' style='background-color:red;'>X</button></td>"  . "</tr>" ;
}
echo "</table>";





// <table>
//   <tr>
//     <th>Company</th>
//     <th>Contact</th>
//     <th>Country</th>
//   </tr>
//   <tr>
//     <td>Alfreds Futterkiste</td>
//     <td>Maria Anders</td>
//     <td>Germany</td>
//   </tr>
//   <tr>
//     <td>Centro comercial Moctezuma</td>
//     <td>Francisco Chang</td>
//     <td>Mexico</td>
//   </tr>
// </table>