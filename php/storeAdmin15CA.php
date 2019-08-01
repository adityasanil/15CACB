<?php

session_start();
$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';


if(isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if(strpos($key, 'submitAdmin15CA') !== false) {
            $string = explode("_", $key);
            $getNumberAdmin15CA = $string[1];
        }
    }

    foreach($_POST as $key2 => $value2) {
        if(strpos($key2, 'fileAdminID15CA') !== false) {
            $string2 = explode("_", $key2);
            if($getNumberAdmin15CA == $string2[1]) {
                $fileAdminID15CA = $value2;
            }
        }
    }

    foreach($_FILES as $key => $value) {
        if(strpos($key, 'fileAdminFile15CA') !== false) {
            $string = explode("_", $key);
            if($string[1] == $fileAdminID15CA) {
                $fileAdminFile15CA = $key;
            }
        } 
    }

    // echo "Value";
    // echo "<br>".$getNumberAdmin15CA;
    // echo "<br>" . $fileAdminFile15CA;
    // echo "<br>" . $fileAdminID15CA;



    $taskStatus15CA = '../../images/approved.svg';
    $target_dir = "../uploadsAdmin/adminUploads15CA/";

    $extension = "." . end(explode(".", $_FILES[$fileAdminFile15CA]["name"]));
    $newFileName = '15CA-'. $fileAdminID15CA . $extension; 

    // echo "<br>" . $newFileName;

    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploadsAdmin/adminUploads15CA/" . $newFileName;
    $adminUploadedDoc15CA = $fileLocation;


    $location = mysqli_real_escape_string($connect, "<a href='" . $adminUploadedDoc15CA . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a>");

    // echo "<br>" . $target_file;
    // echo "<br>" . $adminUploadedDoc;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
        $uploadOk = 0;
    }
    if ($_FILES[$fileAdminFile15CA]["size"] > 5000000) {
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
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>

        <?php
    }else {
        if (move_uploaded_file($_FILES[$fileAdminFile15CA]["tmp_name"], $target_file)) {

            $adminInsertToDb15CA = "UPDATE `documentStore` SET `adminUp15CA`='$location', `taskStatus15CA`='$taskStatus15CA'  WHERE `trackingNumber`='$fileAdminID15CA'";

            if(mysqli_query($connect, $adminInsertToDb15CA)) {
                echo "<script type='text/javascript'>alert('Uploaded to database');</script>";
            }else {
                echo "Error uploading: " . mysqli_error($connect);
            }
            echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES[$fileAdminFile15CA]["name"]). "has been uploaded.');</script>";
            ?>
            <script>
                window.location.href = "../routes/admin/homeAdmin.php";
            </script>
            <?php

        }else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
            ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
        <?php
        }

    }

}

?>