<?php
session_start();

$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

$orderBy = $_GET['orderBy'];
$holder = $_GET['holder'];

if($orderBy == 'A') {

    $counter = 1;
    $sql = "SELECT * FROM documentStore WHERE userName ='$holder' ORDER BY submitTime DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td>" . $result['ackNumber'] . "</td>";
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td>" . $result['uidNumber'] . "</td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        echo "<td align='center'>".$result['adminUploadedDoc']."</td>";
        if($result['adminUploadedDoc'] == true) {
            echo "<td align='center'>
                <label for='fileUpload15CA" . $counter . "'>
                    <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                </label>
                <input id='fileUpload15CA" . $counter ."' name='clientUp15CA_".$result['trackingNumber']."' type='file' style='display:none;'>
                <input type='hidden' name='fileID15CA_".$counter."' value='" . $result['trackingNumber'] . "'>
            </td>
            <script>
                $('#fileUpload15CA" . $counter . "').change(function() {
                    var i = $(this).prev('label').clone();
                    var file = $('#fileUpload15CA" . $counter . "')[0].files[0].name;
                    $(this).prev('label').text(file);
                });
            </script>
            ";
            echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' name='submit15CA_" . $counter . "'></td>";

        } else {
            echo "<td></td>";
            echo "<td></td>";
        }
        
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
        echo "<td align='center'>".$result['adminUp15CA']."</td>";

        echo "</tr>";
        ++$counter;
    }
}
else {

    $counter = 1;
    $sql = "SELECT * FROM documentStore WHERE userName ='$holder' AND process='$orderBy' ORDER BY submitTime DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        // echo "<td>" . $result['partyName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td>" . $result['ackNumber'] . "</td>";
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td>" . $result['uidNumber'] . "</td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        echo "<td align='center'>".$result['adminUploadedDoc']."</td>";
        if($result['adminUploadedDoc'] == true) {
            echo "<td align='center'>
                <label for='fileUpload15CA" . $counter . "'>
                    <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                </label>
                <input id='fileUpload15CA" . $counter ."' name='clientUp15CA_".$result['trackingNumber']."' type='file' style='display:none;'>
                <input type='hidden' name='fileID15CA_".$counter."' value='" . $result['trackingNumber'] . "'>
            </td>
            <script>
                $('#fileUpload15CA" . $counter . "').change(function() {
                    var i = $(this).prev('label').clone();
                    var file = $('#fileUpload15CA" . $counter . "')[0].files[0].name;
                    $(this).prev('label').text(file);
                });
            </script>
            ";
            echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' name='submit15CA_" . $counter . "'></td>";

        } else {
            echo "<td></td>";
            echo "<td></td>";
        }
        
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
        echo "<td align='center'>".$result['adminUp15CA']."</td>";

        echo "</tr>";
        ++$counter;
    }
}

?>