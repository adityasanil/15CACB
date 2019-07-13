<?php
session_start();

$sessionHolder = $_SESSION['user'];

include 'php/connectionDb15CACB.php';
 
$sql = "SELECT partyName, dateRegistered, ackNumber, trackingNumber, uidNumber, adminUploadedDoc, taskStatus FROM documentStore WHERE userName ='$sessionHolder'";
$querySql = mysqli_query($connect, $sql);
// $row = mysqli_fetch_array($querySql);

echo "<table border='1'>";
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// </tr>";

while ($result = mysqli_fetch_array($querySql)) {
    echo "<tr>";
    echo "<td>" . $result['partyName'] . "</td>";
    echo "<td>" . $result['userName'] . "</td>";
    echo "<td>" . $result['dateRegistered'] . "</td>";
    echo "<td>" . $result['ackNumber'] . "</td>";
    echo "<td>" . $result['trackingNumber'] . "</td>";
    echo "<td>" . $result['uidNumber'] . "</td>";
    echo "<td>" . $result['adminUploadedDoc'] . "</td>";
    echo "<td>" . $result['taskStatus'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>