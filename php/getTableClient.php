<?php
session_start();

$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

$orderBy = $_GET['orderBy'];
$holder = $_GET['holder'];

if($orderBy == 'A') {

    $counter = 1;
    $sql = "SELECT serialNumber, partyName, dateRegistered, ackNumber, trackingNumber, uidNumber, adminUploadedDoc, taskStatus FROM documentStore WHERE userName ='$holder' ORDER BY serialNumber DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['partyName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td>" . $result['ackNumber'] . "</td>";
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td>" . $result['uidNumber'] . "</td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        // echo "<td align='center'><i class='fas fa-ellipsis-h fa-2x'></i></td>";
        echo "<td align='center'>".$result['adminUploadedDoc']."</td>";
        // echo "<td align='center'><a href=" . $result['adminUploadedDoc'] . " download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "</tr>";
        ++$counter;
    }
}
else {

    $counter = 1;
    $sql = "SELECT serialNumber, partyName, dateRegistered, ackNumber, trackingNumber, uidNumber, adminUploadedDoc, taskStatus, process FROM documentStore WHERE userName ='$holder' AND process='$orderBy' ORDER BY serialNumber DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['partyName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td>" . $result['ackNumber'] . "</td>";
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td>" . $result['uidNumber'] . "</td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        // echo "<td align='center'><i class='fas fa-ellipsis-h fa-2x'></i></td>";
        echo "<td align='center'>".$result['adminUploadedDoc']."</td>";
        // echo "<td align='center'><a href=" . $result['adminUploadedDoc'] . " download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "</tr>";
        ++$counter;
    }

}

?>