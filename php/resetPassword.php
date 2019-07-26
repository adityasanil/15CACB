<?php

include 'connectionDb15CACB.php';


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = test_input($_POST['email']);
$newPassword = test_input($_POST['newPwd']);
$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE `Users` SET `password`= '$passwordHash' WHERE `email` = '$email'";
$query = mysqli_query($connect, $sql);

if($query) {
    echo "Password changed!";
} else {
    echo "Error: " . mysqli_error($connect);
}

?>