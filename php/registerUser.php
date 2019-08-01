<?php
session_start();
include 'connectionDb15CACB.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['registerUser'])) {

    $id = uniqid(rand(1000,9999));
    $firstName = test_input($_POST['firstName']);
    $lastName = test_input($_POST['lastName']);
    $userName = test_input($_POST['username']);
    $identityUser = "client";
    $email = test_input($_POST['email']);
    $contact = test_input($_POST['contactNumber']);
    $passToHash = test_input($_POST['password']);
    $passwordHash = password_hash($passToHash, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO Users (`id`, `firstName`, `lastName`, `userName`, `password`, `identity`, `email`, `contact`) VALUES 
    ('$id', '$firstName', '$lastName', '$userName','$passwordHash', '$identityUser', '$email', '$contact')";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script type='text/javascript'>alert('New records created successfully');
                                            window.location.href = '../index.php';</script>";
    }
    else {
        echo "Unable to add Details! Error: " . mysqli_error($connect);
    }


}
?>