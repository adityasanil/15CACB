<?php
session_start();
$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';

if(isset($_POST)) {
    foreach($_POST as $key => $value) {
        if(strpos($key, 'submit') !== false) {
            $getNumber = $key[-1];
        }
    }
    foreach($_POST as $key1 => $value1) {
        if(strpos($key1, 'file') !== false) {
            if($getNumber == $key1[-1]) {
                $fileID = $value1;
            }
        }
    }
    foreach($_FILES as $key => $value) {
        if($getNumber == $key[-1]) {
            $fileFinal = $key;
        }
    } 

    $status = 'Completed';
    $target_dir = "../uploadsAdmin/";
    $target_file = $target_dir . basename($_FILES[$fileFinal]["name"]);
     
    // echo $fileID;
    // echo $target_file;
    // echo "<br>".$status;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
    }
    if ($_FILES[$fileFinal]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
    }
    if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, only docx, pdf & txt files are allowed.');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
    }
    if ($uploadOk == 0) {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file 1.');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
    }else 
    {
        if (move_uploaded_file($_FILES[$fileFinal]["tmp_name"], $target_file)) {
            $uploadAdminDoc = "UPDATE `documentStore` SET `adminUploadedDoc`='$target_file', `taskStatus`='$status' WHERE `trackingNumber`='$fileID'";

            if(mysqli_query($connect, $uploadAdminDoc)) {
                echo "<script type='text/javascript'>alert('Uploaded to database');</script>";
            }else {
                echo "Error uploading: " . mysqli_error($connect);
            }

            echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES[$fileFinal]["name"]). " has been uploaded.');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
            <?php
        }else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file 2.');</script>";
            ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
        }

    }
}





?>