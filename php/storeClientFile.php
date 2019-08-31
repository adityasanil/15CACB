<?php
session_start();
$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

date_default_timezone_set('Asia/Kolkata');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_POST["submitFile"])) {

    $sql = "SELECT * FROM Users WHERE userName ='$sessionHolder' AND identity='client'";
    $querySql = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($querySql);

    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $fullName = $row['firstName'] . " " . $row['lastName'];
    $userName = $row['userName'];
    $email = $row['email'];
    $dateRegistered = date("D\, jS M Y H:i");
    $transactionDate = date("Y-m-d");
    $identity = $row['identity'];

    if ($_POST['clientRemarks'] == null) {
       $remarks = 'none';
    }
    else {
        $remarks = mysqli_real_escape_string($connect, test_input($_POST['clientRemarks']));
    }

    if ($_POST['tdsRate'] == null){
        $tdsRate = 'none';
    } 
    else{
        $tdsRate = mysqli_real_escape_string($connect, test_input($_POST['tdsRate']));
    }

    if ($_POST['remittanceCurrency'] == null){
        $remittanceCurrency = 'none';
    }
    else{
        $remittanceCurrency = mysqli_real_escape_string($connect, test_input($_POST['remittanceCurrency']));
    }

    if ($_POST['remittanceNature'] == null){
        $remittanceNature = 'none';
    }
    else{
        $remittanceNature = mysqli_real_escape_string($connect, test_input($_POST['remittanceNature']));
    }

    if ($_POST['purposeCode'] == null){
        $purposeCode = 'none';
    }
    else{
        $purposeCode = mysqli_real_escape_string($connect, test_input($_POST['purposeCode']));
    }

    if($_POST['taxPaid'] == null){
        $taxPaid = 'none';
    }
    else{
        $taxPaid = mysqli_real_escape_string($connect, test_input($_POST['taxPaid']));
    }

    if($_POST['trc'] == null){
        $trc = 'none';
    }
    else{
     $trc = mysqli_real_escape_string($connect, test_input($_POST['trc']));   
    }
    
    $mailValue = 0;
    $partyName = null;
    $contact = $row['contact'];
    $ackNumber = null;
    $trackingNumber = date('y') . rand(10, 99) . rand(100, 999) . substr($contact, 6);
    $uidNumber = null;
    $adminUploadedDoc = null;
    $taskStatus = '../../images/pending.svg';
    $process = 'Pending';

    $target_dir = "../uploads/";
    $extension = "." . end(explode(".", $_FILES["clientUploadedFile"]["name"]));
    $newFileName = "Invoice-" . $trackingNumber . $extension;
    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploads/" . $newFileName;
    $clientUploadedDoc = $fileLocation;

    // echo $target_file;
    // echo "<br>".$extension;
    // echo "<br>".$clientUploadedDoc;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($_FILES["clientUploadedFile"]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        ?>
        <script>
            window.location.href = "../routes/client/homeClient.php";
        </script>
    <?php
    }
    if ($imageFileType != "docx" && $imageFileType != "png" && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry! Only png, doc, jpeg, jpg ,docx, pdf & txt files are allowed.');</script>";
        ?>
        <script>
            window.location.href = "../routes/client/homeClient.php";
        </script>
    <?php
    }
    if ($uploadOk == 0) {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
        ?>
        <script>
            window.location.href = "../routes/client/homeClient.php";
        </script>
    <?php
    } else {
        if (move_uploaded_file($_FILES["clientUploadedFile"]["tmp_name"], $target_file)) {

            $insertToDocumentStore = "INSERT INTO `documentStore`(`id`, `firstName`, `lastName`, `fullName`, `userName`, `email`, `dateRegistered`, `transactionDate`, `identityUser`, `remarks`, `tdsRate`, `remittanceCurrency`, `remittanceNature`, `purposeCode`, `taxPaid`, `trc` ,`partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`, `process`) 
                        VALUES ('$id', '$firstName', '$lastName', '$fullName', '$userName', '$email', '$dateRegistered', '$transactionDate', '$identity', '$remarks', '$tdsRate', '$remittanceCurrency','$remittanceNature', '$purposeCode', '$taxPaid', '$trc', '$partyName', '$ackNumber', '$trackingNumber', '$uidNumber', '$clientUploadedDoc', '$adminUploadedDoc', '$taskStatus', '$contact', '$process')";

            if (mysqli_query($connect, $insertToDocumentStore)) {
                echo "<script type='text/javascript'>alert('Your file " . basename($_FILES["clientUploadedFile"]["name"]) . " has been uploaded.');</script>";

                $mailValue = 1;

                if($mailValue == 1) {

                echo "
                <script type='text/javascript'>

                    var name = '" . $userName . "';
                    var message = name + ' has uploaded an invoice file.';

                    var xhttpObj = new XMLHttpRequest();
                    xhttpObj.open('POST', 'https://script.google.com/macros/s/AKfycbyvvMuRXkIdrlf2YZbcsMLpTPVIxe_AZjt29jXoFS-pKYnoJnQ/exec', true);
                    xhttpObj.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhttpObj.send('message=' + message);
                    window.alert('mail sent');
                </script>";

            } else {

                echo "
                <script type='text/javascript'>
                    window.alert('mail not sent');
                </script>";

            }

            } else {
                echo "Error uploading: " . mysqli_error($connect);
            }
            
            ?>
            <script>
                window.location.href = "../routes/client/homeClient.php";
            </script>
        <?php

        } else {

            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
            ?>
            <script>
                window.location.href = "../routes/client/homeClient.php";
            </script>
        <?php
        }
    }
}

?>