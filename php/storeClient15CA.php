<?php

session_start();
$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';


if (isset($_POST)) {
    // echo "15CA test";
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'submit15CA') !== false) {
            $string = explode("_", $key);
            $getNumber = $string[1];
        }
    }

    foreach ($_POST as $key2 => $value2) {
        if (strpos($key2, 'fileID') !== false) {
            $string2 = explode("_", $key2);
            if ($getNumber == $string2[1]) {
                $fileID15CA = $value2;
            }
        }
    }

    foreach ($_FILES as $key => $value) {
        if (strpos($key, 'clientUp15CA') !== false) {
            $string = explode("_", $key);
            if ($string[1] == $fileID15CA) {
                $clientUp15CA = $key;
            }
        }
    }

    // echo $getNumber;
    // echo "<br>" . $fileID15CA;
    // echo "<br>" . $clientUp15CA;

    $taskStatus15CA = '../../images/approved.svg';


    $target_dir = "../uploads/clientUploads15CA/";
    // $target_file = $target_dir . basename($_FILES[$clientUp15CA]["name"]);

    $extension = "." . end(explode(".", $_FILES[$clientUp15CA]["name"]));
    $newFileName = '15CA-' . $fileID15CA . $extension;

    // echo "<br>" . $newFileName;

    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploads/clientUploads15CA/" . $newFileName;
    $clientUploadedDoc = $fileLocation;

    // echo "<br>" . $clientUploadedDoc;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
        $uploadOk = 0;
    }
    if ($_FILES[$clientUp15CA]["size"] > 5000000) {
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
    } else {
        if (move_uploaded_file($_FILES[$clientUp15CA]["tmp_name"], $target_file)) {

            $insertToDb15CA = "UPDATE `documentStore` SET `clientUp15CA`='$clientUploadedDoc', `taskStatus15CA`='$taskStatus15CA'  WHERE `trackingNumber`='$fileID15CA'";

            if (mysqli_query($connect, $insertToDb15CA)) {
                echo "<script type='text/javascript'>alert('Your file " . basename($_FILES[$clientUp15CA]["name"]) . "has been uploaded.');</script>";
            } else {
                echo "Error uploading: " . mysqli_error($connect);
            }
            // echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES[$clientUp15CA]["name"]). "has been uploaded.');</script>";
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