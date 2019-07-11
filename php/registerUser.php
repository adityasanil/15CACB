<?php
include "connectionDb15CACB.php";

if(isset($_POST['registerUser'])) {

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    $id = uniqid(rand(1000,9999));
    $firstName = test_input($_POST['firstName']);
    $lastName = test_input($_POST['lastName']);
    $userName = test_input($_POST['username']);
    $identity = "client";
    $email = test_input($_POST['email']);
    $contact = test_input($_POST['contactNumber']);
    $passToHash = test_input($_POST['password']);
    $passwordHash = password_hash($passToHash, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO registerPageData (`id`, `firstName`, `lastName`, `userName`, `password`, `identity`, `email`, `contact`) VALUES 
    ('$id', '$firstName', '$lastName', '$userName','$passwordHash', '$identity', '$email', '$contact')";
    
    if (mysqli_query($connect, $sql)) {
        echo "New records created successfully";
    }
    else {
        echo "Unable to add Details! Error: " . mysqli_error($connect);
    }

}
?>