<?php
session_start();

$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

$orderBy = $_GET['orderByAdmin'];
$holder = $_GET['holderAdmin'];

if ($orderBy == 'A') {
    $counter = 1;
    $sql = "SELECT * FROM documentStore WHERE identityUser ='client' ORDER BY submitTime DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['firstName'] . " " . $result['lastName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td><button type='button' data-container='body' class='btn btn-outline-light btn-sm' style='color: black;' data-toggle='tooltip' data-placement='left' title='" . $result['remarks'] . "'>
                Remark
                </button></td>";

        echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";

        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
        echo "<td><input type='text' name='adminRemarks_" . $counter . "' value='" . $result['adminRemarks'] . "'></td>";

        echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "<td align='center'>
                    <label for='fileUpload" . $counter . "'>
                        <i class='fas fa-upload fa-lg'></i>
                    </label>
                    <input id='fileUpload" . $counter . "' name='fileFinal_" . $counter . "' type='file' style='display:none;'>
                    <input type='hidden' name='fileID_" . $counter . "' value='" . $result['trackingNumber'] . "'>
                </td>
                <script>
                    $('#fileUpload" . $counter . "').change(function() {
                        var i = $(this).prev('label').clone();
                        var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                        $(this).prev('label').text(file);
                    });
                </script>
                ";

        echo "<td><input type='text' name='partyName_" . $counter . "' value='" . $result['partyName'] . "'></td>";

        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm mb-1' name='submitFinal_" . $counter . "'></td>";

         if($result['clientUploadedDoc'] == true) {
                echo "<td align='center'>
                <label for='fileUploadAdminXML" . $counter . "'>
                    <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                </label>
                <input id='fileUploadAdminXML" . $counter ."' form='storeAdminXML' name='fileAdminFileXML_". $result['trackingNumber']."' type='file' style='display:none;'>
                <input type='hidden' name='fileAdminIDXML_".$counter."' form='storeAdminXML' value='" . $result['trackingNumber'] . "'>
            </td>
            <script>
                $('#fileUploadAdminXML" . $counter . "').change(function() {
                    var i = $(this).prev('label').clone();
                    var file = $('#fileUploadAdminXML" . $counter . "')[0].files[0].name;
                    $(this).prev('label').text(file);
                });
            </script>
            ";
            echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdminXML' name='submitAdminXML_" . $counter . "'></td>";
        }

        echo "<td align='center'><img class='statusLogo' src='" . $result['taskStatus'] . "'></td>";
        if ($result['clientUp15CA'] == true) {
            echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
        } else {
            echo "<td></td>";
        }

        if ($result['adminUploadedDoc'] != null) {
            echo "<td align='center'>" . $result['adminUploadedDoc'] . "</td>";
        } else {
            echo "<td></td>";
        }

        if($result['adminXML'] != null){
        echo "<td align='center'><a href='" . $result['adminXML'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";
        ++$counter;
    }

} else {
    
    $counter = 1;
    $sql = "SELECT * FROM documentStore WHERE identityUser ='client' AND process='$orderBy' ORDER BY submitTime DESC";
    $querySql = mysqli_query($connect, $sql);

    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['firstName'] . " " . $result['lastName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td><button type='button' data-container='body' class='btn btn-outline-light btn-sm' style='color: black;' data-toggle='tooltip' data-placement='left' title='" . $result['remarks'] . "'>
                Remark
                </button></td>";

        echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";

        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
        echo "<td><input type='text' name='adminRemarks_" . $counter . "' value='" . $result['adminRemarks'] . "'></td>";

        echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "<td align='center'>
                    <label for='fileUpload" . $counter . "'>
                        <i class='fas fa-upload fa-lg'></i>
                    </label>
                    <input id='fileUpload" . $counter . "' name='fileFinal_" . $counter . "' type='file' style='display:none;'>
                    <input type='hidden' name='fileID_" . $counter . "' value='" . $result['trackingNumber'] . "'>
                </td>
                <script>
                    $('#fileUpload" . $counter . "').change(function() {
                        var i = $(this).prev('label').clone();
                        var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                        $(this).prev('label').text(file);
                    });
                </script>
                ";

        echo "<td><input type='text' name='partyName_" . $counter . "' value='" . $result['partyName'] . "'></td>";

        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm mb-1' name='submitFinal_" . $counter . "'></td>";

         if($result['clientUploadedDoc'] == true) {
                echo "<td align='center'>
                <label for='fileUploadAdminXML" . $counter . "'>
                    <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                </label>
                <input id='fileUploadAdminXML" . $counter ."' form='storeAdminXML' name='fileAdminFileXML_". $result['trackingNumber']."' type='file' style='display:none;'>
                <input type='hidden' name='fileAdminIDXML_".$counter."' form='storeAdminXML' value='" . $result['trackingNumber'] . "'>
            </td>
            <script>
                $('#fileUploadAdminXML" . $counter . "').change(function() {
                    var i = $(this).prev('label').clone();
                    var file = $('#fileUploadAdminXML" . $counter . "')[0].files[0].name;
                    $(this).prev('label').text(file);
                });
            </script>
            ";
            echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdminXML' name='submitAdminXML_" . $counter . "'></td>";
        }



        echo "<td align='center'><img class='statusLogo' src='" . $result['taskStatus'] . "'></td>";
        if ($result['clientUp15CA'] == true) {
            echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
        } else {
            echo "<td></td>";
        }

        if ($result['adminUploadedDoc'] != null) {
            echo "<td align='center'>" . $result['adminUploadedDoc'] . "</td>";
        } else {
            echo "<td></td>";
        }

        if($result['adminXML'] != null){
        echo "<td align='center'><a href='" . $result['adminXML'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";
        ++$counter;
    }
}
