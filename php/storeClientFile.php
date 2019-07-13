<?php
session_start();
include 'connectionDb15CACB.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["submitFile"])) {
    
    $remarks = test_input($_POST['clientRemarks']);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["clientUploadedFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["clientUploadedFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "docx" && $imageFileType != "txt") {
        echo "Sorry, only docx & txt files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["clientUploadedFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["clientUploadedFile"]["name"]). " has been uploaded.";
            echo "<br>Directory: " . $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} 
?>
