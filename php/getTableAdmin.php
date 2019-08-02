<?php
session_start();

$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

$orderBy = $_GET['orderByAdmin'];
$holder = $_GET['holderAdmin'];

if($orderBy == 'A') {
    $counter = 1;
    $sql = "SELECT * FROM documentStore WHERE identityUser ='client' ORDER BY submitTime DESC";
    $querySql = mysqli_query($connect, $sql);
    
    while ($result = mysqli_fetch_array($querySql)) {
        echo "<tr>";
        echo "<th scope='row'>$counter</th>";
        echo "<td>" . $result['firstName'] . " " .$result['lastName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td><button type='button' data-container='body' class='btn btn-outline-light btn-sm' style='color: black;' data-toggle='tooltip' data-placement='left' title='". $result['remarks'] . "'>
        Remark
        </button></td>";

        echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";
        
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
        echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "<td align='center'>
            <label for='fileUpload" . $counter . "'>
                <i class='fas fa-upload fa-lg'></i>
            </label>
            <input id='fileUpload" . $counter ."' name='fileFinal_".$counter."' type='file' style='display:none;'>
            <input type='hidden' name='fileID_".$counter."' value='" . $result['trackingNumber'] . "'>
        </td>
        <script>
            $('#fileUpload" . $counter . "').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        </script>
        ";
        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' name='submitFinal_" . $counter . "'></td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        if($result['clientUp15CA'] == true) {
            echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
            echo "<td align='center'>
            <label for='fileUploadAdmin15CA" . $counter . "'>
                <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
            </label>
            <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
            <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
        </td>
        <script>
            $('#fileUploadAdmin15CA" . $counter . "').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        </script>
        ";
        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
        } else {
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";

        }

        // echo "<td align='center'>
        //     <label for='fileUploadAdmin15CA" . $counter . "'>
        //         <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
        //     </label>
        //     <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
        //     <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
        // </td>
        // <script>
        //     $('#fileUploadAdmin15CA" . $counter . "').change(function() {
        //         var i = $(this).prev('label').clone();
        //         var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
        //         $(this).prev('label').text(file);
        //     });
        // </script>
        // ";
        // echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
        // echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
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
        echo "<td>" . $result['firstName'] . " " .$result['lastName'] . "</td>";
        echo "<td>" . $result['dateRegistered'] . "</td>";
        echo "<td><button type='button' data-container='body' class='btn btn-outline-light btn-sm' style='color: black;' data-toggle='tooltip' data-placement='left' title='". $result['remarks'] . "'>
        Remark
        </button></td>";

        echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";
        
        echo "<td>" . $result['trackingNumber'] . "</td>";
        echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
        echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
        echo "<td align='center'>
            <label for='fileUpload" . $counter . "'>
                <i class='fas fa-upload fa-lg'></i>
            </label>
            <input id='fileUpload" . $counter ."' name='fileFinal_".$counter."' type='file' style='display:none;'>
            <input type='hidden' name='fileID_".$counter."' value='" . $result['trackingNumber'] . "'>
        </td>
        <script>
            $('#fileUpload" . $counter . "').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        </script>
        ";
        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' name='submitFinal_" . $counter . "'></td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
        if($result['clientUp15CA'] == true) {
            echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
            echo "<td align='center'>
            <label for='fileUploadAdmin15CA" . $counter . "'>
                <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
            </label>
            <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
            <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
        </td>
        <script>
            $('#fileUploadAdmin15CA" . $counter . "').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        </script>
        ";
        echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
        echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
        } else {
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";

        }

        // echo "<td align='center'>
        //     <label for='fileUploadAdmin15CA" . $counter . "'>
        //         <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
        //     </label>
        //     <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
        //     <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
        // </td>
        // <script>
        //     $('#fileUploadAdmin15CA" . $counter . "').change(function() {
        //         var i = $(this).prev('label').clone();
        //         var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
        //         $(this).prev('label').text(file);
        //     });
        // </script>
        // ";
        // echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
        // echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
        echo "</tr>";
        ++$counter;
    }
}

?>