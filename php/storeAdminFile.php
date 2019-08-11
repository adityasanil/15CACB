<?php
session_start();
$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';


if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'submit') !== false) {
            $string = explode("_", $key);
            $getNumber = $string[1];
        }
    }
    foreach ($_POST as $key1 => $value1) {
        if (strpos($key1, 'file') !== false) {
            $string1 = explode("_", $key1);
            if ($getNumber == $string1[1]) {
                $fileID = $value1;
            }
        }
    }

    foreach ($_POST as $key2 => $value2) {
        if (strpos($key2, 'ack') !== false) {
            $string2 = explode("_", $key2);
            if ($getNumber == $string2[1]) {
                $ackNumber = $value2;
            }
        }
    }
    foreach ($_POST as $key3 => $value3) {
        if (strpos($key3, 'uid') !== false) {
            $string3 = explode("_", $key3);
            if ($getNumber == $string3[1]) {
                $uidNumber = $value3;
            }
        }
    }

    foreach ($_POST as $key4 => $value4) {
        if (strpos($key4, 'adminRemarks') !== false) {
            $string4 = explode("_", $key4);
            if ($getNumber == $string4[1]) {
                $remarksAdmin = $value4;
            }
        }
    }

    foreach ($_FILES as $key => $value) {
        $string = explode("_", $key);
        if ($getNumber == $string[1]) {
            $fileFinal = $key;
        }
    }

    // echo $getNumber;
    // echo "<br>".$fileID;
    // echo "<br>".$ackNumber;
    // echo "<br>".$uidNumber;


    $taskStatus = '../../images/approved.svg';

    $target_dir = "../uploadsAdmin/";
    $extension = "." . end(explode(".", $_FILES[$fileFinal]["name"]));

    $target_file = $target_dir . basename($_FILES[$fileFinal]["name"]);

    $newFileName = '15CB-' . $fileID . $extension;
    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploadsAdmin/" . $newFileName;
    $adminUploadedDoc = $fileLocation;

    $process = 'Completed';

    $location = mysqli_real_escape_string($connect, "<a href='" . $adminUploadedDoc . "' download><i class='fas fa-download fa-lg'></i></a>");

    // echo "<br>".$fileID;
    // echo "<br>".$status;
    // echo "<br>".$ackNumber;
    // echo "<br>".$uidNumber;
    // echo "<br>".$target_file;
    // echo "<br>".$adminUploadedDoc;
    // echo "<br>".$extension;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // if (file_exists($target_file)) {
    //     $uploadOk = 0;
    //     echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
    ?>
    <script>
        window.location.href = "../routes/admin/homeAdmin.php";
    </script>
    <?php
    // }
    if ($_FILES[$fileFinal]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
    <?php
    }
    if ($imageFileType != "docx" && $imageFileType != "png" && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
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
    } else {
        if (move_uploaded_file($_FILES[$fileFinal]["tmp_name"], $target_file)) {
            $uploadAdminDoc = "UPDATE `documentStore` SET `adminUploadedDoc`='$location', `ackNumber`='$ackNumber', `uidNumber`='$uidNumber', `taskStatus`='$taskStatus', `process`='$process', `adminRemarks`='$remarksAdmin' WHERE `trackingNumber`='$fileID'";

            if (mysqli_query($connect, $uploadAdminDoc)) {
                echo "<script type='text/javascript'>alert('Uploaded to database');</script>";
            } else {
                echo "Error uploading: " . mysqli_error($connect);
            }

            // echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES[$fileFinal]["name"]). "has been uploaded.');</script>";
            ?>
            <script>
                window.location.href = "../routes/admin/homeAdmin.php";
            </script>
        <?php
        } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file 2.');</script>";
            ?>
            <script>
                window.location.href = "../routes/admin/homeAdmin.php";
            </script>
        <?php
        }
    }

    if (isset($_POST["export"])) {
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
    }
}

?>