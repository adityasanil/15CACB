<?php

session_start();
$$sessionHolder = $_SESSION['user'];

include 'connectionDb15CACB.php';


if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'submitAdminXML') !== false) {
            $string = explode("_", $key);
            $getNumberAdminXML = $string[1];
        }
    }

    foreach ($_POST as $key2 => $value2) {
        if (strpos($key2, 'fileAdminIDXML') !== false) {
            $string2 = explode("_", $key2);
            if ($getNumberAdminXML == $string2[1]) {
                $fileAdminIDXML = $value2;
            }
        }
    }

    foreach($_FILES as $key => $value) {
        if(strpos($key, 'fileAdminFileXML') !== false) {
            $string = explode("_", $key);
            if($string[1] == $fileAdminIDXML) {
                $fileAdminFileXML = $key;
            }
        } 
    }

    // echo "Value";
    // echo "<br>".$getNumberAdmin15CA;
    // echo "<br>" . $fileAdminFile15CA;
    // echo "<br>" . $fileAdminID15CA;

    $target_dir = "../uploadsAdmin/adminXml/";

    $extension = "." . end(explode(".", $_FILES[$fileAdminFileXML]["name"]));
    $newFileName = 'XML-' . $fileAdminIDXML . $extension;

    // echo "<br>" . $newFileName;

    $target_file = $target_dir . $newFileName;
    $fileLocation = "../../uploadsAdmin/adminXml/" . $newFileName;
    $adminUploadedDocXML = $fileLocation;

    // echo "<br>" . $target_file;
    // echo "<br>" . $adminUploadedDoc;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($_FILES[$fileAdminFileXML]["size"] > 5000000) {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
        ?>
        <script>
            window.location.href = "../routes/admin/homeAdmin.php";
        </script>
    <?php
    }
    if ($imageFileType != "xml" && $imageFileType != "docx" && $imageFileType != "png" && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
        echo "<script type='text/javascript'>alert('Sorry, only xml, doc, jpeg, jpg, docx, pdf & txt files are allowed.');</script>";
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
    } else {
        if (move_uploaded_file($_FILES[$fileAdminFileXML]["tmp_name"], $target_file)) {

            $adminInsertToDbXML = "UPDATE `documentStore` SET `adminXML`='$adminUploadedDocXML' WHERE `trackingNumber`='$fileAdminIDXML'";

            if (mysqli_query($connect, $adminInsertToDbXML)) {
                echo "<script type='text/javascript'>alert('Your file " . basename($_FILES[$fileAdminFileXML]["name"]) . "has been uploaded.');</script>";
            } else {
                echo "Error uploading: " . mysqli_error($connect);
            }

            ?>
            <script>
                window.location.href = "../routes/admin/homeAdmin.php";
            </script>
        <?php

        } else {
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