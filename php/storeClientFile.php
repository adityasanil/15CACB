<?php
session_start();
$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

date_default_timezone_set('Asia/Kolkata'); 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(isset($_POST["submitFile"])) {

    $sql = "SELECT * FROM Users WHERE userName ='$sessionHolder'";
    $querySql = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($querySql);
    
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName= $row['lastName'];
    $userName = $row['userName'];
    $dateRegistered = date("D\, jS M Y H:i");
    $identity = $row['identity'];
    $remarks = mysqli_real_escape_string($connect, test_input($_POST['clientRemarks']));
    $partyName = 'Vaibhav';
    $contact = $row['contact'];
    $ackNumber = '(will be assigned)';
    $trackingNumber = "#" . date('y') . rand(10,99) . rand(100,999) . substr($contact, 6);
    $uidNumber = '(will be assigned)';
    $adminUploadedDoc = null;
    $taskStatus = '../../images/pending.svg';

    $target_dir = "../uploads/";
    $extension = "." . end(explode(".", $_FILES["clientUploadedFile"]["name"]));
    $newFileName = $trackingNumber.$extension; 
    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploads/" . $newFileName;
    $clientUploadedDoc = $fileLocation;

    echo $target_file;
    echo "<br>".$extension;
    echo "<br>".$clientUploadedDoc;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
        $uploadOk = 0;
    }
    if ($_FILES["clientUploadedFile"]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        ?>
        <script>
            window.location.href = "../routes/client/homeClient.php";
        </script>
        <?php
    }
    if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, only docx, pdf & txt files are allowed.');</script>";
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
    }else {
        if (move_uploaded_file($_FILES["clientUploadedFile"]["tmp_name"], $target_file)) {

            $insertToDocumentStore = "INSERT INTO `documentStore`(`id`, `firstName`, `lastName`, `userName`, `dateRegistered`, `identity`, `remarks`, `partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`) 
						VALUES ('$id', '$firstName', '$lastName', '$userName', '$dateRegistered', '$identity', '$remarks', '$partyName', '$ackNumber', '$trackingNumber', '$uidNumber', '$clientUploadedDoc', '$adminUploadedDoc', '$taskStatus', '$contact')";

						if(mysqli_query($connect, $insertToDocumentStore)) {
							echo "<script type='text/javascript'>alert('Uploaded to database');</script>";
						}else {
							echo "Error uploading: " . mysqli_error($connect);
						}
            echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES["clientUploadedFile"]["name"]). " has been uploaded.');</script>";
            ?>
            <script>
                window.location.href = "../routes/client/homeClient.php";
            </script>
            <?php

        }else {
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
