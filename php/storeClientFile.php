<?php
session_start();
$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["submitFile"])) {

    $remarks = test_input($_POST['clientRemarks']);
    $sql = "SELECT * FROM Users WHERE userName ='$sessionHolder'";
    $querySql = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($querySql);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["clientUploadedFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
        $uploadOk = 0;
    }
    if ($_FILES["clientUploadedFile"]["size"] > 500000) {
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        $uploadOk = 0;
    }
    if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf") {
        echo "<script type='text/javascript'>alert('Sorry, only docx, pdf & txt files are allowed.');</script>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
    }else {
        if (move_uploaded_file($_FILES["clientUploadedFile"]["tmp_name"], $target_file)) {
            echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES["clientUploadedFile"]["name"]). " has been uploaded.');</script>";
            ?>
            <!-- <script>
                window.location.href = "../routes/client/homeClient.php";
            </script> -->
            <?php

        }else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
        }

    }

} 

?>
